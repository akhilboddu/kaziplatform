
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import 'jquery-ui/ui/widgets/autocomplete.js';
import 'jquery-ui/themes/base/autocomplete.css';
import 'jquery-ui/themes/base/core.css';
import 'jquery-ui/themes/base/theme.css';
import 'jquery-ui/themes/base/menu.css';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('notification', require('./components/Notification.vue'));
Vue.component('application', require('./components/Application.vue'));

const app = new Vue({
    el: '#app',
    data: {
    	notifications: ''
    },
    created(){
    	axios.post('notification/get').then(response => {
    		this.notifications = response.data
    	});
    	axios.post('client/notification/get').then(response => {
    		this.notifications = response.data
    	});
    },

});

