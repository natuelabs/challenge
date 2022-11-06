import { IProduct } from "../interfaces/product";

export const getAllProductsByHigherPriceService = (
  json: IProduct[]
): IProduct[] => {
  return json.sort(
    (previousProduct, laterProduct) =>
      laterProduct.price - previousProduct.price
  );
};
