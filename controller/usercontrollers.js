// const db = require('../models')

// //create main model
// const User = db.user


// // const EMAIL_REGEX     = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
// // const PASSWORD_REGEX  = /^(?=.*\d).{4,8}$/;
// //main work


// //1. create product 

// const addUser = async (req, res) => {

//     let info = {
//         Name: req.body.Name,
//         First_Name: req.body.First_Name,
//         Password: req.body.Password,
//         Mail_Address: req.body.Mail_Address ,
//         Age: req.body.Age,
//         Promotion: req.body.Promotion 
//     }
//         // const Name = req.body.Name,
//         // First_Name = req.body.First_Name,
//         // Password = req.body.Password,
//         // Mail_Address = req.body.Mail_Address ,
//         // Promotion = req.body.Promotion 

//     /*if ( Mail_Address == null || Name == null || First_Name == null || Password == null || Promotion == null) {
//         res.status(400).json({ 'error': 'missing parameters' });
//      }
   
//      if (Name.length >= 13 || Name.length <= 4) {
//         res.status(400).json({ 'error': 'wrong username (must be length 5 - 12)' });
//      }
   
//      if (!Mail_Address_REGEX.test(Mail_Address)) {
//         res.status(400).json({ 'error': 'email is not valid' });
//      }
   
//      if (!PASSWORD_REGEX.test(Password)) {
//         res.status(400).json({ 'error': 'password invalid (must length 4 - 8 and include 1 number at least)' });
//      }*/

//      const user = await User.Create(info)
//         res.status(200).send(user)
//         console.log(user)
//      /*Users.findOne({
//         attributes: ['email'],
//         where: { email: email }
//       })
//       .then(function(userFound) {
//         done(null, userFound);
//       })
//       .catch(function(err) {
//         return res.status(500).json({ 'error': 'unable to verify user' });
//       });*/
//       /*if(!Users.findOne({
//         attributes: ['email'],
//         where: { email: email }
//       })){
        
//       }else{
//         return res.status(409).json({ 'error': 'user already exist' });
//       }*/
   
    
// }

// //2. get all the products

// const getallUser = async (req, res) => {

//     let user = await User.findAll({})
//     res.status(200).send(user)
// }

// //3. get a specific the product

// const getUser = async (req, res) => {

//     let ID_User = req.params.ID_User
//     let user = await User.findOne({ where: { id: ID_User}})
//     res.status(200).send(user)
// }

// //4. update a product

// const updateUser = async (req, res) => {

//     let ID_User = req.params.ID_User
//     const user = await User.update(req.body, { where: { id: ID_User}})
//     res.status(200).send(user)
// }

// //5. delete a product

// const deleteUser = async (req, res) => {

//     let id = req.params.ID_User
//     await User.destroy({ where: { id: ID_User}})
//     res.status(200).send('The User has been deleted')
// }

// module.exports = {
//     addUser,
//     getallUser,
//     getUser,
//     deleteUser,
//     updateUser
// }