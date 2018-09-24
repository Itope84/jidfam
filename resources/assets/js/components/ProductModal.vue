<template>
  <div>
    <b-button @click="showProductModal">
      Open Modal
    </b-button>
    <b-modal ref="myModalRef" hide-footer title="Using Component Methods">
      <div class="d-block text-center">
        <h3>Hello From My Modal!</h3>
      </div>
      <b-btn class="mt-3" variant="outline-danger" block @click="hideModal">Close Me</b-btn>
    </b-modal>
  </div>
</template>


<script>
  export default {
    props: [
      'product'
    ],

    data () {
        return {
            product: this.product
        }
    }
  }
</script>
