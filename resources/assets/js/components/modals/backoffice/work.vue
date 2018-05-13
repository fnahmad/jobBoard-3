<template>
  <modal-type name="works" @data="storeData" @before-close="() => $emit('data', item)">
    <input
      v-if="item"
      v-for="(value, field) in item"
      :key="field"
      v-model="item[field]"
      :placeholder="field"
      type="text">
  </modal-type>
</template>
<script>
import ModalType from './ModalType'
export default {
  data () {
    return {
      item: null,
      initial: null
    }
  },
  methods: {
    storeData (data) {
      this.item = this.initial = data
    }
  },
  components: { ModalType }
}
</script>

