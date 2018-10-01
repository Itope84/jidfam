<template>
  <tr>
    <td>
      <div class="product-item">
        <a class="product-thumb" href="shop-single.html">
      <img :src="img" :alt="product.product.name" />
          
        </a>
        <div class="product-info">
          <h4 class="product-title"><a :href="`/products/${product.id}`">{{product.product.name}}</a></h4>
        </div>
      </div>
    </td>
    <td class="text-center">
    <p class="text-danger" v-text="qtyErr">
    </p>
      <div class="count-input">
        <input type="number" :value="product.qty" @change="validateQty" class="form-control col rounded-0 rounded-left" />
      </div>
    </td>
    <td class="text-center text-lg text-medium">&#8358; {{product.product.price}}</td>
    <td class="text-center text-lg text-medium">&#8358;{{product.product.price * product.qty}}</td>
    <td class="text-center"><a class="remove-from-cart" href="#" data-toggle="tooltip" title="Remove item"><span class="close-search btn btn-light py-0 px-2 m-0 rounded-0"><i class="icon-close"></i></span></a></td>
  </tr>
</template>

<script>
  export default {
    props: ['product', 'img'],
    data () {
      return {
        productqty: this.product.qty,
        qtyErr: null
      }
    },
    methods: {
      validateQty () {
        this.qtyErr = this.productqty < 1 ? "Please enter a value greater than 0" : this.productqty > this.product.product.units ? `Sorry, that is above the amount we have in stock please enter a value below ${this.product.product.units}` : null
      }
    }
  }
</script>