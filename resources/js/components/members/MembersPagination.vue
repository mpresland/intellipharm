<template>
  <div class="root-element row">
    <div class="col-md-6">
      <ul class="pagination">
        <li
          v-for="pageLink in pageLinks"
          :key="pageLink.title"
          class="page-item"
          :class="{disabled: pageLink.disabled, active: pageLink.active}"
          v-on:click="navigateTo(pageLink)"
        >
          <a class="page-link" href="#">{{ pageLink.title }}</a>
        </li>
      </ul>
    </div>
    <div
      class="col-md-6 text-right"
    >Showing Results: {{ pagination.from }} - {{ pagination.to }} of {{ pagination.total }}</div>
  </div>
</template>

<script>
export default {
  props: {
    pagination: {
      type: Object,
      required: true
    }
  },
  computed: {
    pageLinks: function() {
      var links = [];

      // previous
      links.push({
        title: "Previous",
        pageNumber:
          this.pagination.currentPage == 1
            ? 1
            : this.pagination.currentPage - 1,
        disabled: this.pagination.currentPage == 1 ? true : false,
        active: false
      });

      var startPage = Math.max(this.pagination.currentPage - 2, 1);
      var endPage = Math.min(
        this.pagination.currentPage + 2,
        this.pagination.lastPage
      );

      var i;
      for (i = startPage; i <= endPage; i++) {
        links.push({
          title: i,
          pageNumber: i,
          disabled: false,
          active: this.pagination.currentPage == i
        });
      }

      //next
      links.push({
        title: "Next",
        pageNumber:
          this.pagination.currentPage >= this.pagination.lastPage
            ? this.pagination.currentPage
            : this.pagination.currentPage + 1,
        disabled:
          this.pagination.currentPage >= this.pagination.lastPage
            ? true
            : false,
        active: false
      });
      return links;
    }
  },
  methods: {
    navigateTo(pageLink) {
      event.preventDefault();
      this.$emit("navigate-to", pageLink.pageNumber);
    }
  }
};
</script>
