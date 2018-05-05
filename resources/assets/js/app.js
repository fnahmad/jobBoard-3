
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import 'normalize.css'
import Vue from 'vue'

// IMPORT GLOBAL COMPONENTS
import vSelect from './components/SelectSkills.vue'
import Root from './components/app.vue'
Vue.component('v-select', vSelect);
Vue.component('app', Root);

//IMPORT GLOBAL PLUGINS
import InstantSearch from 'vue-instantsearch';
Vue.use(InstantSearch);

const app = new Vue({
    el: '#app',
});
