/* jshint indent: 2 */
const sequelize = require('sequelize');
const db = require('../config/db');


  const OrderDetail =  db.define('orderdetails', {
    orderNumber: {
      type: sequelize.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      references: {
        model: 'orders',
        key: 'orderNumber'
      }
    },
    productCode: {
      type: sequelize.STRING(15),
      allowNull: false,
      primaryKey: true,
      references: {
        model: 'products',
        key: 'productCode'
      }
    },
    quantityOrdered: {
      type: sequelize.INTEGER(11),
      allowNull: false
    },
    priceEach: {
      type: sequelize.DECIMAL,
      allowNull: false
    },
    orderLineNumber: {
      type: sequelize.INTEGER(6),
      allowNull: false
    }
  }, {
    timestamps : false
  });

  
  module.exports = OrderDetail;
