<p align="center">
  <a href="https://www.natue.com.br">
      <img src="https://static.natue.com.br/images/icons/footer-logo.png" alt="Natue"/>
  </a>
</p>

## Challenge for Backend Developer

A customer needs to search in our product catalog (available in this <a href="https://github.com/natuelabs/challenge/blob/master/products.json">JSON</a>) and he wants to find products that match your food restrictions.
Based on this you will need to develop:

- a simple API to search products in the .json available;
- it should be possible to search for products by their specifications (one or more);
- it must be possible to order the result by price (asc and desc);

The test should be done in PHP. We expect at the end of the test, outside the API running, the following items:

- an explanation of what is needed to make your project work;
- an explanation of how to perform the tests;

Remember that at the time of the evaluation we will look at:

- Code organization;
- Object-Oriented Principles;
- Maintenance;

To send us your code, you must:

Make a fork of this repository, and send us a pull-request.

## About the test

### Requirements
• PHP 5.4 or higher 

• Apache Server 

### About
This application was developed using the Laravel Framework in version 5.4 and implemented using Repository Pattern.

You can consult a guide on how to run the test by accessing a project root in the browser

    http://localhost/

### How to use

#### Products

    http://localhost/api/products

##### Attributes

q

This attribute is used to filter products by their specifications. If it is necessary to send more than 1 specification the values can be separated by "+"


    http://localhost/api/products?q=vegan+lactose-free
    
order

This attribute is used to set the order of products at the price. The values that can be used are ASC and DESC

    http://localhost/api/products?order=asc