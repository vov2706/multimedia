<template>
  <div class="component_content col-sm-12 col-md-9">
    <VueSlickCarousel v-bind="settings" class="carousel col-sm-10 col-md-7">
      <div v-for="(image, index) in images" :key="index" class="slickslide">
        <img class="slideimage" :src="image.url" :alt="image.alt">
      </div>
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
    props: {
      images: Array
    },
    name: "PhotosComponent",
    components: { VueSlickCarousel },
  }
</script>
