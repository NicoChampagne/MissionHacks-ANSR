
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

Vue.component('polar-area', require('./components/PolarArea.vue'));
Vue.component('quick-menu', require('./components/QuickMenu.vue'));
Vue.component('datepicker', require('vuejs-datepicker'));
Vue.component('search-input', require('./components/SearchInput.vue'));
Vue.component('bar-chart', require('./components/BarChart.vue'));

const app = new Vue({
    el: '#app'
});
