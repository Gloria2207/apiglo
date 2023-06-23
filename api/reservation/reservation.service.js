const pool = require ("./config/database");



module.exports = {
    create: (data, callback) => {
        pool.query(
            'insert into  reservations(date_arrivée, date_départ, prix_total) values(?,?,?)',
            [
                data.date_arrivée,
                data.date_départ,
                data.prix_total
                
            ],
            (error, results, fields)=>{
                if(error){
                    return callback(error);
                }
                return callback(null, results);
            }
        );
    
    },

    getReservation: (id_reservation, callback) =>{
        pool.query(
        'select id_reservation, date_arrivée, date_départ, prix_total from reservations',
        [id_reservation],
        (error, results, fields)=>{
            if(error){
              return  callback(error);
            }
            return callback(null, results);
        }
        );



    },

    getReservationByReservationID:(id_reservation, callback ) =>{
        pool.query(
        'select id_reservation, date_arrivée, date_départ, prix_total from reservations where id_reservation = ? ',
        [id_reservation],
        (error, results, fields)=>{
            if(error){
                callback(error);
            }
            return callback(null, results[0]);
        }
        );



    },

    updateReservation: (data, callback) => {
        pool.query(
            'update reservations set date_arrivée=?, date_départ=?, prix_total=? where id_reservation=?'[
                data.date_arrivée,
                data.date_départ,
                data.prix_total
            ],
            (error, results, fields)=>{
                if(error){
                    callback(error);
                }
                return callback(null, results);
            }
            

        )

    },

    deleteReservation: (data, callback) => {
        pool.query(
            'delete from reservations where id_reservation =?',
            [data.id_reservation],
            (error, results, fields)=>{
                if(error){
                    callback(error);
                }
                return callback(null, results);
            }
            
        )
    }
};


