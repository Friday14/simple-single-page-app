import VueRouter from 'vue-router'
import Vue from 'vue'

Vue.use(VueRouter);

const routes = [
  {path: '/:categoryId', component: require('./pages/Products')},
  {path: '/products/create', name: 'products.create', component: require('./pages/CreateProduct')},
];

export const router = new VueRouter({
  routes
});
