
<template>
  <div>
    <carousel :perPage="1" :perPageCustom="[[480, 2], [768, 3], [1024, 4]]" :autoplayTimeout="4000" :paginationEnabled="true">
      <slot></slot>
    </carousel>


  </div>
</template>

<script>
export default {
  data () {
    return {
    //   slide: 0,
      sliding: null
    }
  },
  methods: {
    onSlideStart (slide) {
      this.sliding = true
    },
    onSlideEnd (slide) {
      this.sliding = false
    }
  }
}
</script>
