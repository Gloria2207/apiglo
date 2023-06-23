const{ create, getComment, getCommentByCommentID, updateComment, deleteComment } = require("./comment.service");

 const { genSaltSync, hashSync} = require("bcrypt");


module.exports = {
     createComment: (req, res)=> {
         const body = req.body;
        //  const salt = genSaltSync();
// ici nous choisisons de cryter les element envoyer dans la bdd 

        //  body.Name = hashSync(body.Name, salt);
        //  body.First_Name = hashSync(body.First_Name, salt);
        // body.Password = hashSync(body.Password, salt);
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
     getCommentByCommentID: (req, res) => {
        const id_comment =req.params.id_comment;
        getCommentByCommentID(id_comment, (err, results) => {
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
    
     getComment: (req, res) => {
         const id_comment =req.params.id_comment;
         getComment(id_comment, (err, results) => {
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
     

     updateComment: (req, res) => {
        const body = req.body;
        // const salt = genSaltSync(10);

        // body.Password = hashSync(body.Password, salt);
        updateComment(body, (err, results) => {
            if (err) {
                console.log(err);
                return;
            }
            return res.json({
                success: 1,
                message: "update comment successfully"
            });
        });
    },

    deleteComment: (req, res) => {
        const data = req.body;
        deleteComment(data, (err, results) => {
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
                message: "Comment deleted successfully"
            });
        });
    }

 };

