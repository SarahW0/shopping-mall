<template>
  <div class="tab-bar-item" :style="activeStyle" @click="onClick">
    <!-- <li class="tab-bar-item active"> -->
    <slot name="item-image"></slot>
    <slot name="item-content"></slot>
  </div>
</template>

<script>
export default {
  name: "TabBarItem",
  props: {
    path: "",
    activeColor: {
      type: String,
      default: "red"
    }
  },
  computed: {
    isActive() {
      return this.$route.path.indexOf(this.path) >= 0;
    },
    activeStyle() {
      return this.isActive ? { color: this.activeColor } : {};
    }
  },
  data() {
    return {
      //isActive: false
    };
  },

  methods: {
    onClick: function() {
      this.$router.replace(this.path);
      //console.log(this);
    }
  }
};
</script>

<style scoped>
.tab-bar-item {
  flex: 1;
  text-align: center;
}

.tab-bar-item .fa {
  display: block;
  font-size: 1.8em;
}

/* .tab-bar-item.active {
  color: red;
} */
</style>