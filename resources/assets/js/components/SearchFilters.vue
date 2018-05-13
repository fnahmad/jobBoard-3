<template>
  <div class="search-filters">
    <h2>Filtres</h2>
    <div class="filters__list">
      <ais-refinement-list attribute-name="skills"></ais-refinement-list>
    </div>
  </div>
</template>

<script>

export default {
  
}
</script>

<style lang="scss">
  .search-filters{
    flex-grow: 1;
    flex-shrink: 0;
    margin-bottom: 15px;
    @media (min-width: 500px) {
      margin: 0 30px 0 0;
    }    
    h2{
      font-size: 2rem;
    }
    .filters__list{
      width: 100%;
      padding: 20px 15px;
      background: rgba(#000000, .025);
      font-size: 1.6rem;
      @media (min-width: 500px) {
        min-width: 200px;
      }
      input[type="checkbox"]{
        margin-right: 30px;
      }
    }
  }
</style>

