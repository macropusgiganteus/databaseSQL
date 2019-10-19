const express  = require('express');
const router = express.Router();
const db = require('../config/db');
const Products = require('../models/products');

// Get product list
router.get('/' ,(req,res) => 
Products.findAll()
    .then(products => {
    
        res.render('products', {
            products
        });
    })
    .catch(err => console.log(err))
);



module.exports = router;