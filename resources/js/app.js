/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('card-list', require('./components/WelcomeCategoryCardsList.vue').default);
Vue.component('section-footer', require('./components/Footer.vue').default);
Vue.component('section-navbar', require('./components/Navbar.vue').default);
Vue.component('add-button', require('./components/AddToCartButton.vue').default);
Vue.component('jumbotron', require('./components/Jumbotron.vue').default);
Vue.component('section-welcome', require('./components/WelcomePage.vue').default);
Vue.component('section-navbar-white', require('./components/NavbarWhite.vue').default);
Vue.component('form-restaurant-create', require('./components/FormRestaurantCreate.vue').default);










/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
