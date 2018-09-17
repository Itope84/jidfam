<template>
  <div>
    <b-carousel id="homecarousel"
                style="text-shadow: 1px 1px 2px #333;"
                controls
                indicators
                background="#ababab"
                :interval="4000"

                @sliding-start="onSlideStart"
                @sliding-end="onSlideEnd"
    >

      <!-- Slides with img slot -->
      <!-- Note the classes .d-block and .img-fluid to prevent browser default image alignment -->
      <slot></slot>

    </b-carousel>


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
<!-- carousel-1.vue -->
