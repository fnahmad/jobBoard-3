<template>
  <v-template route="/admin/users" v-bind="{ algolia, fields, title }">
    <h1>Users</h1>
  </v-template>
</template>

<script>
import VTemplate from './../../templates/back-office-list'
export default {
  name: 'back-office-users',
  props: {
    algolia: {
      type: Object,
      default: () => ({
        'index-name': 'your_indexName',
        'app-id': 'YourAppID',
        'api-key': 'YourSearchAPIKey' 
      })
    }
  },
  data () {
    return {
      fields: {
        id: 'id',
        firstname: 'Prénom',
        lastname: 'Nom',
        updated_at: 'Mis à jour le'
      },
      title: 'Users'
    }
  },
  components: { VTemplate }
}
</script>

