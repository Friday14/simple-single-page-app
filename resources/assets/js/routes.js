import VueRouter from 'vue-router'
import Vue from 'vue'

Vue.use(VueRouter);

const routes = [
  {path: '/:categoryId', component: require('./pages/Products')},
];

export const router = new VueRouter({
  routes
});
