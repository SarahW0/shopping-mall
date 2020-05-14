<template>
  <div class="wrapper" ref="wrapper">
    <div class="content">
      <slot></slot>
    </div>
  </div>
</template>

<script>
import BScroll from "better-scroll";
export default {
  name: "Scroll",
  data() {
    return {
      scroll: null
    };
  },
  props: {
    probeType: {
      type: Number,
      default: 0
    },
    pullUpLoad: {
      type: Boolean,
      default: false
    }
  },
  mounted() {
    console.log(this.probeType);

    this.scroll = new BScroll(this.$refs.wrapper, {
      click: true,
      probeType: this.probeType,
      pullUpLoad: this.pullUpLoad
    });

    //listen to scroll event
    if (this.probeType > 2) {
      this.scroll.on("scroll", this.onScroll);
    }

    //listen to pullingup event
    if (this.pullUpLoad) {
      this.scroll.on("pullingUp", this.pullingUp);
    }
  },
  methods: {
    onScroll(pos) {
      //console.log(pos);
      this.$emit("scroll", pos);
    },
    scrollTo(x, y, time = 1000) {
      this.scroll && this.scroll.scrollTo(x, y, time);
    },

    pullingUp() {
      this.$emit("pullingUp");
    },

    finishPullUp() {
      this.scroll && this.scroll.finishPullUp();
    },

    refresh() {
      this.scroll && this.scroll.refresh();
    }
  }
};
</script>

<style scoped></style>
