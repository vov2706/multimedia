/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import { NavbarPlugin, ButtonPlugin } from 'bootstrap-vue'
require('../../bootstrap');

window.Vue = require('vue').default;

Vue.component('photos-component', require('./components/PhotosComponent.vue').default);
Vue.component('videos-component', require('./components/VideosComponent').default);
Vue.use(NavbarPlugin)
Vue.use(ButtonPlugin)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
