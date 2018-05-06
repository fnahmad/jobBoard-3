<template>
  <v-template route="/admin/works" v-bind="{ algolia, title, actions }">
    <h1>Offers</h1>
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
      title: 'Works',
      namespace: 'works',
      actions: [
        { name: 'delete', func: this._$delete },
      ]
    }
  },
  components: { VTemplate }
}
</script>

