<template>
  <v-template route="/admin/users" :algolia="algolia">
    <h1>Users</h1>
  </v-template>
</template>

<script>
import VTemplate from './../../templates/back-office-list'
export default {
  name: 'back-office-users',
  props: {
    payload: {
      type: Array,
      default: () => []
    },
    algolia: {
      type: Object,
      default: () => ({
        'index-name': 'your_indexName',
        'app-id': 'YourAppID',
        'api-key': 'YourSearchAPIKey' 
      })
    }
  },
  components: { VTemplate }
}
</script>

