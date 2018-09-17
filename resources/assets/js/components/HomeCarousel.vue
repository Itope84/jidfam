<template>
  <div>
    <carousel :perPage="1" :autoplayTimeout="4000" :navigationEnabled="true" :paginationEnabled="true" navigationPrevLabel="<span class='icon-arrow-left2'></span>"  navigationNextLabel="<span class='icon-arrow-right2'></span>">
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
