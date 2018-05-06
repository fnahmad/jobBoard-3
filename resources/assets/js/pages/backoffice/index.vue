<template>
  <layout as="backoffice" route="/admin">
    <h2>Dashboard</h2>
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

