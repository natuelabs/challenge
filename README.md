![](https://media.natue.com.br/natuelabs/natuelabs.png)

# Challenge for Backend Developer

A customer needs to search in our product catalog (available in this <a href="https://github.com/natuelabs/challenge/blob/master/products.json">JSON</a>) and he wants to find products that match your food restrictions.
Based on this you will need to develop:

- a simple API to search products in the .json available;
- it should be possible to search for products by their specifications (one or more);
- it must be possible to order the result by price (asc and desc);

The test should be done in PHP, Python or NodeJS. We expect at the end of the test, outside the API running, the following items:

- an explanation of what is needed to make your project work;
- an explanation of how to perform the tests;

Remember that at the time of the evaluation we will look at:

- Code organization;
- Object-Oriented Principles;
- Unit tests
- Maintenance;

To send us your code, you must:

Make a fork of this repository, and send us a pull-request.

## Instructions of Use

### Requirements

 * Composer >= 1.4
 * PHP >= 7.0
 
> No database is required.
 
### How to run

Respecting the challenge determinations, the start point to this applications occur in **``` app.php ```**. 

#### To run...

```php
composer install && php -S localhost:8080 app.php
```

#### To test...
```bash
./vendor/bin/phpunit
```

## API Resources Endpoint

 ### <a name="specifications"></a>Specifications
 
  * **Get all specifications** 
    - **url**: [http://localhost:8080/api/v1/specifications](http://localhost:8080/api/v1/specifications)

### Products

 * **Get all products** 
   - **url**: [http://localhost:8080/api/v1/products](http://localhost:8080/api/v1/products)
 
 * **Get all products sorting by ANY field**
   - **url**: [http://localhost:8080/api/v1/products?sortBy={fieldName}&order={order}](http://localhost:8080/api/v1/products?sortBy={fieldName}&order={order})<br>
   - **{sortBy} options**: id, name, price, specifications*
   - **{order} options**: asc, desc
   
  * **Search products by name** 
    - **url**: [http://localhost:8080/api/v1/products/search-by-name?name={name}&sortBy={sortBy}&order={order}](http://localhost:8080/api/v1/products/search-by-name?name={name}&sortBy={sortBy}&order={order})
    - **{name} options**: any keyword.
    - **{sortBy} options**: id, name, price, specifications*
    - **{order} options**: asc, desc
     
 * **Search products by specifications (work separated by comma)** 
   - **url**: [http://localhost:8080/api/v1/products/search-by-specifications?specifications={specifications}&sortBy={sortBy}&order={order}](http://localhost:8080/api/v1/products/search-by-specifications?specifications={specifications}&sortBy={sortBy}&order={order})
   - **{specifications} options**: one or more than one item of the [specifications](#specifications) list.
   - **{sortBy} options**: id, name, price, specifications*
   - **{order} options**: asc, desc
   
 > (*) If ordering occurs through the specifications field, the system will not sort it alphabetically. Because specifications are an array, sorting will occur by counting items in the array.
 