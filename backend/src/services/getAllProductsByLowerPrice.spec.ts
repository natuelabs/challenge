import { getAllProductsByLowerPriceService } from "./getAllProductsByLowerPriceService";

const jsonTest = [
  {
    id: 0,
    name: "product 0 test",
    price: 12.5,
    specifications: ["low-carbs"],
  },
  {
    id: 2,
    name: "product 0 test",
    price: 42.5,
    specifications: ["high-carbs"],
  },
  {
    id: 1,
    name: "product 1 test",
    price: 23.5,
    specifications: ["medium-carbs"],
  },
];

describe("Get all Products By Lower price Service", () => {
  it("should be returned products by filter lower price", () => {
    expect(getAllProductsByLowerPriceService(jsonTest)).toEqual([
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
