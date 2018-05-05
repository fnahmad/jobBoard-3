<template>
  <div class="result-date">
    {{ start ? formatDate(start) : '??' }} - {{ end ? formatDate(end) : '??' }}
  </div>
</template>

<script>
export default {
  props: ['start', 'end'],
  methods: {
    formatDate(date) {
      return moment(date).format('DD/MM/YY')
    }
  }
}
</script>