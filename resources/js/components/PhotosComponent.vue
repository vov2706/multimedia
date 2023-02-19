<template>
  <div class="content">
    <VueSlickCarousel v-bind="settings">
      <div class="slickslide"><img class="slideimage" src="http://placehold.it/1200x800" alt=""></div>
      <div class="slickslide"><img class="slideimage"  src="http://placehold.it/1200x800" alt=""></div>
      <div class="slickslide"><img class="slideimage"  src="http://placehold.it/1200x300" alt=""></div>
      <div class="slickslide"><img class="slideimage"  src="https://i.imgur.com/WcHGTSP.jpeg" alt=""></div>
    </VueSlickCarousel>
  </div>
</template>


<script>
  import VueSlickCarousel from 'vue-slick-carousel'
  import 'vue-slick-carousel/dist/vue-slick-carousel.css'
  // optional style for arrows & dots
  import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'
  export default {
    data() {
      return {
        settings: {
          "dots": true,
          "arrows": true,
          "fade": true,
          "dotsClass": "slick-dots custom-dot-class",
          "edgeFriction": 0.35,
          "infinite": true,
          "speed": 500,
          "slidesToShow": 1,
          "slidesToScroll": 1,
          "adaptiveHeight": true,
        }
      }
    },
    name: "PhotosComponent",
    components: { VueSlickCarousel },
  }
</script>

<style scoped>
  .slideimage {
    width: inherit;
    margin: auto;
    object-fit: contain;
  }
  .content {
    margin: auto;
    padding: 40px;

    max-width: 1300px;
    max-height: 1200px;
    background-color: palegreen;
  }
   .slick-next:before {
     color: black !important;
   }
</style>