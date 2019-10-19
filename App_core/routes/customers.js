const express  = require('express');
const router = express.Router();
const db = require('../config/db');
const Customers = require('../models/customers');


router.get('/' ,(req,res) => 
Customers.findAll()
    .then(customer => {
        console.log(customer)
        res.sendStatus(200);
    })
    .catch(err => console.log(err))
);

module.exports = router;