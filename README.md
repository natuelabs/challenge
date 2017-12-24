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
## # 
## Natue Challenge
## This test was develop with Windows 7, Apache, Laravel Framework 5.5, MySql, AJAX, jQuery, Javascript and Bootstrap.
- API Server was made with Laravel;
- The .json data is provided by Laravel brought from the MySql database.
- API Client was made with AJAX,jQuery and Bootstrap.
- Tests was applied with PHPUnit and Laravel Dusk.   

## Project Structure
    /database/migrations/ to create the database structure;
        create_products_table.php
        create_specifications_table.php
        create_products_specifications_table.php

    /database/seeds/ to populate the database:
        DatabaseSeeder.php
        ProductsSpecificationsTableSeeder.php
        ProductsTableSeeder.php
        SpecificationsTableSeeder.php

    /routes to define requests:
        api.php
        web.php

    /app/Http/Controllers
        CatalogController.php
        Specifications.php
        Products.php

    /app/Models
        Product.php
        Specification.php
        ProductSpecification.php
    
    /resources/views
        catalog.blade.php

    /public
        /css/catalog.css
        /js/catalog.js

    /tests/
        /Browser/
            CatalogTest.php
        /Feature/
            ProductTest.php
            SpecificationTest.php


## Softwares dependencies:
#1. Install Composer to download the libs dependencies:

        https://getcomposer.org/download/

#3. Install Xampp Stack to run a local server:

    https://www.apachefriends.org/pt_br/download.html

#3. Install Cmder or use Cmd to run commands in terminal on Windows:

    http://cmder.net/

## Follow the above steps to make the test work:

- Clone the project to your machine:

        git clone https://github.com/mca-digital/challenge.git local.natuechallenge

- Access the project root folder:

        cd local.natuechallenge

- Run command on Cmder or Cmd to install dependencies:

        composer install

- Create a Database named:

        natuechallenge

- Run command on Cmder or Cmd to make a copy of .env.exemple to .env:

        cp .env.example .env

- Edit .env file to connect the database:
        
        APP_URL=http://127.0.0.1:8000
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1    
        DB_PORT=3306        
        DB_DATABASE=natuechallenge    
        DB_USERNAME=root    
        DB_PASSWORD=    

- Run command on Cmder or Cmd to create encryption key:

        php artisan key:generate

- Run command on Cmder or Cmd to create database tables and seeds:

        php artisan migrate --seed
        
- To refresh database structure if needed:

        php artisan migrate:refresh --seed

- Run command on Cmder or Cmd to run the project:

        php artisan serve

- Access the project on browser:

        http://127.0.0.1:8000/catalog

## An explanation of how to perform the tests;

- Above we have some tests that will be executed:
    
        HTTP Tests wit PHPunit
        - API_HTTPStatus_Specification;    
        - API_HTTPStatus_ProductList;
        - API_HTTPStatus_ProductListWithFilter;
        - API_AssertJSON_Specification;
        - API_AssertJSON_Product;
        - API_AssertJSON_ProductWithFilter;

        Browser Tests with Laravel Dusk
        - CatalogTest
        - VerifyProductListAndFilter

- Open another Cmder or Cmd instance to run the HTTP tests without stop the previous service in http://127.0.0.1:8000/catalog:

        phpunit --debug

- The final of execution tests you must have:    

        PHPUnit 5.7.0 by Sebastian Bergmann and contributors.


        Starting test 'Tests\Feature\ProductTest::API_HTTPStatus_ProductList'.
        .
        Starting test 'Tests\Feature\ProductTest::API_HTTPStatus_ProductListWithFilter'.
        .
        Starting test 'Tests\Feature\ProductTest::API_AssertJSON_Product'.
        .
        Starting test 'Tests\Feature\ProductTest::API_AssertJSON_ProductWithFilter'.
        .
        Starting test 'Tests\Feature\SpecificationTest::API_HTTPStatus_Specification'.
        .
        Starting test 'Tests\Feature\SpecificationTest::API_AssertJSON_Specification'.
        .                                                              6 / 6 (100%)

        Time: 311 ms, Memory: 12.00MB

        OK (6 tests, 6 assertions)        

- Run command on Cmder or Cmd to run the Browser automated tests:

        php artisan dusk --debug

- The final of execution tests you must have:    

        Warning: TTY mode is not supported on Windows platform.
        PHPUnit 5.7.0 by Sebastian Bergmann and contributors.


        Starting test 'Tests\Browser\CatalogTest::VerifyProductListItensFilter'.

        DevTools listening on ws://127.0.0.1:12018/devtools/browser/4ff9da70-68dd-4c8c-a9fb-3e427d1552c3
        .                                                                   1 / 1 (100%)

        Time: 38.82 seconds, Memory: 10.00MB

        OK (1 test, 5 assertions)
