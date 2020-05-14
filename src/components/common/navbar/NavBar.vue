<template>
  <div class="nav-bar">
    <div class="left">
      <slot name="left"></slot>
    </div>
    <div class="center">
      <slot name="center"></slot>
    </div>
    <div class="right">
      <slot name="right"></slot>
    </div>
  </div>
</template>

<script>
export default {
  name: "NavBar"
};
</script>

<style scoped>
.nav-bar {
  height: 10vh;
  line-height: 10vh;

  width: 100%;
  display: flex;

  text-align: center;

  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
}

.nav-bar img {
  width: 100%;
  vertical-align: middle;
}

.left,
.right {
  width: 60px;
}

.center {
  flex: 1;

  text-transform: uppercase;
}
</style>
