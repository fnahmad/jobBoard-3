<template>
  <div class="result-date">
    {{ start ? formatDate(start) : '??' }} - {{ end ? formatDate(end) : '??' }}
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