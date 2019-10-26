const Sequelize = require('sequelize');

// Option 1: Passing parameters separately
module.exports = new Sequelize('classicmodels', 'root', '', {
  host: 'localhost',
  dialect: 'mysql'
});

