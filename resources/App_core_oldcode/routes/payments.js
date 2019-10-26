const express  = require('express');
const router = express.Router();
const db = require('../config/db');
const Payments = require('../models/payments');

router.get('/' ,(req,res) => 
Payments.findAll()
    .then(payment => {
        console.log(payment)
        res.sendStatus(200);
    })
    .catch(err => console.log(err))
);

module.exports = router;