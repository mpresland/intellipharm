<script>
import { Bar } from "vue-chartjs";
export default {
  extends: Bar,
  props: {
    chartdata: {
      type: Object,
      default: null
    }
  },
  methods: {
    handle(point, event) {
      this.$emit("chartClicked", event);
    }
  },
  mounted() {
    this.renderChart(this.chartdata, { onClick: this.handle });
  }
};
</script>
