'use strict';

const fs = require('fs');

const productsRaw = fs.readFileSync('./././products.json', 'utf8');
const products = JSON.parse(productsRaw);

exports.list_all_products = function(req, res) {

    let order = req.query.order;
    let filtered_products = products;

    switch (order) {
        case 'asc': 
            filtered_products.sort(function(a, b){return a.price - b.price});
            break;
        case 'desc': 
            filtered_products.sort(function(a, b){return b.price - a.price});
            break;
        default:
            break;
    }

    res.json(filtered_products);
};

exports.filter_products_by_spec = function(req, res) {

    let filters = req.params.spec;
    let order = req.query.order;
    let filtered_products = []

    for (var i = 0, len = products.length; i < len; i++) {
        if (products[i].specifications.find(exists)) {
            filtered_products.push(products[i]);
        }
    }

    function exists(spec){
        return filters.includes(spec);
    }

    switch (order) {
        case 'asc': 
            filtered_products.sort(function(a, b){return a.price - b.price});
            break;
        case 'desc': 
            filtered_products.sort(function(a, b){return b.price - a.price});
            break;
        default:
            break;
    }

    res.json(filtered_products);
};
