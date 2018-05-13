<template>
  <v-template route="/admin/skills" v-bind="{ algolia, fields, title, actions }">
    <modal :config="configEdit" @data="edit" @callback="func => callback = func"/>
  </v-template>
</template>

<script>
import VTemplate from './../../templates/back-office-list'
import crudMixin from './../../mixins/crud'
import modal from './../../components/modals/backoffice/bo'
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
      callback: null,
      configEdit: {
        name: { 
          label: 'lol',
          placeholder: 'mdr',
          type: 'text'
        }
      },
      title: 'Compétences',
      namespace: 'skills',
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

