const pool = require ("./config/database");



module.exports = {
    create: (data, callback) => {
        pool.query(
            'insert into logements(titre, nbre_chambres, nbre_douches, nbre_cuisines, nbre_salons, ville, pays, prix_nuit, disponibilité) values(?,?,?,?,?,?,?,?,?)',
            [
                data.titre,
                data.nbre_chambres,
                data.nbre_douches,
                data.nbre_cuisines,
                data.nbre_salons,
                data.ville,
                data.pays,
                data.prix_nuit,
                data.disponibilté
                
            ],
            (error, results, fields)=>{
                if(error){
                    return callback(error);
                }
                return callback(null, results);
            }
        );
    
    },

    getLogement: (id_logement, callback) =>{
        pool.query(
        'select id_logement, titre, nbre_chambres, nbre_douches, nbre_cuisines, nbre_salons, ville, pays, prix_nuit, disponibilité from logements',
        [id_logement],
        (error, results, fields)=>{
            if(error){
              return  callback(error);
            }
            return callback(null, results);
        }
        );



    },

    getLogementByLogementID:(id_reservation, callback ) =>{
        pool.query(
        'select id_logement, titre, nbre_chambres, nbre_douches, nbre_cuisines, nbre_salons, ville, pays, prix_nuit, disponibilité from logements where id_logement = ? ',
        [id_logement],
        (error, results, fields)=>{
            if(error){
                callback(error);
            }
            return callback(null, results[0]);
        }
        );



    },

    updateLogement: (data, callback) => {
        pool.query(
            'update logements set titre=?, nbre_chambres=?, nbre_douches=?, nbre_cuisines=?, nbre_salons=?, ville=?, pays=?, prix_nuit=?, disponibilité  where id_logement=?'[
                data.titre,
                data.nbre_chambres,
                data.nbre_douches,
                data.nbre_cuisines,
                data.nbre_salons,
                data.ville,
                data.pays,
                data.prix_nuit,
                data.disponibilté
            ],
            (error, results, fields)=>{
                if(error){
                    callback(error);
                }
                return callback(null, results);
            }
            

        )

    },

    deleteLogement: (data, callback) => {
        pool.query(
            'delete from logements where id_logement =?',
            [data.id_logement],
            (error, results, fields)=>{
                if(error){
                    callback(error);
                }
                return callback(null, results);
            }
            
        )
    }
};


