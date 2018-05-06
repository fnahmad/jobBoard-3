<template>
  <layout as="backoffice" :props="{route, title}">
    <ais-index v-bind="algolia">
      <table class="table" cellspacing="0">
        <thead class="table-thead">
          <tr>
            <td v-for="(key, index) in fields" :key="index + key + 1111">{{ key }}</td>
          </tr>
        </thead>
        <ais-results class="table-tbody">
          <tr slot="default" slot-scope="{result}">
            <td v-for="(item, key) in pickOnly(result, fields)" :key="result.id + key">{{ item }}</td>
          </tr>
        </ais-results>
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
    },
    title: {
      type: String,
      default: 'Backoffice'
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
      box-shadow: 0px 0px 20px -5px rgba(235,241,249,1);
      transition: all ease .3s;
    }
    tr {
      &:hover td {
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
    }
  }
</style>
