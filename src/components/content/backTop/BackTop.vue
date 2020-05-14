<template>
  <div class="back-to-top">
    <img src="~assets/img/arrow-up.png" alt />
  </div>
</template>

<script>
export default {
  name: "BackTop",
  methods: {},
};
</script>

<style scoped>
.back-to-top {
  color: red;
  width: 15vw;
  max-width: 100px;
  height: 15vw;
  max-height: 100px;
  border-radius: 50%;
  border: 1px solid red;
  background-color: rgba(255, 255, 255);
}
.back-to-top img {
  width: 100%;
}
</style>
