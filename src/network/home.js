import { request } from "./request";

export function getHomeBanner() {
  return request({
    url: "https://www.aob4x4.com/shopping/home/index.php",
  });
}

export function getHomeGoods(type, page) {
  return request({
    url: "https://www.aob4x4.com/shopping/home/products.php",
    params: {
      type,
      page,
    },
  });
}
