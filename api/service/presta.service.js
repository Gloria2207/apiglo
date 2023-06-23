const pool = require ("./config/database");



module.exports = {
    create: (data, callback) => {
        pool.query(
            'insert into  services(nom_service, prix, dispo, id_prestataire) values(?,?,?,?)',
            [
                data.nom_service,
                data.prix,
                data.dispo,
                data.id_prestataire

                
            ],
            (error, results, fields)=>{
                if(error){
                    return callback(error);
                }
                return callback(null, results);
            }
        );
    
    },

    getPresta: (id_service, callback) =>{
        pool.query(
        'select id_service, nom_service, prix, dispo, id_prestataire from services',
        [id_service],
        (error, results, fields)=>{
            if(error){
              return  callback(error);
            }
            return callback(null, results);
        }
        );



    },

    getPrestaByPrestaID:(id_service, callback ) =>{
        pool.query(
        'select id_service, nom_service, prix, dispo, id_prestataire from services where id_service = ? ',
        [id_service],
        (error, results, fields)=>{
            if(error){
                callback(error);
            }
            return callback(null, results[0]);
        }
        );



    },

    updatePresta: (data, callback) => {
        pool.query(
            'update services set nom_service=?, prix=?, dispo=?, id_prestataire=? where id_service=?'[
                data.nom_service,
                data.prix,
                data.dispo,
                data.id_prestataire
            ],
            (error, results, fields)=>{
                if(error){
                    callback(error);
                }
                return callback(null, results);
            }
            

        );

    },

    deletePresta: (data, callback) => {
        pool.query(
            'delete from service where id_service =?',
            [data.id_service],
            (error, results, fields)=>{
                if(error){
                    callback(error);
                }
                return callback(null, results);
            }
            
        );
    }
};
