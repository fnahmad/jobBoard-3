<template>
  <layout as="backoffice" :props="{route}">
    <slot />
  </layout>
</template>

<script>
export default {
   props: {
    route: {
      type: String,
      default: '/admin'
    }
  }
}
</script>