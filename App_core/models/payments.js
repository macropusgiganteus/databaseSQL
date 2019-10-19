/* jshint indent: 2 */
const sequelize = require('sequelize');
const db = require('../config/db');


  const Payment =  db.define('payments', {
    customerNumber: {
      type: sequelize.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      references: {
        model: 'customers',
        key: 'customerNumber'
      }
    },
    checkNumber: {
      type: sequelize.STRING(50),
      allowNull: false,
      primaryKey: true
    },
    paymentDate: {
      type: sequelize.DATEONLY,
      allowNull: false
    },
    amount: {
      type: sequelize.DECIMAL,
      allowNull: false
    }
  }, {
    timestamps : false
  });


  module.exports = Payment;
