var express = require('express'),
  app = express(),
  port = process.env.PORT || 3000;

var routes = require('./api/routes/routes'); 
var bodyParser = require('body-parser');

routes(app);

module.exports = app.listen(port);

console.log(' Hellooooo! Server is running on port: ' + port);
