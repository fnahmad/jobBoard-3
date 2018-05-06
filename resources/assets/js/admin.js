/***
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 *
 ***/

require("./bootstrap");

const mapToFunc = (array, func, args) => {
  array.forEach(element => {
    func(element, ...args);
  });
};

import "normalize.css";
import Vue from "vue";

// ---- IMPORT GLOBAL COMPONENTS ---- //
import LayoutHelper from "./layouts/helper.vue";

// ---- IMPORT PAGES ---- //
import PageBackoffice from "./pages/backoffice";
import PageBoUsers from "./pages/backoffice/users";
import PageBoWorks from "./pages/backoffice/works";

const globalComponents = [
  // components
  LayoutHelper,
  // pages
  PageBackoffice,
  PageBoWorks,
  PageBoUsers
];

// ---- IMPORT GLOBAL PLUGINS ---- //
import InstantSearch from "vue-instantsearch";

const plugins = [InstantSearch];
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

// Autoload plugins
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
