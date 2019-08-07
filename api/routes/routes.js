'use strict';
module.exports = function(app) {
  
  var products = require('../controllers/productController');  
  
  app.route('/products')
    .get(products.list_all_products);

  app.route('/products/:spec')
    .get(products.filter_products_by_spec);

};
