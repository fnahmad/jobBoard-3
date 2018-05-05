<template>
  <div class="result-clipboard">
    <p>
      {{label}}
    </p>
    <button
      v-clipboard:copy="label"
      v-clipboard:success="onCopy">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M320 448v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V120c0-13.255 10.745-24 24-24h72v296c0 30.879 25.121 56 56 56h168zm0-344V0H152c-13.255 0-24 10.745-24 24v368c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24V128H344c-13.2 0-24-10.8-24-24zm120.971-31.029L375.029 7.029A24 24 0 0 0 358.059 0H352v96h96v-6.059a24 24 0 0 0-7.029-16.97z"/></svg>
    </button>
  </div>
</template>

<script>
export default {
  props: ['label'],
  methods: {
    onCopy(){
      console.log('copied!')
    }
  }
}
</script>

<style lang="scss">
  .result-clipboard{
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    justify-content: flex-end;
    align-items: center;
    input{
      display: none;
    }
    p{
      margin: 0;
    }
    button{
      background: none;
      border: none;
      outline: none;
      padding: 0;
      margin: 0;
      display: flex;
      padding: 3px;
      margin-left: 5px;
      cursor: pointer;
      &:active{
        svg{
          fill: rgba(#000000, .15);
        }
      }
      svg{
        width: 16px;
        height: 16px;
        fill: rgba(#000000, .1);
      }
    }
  }
</style>