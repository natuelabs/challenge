import { Router } from "express";
import { ProductController } from "./controllers/productController";

const routes = Router();

routes.get("/products", ProductController.index);
routes.get(
  "/products/filter/higherPrice",
  ProductController.filterByHigherPrice
);
routes.get("/products/filter/lowerPrice", ProductController.filterByLowerPrice);
routes.get("/product/filter/name/:name", ProductController.filterByName);
routes.get(
  "/product/filter/specification/:specification",
  ProductController.filterBySpecification
);
routes.get("/product/:id", ProductController.getById);

export { routes };
