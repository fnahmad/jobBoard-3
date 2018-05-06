<template>
  <v-template route="/admin/users" v-bind="{ algolia, fields, title, actions }">
    <h1>Users</h1>
  </v-template>
</template>

<script>
import VTemplate from './../../templates/back-office-list'
import crudMixin from './../../mixins/crud'
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
  mixins: [crudMixin],
  data () {
    return {
      fields: {
        id: 'id',
        firstname: 'Prénom',
        lastname: 'Nom',
        updated_at: 'Mis à jour le'
      },
      namespace: 'users',
      title: 'Users',
      actions: [
        { name: 'edit', func: this._edit },
        { name: 'delete', func: this._$delete },
      ]
    }
  },
  methods: {
    _edit (id) { axios.delete(id) },
  },
  components: { VTemplate }
}
</script>

