import {router} from "./routes";
import Vue from 'vue';
import VueResource from 'vue-resource';

Vue.use(VueResource);
// Vue.http.headers.common['X-CSRF-TOKEN'] = document.head.querySelector('meta[name="csrf-token"]');

Vue.component('navbar', require('./components/Navbar'));
Vue.component('category-menu', require('./components/Menu'));

const app = new Vue({
  router
}).$mount('#app');