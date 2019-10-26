/* jshint indent: 2 */
const sequelize = require('sequelize');
const db = require('../config/db');

  const Product = db.define('products', {
    productCode: {
      type: sequelize.STRING(15),
      allowNull: false,
      primaryKey: true
    },
    productName: {
      type: sequelize.STRING(70),
      allowNull: false
    },
    productLine: {
      type: sequelize.STRING(50),
      allowNull: false,
      references: {
        model: 'productlines',
        key: 'productLine'
      }
    },
    productScale: {
      type: sequelize.STRING(10),
      allowNull: false
    },
    productVendor: {
      type: sequelize.STRING(50),
      allowNull: false
    },
    productDescription: {
      type: sequelize.TEXT,
      allowNull: false
    },
    quantityInStock: {
      type: sequelize.INTEGER(6),
      allowNull: false
    },
    buyPrice: {
      type: sequelize.DECIMAL,
      allowNull: false
    },
    MSRP: {
      type: sequelize.DECIMAL,
      allowNull: false
    }
  }, {
    timestamps: false
  });

  module.exports = Product;
