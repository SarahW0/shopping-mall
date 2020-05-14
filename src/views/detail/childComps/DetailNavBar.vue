<template>
  <nav-bar>
    <div slot="left" @click="clickBack">
      <img src="~assets/img/arrow-back.png" alt />
    </div>
    <div slot="center" class="product-detail-title">
      <div
        v-for="(item,index) in titles"
        :key="'title'+index"
        :class="{active: index===currentIndex}"
        @click="titleClick(index)"
      >{{item}}</div>
    </div>
  </nav-bar>
</template>

<script>
import NavBar from "components/common/navbar/NavBar";
export default {
  name: "DetailNavBar",
  components: {
    NavBar
  },
  data() {
    return {
      titles: ["Product", "Param", "Reviews", "Score"],
      currentIndex: 0
    };
  },
  methods: {
    titleClick(index) {
      this.currentIndex = index;
    },
    clickBack() {
      this.$router.back();
    }
  }
};
</script>

<style scoped>
.product-detail-title {
  display: flex;
  font-size: min(4.5vw, 30px);
}
.product-detail-title > div {
  flex: 1;
}

.active {
  color: var(--color-high-text);
}
</style>