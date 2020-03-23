<template>
  <table class="table table-striped table-bordered table-hover">
    <thead class="thead-dark">
      <tr>
        <th scope="col" style="width: 20%">First Name</th>
        <th scope="col" style="width: 20%">Surname</th>
        <th scope="col" style="width: 30%">Email</th>
        <th scope="col" style="width: 10%">Gender</th>
        <th scope="col" style="width: 20%">Member Since</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="member in members" :key="member.id">
        <td>{{ member.firstname }}</td>
        <td>{{ member.surname }}</td>
        <td>{{ member.email }}</td>
        <td>{{ member.gender }}</td>
        <td>{{ member.joined_date }}</td>
      </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  props: {
    members: {
      type: Array,
      required: true
    }
  }
};
</script>
