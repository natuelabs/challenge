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

## Natue Challenge
## This test was made with Windows 7, Apache, Laravel Framework 5.5, MySql, AJAX, jQuery, Javascript and Bootstrap.
- API Server was made with Laravel Resource;
- The .json data is provided by the Laravel Framework brought from the MySql database.
- API Client was made with AJAX,jQuery and Bootstrap.

## Project Structure
    /database/migrations/
        create_products_table.php
        create_specifications_table.php
        create_products_specifications_table.php

    /database/seeds/
        DatabaseSeeder.php
        ProductsSpecificationsTableSeeder.php
        ProductsTableSeeder.php
        SpecificationsTableSeeder.php

    /routes
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

## To make this test work follow the steps:

## Softwares dependencies:
#1. Install Composer to download the libs dependencies.    
#2. To run a local server - Install Apache/MySql/PHP.    
#3. Or Install Xampp Stack.    
#4. Create a Database named 'natuechallenge'    

## Access the project root folder and run the command on cmd/terminal to install dependencies:
    composer install

#1. Make a copy of .env.exemple to .env and edit .env file to connect the database;    
        DB_CONNECTION=mysql    
        DB_HOST=127.0.0.1    
        DB_PORT=3306        
        DB_DATABASE=natuechallenge    
        DB_USERNAME=root    
        DB_PASSWORD=    
    
#2. Run the command on cmd/terminal to create database tables and seeds:

    php artisan migrate:refresh --seed

#3. Run the command on cmd/terminal to run the project:

    php artisan serve

#4. Access the project on browser 

    http://127.0.0.1:8000/catalog

## An explanation of how to perform the tests;
- The View project has a simple layout where left side has a product list and right side there are a specifications filter.
- You can search for products and filter your specifications.
- You can order by price too just clicking in blue arrows above the prices.
- Enjoy!
