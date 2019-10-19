const express  = require('express');
const router = express.Router();
const db = require('../config/db');
const Customers = require('../models/customers');
const Sequlize = require('sequelize');
const Op = Sequlize.Op;

router.get('/' ,(req,res) => 
Customers.findAll()
    .then(customers => {
    
        res.render('customers', {
            customers
        });
    })
    .catch(err => console.log(err))
);

// Display add customer form
router.get('/add', (req,res) => res.render('addcustomer'));

// Add a customer
router.post('/add', (req,res)=>{
    let { customerNumber,customerName,contactLastName,contactFirstName,

        phone,addressLine1,addressLine2,city,state,postalCode,
        
        country,salesRepEmployeeNumber,creditLimit  } = req.body;
    let err = [];


    // Validate field
    if(!customerNumber){
        err.push({text : "Please add an Customer Number"});
    }
    if(!customerName){
        err.push({text : "Please add Customer Name"});
    }
    if(!contactLastName){
        err.push({text : "Please add Contact Last Name"});
    }
    if(!contactFirstName){
        err.push({text : "Please add an Contact First Name"});
    }
    if(!phone){
        err.push({text : "Please add an Phone Number"});
    }
    if(!addressLine1){
        err.push({text : "Please add Address"});
    }
    if(!city){
        err.push({text : "Please add City"});
    }
    if(!country){
        err.push({text : "Please add Country"});
    }

    // Check for error
    if(err.length >0){
        res.render('addcustomer',{
            customerNumber,
            customerName,
            contactLastName,
            contactFirstName,
            phone,
            addressLine1,
            addressLine2,
            city,
            state,
            postalCode,
            country,
            salesRepEmployeeNumber,
            creditLimit
        })
    } else {

        //Insert into  table
        Customers.create({
            customerNumber,
            customerName,
            contactLastName,
            contactFirstName,
            phone,
            addressLine1,
            addressLine2,
            city,
            state,
            postalCode,
            country,
            salesRepEmployeeNumber,
            creditLimit
        })
        .then(customers =>redirect('/customers'))
        .catch(err => console.log(err));
    }
})

// Search for customers
router.get('/search', (req,res)=>{
    const {term} = req.query
 
    Customers.findAll({where: {customerNumber: {[Op.like]: '%' + term + '%' } } })
    .then(customers => res.render('customers', { customers }))
    .catch(err => console.log(err));
 })

module.exports = router;