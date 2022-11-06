import { getAllProductsService } from "./getAllProductsService";

const jsonTest = [
  {
    id: 0,
    name: "product 0 test",
    price: 12.5,
    specifications: ["low-carbs"],
  },
  {
    id: 1,
    name: "product 1 test",
    price: 23.5,
    specifications: ["medium-carbs"],
  },
  {
    id: 2,
    name: "product 0 test",
    price: 42.5,
    specifications: ["high-carbs"],
  },
];

describe("Get all Products Service", () => {
  it("should be returned all products", () => {
    expect(getAllProductsService(jsonTest)).toEqual([
      {
        id: 0,
        name: "product 0 test",
        price: 12.5,
        specifications: ["low-carbs"],
      },
      {
        id: 1,
        name: "product 1 test",
        price: 23.5,
        specifications: ["medium-carbs"],
      },
      {
        id: 2,
        name: "product 0 test",
        price: 42.5,
        specifications: ["high-carbs"],
      },
    ]);
  });
});
