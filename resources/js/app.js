/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');
//
window.Vue = require('vue');
window.Event = new Vue();


// import VueResorce from 'vue-resorce';

import VueRouter from 'vue-router';

import {routes} from './routes';

// import Vuetify from 'vuetify';

// import vuex from 'vuetify';

import store from "./store";


import Auth from "./Auth";
Vue.use(Auth);

import vueImagebox from 'vue-image-box';

Vue.use(vueImagebox);

import App from './App';

import VueSpinners from "vue-spinners";

Vue.use(VueSpinners);

import axios from 'axios';

// window.axios = axios;
//
// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


Vue.use(VueRouter);

// Vue.use(Vuetify, {
//     iconfont: 'md',
//
// });



//
// const routes = [
//
//   { path: '/Home', component: require('./components/Posts.vue') },
//   { path: '/user', component: require('./components/User.vue') }
// ]

const router = new VueRouter({
    mode: 'history',
    routes
})

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.secure)) {
        // if no token
        if (!store.state.loggedIn) {
            //console.log("no token");
            next({
                path: "/vue/login"
            });
        } else {
            next();
        }
    } else if (to.matched.some(record => record.meta.guest)) {

        if (!store.state.loggedIn) {
            next();
        } else {
            //console.log("no token");
            next({
                path: "/vue/dashboard"
            });
        }
    } else {
        next();
    }
});


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('user', require('./components/User.vue').default);
//
// Vue.component('testi', require('./components/testi.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue({

    components:{App},
    router,
    store
}).$mount('#app');


