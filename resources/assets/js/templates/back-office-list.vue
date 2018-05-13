<template>
  <layout as="backoffice" :props="{route, title}">
    <ais-index ref="aisIndex" v-bind="algolia">
      <table class="table" cellspacing="0">
        <thead class="table-thead">
          <tr>
            <td v-for="(key, index) in fields" :key="index + key">{{ key }}</td>
            <td style="text-align: center;" v-for="action in actions" :key="action.name">{{ action.name }}</td>
          </tr>
        </thead>
        <ais-results class="table-tbody">
          <tr slot="default" slot-scope="{result}">
            <td v-for="(item, key) in pickOnly(result, fields)" :key="result.id + key">{{ isDateAndFormat(key, item) || item }}</td>
            <td
              class="table-tbody-td--action"
              v-for="({name, func}) in actions"
              :key="name"
              @click="callAction(func.bind(null, result, refreshResults.bind(this)), refreshResults.bind(this))">
              {{ name }}
            </td>
          </tr>
        </ais-results>
      </table>
    </ais-index>  
    <slot />
  </layout>
</template>

<script>
import {
  Index as AisIndex,
  SearchBox as AisSearchBox,
  Results as AisResults
} from 'vue-instantsearch'

import _pick from 'lodash/pick'
import _isDate from 'lodash/isDate'
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
    },
    actions: {
      type: Array,
      default: () => [
        { name: 'edit', func: () => {console.log('edit')} },
        { name: 'delete', func: () => {console.log('delete')} },
      ]
    },
    title: {
      type: String,
      default: 'Backoffice'
    }
  },
  methods: {
    pickOnly (array, itemsToPick) {
      return _pick(array, Object.keys(itemsToPick))
    },
    isDateAndFormat (key, value) {
      return (key === 'updated_at' || key === 'created_at')
        ? moment(value).format('DD/MM/YY')
        : false
    },
    async callAction (action, callback) {
      const func = await action.call()
        setTimeout(() => callback.call(func), 2000)
    },
    refreshResults (payload) {
      if (this.$refs.aisIndex) {
        console.log('oui !!')
        const searchStore = this.$refs.aisIndex._localSearchStore
        searchStore.clearCache()
        searchStore.refresh()
      }
      return payload
   }
  },
  components: { AisIndex, AisSearchBox, AisResults }
}
</script>

<style scoped lang="scss">
  $blue: rgb(86, 144, 255);
  $lightblue: #e9eff9;
  $lighterblue: #f3f7fe;
  $space: .5rem;
  .table {
    min-width: 100%;
    border-collapse:separate; 
    border-spacing:0 .75rem;
      // tr {
      //   display: flex;
      //   justify-content: space-between;
      // }
    td { 
      padding: .75rem;
      padding-left: 1rem;
      transition: all ease .15s;
    }
    tr {
      &:hover {
        box-shadow: 0px 0px 40px 0px rgba(235,241,249,1); 
      }
      &:first-child {
        & td:first-child { 
          border-top-left-radius: $space;
        }
        & td:last-child { border-top-right-radius: $space; }
      }
      &:last-child {
        & td:first-child { border-bottom-left-radius: $space; }
        & td:last-child { border-bottom-right-radius: $space; }
      }
    } 
    &-thead {
      td {
        background: $lighterblue;
        border-bottom: $lightblue solid 1px;
        text-transform: uppercase;
        font-size: .9rem;
      }
    }
    &-tbody {
      display: table-row-group;
      td {
        background: white;
        border-bottom: $lightblue solid 1px;
        padding: 1rem;
      }
      &-td--action {
        padding-left: 1rem;
        text-align: center;
        text-transform: uppercase;
        font-weight: 600;
        font-size: .9rem;
        cursor: pointer;
        transition: all ease .05s;
        color: #333;
        &:active:hover {
          filter: blur(1px);
          transform: scale(.95)
        }
        &:hover {
          color: $blue;
          transform: scale(1.05)
        }
      }
    }
  }
</style>
