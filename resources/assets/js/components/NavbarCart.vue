<template>
    <div class="cart cart-menu"><a class="" href="/user/cart"></a><i class="icon-shopping-basket"></i>
        
            <span class="count" v-if="cart.cart">{{cart.cart.items.length}}</span>
            <span class="count" v-else>0</span>
            <span class="subtotal" v-if="cart.cart">	&#8358; {{cart.total}}</span>
            <div class="toolbar-dropdown" v-if="cart.cart">
                <div class="dropdown-product-item" v-for="(item, index) in cart.cart.items.slice(0, 3)" :key="index">

                    <a class="dropdown-product-thumb" href="#">
                        <img :src="item.product.images[0].url" :alt="item.product.name" />
                    </a>

                    <div class="dropdown-product-info">
                        <a class="dropdown-product-title" :href="`/products/${item.product.id}`">{{item.product.name}}</a><span class="dropdown-product-details">{{item.qty}} x &#8358;{{item.product.price}}</span></a>
                    </div>
                </div>

                <div class="toolbar-dropdown-group">
                    <div class="column"><span class="text-lg">Total:</span></div>
                    <div class="column text-right"><span class="text-lg text-medium">	&#8358; {{cart.total}}</span></div>
                </div>
                <div class="toolbar-dropdown-group">
                    <div class="column"><a class="btn btn-sm btn-block btn-secondary" href="/user/cart">View Cart</a></div>
                    <div class="column"><a class="btn btn-sm btn-block btn-success" href="checkout-address.html">Checkout</a></div>
                </div>
            </div>
        
    </div>
</template>


<script>
    import {pluralise, ucfirst} from '../functions'
    import cart from '../data.js'
  export default {
    props: [
    ],

    data () {
        return {
            cart: cart,
            // total: cart.total
        }
    },

    mounted () {
        // axios.get(`/products/${this.productId}`)
        //     .then (
        //         response => {
        //             this.product = response.data
        //         }
        //     )
        this.cart.fetchCart()
        // this.cart.total()
        // console.log(this.cart)
    },

    methods: {
        pluralise,
        ucfirst,
        // fetchCart
    }
  }
</script>

<style>
    .rounded-0.rounded-left {
        border-top-left-radius: 2rem !important;
        border-bottom-left-radius: 2rem !important;
    }

    .rounded-0.rounded-right {
        border-top-right-radius: 2rem !important;
        border-bottom-right-radius: 2rem !important;
    }
</style>
