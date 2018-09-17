
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueCarousel from 'vue-carousel';
import BootstrapVue from 'bootstrap-vue';
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
// Vue.component('range-slider', RangeSlider);

const app = new Vue({
    el: '#app',

    data () {
    	return {
            navIsOpen: false,
            navbarStuck: false,
            sliderValue: 2000,
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

        handleScroll() {
            this.offsetTop = window.pageYOffset || document.documentElement.scrollTop
            this.navbarStuck = this.offsetTop > document.querySelector('.topbar').offsetHeight
        }
    }
});
