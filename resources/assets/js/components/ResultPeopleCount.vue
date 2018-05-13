<template>
  <div class="result-people">
    {{ count }}
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"/></svg>
  </div>
</template>

<script>

export default {
  props: ['count']
}
</script>

<style lang="scss">
.result-people{
  display: inline-block;
  font-size: 1.8rem;
  font-weight: 600;
  color: var(--light-grey);
  display: block;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  margin-top: 10px;
  @media (min-width: 500px) {
    margin-top: 0;    
    display: inline-flex;
    margin-left: 15px;
  }  
  svg {
    margin-left: 5px;
    width:  16px;
    height: 16px;
    fill: var(--light-grey);
  }
}
</style>
