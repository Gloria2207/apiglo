const{ create, getReservation, getReservationByReservationID, updateReservation, deleteReservation } = require("./reservation.service");

 const { genSaltSync, hashSync} = require("bcrypt");


module.exports = {
     createReservation: (req, res)=> {
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
     getReservationByReservationID: (req, res) => {
        const id_reservation =req.params.id_reservation;
        getReservationByReservationID(id_reservation, (err, results) => {
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
    
     getReservation: (req, res) => {
         const id_reservation =req.params.id_reservation;
         getReservation(id_reservation, (err, results) => {
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
     

     updateReservation: (req, res) => {
        const body = req.body;
        // const salt = genSaltSync(10);

        // body.Password = hashSync(body.Password, salt);
        updateReservation(body, (err, results) => {
            if (err) {
                console.log(err);
                return;
            }
            return res.json({
                success: 1,
                message: "update reservation successfully"
            });
        });
    },

    deleteReservation: (req, res) => {
        const data = req.body;
        deleteReservation(data, (err, results) => {
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
                message: "Reservation deleted successfully"
            });
        });
    }

 };

