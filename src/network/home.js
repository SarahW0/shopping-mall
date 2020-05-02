import { request } from "./request";

export function getHomeBanner() {
  return request({
    url: "https://www.aob4x4.com/shopping/home/index.php",
  });
}
