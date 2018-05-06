<template>
  <v-template route="/admin/users" v-bind="{ algolia, fields, title, actions }">
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
      namespace: 'users',
      title: 'Users',
      actions: [
        { name: 'edit', func: this._edit },
        { name: 'delete', func: this._delete },
      ]
    }
  },
  methods: {
    async _delete (id) {
      await this.$swal({
          title: 'Are you sure?',
          text: 'You can\'t revert your action',
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes Delete it!',
          cancelButtonText: 'No, Keep it!',
          showCloseButton: true,
          showLoaderOnConfirm: true
        })
        .then(async (result) => {
          if(result.value) {
            await axios.delete(`/api/${this.namespace}/${id}`)
            this.$swal('Deleted', 'You successfully deleted this file', 'success')
          } else {
            this.$swal('Cancelled', 'Your file is still intact', 'info')
          }
        }) 
    },
    _edit (id) { axios.delete(id) },
  },
  components: { VTemplate }
}
</script>

