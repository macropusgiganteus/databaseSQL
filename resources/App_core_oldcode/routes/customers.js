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

        phone,addressLine1,addressLine2,state,city,postalCode,
        
        country,salesRepEmployeeNumber,creditLimit  } = req.body;
        console.log(req.body);
    let errs = [];

    // Validate field
    if(!customerNumber){
        errs.push({text : "Please add Customer Number"});
    }
    if(!customerName){
        errs.push({text : "Please add Customer Name"});
    }
    if(!contactLastName){
        errs.push({text : "Please add Contact Last Name"});
    }
    if(!contactFirstName){
        errs.push({text : "Please add Contact First Name"});
    }
    if(!phone){
        errs.push({text : "Please add Phone Number"});
    }
    if(!addressLine1){
        errs.push({text : "Please add Address"});
    }
    if(!city){
        errs.push({text : "Please add City"});
    }
    if(!country){
        errs.push({text : "Please add Country"});
    }

    // Check for error
    if(errs.length >0){
        res.render('addcustomer',{
            errs,
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
        let errs = [];

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
        .then(customers =>res.redirect('/customers'))
        .catch(err =>{
            errs.push({text : "Customer number already exists"})
            res.render('addcustomer',{
                errs,
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
            }
         )
         console.log(err);
        });
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