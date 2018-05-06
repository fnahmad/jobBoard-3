<template>
  <layout as="backoffice" :props="{route}">
    <ais-index v-bind="algolia">
      <table>
        <thead>
          <div>
            <tr>
              <td v-for="(key, index) in fields" :key="index + key + 1111">{{ key }}</td>
            </tr>
          </div>
        </thead>
        <tbody>
          <ais-results>
            <tr slot="default" slot-scope="{result}">
              <td v-for="(item, key) in pickOnly(result, fields)" :key="result.id + key">{{ item }}</td>
            </tr>
          </ais-results>
        </tbody>
      </table>
    </ais-index>  
  </layout>
</template>

<script>
import {
  Index as AisIndex,
  SearchBox as AisSearchBox,
  Results as AisResults
} from 'vue-instantsearch'

import _pick from 'lodash/pick'
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
    },
    fields: {
      type: Object,
      default: () => ({
        id: 'identifiant'
      })
    }
  },
  methods: {
    pickOnly (array, itemsToPick) {
      return _pick(array, Object.keys(itemsToPick))
    }
  },
  components: { AisIndex, AisSearchBox, AisResults }
}
</script>

<style scoped lang="scss">
  
</style>
