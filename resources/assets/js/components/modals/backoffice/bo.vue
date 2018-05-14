<template>
  <modal-type @data="storeData" @callback="func => $emit('callback', func)">
    <div style="display: flex; align-item: center; justify-content: space-evenly; flex-wrap: wrap;">
    <super-input
    style="width: 40%;"
      v-if="item && config && config[field]"
      v-for="(value, field) in item"
      :key="field"
      v-model="item[field]"
      :placeholder="config[field].placeholder || field"
      :type="config[field].type || 'text'" > {{ config[field].label }} </super-input>

    </div>
      <button @click="edit">Edit</button>
  </modal-type>
</template>
<script>
import ModalType from './ModalType'
import SuperInput from './../../../components/SuperInput'
import _pick from 'lodash/pick'
export default {
  props: {
    config: {
      type: Object,
      default: () => ({
          name: { 
            label: 'Label',
            placeholder: 'Contenu',
            type: 'text'
          },
        }),
    }
  },
  data () {
    return {
      item: null,
      initial: null
    }
  },
  methods: {
    storeData (data) {
      this.item = this.initial = _pick(data, [...Object.keys(this.config), 'id'])
    },
    edit () {
      this.$emit('data', this.item)
      this.$modal.hide('bo_skills')
    }
  },
  components: { ModalType, SuperInput }
}
</script>

