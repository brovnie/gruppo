<template>
    <div>
    <p>Test image</p>
        <img alt='profile avatar' v-if="url" :src="url">
        <div class="edit-icon"></div>
        <input type="file" id="profil_photo" name="profil_photo" @change="onImageChange">
    </div>
</template>
<script>
export default {
  data() {
    return {
      url: null,
    }
  },
  methods: {
    onImageChange(e) {
      const file = e.target.files[0];
      this.url = URL.createObjectURL(file);
    }
  }
};
</script>