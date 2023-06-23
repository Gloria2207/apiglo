// const database = require('../config/database.js');


// const {Sequelize, DataTypes} = require('sequelize');


// const sequelize = new Sequelize(
//     database.DB,
//     database.USER,
//     database.PASSWORD,{
//         host: database.HOST,
//         dialect: database.dialect,
//         operatiorsAliases: false,


//         pool: {
//             max: database.pool.max,
//             min: database.pool.min,
//             acquire: database.pool.acquire,
//             idle: database.pool.idle
//         }
//     }
   

// ) 
// sequelize.authenticate()
// .then(() => {
//     console.log('connected...')
// })
// .catch(err => {
//     console.log('Error'+ err)
// })



// const db = {}

// db.Sequelize = Sequelize
// db.sequelize = sequelize 

// db.user = require('./usermodels.js')(sequelize, DataTypes)
// // db.reviews = require('./reviewsmodels.js')(sequelize, DataTypes)

// db.sequelize.sync({ force: false})
// .then(() => {
//     console.log('yes re-sinc done!')
// })

// module.exports = db