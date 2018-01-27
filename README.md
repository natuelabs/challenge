<p align="center">
  <a href="https://www.natue.com.br">
      <img src="https://static.natue.com.br/images/icons/footer-logo.png" alt="Natue"/>
  </a>
</p>

# Challenge for Backend Developer

## Disclaimer

This project is a test for natuelabs/challenge.

## Run

To run this, you need to clone it and run `composer install`:

```
$ git clone https://github.com/gustavonovaes/challenge.git
$ cd challenge/
$ composer install
```

You can then run the application using PHP's built-in server:

```
php -S 0.0.0.0:8000 -t public/
```

The API is running at [http://localhost:8000](http://localhost:8000/).

## Endpoints

- `GET` /products
    ###### Parameters
    - ***sort*** 
        - 'asc' - Sort in ascending order (lowest or least-recent first)
        - 'desc' - Sort in descending order (highest or most-recent first)           
    - ***specifications***
        - `:specifications` comma-separated values. Returns products that have at least one.
        
### Examples Requests

```
GET http://localhost:8000/products?specifications=vegan,low-carb
GET http://localhost:8000/products?specifications=lactose-free&sort=asc
```

## Tests

Execute this command to run tests:

```bash
$ cd challenge/
$ ./vendor/bin/phpunit
```
