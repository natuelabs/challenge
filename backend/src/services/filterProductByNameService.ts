import { IProduct } from "../interfaces/product";

export const filterProductByNameService = (name: string, json: IProduct[]): IProduct[] => {
  return json.filter((product) => product.name.indexOf(name) !== -1);
};
