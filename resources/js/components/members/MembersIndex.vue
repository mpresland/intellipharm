<template>
  <div class="root-element">
    <members-filters :filters.sync="filters"></members-filters>
    <members-table :members="members"></members-table>
    <members-pagination :pagination="pagination" v-on:navigate-to="navigateTo"></members-pagination>
  </div>
</template>

<script>
import MembersFilters from "./MembersFilters.vue";
import MembersTable from "./MembersTable.vue";
import MembersPagination from "./MembersPagination.vue";

export default {
  components: {
    MembersFilters,
    MembersTable,
    MembersPagination
  },
  data: function() {
    return {
      members: [],
      filters: {
        firstname: null,
        surname: null,
        email: null,
        page: 1
      },
      pagination: {
        currentPage: 1,
        lastPage: 1,
        from: 0,
        to: 0,
        total: 0
      }
    };
  },
  computed: {
    filterParams() {
      const params = new URLSearchParams();

      if (this.filters.firstname != null && this.filters.firstname.length) {
        params.append("firstname", this.filters.firstname);
      }
      if (this.filters.surname != null && this.filters.surname.length) {
        params.append("surname", this.filters.surname);
      }
      if (this.filters.email != null && this.filters.email.length) {
        params.append("email", this.filters.email);
      }

      params.append("page", this.filters.page);

      return params;
    }
  },
  methods: {
    fetchMembers: function() {
      axios
        .get("/api/members", {
          params: this.filterParams
        })
        .then(response => {
          this.members = response.data.data;
          this.pagination.currentPage = response.data.meta.current_page;
          this.pagination.lastPage = response.data.meta.last_page;
          this.pagination.from = response.data.meta.from;
          this.pagination.to = response.data.meta.to;
          this.pagination.total = response.data.meta.total;
        });
    },
    navigateTo(pageNumber) {
      console.log(pageNumber);
      this.filters.page = pageNumber;
    }
  },
  mounted() {
    this.fetchMembers();
  },
  watch: {
    filters: {
      handler: function() {
        this.fetchMembers();
      },
      deep: true
    }
  }
};
</script>
