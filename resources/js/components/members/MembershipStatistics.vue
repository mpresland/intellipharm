<template>
  <div class="root-element">
    <h3>New Memberships By Year</h3>
    <membership-statistics-graph v-if="loaded" :chartdata="chartData" :height="100"></membership-statistics-graph>
  </div>
</template>

<script>
import MembershipStatisticsGraph from "./MembershipStatisticsGraph.vue";

export default {
  components: { MembershipStatisticsGraph },
  data: function() {
    return {
      loaded: false,
      chartData: {
        labels: [],
        datasets: []
      }
    };
  },
  async mounted() {
    this.loaded = false;
    axios.get("/api/membership-statistics").then(response => {
      this.chartData.labels = response.data.map(function(item) {
        return item.period;
      });
      this.chartData.datasets.push({
        label: "New Members By Year",
        backgroundColor: "#343a40",
        data: response.data.map(function(item) {
          return item.count;
        })
      });
      this.loaded = true;
    });
  }
};
</script>
