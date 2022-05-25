<template>
    <div>
        <custom-slider min="1" max="12" step="1" v-model="slider"/>
        <input class="input--hidden" type="text" name="allowed_participants" id="allowed_participants" :value="slider">
    </div>
</template>

<script>
  import CustomSlider from "vue-custom-range-slider";
  // import the styling, css or scss
  import "vue-custom-range-slider/dist/vue-custom-range-slider.css";

  export default {
    components: {
      CustomSlider
    },
    data() {
      return {
        slider: "1",
      };
    },
  };
</script>