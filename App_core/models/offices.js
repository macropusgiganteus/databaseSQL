/* jshint indent: 2 */
const sequelize = require('sequelize');
const db = require('../config/db');


  const Office =  db.define('offices', {
    officeCode: {
      type: sequelize.STRING(10),
      allowNull: false,
      primaryKey: true
    },
    city: {
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
    state: {
      type: sequelize.STRING(50),
      allowNull: true
    },
    country: {
      type: sequelize.STRING(50),
      allowNull: false
    },
    postalCode: {
      type: sequelize.STRING(15),
      allowNull: false
    },
    territory: {
      type: sequelize.STRING(10),
      allowNull: false
    }
  }, {
    timestamps: false
  });


  module.exports = Office;
