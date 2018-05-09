/***
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 *
 ***/

require("./bootstrap");

import "normalize.css";

window.moment = require("moment");
window.moment.locale("fr");
const mapToFunc = (array, func, args) => {
  array.forEach(element => {
    func(element, ...args);
  });
};

import "normalize.css";
import Vue from "vue";

// ---- IMPORT GLOBAL COMPONENTS ---- //
import vSelect from "./components/SelectSkills.vue";
import LayoutHelper from "./layouts/helper.vue";

// ---- IMPORT PAGES ---- //
import Root from "./components/App.vue";

Vue.component("v-select", vSelect);

const globalComponents = [
  // components
  vSelect,
  LayoutHelper,
  // pages
  Root
];

// ---- IMPORT GLOBAL PLUGINS ---- //
import VueClipboard from "vue-clipboard2";
import InstantSearch from "vue-instantsearch";

const plugins = [InstantSearch, VueClipboard];
// Autoload components
mapToFunc(
  globalComponents,
  (component, vue) => {
    if (component && component.name && vue) {
      vue.component(component.name, component);
    } else {
      throw `check if your component has a name`;
    }
  },
  [Vue]
);

//Autoload plugins
mapToFunc(
  plugins,
  (plugin, vue) => {
    if (plugin && vue) {
      vue.use(plugin);
    } else {
      throw `check if your import your plugin correctly`;
    }
  },
  [Vue]
);

const app = new Vue({
  el: "#app"
});
