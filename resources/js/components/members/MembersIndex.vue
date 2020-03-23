<template>
  <div class="root-element">
    <h1>Members Widget</h1>
    <members-filters :filters.sync="filters"></members-filters>
    <members-table :members="members"></members-table>
  </div>
</template>

<script>
import MembersFilters from "./MembersFilters.vue";
import MembersTable from "./MembersTable.vue";

export default {
  components: {
    MembersFilters,
    MembersTable
  },
  data: function() {
    return {
      members: [],
      filters: {
        firstname: null,
        surname: null,
        email: null
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
      return params;
    }
  },
  methods: {
    fetchMembers: function() {
      axios
        .get("/api/members", {
          params: this.filterParams
        })
        .then(response => (this.members = response.data.data));
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
