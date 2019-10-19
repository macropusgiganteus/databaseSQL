const express  = require('express');
const router = express.Router();
const db = require('../config/db');
const Employees = require('../models/employees');
const Sequlize = require('sequelize');
const Op = Sequlize.Op;


router.get('/' ,(req,res) => 
Employees.findAll()
    .then(employees => {
    
        res.render('employees', {
            employees
        });
    })
    .catch(err => console.log(err))
);

// Display add employees form
router.get('/add', (req,res) => res.render('addemployee'))

// Add an employee
router.post('/add', (req,res)=>{
    let { employeeNumber,lastName,firstName,extension,email,officeCode,reportsTo,jobTitle  } = req.body;
    let err = [];


    // Validate field
    if(!employeeNumber){
        err.push({text : "Please add an employee number"});
    }
    if(!lastName){
        err.push({text : "Please add lastName"});
    }
    if(!firstName){
        err.push({text : "Please add firstName"});
    }
    if(!email){
        err.push({text : "Please add an email"});
    }
    if(!officeCode){
        err.push({text : "Please add an officeCode"});
    }
    if(!jobTitle){
        err.push({text : "Please add jobTitle"});
    }

    // Check for error
    if(err.length >0){
        res.render('addemployee',{
            err,
            jobTitle,
            firstName,
            lastName,
            officeCode,
            employeeNumber,
            reportsTo,
            extension,
            email,

        })
    } else {

        //Insert into  table
        Employees.create({
        employeeNumber,
        lastName,
        firstName,
        extension,
        email,
        officeCode,
        reportsTo,
        jobTitle
        })
        .then(employee =>redirect('/employees'))
        .catch(err => console.log(err));
    }
})

// Search for employees
router.get('/search', (req,res)=>{
    const {term} = req.query
 
    Employees.findAll({where: {employeeNumber: {[Op.like]: '%' + term + '%' } } })
    .then(employees => res.render('employees', { employees }))
    .catch(err => console.log(err));
 })


module.exports = router;