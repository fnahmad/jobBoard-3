<template>
  <v-template route="/admin/users" v-bind="{ algolia, fields, title, actions }">
     <modal :config="configEdit" @data="edit" @callback="func => callback = func"/>
  </v-template>
</template>

<script>
import VTemplate from './../../templates/back-office-list'
import crudMixin from './../../mixins/crud'
import modal from './../../components/modals/backoffice/bo'
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
        promo: 'Promo',
        updated_at: 'Mis à jour le'
      },
      callback: null,
      configEdit: {
        firstname: { 
          label: 'Firstname',
          type: 'text'
        },
        lastname: { 
          label: 'Lastname',
          type: 'text'
        },
        email: { 
          label: 'Email',
          type: 'email'
        },
        promo: { 
          label: 'Promo',
          type: 'text'
        },
        phone: {
          label: 'Téléphone',
          type: 'tel'
        },
        is_confirmed: {
          label: 'Confirmé ?',
          type: 'number'
        }
      },
      namespace: 'users',
      title: 'Utilisateurs',
      actions: [
        { name: 'modifier', func: this._$editHelper },
        { name: 'supprimer', func: this._$delete },
      ]
    }
  },
  methods: {
    edit (data) {
      this._$edit(data).then(() => {
        setTimeout(() => this.callback(), 2000)
      })
    }
  },
  components: { VTemplate, modal }
}
</script>

