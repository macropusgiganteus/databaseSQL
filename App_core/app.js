const express = require('express');
const exphbs = require('express-handlebars');
const bodyParser = require('body-parser');
const path = require('path');


// Database
const db = require('./config/db');
const app = express();

// Handlebars
app.engine('handlebars', exphbs ({defaultLayout: 'main'}));
app.set('view engine', 'handlebars');

// Body Parser
app.use(bodyParser.urlencoded({ extended: false}));


// Set static folder
app.use(express.static(path.join(__dirname, 'public')));

// Employees route
app.use('/employees' ,require('./routes/employees'));
// Products route
app.use('/products' ,require('./routes/products'));
// Customers route
app.use('/customers' ,require('./routes/customers'));


// Index route
app.get('/', (req, res) => res.render('index' ,{ layout: 'landing'}));


const PORT = process.env.PORT || 8080;

app.listen(PORT, () => {
    console.log(`Server is running on port : ${PORT}`);
})



  //TEST DB
  db
    .authenticate()
    .then(() => {
      console.log('Connection has been established successfully.');
    })
    .catch(err => {
      console.error('Unable to connect to the database:', err);
    });



    module.exports = app;
  