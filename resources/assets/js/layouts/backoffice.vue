<template>
  <div class="wrapper">
    <aside class="sidebar">
      <header class="sidebar-header">
        <img class="sidebar-header-img" src="http://via.placeholder.com/50x50" alt="logo">
        <span>jobBoard</span>
      </header>
        <hr />
      <nav class="sidebar-nav">
        <ul>
          <li 
            v-for="({name, path}) in navPayload"
            :key="name"
            class="sidebar-nav-item"
            :class="{'sidebar-nav-item--active': route === path}"
          >
            <span class="sidebar-nav-item-highlight" />
            <a class="sidebar-nav-item-link" :href="path">
              <span class="sidebar-nav-item-link-text">{{ name }}</span>
            </a>
          </li>
        </ul>
      </nav>
      <footer class="sidebar-footer">
       <hr />
       <div class="sidebar-footer-content">
        <img src="http://via.placeholder.com/50x50" alt="logo">
        <h4>Nom prénom</h4>
        <h2>Rôle</h2>
       </div>
      </footer>
    </aside>
    <section class="content">
      <slot></slot>
    </section>
  </div>
</template>
<script>
export default {
  name: 'backoffice',
  props: {
    route: {
      type: String,
      default: '/admin'
    }
  },
  data () {
    return {
      navPayload: [
        {name: 'Dashboard', path: '/admin'},
        {name: 'Users', path: '/admin/users'},
        {name: 'Works', path: '/admin/works'}
      ]
    }
  }
}
</script>

<style scoped lang="scss">
 $bg: rgb(250, 251, 252);
 $blue: rgb(86, 144, 255);
 $gray: rgb(238, 240, 243);
  .wrapper {
    display: flex;
    height: 100vh;
  }
  .sidebar {
    width: 20vw;
    border-right: $gray 2px solid;
    position: relative;
    box-shadow: inset -1px 0px 5px 0px $gray;
    background-color: white;
    hr {
      margin: 0 1rem 1em 1rem;
      background-color: $gray;
      height: 2px;
      border: 0;
      &:last-child {
        position: absolute;
      }
    }
    &-header {
      align-items: center;
      display: flex;
      padding: 2rem;
      width: 100%;
      box-sizing: border-box;

      &-img {
        margin-right: 2rem;
      }
    }
    &-nav {
      padding: 0 2rem 2rem 0;
      &-item {
        position: relative;
        height: 4.5rem;
        &:hover &-highlight, &--active &-highlight {
          background-color: $blue;
        }
        &:hover &-link-text, &--active &-link-text {
          color: $blue;
        }
        &-highlight {
          display: block;
          position: absolute;
          top:0; left:0; right:0; bottom:0;
          height: 3rem;
          margin: .75rem 0 .75rem 0;
          width: 0.25rem;
        }
        &-link {
          position: absolute;
          top:0; left:0; right:0; bottom:0;
          display: flex;
          align-items: center;
          &-text {
            padding-left: 2rem;
            display: block;
            text-transform: uppercase;
            color: #555;
          }
        }
      }
    }
    &-footer {
      position: absolute;
      bottom: 0;
      width: 100%;
      &-content {
        box-sizing: border-box;
        padding: 2rem;
        text-align: center;
      }
    }
  }
  .content {
    padding: 3.5rem;
    width: 80vw;
    background-color: $bg;
    overflow: auto;
  }
</style>


