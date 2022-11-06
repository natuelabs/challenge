import { filterProductBySpecificationService } from "./filterProductBySpecificationService";

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

describe("Filter Product by Specification", () => {
  it("should be return product contains name test", () => {
    expect(filterProductBySpecificationService("high", jsonTest)).toEqual([
      {
        id: 2,
        name: "product 0 test",
        price: 42.5,
        specifications: ["high-carbs"],
      },
    ]);

    expect(filterProductBySpecificationService("carbs", jsonTest)).toEqual(
      jsonTest
    );
  });
});
