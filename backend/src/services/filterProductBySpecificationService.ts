import { IProduct } from "../interfaces/product";

export const filterProductBySpecificationService = (
  specification: string,
  json: IProduct[]
): IProduct[] => {
  const productsFinded: IProduct[] = [];

  json.map((product) => {
    if (product.specifications) {
      product.specifications.map((spec) => {
        if (spec.indexOf(specification) !== -1) {
          productsFinded.push(product);
        }
      });
    }
  });

  return productsFinded;
};
