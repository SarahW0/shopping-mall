<template>
  <div id="home">
    <nav-bar class="home-nav">
      <h1 slot="center">Shopping Mall</h1>
    </nav-bar>
    <tab-control
      :titles="Object.keys(this.goods)"
      @tabClick="tabClick"
      class="fixed-tab-bar"
      ref="tabControl1"
      v-show="isFixTabBar"
    />
    <scroll
      class="frame"
      ref="scroll"
      :probeType="3"
      :pullUpLoad="true"
      @scroll="scrollPos"
      @pullingUp="pullingUp"
    >
      <home-swiper :banners="banners"></home-swiper>
      <home-recommend :recommends="recommends"></home-recommend>
      <home-feature-view />
      <tab-control
        :titles="Object.keys(this.goods)"
        @tabClick="tabClick"
        ref="tabControl2"
        :class="{hidden:isFixTabBar}"
      />
      <goods-list :goods="showGoods" />
    </scroll>
    <back-top class="back-top-btn" @click.native="backTopClick" v-show="isShowBackTopBtn" />
  </div>
</template>

<script>
import { debounce } from "common/utils";
import NavBar from "components/common/navbar/NavBar";
import Scroll from "components/common/scroll/Scroll";

import TabControl from "components/content/tabControl/TabControl";
import GoodsList from "components/content/goods/GoodsList";
import BackTop from "components/content/backTop/BackTop";

import { getHomeBanner, getHomeGoods } from "network/home";

import HomeSwiper from "./childComps/HomeSwiper";
import HomeRecommend from "./childComps/HomeRecommend";
import HomeFeatureView from "./childComps/HomeFeatureView";

export default {
  name: "Home",
  data() {
    return {
      banners: [],
      recommends: [],
      goods: {
        popular: { page: 0, list: {} },
        new: { page: 0, list: {} },
        essential: { page: 0, list: {} }
      },
      currentType: "popular",
      isShowBackTopBtn: false,
      isFixTabBar: false,
      saveY: 0
    };
  },
  computed: {
    showGoods() {
      return this.goods[this.currentType].list;
    }
  },
  components: {
    NavBar,
    TabControl,
    GoodsList,
    BackTop,

    Scroll,

    HomeSwiper,
    HomeRecommend,
    HomeFeatureView
  },
  created() {
    //get banner products
    this.getBanner();

    //get tab products
    this.getProducts("popular");
    this.getProducts("new");
    this.getProducts("essential");
  },
  mounted() {
    //listen to image load event
    const refresh = debounce(this.$refs.scroll.refresh, 500);
    this.$bus.$on("imageLoad", () => {
      refresh();
    });
  },
  activated() {
    // this.$refs.scroll.scrollTo(0, this.saveY, 0);
    // this.$refs.scroll.refresh();
  },
  deactivated() {
    // this.saveY = this.$refs.scroll.scroll.y;
    // console.log(this.saveY);
  },

  methods: {
    /**
     * Network related methods
     */
    //get banner data
    getBanner() {
      getHomeBanner()
        .then(data => {
          this.banners = data.banner;
          this.recommends = data.recommend;
        })
        .catch(err => {
          console.log(err);
        });
    },
    getProducts(type) {
      const page = this.goods[type].page + 1;
      //get products
      getHomeGoods(type, page)
        .then(data => {
          if (Object.keys(data).length > 0) {
            this.goods[type].page = page;
            this.goods[type].list = Object.assign(
              {},
              this.goods[type].list,
              data
            );
          }
        })
        .catch(err => {
          console.log(err);
        });
    },

    /**
     * Event listener methods
     */
    //switch  products tab
    tabClick(index) {
      this.currentType = Object.keys(this.goods)[index];
      this.$refs.tabControl2.currentIndex = index;
      this.$refs.tabControl1.currentIndex = index;
    },
    //click back to top button
    backTopClick() {
      this.$refs.scroll.scrollTo(0, 0, 1000);
    },
    //scroll position event
    scrollPos(pos) {
      //console.log(pos);
      if (pos.y < -100) {
        this.isShowBackTopBtn = true;
      } else {
        this.isShowBackTopBtn = false;
      }
      //check pos to see if the tab bar should be at fixed position
      if (Math.abs(pos.y) >= this.$refs.tabControl2.$el.offsetTop) {
        this.isFixTabBar = true;
      } else {
        this.isFixTabBar = false;
      }

      //console.log(this.isFixTabBar);
      //console.log(this.$refs.tabControl.$el.offsetTop);
      //console.log(this.isFixTabBar + pos.y);
    },
    //reach end of page, load more products
    pullingUp() {
      //console.log("pulling up");
      this.getProducts(this.currentType);
      this.$refs.scroll.finishPullUp();
    }
  }
};
</script>

<style scoped>
#home {
  /* padding-top: 44px; */
}

#home h1 {
  margin: 0;
  font-size: 1.8em;
}

.home-nav {
  background-color: var(--color-tint);
  color: white;
  /* position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1; */
}

.frame {
  height: calc(90vh - 44px);
  overflow: hidden;
}

.back-top-btn {
  position: fixed;
  bottom: 49px;
  right: 5px;
}

.hidden {
  visibility: hidden;
}

.fixed-tab-bar {
  position: absolute;
  margin-top: -2px;
  left: 0;
  right: 0;
  z-index: 9;
}
</style>
