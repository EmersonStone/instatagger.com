
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component('site-nav', require('./components/Nav.vue'));
Vue.component('site-footer', require('./components/Footer.vue'));
Vue.component('post-list', require('./components/PostList.vue'));
Vue.component('post-item', require('./components/PostItem.vue'));
Vue.component('profile-header', require('./components/ProfileHeader.vue'));

import router from './routes.js';

// router.beforeEach((to, from, next) => {
//   if (to.matched.some(record => record.meta.isLoggedIn)) {
//     if (window.tagnumpi) {
//       next()
//     } else {
//       next('/')
//     }
//   } else {
//     next('/')
//   }
// })

const app = new Vue({
    el: '#app',
    router
});
