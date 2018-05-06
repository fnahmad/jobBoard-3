<template>
  <layout as="backoffice" route="/admin">
    <h1>backoffice</h1>
  </layout>
</template>

<script>
export default {
  name: 'back-office',
  props: {
    payload: {
      type: Array,
      default: () => []
    }
  }
}
</script>

