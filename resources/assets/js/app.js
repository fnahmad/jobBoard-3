
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import 'normalize.css'

window.Vue = require('vue');

import InstantSearch from 'vue-instantsearch';

window.Vue.use(InstantSearch);


Vue.component('app', require('./components/app.vue'));

const app = new Vue({
    el: '#app',
});
