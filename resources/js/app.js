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
Vue.component('dishes-cart', require('./components/DishesCart.vue').default);
Vue.component('jumbotron', require('./components/Jumbotron.vue').default);
Vue.component('section-welcome', require('./components/WelcomePage.vue').default);
Vue.component('section-navbar-white', require('./components/NavbarWhite.vue').default);
Vue.component('form-view', require('./components/FormView.vue').default);
Vue.component('show-elements', require('./components/ShowElements.vue').default);
Vue.component('show-id', require('./components/ShowId.vue').default);
Vue.component('register', require('./components/Register.vue').default);
Vue.component('login', require('./components/Login.vue').default);




// BOOTSTRAP-VUE
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
// Import Bootstrap an BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)



// VUE SESSION STORAGE
import VueSessionStorage from 'vue-sessionstorage'
Vue.use(VueSessionStorage)

import Data from './components/store.js';



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new Vue({
    el: '#app',
    data: {
        isBannerDish: false,
        isBannerRestaurant: false
    },


    created() {

        console.log(this.$session.get('totalCart'));

        Data.totCart = this.$session.get('totalCart')

    },

    computed: {

        totalCart: {

            get: function () {

                return Data.totCart;
            }
        }
    },

    methods: {

        activeBannerDish() {

            this.isBannerDish = !this.isBannerDish;
        },

        activeBannerRestaurant() {

            this.isBannerRestaurant = !this.isBannerRestaurant;
        },

        clearSessionCart() {

            this.$session.set('cart', []);
            this.$session.set('totalCart', 0);
        },

        goSummaryNav () {

            let cart = this.$session.get('cart')

            let cartjson = JSON.stringify(cart);

            // this.$session.clear('cart');

            axios.post('/send-cart-data', {
                cart: cartjson
            })
            .then(function (response) {

                window.location.href = "/order-summary";
            })
        }
    }
});