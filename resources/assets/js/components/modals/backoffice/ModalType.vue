<template>
  <modal :name="`bo_${name}`" @before-open="beforeOpen" @before-close="$emit('before-close')">
    <span @click="$modal.hide(`bo_${name}`)">close</span>
    <slot />
  </modal>
</template>
<script>
export default {
  name: 'modal-type',
  props: {
    name: {
      type: String
    }
  },
  methods: {
    beforeOpen ({params}) {
      if (params && params.data) {
        this.$emit('data', params.data)
      }
    }
  }
}
</script>

