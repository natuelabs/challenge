import { Request, Response } from "express";
import { filterProductByNameService } from "../services/filterProductByNameService";
import { filterProductBySpecificationService } from "../services/filterProductBySpecificationService";
import { getAllProductsByHigherPriceService } from "../services/getAllProductsByHigherPriceService";
import { getAllProductsByLowerPriceService } from "../services/getAllProductsByLowerPriceService";
import { getAllProductsService } from "../services/getAllProductsService";
import { getProductByIdService } from "../services/getProductByIdService";
import jsonArchive from "../../products.json";

class productController {
  index(req: Request, res: Response): Response {
    const data = getAllProductsService(jsonArchive);

    return res.json(data);
  }

  filterByHigherPrice(req: Request, res: Response): Response {
    const data = getAllProductsByHigherPriceService(jsonArchive);

    return res.json(data);
  }

  filterByLowerPrice(req: Request, res: Response): Response {
    const data = getAllProductsByLowerPriceService(jsonArchive);

    return res.json(data);
  }

  filterByName(req: Request, res: Response): Response {
    const { name } = req.params;
    const products = filterProductByNameService(name, jsonArchive);

    return res.json({ products });
  }

  filterBySpecification(req: Request, res: Response): Response {
    const { specification } = req.params;
    const products = filterProductBySpecificationService(
      specification,
      jsonArchive
    );

    return res.json(products);
  }

  getById(req: Request, res: Response): Response {
    const { id } = req.params;

    try {
      const product = getProductByIdService(Number(id), jsonArchive);

      return res.json(product);
    } catch (err) {
      if (err == "Error: not finded product by this id") {
        return res.status(404).send({ error: "not finded product by this id" });
      } else {
        return res.status(500).send({ error: "unknown error" });
      }
    }
  }
}

export const ProductController = new productController();
