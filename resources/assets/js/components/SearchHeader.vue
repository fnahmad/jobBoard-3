<template>
    <header class="search-header">
        <h1 class="search-header__title"><strong>120</strong> offres</h1>
        <ais-input placeholder="laravel, vue, react, ..."></ais-input>
    </header>
</template>

<script>

export default {
  
}
</script>

<style lang="scss">
.search-header{
  width: 100%;
  height: 300px;
  background: linear-gradient(to right, #da4453, #89216b);
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  &__title{
    font-size: 3.6rem;
    font-weight: 300;
    font-family: var(--main-font);
    color: var(--white);
    strong{
      font-weight: 600;    
    }
  }

  .ais-input{
    width: 30vw;
    padding: 10px 30px;
    background: var(--white);
    border: none;
    border-radius: 50px;
    outline: none;
    font-size: 1.8rem;
    color: var(--black);
    font-family: var(--main-font);
    &::placeholder{
      color: rgba(#000, .3);

    }
  }
}

</style>

