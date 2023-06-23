const pool = require ("../../config/database");



module.exports = {
    create: (data, callback) => {
        pool.query(
            'insert into  utilisateurs(nom, prenom, mot_de_passe, adresse_mail, role) values(?,?,?,?,?)',
            [
                data.nom,
                data.prenom,
                data.mot_de_passe,
                data.adresse_mail,
                data.role
            ],
            (error, results, fields)=>{
                if(error){
                    return callback(error);
                }
                return callback(null, results);
            }
        );
    
    },

    getUser: (id_utilisateur, callback) =>{
        pool.query(
        'select id_utilisateur, nom, prenom, mot_de_passe,  adresse_mail, role from utilisateurs',
        [id_utilisateur],
        (error, results, fields)=>{
            if(error){
              return  callback(error);
            }
            return callback(null, results);
        }
        );



    },

    getUserByUserID:(id_utilisateur, callback ) =>{
        pool.query(
        'select id_utilisateur, nom, prenom, mot_de_passe,adresse_mail, role from utilisateurs where id_utilisateur = ? ',
        [id_utilisateur],
        (error, results, fields)=>{
            if(error){
                callback(error);
            }
            return callback(null, results[0]);
        }
        );



    },

    updateUser: (data, callback) => {
        pool.query(
            'update utilisateurs set nom=?, prenom=?, mot_de_passe=?,  adresse_mail=?, role=? where id_utilisateur=?'[
                data.nom,
                data.prenom,
                data.mot_de_passe,
                data.adresse_mail,
                data.role
            ],
            (error, results, fields)=>{
                if(error){
                    callback(error);
                }
                return callback(null, results);
            }
            

        );

    },

    deleteUser: (data, callback) => {
        pool.query(
            'delete from utilisateurs where id_utilisateur =?',
            [data.id_utilisateur],
            (error, results, fields)=>{
                if(error){
                    callback(error);
                }
                return callback(null, results);
            }
            
        );
    },

    getUserByUserEmail: (adresse_mail, callback ) =>{
        pool.query(
           'select * from  utilisateurs where adresse_mail = ? ',
            [adresse_mail],
            (error, results, fields)=>{
              if(error){
                callback(error);
              }
              return callback(null, results[0]);
            }
        );



    }
};


