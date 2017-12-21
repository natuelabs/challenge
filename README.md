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

    This test was made with Windows 7, Apache, Laravel Framework 5.5, MySql, AJAX, jQuery, Javascript and Bootstrap.

    ## To make this test work follow the steps:

    #Softwares dependencies:
    1. Install Composer to download the libs dependencies.
    2. Install Xampp - To run a local server - Apache/MySql/PHP.

    #Config
    1. Add Windows Host:
        Edit file C:\Windows\System32\drivers\etc\hosts and add line:
            127.0.0.1   local.natuelabschallenge

    2. Create Apache Virtual Host Config C:\xampp\apache\conf\local\natuelabschallenge.conf
        <VirtualHost local.natuelabschallenge:8383>
            ServerAdmin mca.digital@outlook.com
            DocumentRoot "C:/xampp/htdocs/local.natuelabschallenge/public"
            ServerName local.natuelabschallenge
            ServerAlias www.local.natuelabschallenge
            ErrorLog "logs/local.natuelabschallenge-error.log"
            CustomLog "logs/local.natuelabschallenge-access.log" common
        </VirtualHost>

    3. Add Apache Virtual Host Config in C:\xampp\apache\conf\httpd.conf
        # Virtual hosts
        Include conf/local/natuelabschallenge.conf

    #Access folder project C:/xampp/htdocs/local.natuelabschallenge and run the command:
    4. Run the command on cmd/terminal:
        composer install

    5. Run the command on cmd/terminal:
        php artisan migrate:refresh --seed

    6. Access url on browser local.natuelabschallenge:8383

An explanation of how to perform the tests;
    The View project has a simple layout where left side has a product list and right side there are a specifications filter.
    You can search for products and filter your specifications.
    You can order by price too just clicking in blue arrows above the prices.
    Enjoy!