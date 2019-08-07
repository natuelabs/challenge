process.env.NODE_ENV = 'test';

let chai = require('chai');
let chaiHttp = require('chai-http');
var server = require('../app');
let should = chai.should();

chai.use(chaiHttp);
//Our parent block
describe('Products', () => {
/*
  * Test the /GET route
  */
  describe('/GET products', () => {
      it('it should GET all the products', (done) => {
        chai.request(server)
            .get('/products')
            .end((err, res) => {
                  res.should.have.status(200);
                  res.body.should.be.a('array');
                  res.body.length.should.be.equal(20);
              done();
            });
      });
      it('it should GET all the products with vegan specification', (done) => {
        chai.request(server)
            .get('/products/vegan')
            .end((err, res) => {
                  res.should.have.status(200);
                  res.body.should.be.a('array');
                  res.body.length.should.be.equal(10);
              done();
            });
      });
      it('it should GET all the products with vegan and low-carb specifications', (done) => {
        chai.request(server)
            .get('/products/vegan,low-carb')
            .end((err, res) => {
                  res.should.have.status(200);
                  res.body.should.be.a('array');
                  res.body.length.should.be.equal(15);
              done();
            });
      });
      it('it should GET all the products with vegan specification ordered by price asc', (done) => {
        chai.request(server)
            .get('/products/vegan?order=asc')
            .end((err, res) => {
                  res.should.have.status(200);
                  res.body.should.be.a('array');
                  res.body.length.should.be.equal(10);
              done();
            });
      });
      it('it should GET zero products with wrong specification text', (done) => {
        chai.request(server)
            .get('/products/foo')
            .end((err, res) => {
                  res.should.have.status(200);
                  res.body.should.be.a('array');
                  res.body.length.should.be.equal(0);
              done();
            });
      });
  });

});
