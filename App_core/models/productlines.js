/* jshint indent: 2 */
const sequelize = require('sequelize');
const db = require('../config/db');


  const ProductLine =  db.define('productlines', {
    productLine: {
      type: sequelize.STRING(50),
      allowNull: false,
      primaryKey: true
    },
    textDescription: {
      type: sequelize.STRING(4000),
      allowNull: true
    },
    htmlDescription: {
      type: sequelize.TEXT,
      allowNull: true
    },
    image: {
      type: "MEDIUMBLOB",
      allowNull: true
    }
  }, {
    //tableName: 'productlines'
    timestamps: false
  });

  module.exports = ProductLine;

