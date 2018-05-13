<template>
  <modal  height="auto" :name="`bo`" @before-open="beforeOpen" @before-close="$emit('before-close')">
    <section style="padding: 20px; height: 100%; width: 100%; border-sizing: border-box;">
      <div style="overflow: scroll; height: 100%; width: 100%; border-sizing: border-box;">
    <span @click="$modal.hide(`bo`)">close</span>
    <slot />
      </div>
    </section>
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
      console.log(params)
      if (params && params.data) {
        this.$emit('data', params.data)
        this.$emit('callback', params.callback)
      }
    }
  }
}
</script>

