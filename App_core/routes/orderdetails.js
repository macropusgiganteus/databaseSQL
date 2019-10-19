const express  = require('express');
const router = express.Router();
const db = require('../config/db');
const OrderDetails = require('../models/orderdetails');

router.get('/' ,(req,res) => 
OrderDetails.findAll()
    .then(orderdetail => {
        console.log(orderdetail)
        res.sendStatus(200);
    })
    .catch(err => console.log(err))
);

module.exports = router;