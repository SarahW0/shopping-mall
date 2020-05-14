<template>
  <div class="goods-item" @click="onClick">
    <img :src="this.goodsItem.image" alt @load="imageLoad" />
    <p class="goods-item-name">{{goodsItem.title}}</p>
    <p class="goods-item-price">${{goodsItem.price}}</p>
  </div>
</template>

<script>
export default {
  name: "GoodsItemList",
  props: {
    goodsItem: {
      type: Object,
      default() {
        return {};
      }
    },
    goodsId: {
      type: String,
      default: ""
    }
  },
  methods: {
    imageLoad() {
      //console.log("image item loaded");
      this.$bus.$emit("imageLoad");
    },
    onClick() {
      this.$router.push("/detail/" + this.goodsId);
      // this.$router.push({
      //   path: "/detail",
      //   query: {
      //     id: this.goodsId
      //   }
      // });
    }
  }
};
</script>

<style scoped>
.goods-item {
  width: 50vw;
  max-width: 250px;
  text-align: center;
  padding: 5px;
  background-color: white;
  box-shadow: inset 0px 0px 0px 1px #cdcdcd;
}
.goods-item-name {
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
}
.goods-item-price {
  text-align: center;
}

.goods-item img {
  width: 100%;
}
</style>