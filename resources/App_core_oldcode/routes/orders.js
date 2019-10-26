const express  = require('express');
const router = express.Router();
const db = require('../config/db');
const Orders = require('../models/orders');

router.get('/' ,(req,res) => 
Orders.findAll()
    .then(order => {
        console.log(order)
        res.sendStatus(200);
    })
    .catch(err => console.log(err))
);

module.exports = router;