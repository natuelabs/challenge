<p align="center">
  <a href="https://www.natue.com.br">
      <img src="https://static.natue.com.br/images/icons/footer-logo.png" alt="Natue"/>
  </a>
</p>

## Challenge for Backend Developer

To run this project, you must have *PHP 7.1+* and *PHPUnit 6.5*

Download the project, run `composer install` to install all dependencies, them `php bin/console server:run` to start the buildin webserver, and then try it out the following URLs:

- http://localhost:8000/products/15 - fetch a product by ID
- http://localhost:8000/products/all - fetch all products
- http://localhost:8000/products/all?sort=desc - fetch all products with desc order
- http://localhost:8000/products/all?sort=asc - fetch all products with asc order
- [http://localhost:8000/products?name=Chips de milho](http://localhost:8000/products?name=Chips%20de%20milho) - fetch a product with the specific name
- [http://localhost:8000/products?specifications=vegan, low-carb](http://localhost:8000/products?specifications=vegan,%20low-carb) - fetch all products with these components
- [http://localhost:8000/products?sort=desc&specifications=vegan, low-carb](http://localhost:8000/products?sort=desc&specifications=vegan,%20low-carb) - fetch all products with these components in desc order

For unit tests, run the following command at the project root folder `phpunit`

Thanks! *May the force be with you*
