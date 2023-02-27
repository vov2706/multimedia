<template>
  <div class="content col-sm-12 col-md-9">
    <h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores, nisi.</h1>
    <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda illum odit qui recusandae repudiandae tempore voluptatem! Aliquam aut doloremque fugit ipsam laudantium nulla officiis veniam.</h4>
    <VueSlickCarousel v-bind="settings" class="carousel col-sm-10 col-md-7">
      <div v-for="(image, index) in images" :key="index" class="slickslide">
        <img class="slideimage" :src="image.url" alt="">
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
        images: [
          {url: 'http://placehold.it/1200x800'},
          {url: 'http://placehold.it/1200x800'},
          {url: 'https://i.imgur.com/WcHGTSP.jpeg'},
        ],
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
      images: array
    },
    name: "PhotosComponent",
    components: { VueSlickCarousel },
  }
</script>

<style scoped>
  .slideimage {
    width: inherit;
    margin: auto;
    max-height: 1000px;
    object-fit: contain;
  }

  .content {
    margin-right: auto;
    margin-left: auto;
    padding: 40px;
    height: 100%;
    background-color: whitesmoke;
  }

  .carousel {
    margin: auto;
    max-height: 1000px;
  }

</style>