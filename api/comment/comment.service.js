const pool = require ("./config/database");



module.exports = {
    create: (data, callback) => {
        pool.query(
            'insert into  commentaires(date_post, id_client, id_utilisateur) values(?,?,?)',
            [
                data.date_post,
                data.id_client,
                data.id_utilisateur
                
            ],
            (error, results, fields)=>{
                if(error){
                    return callback(error);
                }
                return callback(null, results);
            }
        );
    
    },

    getComment: (id_commentaire, callback) =>{
        pool.query(
        'select id_commentaire, date_post, id_client, id_utilisateur from commentaires',
        [id_commentaire],
        (error, results, fields)=>{
            if(error){
              return  callback(error);
            }
            return callback(null, results);
        }
        );



    },

    getCommentByCommentID:(id_commentaire, callback ) =>{
        pool.query(
        'select id_commentaire, date_post, id_client, id_utilisateur from commentaires where id_commentaire = ? ',
        [id_commentaire],
        (error, results, fields)=>{
            if(error){
                callback(error);
            }
            return callback(null, results[0]);
        }
        );



    },

    updateComment: (data, callback) => {
        pool.query(
            'update commentaires set date_post=?, id_client=?, id_utilisateur=? where id_commentaire=?'[
                data.date_post,
                data.id_client,
                data.id_utilisateur
                
            ],
            (error, results, fields)=>{
                if(error){
                    callback(error);
                }
                return callback(null, results);
            }
            

        );

    },

    deleteComment: (data, callback) => {
        pool.query(
            'delete from commentaires where id_commentaire =?',
            [data.id_commentaire],
            (error, results, fields)=>{
                if(error){
                    callback(error);
                }
                return callback(null, results);
            }
            
        );
    }
};
