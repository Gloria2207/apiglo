const{ create, getUser, getUserByUserID, updateUser, deleteUser } = require("./user.service");

 const { genSaltSync, hashSync} = require("bcrypt");


module.exports = {
     createUser: (req, res)=> {
         const body = req.body;
         const salt = genSaltSync();
// ici nous choisisons de cryter les element envoyer dans la bdd 

        //  body.Name = hashSync(body.Name, salt);
        //  body.First_Name = hashSync(body.First_Name, salt);
        body.Password = hashSync(body.Password, salt);
        //  body.Mail_Address = hashSync(body.Mail_Address, salt);
        //  body.Age = hashSync(body.Age, salt);
        //  body.Promotion = hashSync(body.Promotion, salt);
         
         
         create(body, (err, results) => {
             if(err){
                 console.log(err);
                 return res.status(500).json({
                     success: 0,
                     message: "Database connection error"
                 });
             }
             return res.status(200).json({
                  success: 1,
                 data: results
             });
         });
     },
     getUserByUserID: (req, res) => {
        const id_utilisateur_ =req.params.id_utilisateur;
        getUserByUserID(id_utilisateur, (err, results) => {
            if (err) {
                console.log(err);
                return;
            }
            if (!results) {
                return res.json({
                    success: 0,
                    message: "Record not Found"
                });
            }
            return res.json({
                success: 1,
                data: results
            });
        });
    },
    
     getUser: (req, res) => {
         const id_utilisateur =req.params.id_utilisateur;
         getUser(id_utilisateur, (err, results) => {
             if (err) {
                 console.log(err);
                 return;
             }
             if (!results) {
                 return res.json({
                     success: 0,
                     message: "Record not Found"
                 });
             }
             return res.json({
                 success: 1,
                 data: results
             });
         });
     },
     

     updateUser: (req, res) => {
        const body = req.body;
        const salt = genSaltSync(10);

        body.mot_de_passe = hashSync(body.mot_de_passe, salt);
        updateUser(body, (err, results) => {
            if (err) {
                console.log(err);
                return;
            }
            return res.json({
                success: 1,
                message: "update User successfully"
            });
        });
    },

    deleteUser: (req, res) => {
        const data = req.body;
        deleteUser(data, (err, results) => {
            if (err) {
                console.log(err);
                return;
            }
            if(!results){
                return res.json({
                    success: 0,
                    message: " Record Not Found"
                })
            }
            return res.json({
                success: 1,
                message: "User deleted successfully"
            });
        });
    }

 };

