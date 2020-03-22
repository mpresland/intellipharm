<template>
  <div class="root-element">
    <h1>Members Widget</h1>
    <members-table :members="members"></members-table>
  </div>
</template>

<script>
import MembersTable from "./MembersTable.vue";

export default {
  components: {
    MembersTable
  },
  data: function() {
    return {
      members: []
    };
  },
  methods: {
    fetchMembers: function() {
      axios
        .get("/api/members")
        .then(response => (this.members = response.data.data));
    }
  },
  mounted() {
    this.fetchMembers();
  }
};
</script>
