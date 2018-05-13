<template>
  <layout as="backoffice" route="/admin">
    <h2>Infos</h2>
    <section class="Kpi">
      <div
      v-for="(s, field) in stats"
      :key="field"
      class="Kpi-block">
        <h4> {{ field }} </h4>
        <span> {{ s }} </span>
      </div>
    </section>
  </layout>
</template>

<script>
export default {
  name: 'back-office',
  props: {
    stats: {
      type: Array,
      default: () => []
    }
  }
}
</script>
<style lang="scss">
 $blue: rgb(86, 144, 255);
  .Kpi {
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    &-block {
      padding: 20px;
      width: 100px;
      height: 100px;
      display: flex;
      justify-content: space-evenly;
      flex-direction: column;
      align-items: center;
      span {
        font-weight: bold;
        color: $blue;
        font-size: 2rem;
      }
    }
  }
</style>
