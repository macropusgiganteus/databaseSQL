const express  = require('express');
const router = express.Router();
const db = require('../config/db');
const Products = require('../models/products');
const Sequlize = require('sequelize');
const Op = Sequlize.Op;

// Get product list
router.get('/' ,(req,res) => 
Products.findAll()
    .then(products =>  res.render('products', { 
        products 
    }))
    .catch(err => console.log(err))
);

// Search for products
router.get('/search', (req,res)=>{
   const {term} = req.query

   Products.findAll({where: {productName: {[Op.like]: '%' + term + '%' } } })
   .then(products => res.render('products', { products }))
   .catch(err => console.log(err));
})


module.exports = router;