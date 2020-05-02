<template>
  <tab-bar>
    <tab-bar-item path="/home" active-color="blue">
      <i slot="item-image" class="fa fa-home"></i>
      <span slot="item-content">Home</span>
    </tab-bar-item>
    <tab-bar-item path="/category" active-color="green">
      <i slot="item-image" class="fa fa-tasks"></i>
      <span slot="item-content">Category</span>
    </tab-bar-item>
    <tab-bar-item path="/cart" active-color="purple">
      <i slot="item-image" class="fa fa-shopping-cart"></i>
      <span slot="item-content">Cart</span>
    </tab-bar-item>
    <tab-bar-item path="/profile">
      <i slot="item-image" class="fa fa-user"></i>
      <span slot="item-content">Profile</span>
    </tab-bar-item>
  </tab-bar>
</template>

<script>
import TabBar from "components/common/tabbar/TabBar";
import TabBarItem from "components/common/tabbar/TabBarItem";

export default {
  name: "MainTabBar",
  components: {
    TabBar,
    TabBarItem
  }
};
</script>

<style>
@import "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css";
</style>