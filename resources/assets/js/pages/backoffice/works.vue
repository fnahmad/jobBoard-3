<template>
  <v-template route="/admin/works" v-bind="{ algolia, fields, title, actions }">
    <modal :config="configEdit" @data="edit" @callback="func => callback = func"/>
  </v-template>
</template>

<script>
import VTemplate from './../../templates/back-office-list'
import crudMixin from './../../mixins/crud'
import modal from './../../components/modals/backoffice/bo'
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
      callback: null,
      configEdit: {
        title: {  label: 'title', type: 'text' },
        working_time: {  label: 'Working time', type: 'text' },
        skill_level: {  label: 'Skill level', type: 'number' },
        people: {  label: 'People', type: 'number' },
        contact_name: {  label: 'Contact name', type: 'text' },
        contact_email: {  label: 'Contact mail', type: 'email' },
        budget: {  label: 'Budget', type: 'text' },
        start_at: {  label: 'Start at', type: 'date' },
        end_at: {  label: 'End at', type: 'date' },
        content: {  label: 'Content', type: 'textarea' },
      },
      title: 'Offres',
      namespace: 'works',
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

