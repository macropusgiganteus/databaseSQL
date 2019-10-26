const express  = require('express');
const router = express.Router();
const db = require('../config/db');
const Offices = require('../models/offices');

router.get('/' ,(req,res) => 
Employees.findAll()
    .then(office => {
        console.log(office)
        res.sendStatus(200);
    })
    .catch(err => console.log(err))
);

module.exports = router;