//const path = require("path");

module.exports = {
  configureWebpack: {
    resolve: {
      alias: {
        //assets: path.resolve(__dirname, "src/assets"),
        // components: path.resolve(__dirname, "src/components"),
        // views: path.resolve(__dirname, "src/views"),
        // router: path.resolve(__dirname, "src/router"),
        // store: path.resolve(__dirname, "src/store"),
        // network: path.resolve(__dirname, "src/network"),
        components: "@/components",
        views: "@/views",
        network: "@/network",
        assets: "@/assets",
        common: "@/common",
      },
    },
  },
};
