<template>
  <div>

    <div class="product-buttons">
        <button class="btn btn-outline-primary btn-sm" @click="showModal = !showModal">View/Add to Cart</button>
    </div>
    <b-modal v-model="showModal">
        <div class="row align-items-center" v-if="product">
              <div class="col-md-5">
                <div class="item-image mb-3 p-3">
                    <img :src="product.images[0].url" v-if="product" class="img-fluid w-100" :alt="product.name">
                </div>
              </div>

              <div class="col-md-7">
                <h1 class="">{{product.name}}</h1>
                <h5 class="description">Description:</h5>
                <p>{{product.description}}</p>


                <p><span class="text-primary text-bigger">&#8358;{{product.price}}</span> per <b>{{product.unit}}</b></p>

                <p><span class="font-weight-bold">Category: </span> {{product.category}}</p>



                <b class="mb-2">Select Quantity</b>

                <div class="row my-3 w-md-75">
                  <div class="col d-flex">
                      <input type="number" class="form-control col rounded-0 rounded-left" name="" v-model="qty">
                      <span class="btn btn-secondary col m-0 rounded-0 rounded-right" style="">{{ucfirst(pluralise(product.unit))}}</span>

                  </div>
                </div>
                <span v-if="auth" class="btn btn-primary" @click.prevent="addToCart">Add to Cart</span>
                <span v-else class="text-danger">Sorry, you need to be logged in to make orders</span>
              </div>
        </div>

        <div class="row" y>
            <div class="col-md-4 col-12 col-sm-6 col-lg-3 p-4 item-image" v-for="(image, index) in product.images" :key="index">
                <img :src="image.url" class="img-fluid">
            </div>
        </div>
    </b-modal>
  </div>
</template>


<script>
    import {pluralise, ucfirst} from '../functions'
    import cart from '../data.js'
  export default {
    props: [
      'productId',
      'modalShow',
      'auth'
    ],

    data () {
        return {
            product: null,
            showModal: this.modalShow,
            cart: cart,
            qty: 0
        }
    },

    mounted () {
        axios.get(`/products/${this.productId}`)
            .then (
                response => {
                    this.product = response.data
                    // console.log(response.data)
                }
            )
        // console.log(cart)
    },

    methods: {
        pluralise,
        ucfirst,
        fetchCart: cart.fetchCart,
        validateInput () {

        },
        addToCart() {
            this.cart.addItems(this.product, this.qty)
        }
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
