/* jshint indent: 2 */
const sequelize = require('sequelize');
const db = require('../config/db');


  const Customer =  db.define('customers', {
    customerNumber: {
      type: sequelize.INTEGER(11),
      allowNull: false,
      primaryKey: true
    },
    customerName: {
      type: sequelize.STRING(50),
      allowNull: false
    },
    contactLastName: {
      type: sequelize.STRING(50),
      allowNull: false
    },
    contactFirstName: {
      type: sequelize.STRING(50),
      allowNull: false
    },
    phone: {
      type: sequelize.STRING(50),
      allowNull: false
    },
    addressLine1: {
      type: sequelize.STRING(50),
      allowNull: false
    },
    addressLine2: {
      type: sequelize.STRING(50),
      allowNull: true
    },
    city: {
      type: sequelize.STRING(50),
      allowNull: false
    },
    state: {
      type: sequelize.STRING(50),
      allowNull: true
    },
    postalCode: {
      type: sequelize.STRING(15),
      allowNull: true
    },
    country: {
      type: sequelize.STRING(50),
      allowNull: false
    },
    salesRepEmployeeNumber: {
      type: sequelize.INTEGER(11),
      allowNull: true,
      references: {
        model: 'employees',
        key: 'employeeNumber'
      }
    },
    creditLimit: {
      type: sequelize.DECIMAL,
      allowNull: true
    }
  }, {
    tableName: 'customers',
    timestamps: false
  });

  module.exports = Customer;
