const express  = require('express');
const router = express.Router();
const db = require('../config/db');
const ProductLines = require('../models/productlines');

router.get('/' ,(req,res) => 
ProductLines.findAll()
    .then(productline => {
        console.log(productline)
        res.sendStatus(200);
    })
    .catch(err => console.log(err))
);

module.exports = router;