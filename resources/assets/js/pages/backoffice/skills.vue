<template>
  <v-template route="/admin/skills" v-bind="{ algolia, fields, title, actions }">
    <modal />
  </v-template>
</template>

<script>
import VTemplate from './../../templates/back-office-list'
import crudMixin from './../../mixins/crud'
import modal from './../../components/modals/backoffice/skill'
export default {
  name: 'back-office-skills',
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
        name: 'name',
      },
      title: 'Compétences',
      namespace: 'skills',
      actions: [
        { name: 'modifier', func: this._$editHelper },
        { name: 'supprimer', func: this._$delete },
      ]
    }
  },
  components: { VTemplate, modal }
}
</script>

