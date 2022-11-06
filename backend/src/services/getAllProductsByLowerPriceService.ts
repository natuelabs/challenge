import { IProduct } from "../interfaces/product";

export const getAllProductsByLowerPriceService = (
  json: IProduct[]
): IProduct[] => {
  return json.sort(
    (previousProduct, laterProduct) =>
      previousProduct.price - laterProduct.price
  );
};
