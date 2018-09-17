<template>
  <div class="grid-item mx-2">
    <div class="product-card">
      <slot></slot>
      <div class="product-buttons">
        
        <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>
      </div>
    </div>
  </div>
</template>