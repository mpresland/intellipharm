<template>
  <div class="root-element">
    <p>
      Find Members:
      <input
        type="text"
        v-model="filters.firstname"
        @input="updateFilters"
        placeholder="First Name"
      />
      <input type="text" v-model="filters.surname" @input="updateFilters" placeholder="Surname" />
      <input type="text" v-model="filters.email" @input="updateFilters" placeholder="Email" />
    </p>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      filters: {
        firstname: null,
        surname: null,
        email: null
      }
    };
  },
  methods: {
    updateFilters: function() {
      this.$emit("update:filters", this.filters);
    }
  }
};
</script>
