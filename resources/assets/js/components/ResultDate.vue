<template>
  <div class="search-results">
    {{formatDate(start)}} - {{formatDate(end)}}
  </div>
</template>

<script>
import moment from 'moment'

export default {
  props: ['start', 'end'],
  methods: {
    formatDate(date) {
      return moment(date).format('MMM D')
    }
  }
}
</script>

<style lang="scss">
  
</style>