/* jshint indent: 2 */
const sequelize = require('sequelize');
const db = require('../config/db');


  const Order =  db.define('orders', {
    orderNumber: {
      type: sequelize.INTEGER(11),
      allowNull: false,
      primaryKey: true
    },
    orderDate: {
      type: sequelize.DATEONLY,
      allowNull: false
    },
    requiredDate: {
      type: sequelize.DATEONLY,
      allowNull: false
    },
    shippedDate: {
      type: sequelize.DATEONLY,
      allowNull: true
    },
    status: {
      type: sequelize.STRING(15),
      allowNull: false
    },
    comments: {
      type: sequelize.TEXT,
      allowNull: true
    },
    customerNumber: {
      type: sequelize.INTEGER(11),
      allowNull: false,
      references: {
        model: 'customers',
        key: 'customerNumber'
      }
    }
  }, {
    timestamps: false
  });

  module.exports = Order;
