import { IProduct } from "../interfaces/product";

export const getProductByIdService = (
  id: number,
  json: IProduct[]
): IProduct => {
  const productFinded: IProduct[] = [];

  for (const product of json) {
    if (product.id == id) {
      productFinded.push(product);
    }
  }

  if (productFinded.length < 1) {
    throw new Error("not finded product by this id");
  }

  return productFinded[0];
};
