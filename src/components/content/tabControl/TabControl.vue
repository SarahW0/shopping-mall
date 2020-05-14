<template>
  <div class="tab-control">
    <div
      v-for="(item,index) in titles"
      :key="'title-'+index"
      class="tab-control-item"
      :class="{active: index === currentIndex}"
      @click="itemClick(index)"
    >
      <span>{{item}}</span>
    </div>
  </div>
</template>

<script>
export default {
  name: "TabControl",
  props: {
    titles: {
      type: Array,
      default() {
        return [];
      }
    }
  },
  data() {
    return {
      currentIndex: 0
    };
  },
  methods: {
    itemClick(index) {
      this.currentIndex = index;
      this.$emit("tabClick", index);
    }
  }
};
</script>

<style scoped>
.tab-control {
  display: flex;
  text-align: center;
  font-size: 1.5em;
  padding-top: 10px;
  padding-bottom: 15px;
  background-color: white;
}

.tab-control-item {
  flex: 1;
  height: 2em;
  line-height: 2em;
  text-transform: capitalize;
}

.active {
  color: var(--color-tint);
}

.active span {
  border-bottom: 5px solid var(--color-tint);
  padding: 0px 5px 5px 5px;
}
</style>