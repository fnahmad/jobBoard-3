<template>
  <div class="search-filters">
    <h2>Filters</h2>
    <ais-refinement-list 
      attribute-name="skills">
    </ais-refinement-list>
  </div>
</template>

<script>

export default {
  
}
</script>

<style lang="scss">
  .search-filters{
    flex-grow: 1;
  }
  .ais-refinement-list {
    font-size: 1.4rem;
    margin-top: 10px;
    &__value {
      margin-left: 8px;
    }
  }
</style>

