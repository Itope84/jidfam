
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueCarousel from 'vue-carousel';
import BootstrapVue from 'bootstrap-vue';
import Loading from 'vue-loading-overlay';
// import { pluralise, ucfirst } from '../functions'
// import { Image } from 'bootstrap-vue/es/components';
// import RangeSlider from 'vue-range-slider';

// Vue.use(Image);
// Vue.use(RangeSlider);
// import VueLazyload from 'vue-lazyload';

Vue.use(VueCarousel);
Vue.use(BootstrapVue);
// Vue.use(VueLazyload);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('home-carousel', require('./components/HomeCarousel.vue'));
Vue.component('product-carousel', require('./components/ProductCarousel.vue'));
Vue.component('product-card', require('./components/ProductCard.vue'));
// Vue.component('product-modal', require('./components/ProductModal.vue'));
Vue.component('navbar-cart', require('./components/NavbarCart.vue'));
// Vue.component('cart-item', require('./components/CartItem.vue'));
Vue.component('loading', Loading);

function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

async function waitredir(url) {
  await sleep(1000)
  window.location.href = url
}

const app = new Vue({
    el: '#app',

    data () {
    	return {
            alert: {
                type: 'success',
                message: ''
            },
            isLoading: false,
            displayClearCartWarning: false,
            qtyErr: null,
            navIsOpen: false,
            navbarStuck: false,
            sliderValue: 2000,
            activeProductId: null,
            isProductModalVisible: false,
            isSearchInputVisible: false,
            dismissSecs: 10,
            dismissCountDown: 0,
            showDismissibleAlert: false,
            productqty: 0
        }
    },
    created() {
        window.addEventListener('scroll', this.handleScroll);
    },

    methods: {
    	showNav() {
    		// if nav was closed, ope it, else close it
    		this.navIsOpen ? this.navIsOpen = false : this.navIsOpen = true;
        },

        countDownChanged(dismissCountDown) {
            this.dismissCountDown = dismissCountDown
        },
        showAlert() {
            this.dismissCountDown = this.dismissSecs
        },

        handleScroll() {
            this.offsetTop = window.pageYOffset || document.documentElement.scrollTop
            this.navbarStuck = this.offsetTop > document.querySelector('.topbar').offsetHeight
        },

        showProductModal(id) {
            this.activeProductId = id
            this.isProductModalVisible = true
        },

        changeSearchBarVisibility () {
            this.isSearchInputVisible = !this.isSearchInputVisible
        },
        addToCart (id) {
            this.isLoading = true;
            axios.post('/api/cart', {
            item: id,
            qty: this.productqty
            }).then(response => {
                response.status === 200 ? this.alert.type = 'success' : this.alert.type = 'error'
                this.alert.message = response.data.message
                // console.log(response.data.message)
                this.dismissCountDown = 10
                // waitredir("/products")
                window.location.href = "/products"
                this.isLoading = false
            }).catch(error => {
                this.alert.message = error
                this.dismissCountDown = 10
                this.isLoading = false
            })
        },
        validateQty (max) {
            this.qtyErr = this.productqty < 1 ? "Please enter a value greater than 0" : this.productqty > max ? `Sorry, that is above the amount we have in stock please enter a value below ${max}` : null
        },

        clearCart() {
            this.displayClearCartWarning = false;
            this.isLoading = true;
            axios.post('/api/cart/clear').then(response => {
                response.status === 200 ? this.alert.type = 'success' : this.alert.type = 'error'
                this.alert.message = response.data.message
            }).finally(() => {
                this.dismissCountDown = 10
                window.location.reload(true)
                this.isLoading = false
            })
        }
    }
});
