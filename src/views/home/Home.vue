<template>
  <div id="home">
    <nav-bar class="home-nav">
      <h1 slot="center">Shopping Mall</h1>
    </nav-bar>
    <home-swiper :banners="banners"></home-swiper>
    <home-recommend :recommends="recommends"></home-recommend>
    <home-feature-view />
    <tab-control :titles="['Popular','New','Essencial']" class="tab-control" />
    <ul>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>
</template>

<script>
import NavBar from "components/common/navbar/NavBar";
import TabControl from "components/content/tabControl/TabControl";

import { getHomeBanner } from "network/home";

import HomeSwiper from "./childComps/HomeSwiper";
import HomeRecommend from "./childComps/HomeRecommend";
import HomeFeatureView from "./childComps/HomeFeatureView";

export default {
  name: "Home",
  data() {
    return {
      banners: [],
      recommends: []
    };
  },
  components: {
    NavBar,
    TabControl,
    HomeSwiper,
    HomeRecommend,
    HomeFeatureView
  },
  created() {
    getHomeBanner()
      .then(data => {
        this.banners = data.banner;
        this.recommends = data.recommend;
      })
      .catch(err => {
        console.log(err);
      });
  }
};
</script>

<style scoped>
#home {
  padding-top: 44px;
}
#home h1 {
  font-size: 1.5em;
  margin: 0;
}

.home-nav {
  height: 44px;
  background-color: var(--color-tint);
  color: white;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1;
}

.tab-control {
  position: sticky;
  top: 44px;
  background-color: white;
}
</style>
