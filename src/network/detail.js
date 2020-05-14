import { request } from "./request";

export function getDetails(productID) {
  return request({
    url: "https://www.aob4x4.com/shopping/home/product-details.php",
    params: {
      id: productID,
    },
  });
}
