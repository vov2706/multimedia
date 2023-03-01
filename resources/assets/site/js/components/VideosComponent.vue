<template>
  <div class="component_content col-sm-12 col-md-9">
    <h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, nisi.</h1>
    <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda illum odit qui recusandae repudiandae tempore voluptatem! Aliquam aut doloremque fugit ipsam laudantium nulla officiis veniam.</h4>
    <VueSlickCarousel
      v-bind="settings"
      class="carousel col-sm-10 col-md-7"
    >
      <div v-for="(video, index) in videos" class="slickslide">
        <video :id="'video'+index" class="slideimage" controls :key="index">
          <source :src="video.original_url">
        </video>
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
          "dotsClass": "slick-dots custom-dot-class",
          "edgeFriction": 0.35,
          "infinite": true,
          "speed": 500,
          "slidesToShow": 1,
          "slidesToScroll": 1,
          "adaptiveHeight": true,
          "lazyLoad": true,
        }
      }
    },
    props: {
      videos: Array
    },
    name: "VideosComponent",
    components: { VueSlickCarousel },
  }
</script>

<style scoped>

</style>