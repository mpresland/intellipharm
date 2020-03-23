<template>
  <div class="root-element">
    <div class="row">
      <div class="col-md-6">
        <h3>{{ label }}</h3>
      </div>
      <div class="col-md-6 text-right">
        <h4 v-if="mode == 'year'">Select a year to view detailed data</h4>
        <button
          type="button"
          class="btn btn-secondary"
          v-if="mode == 'month'"
          v-on:click="resetChart"
        >Back</button>
      </div>
    </div>

    <membership-statistics-graph
      v-if="loaded"
      :chartdata="chartData"
      v-on:chartClicked="chartClicked"
      :height="100"
    ></membership-statistics-graph>
  </div>
</template>

<script>
import MembershipStatisticsGraph from "./MembershipStatisticsGraph.vue";

export default {
  components: { MembershipStatisticsGraph },
  data: function() {
    return {
      label: "New Members By Year",
      mode: "year",
      loaded: false,
      chartData: {
        labels: [],
        datasets: []
      }
    };
  },
  methods: {
    chartClicked(event) {
      if (this.mode == "year") {
        var selectedIndex = event[0]._index;
        this.fetchStats(this.chartData.labels[selectedIndex]);
        console.log("chart clicked");
        console.log(this.chartData.labels[selectedIndex]);
      }
    },
    fetchStats(year) {
      this.loaded = false;
      var url = "/api/membership-statistics";

      if (year) {
        var url = url + "?year=" + year;
        this.label = "New Members By Month For " + year;
        this.mode = "month";
      }

      axios.get(url).then(response => {
        this.chartData.labels = response.data.map(function(item) {
          return item.period;
        });
        this.chartData.datasets = [
          {
            label: this.label,
            backgroundColor: "#343a40",
            data: response.data.map(function(item) {
              return item.count;
            })
          }
        ];
        this.loaded = true;
      });
    },
    resetChart() {
      this.mode = "year";
      this.label = "New Members By Year";
      this.fetchStats();
    }
  },
  mounted() {
    this.fetchStats();
  }
};
</script>

<style scoped>
.root-element {
  min-height: 350px;
  margin-top: 20px;
}
</style>
