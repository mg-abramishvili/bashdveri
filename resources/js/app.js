//require('./bootstrap');

window.Vue = require('vue');

window.moment = require('moment');
Vue.prototype.$moment = moment;
moment.locale('ru');

import axios from 'axios'
window.axios = require('axios');

import App from './App.vue';
import VueRouter from 'vue-router';
import {routes} from './routes';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});