<template>
  <div class="goods">
    <goods-list-item
      v-for="(val, key, index) in this.goods"
      :key="key+index"
      :goods-item="val"
      :goods-id="key"
    />
  </div>
</template>

<script>
import GoodsListItem from "./GoodsListItem";

export default {
  name: "GoodsList",
  props: {
    goods: {
      type: Object,
      default() {
        return {};
      }
    }
  },
  components: {
    GoodsListItem
  }
};
</script>

<style scoped>
.goods {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}
</style>
