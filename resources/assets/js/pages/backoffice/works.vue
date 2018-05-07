<template>
  <v-template route="/admin/works" v-bind="{ algolia, fields, title, actions }">
  </v-template>
</template>

<script>
import VTemplate from './../../templates/back-office-list'
import crudMixin from './../../mixins/crud'
export default {
  name: 'back-office-works',
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
        title: 'Titre',
        budget: 'Budget (€)',
        updated_at: 'Mis à jour le'
      },
      title: 'Offres',
      namespace: 'works',
      actions: [
        { name: 'supprimer', func: this._$delete },
      ]
    }
  },
  components: { VTemplate }
}
</script>

