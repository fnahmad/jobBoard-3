
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import 'normalize.css'

window.Vue = require('vue');

import InstantSearch from 'vue-instantsearch';
import VueClipboard from 'vue-clipboard2'
window.moment = require('moment')
window.moment.locale('fr')
window.Vue.use(InstantSearch);
window.Vue.use(VueClipboard)

import Vue from 'vue'
import vSelect from './components/SelectSkills.vue'

Vue.component('v-select', vSelect);



Vue.component('app', require('./components/app.vue'));

const app = new Vue({
    el: '#app',
});
