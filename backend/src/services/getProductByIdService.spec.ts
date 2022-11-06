import { getProductByIdService } from "./getProductByIdService";

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

describe("Get Product By Id Service", () => {
  it("should be returned one product", () => {
    expect(getProductByIdService(0, jsonTest)).toEqual({
      id: 0,
      name: "product 0 test",
      price: 12.5,
      specifications: ["low-carbs"],
    });
  });

  it("should be throw error by product not finded", () => {
    function getProductByNotRegistredId() {
      getProductByIdService(123123, jsonTest);
    }

    expect(getProductByNotRegistredId).toThrow(new Error("not finded product by this id"));
  });
});
