<template>
  <section>
    <component :is="as" v-bind="props">
      <slot />
    </component>
  </section>
</template>

<script>
import backoffice from './backoffice';
import principle from './principle';
import _omit from 'lodash/omit'
export default {
  name: 'layout',
  props: {
    as: {
      type: String,
      default: 'principle'
    },
    props: {
      type: Object,
      default: () => ({})
    }
  },
   components: { backoffice, principle }
}
</script>