<template>
  <div class="recommend">
    <div v-for="(item, index) in recommends" :key="'recommend-'+index">
      <a :href="item.link">
        <img :src="item.image" alt />
      </a>
    </div>
  </div>
</template>

<script>
export default {
  name: "HomeRecommend",
  props: {
    recommends: {
      type: Array,
      default() {
        return [];
      }
    }
  }
};
</script>

<style scoped>
.recommend {
  display: flex;
  height: 20vh;
  width: 100%;
  padding: 10px;

  align-items: center;
  border-bottom: 8px solid rgba(0, 0, 0, 0.1);
}

.recommend > div {
  flex: 1;
  padding: 5px;
}

.recommend img {
  width: 100%;
  height: auto;
}
</style>>
