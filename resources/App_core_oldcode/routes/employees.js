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
    let errs = [];

    console.log(req.body);
    // Validate field
    if(!employeeNumber){
        errs.push({text : "Please add an employee number"});
    }
    if(!lastName){
        errs.push({text : "Please add lastName"});
    }
    if(!firstName){
        errs.push({text : "Please add firstName"});
    }
    if(!email){
        errs.push({text : "Please add an email"});
    }
    if(!officeCode){
        errs.push({text : "Please add an officeCode"});
    }
    if(!jobTitle){
        errs.push({text : "Please add jobTitle"});
    }

    // Check for error
    if(errs.length >0){
        res.render('addemployee',{
            errs,
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
        let errs = [];
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
        .then(employee =>res.redirect('/employees'))
        .catch(err =>{
            errs.push({text : "Employee number already exists"})
            res.render('addemployee',{
                errs,
                jobTitle,
                firstName,
                lastName,
                officeCode,
                employeeNumber,
                reportsTo,
                extension,
                email
            }
         )
         console.log(err);
        });
    }})     
       

// Search for employees
router.get('/search', (req,res)=>{
    const {term} = req.query
 
    Employees.findAll({where: {employeeNumber: {[Op.like]: '%' + term + '%' } } })
    .then(employees => res.render('employees', { employees }))
    .catch(err => console.log(err));
 })

 // Delete employee
 router.get('/delete', (req,res)=>{
     let deleteNumber = 
 Employees.destroy({
    where: {
        employeeNumber: deleteNumber
    }
  })
  .then(employee =>res.redirect('/employees'))
  .catch(err => console.log(err));
})

 // Update employee
 router.get('/update', (req,res)=>{
 Post.update({
    updatedAt: null,
  }, {
    where: {
      deletedAt: {
        [Op.ne]: null
      }
    }
  });
})

module.exports = router;