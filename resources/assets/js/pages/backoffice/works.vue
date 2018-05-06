<template>
  <v-template route="/admin/works" v-bind="{ algolia, title }">
    <h1>Offers</h1>
  </v-template>
</template>

<script>
import VTemplate from './../../templates/back-office-list'
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
  data () {
    return {
      title: 'Works'
    }
  },
  components: { VTemplate }
}
</script>

