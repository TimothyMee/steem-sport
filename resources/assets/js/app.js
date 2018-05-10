
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.steem = require('steem');
window.showdown = require('showdown');
window.sc2 = require('sc2-sdk');

import moment from 'moment';
import Notifications from 'vue-notification'
import VueSimplemde from 'vue-simplemde'
import VModal from 'vue-js-modal'


Vue.use(VModal);
Vue.use(VueSimplemde);
Vue.use(Notifications);
Vue.prototype.moment = moment;
Vue.prototype.showdown = require('showdown');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('home', require('./components/v1/Home.vue'));
Vue.component('new-post', require('./components/v1/NewPost.vue'));

const app = new Vue({
    el: '#app'
});

