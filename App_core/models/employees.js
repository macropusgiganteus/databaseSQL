/* jshint indent: 2 */
const sequelize = require('sequelize');
const db = require('../config/db');

  const Employee = db.define('employees', {
    employeeNumber: {
      type: sequelize.INTEGER(11),
      allowNull: false,
      primaryKey: true
    },
    lastName: {
      type: sequelize.STRING(50),
      allowNull: false
    },
    firstName: {
      type: sequelize.STRING(50),
      allowNull: false
    },
    extension: {
      type: sequelize.STRING(10),
      allowNull: false
    },
    email: {
      type: sequelize.STRING(100),
      allowNull: false
    },
    officeCode: {
      type: sequelize.STRING(10),
      allowNull: false,
      references: {
        model: 'offices',
        key: 'officeCode'
      }
    },
    reportsTo: {
      type: sequelize.INTEGER(11),
      allowNull: true,
      references: {
        model: 'employees',
        key: 'employeeNumber'
      }
    },
    jobTitle: {
      type: sequelize.STRING(50),
      allowNull: false
    }
  }, {
    timestamps: false
  });


  module.exports = Employee;
