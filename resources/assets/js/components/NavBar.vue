<template>
  <div class="nav-bar">
    <a href="/works">
        Offres
    </a>
    <a href="/user" >
        Profil
    </a>
    <a :href="logout" @click="submit">
        Déconnexion
    </a>
    <a href="/works/new" class="button">
        Nouvelle Offre
    </a>
    <form ref="logoutForm" :action="logout" method="POST"></form>
  </div>
</template>

<script>

import axios from 'axios'

export default {
  name:"NavBar",
  props:['logout'],
  methods : {
    submit(e) {
      e.preventDefault()
      this.$refs.logoutForm.submit()
    }
  }
}
</script>

<style lang="scss">
  .nav-bar{
    position: absolute;
    top: 30px;
    right: 30px;
    a{
      font-size: 1.6rem;
      color: #ffffff;
      margin: 0 20px;
    }
    .button{
      margin-left: 30px;
      background: #ffffff;
      color: #8A2669;
      padding: 10px 20px;
      border-radius: 50px;
    }
  }
</style>
