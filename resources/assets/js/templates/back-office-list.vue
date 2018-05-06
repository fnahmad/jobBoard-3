<template>
  <layout as="backoffice" :props="{route}">
    <ais-index v-bind="algolia">

    </ais-index>
  </layout>
</template>

<script>
import {
  Index as AisIndex,
  SearchBox as AisSearchBox,
  Results as Aisresult
} from 'vue-instantsearch'

export default {
  name: 'template-bo-list',
   props: {
    route: {
      type: String,
      default: '/admin'
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
  components: { AisIndex, AisSearchBox, Aisresult }
}
</script>