<template>
  <div id="app">
    <keep-alive>
      <router-view></router-view>
    </keep-alive>

    <main-tab-bar></main-tab-bar>
  </div>
</template>

<script>
import MainTabBar from "components/content/mainTabBar/MainTabBar";
import router from "./router";

export default {
  name: "App",
  router,
  components: {
    MainTabBar
  }
};
</script>

<style>
@import "assets/css/base.css";
#app {
  padding-bottom: 60px;
}
</style>
