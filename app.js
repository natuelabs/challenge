// Usage:
// npm install http
// node app.js
var http = require('http');

var server = http.createServer(function(request, response) {
  response.write('Hello Natue');
  response.end();
});

server.listen(8080);
