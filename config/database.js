// // est un endroit où les connexions sont stockées. 
// // Lorsque vous demandez une connexion à partir d'un pool, vous recevez une connexion qui n'est pas utilisée actuellement ou une nouvelle connexion.

const {createPool} = require("mysql");



const pool = createPool({
    port: process.env.DB_PORT,
    host: process.env.DB_HOST,
    user: process.env.DB_USER,
    pass:process.env.DB_PASS,
    database: process.env.MYSQL_DB,
    connectionLimit: 10

});

//create the User table
   
    /* pool.query('CREATE TABLE User (' +
          'id int(11) NOT NULL AUTO_INCREMENT,' +
          'user_name varchar(255) NOT NULL,' +
          'role varchar(255) default "user",' +
          'email varchar(255) NOT NULL,' +
          'password varchar(255) NOT NULL,' +
          'PRIMARY KEY (id),'+
          'UNIQUE KEY email_UNIQUE (email),' +
          'UNIQUE KEY password_UNIQUE (password))', function (err, result) {
              if (err) throw err;
              console.log("User created");
            }
         );
    
    */
    
let db = {}; //create an empty object you will use later to write  and export your queries. 

// ***Requests to the User table ***
 
db.allUser = () =>{
    return new Promise((resolve, reject)=>{
        pool.query('SELECT * FROM User ', (error, users)=>{
            if(error){
                return reject(error);
            }
            return resolve(users);
        });
    });
};
 
 
db.getUserByEmail = (email) =>{
    return new Promise((resolve, reject)=>{
        pool.query('SELECT * FROM User WHERE email = ?', [email], (error, users)=>{
            if(error){
                return reject(error);
            }
            return resolve(users[0]);
        });
    });
};

db.insertUser = (userName, email, password) =>{
    return new Promise((resolve, reject)=>{
        pool.query('INSERT INTO User (user_name, email, password) VALUES (?,  ?, ?)', [userName, email, password], (error, result)=>{
            if(error){
                return reject(error);
            }
             
              return resolve(result.insertId);
        });
    });
};
 
 
db.updateUser = (userName, role, email, password, id) =>{
    return new Promise((resolve, reject)=>{
        pool.query('UPDATE User SET user_name = ?, role= ?, email= ?, password=? WHERE id = ?', [userName, role, email, password, id], (error)=>{
            if(error){
                return reject(error);
            }
             
              return resolve();
        });
    });
};


db.deleteUser = (id) =>{
    return new Promise((resolve, reject)=>{
        pool.query('DELETE FROM User WHERE id = ?', [id], (error)=>{
            if(error){
                return reject(error);
            }
            return resolve(console.log("User deleted"));
        });
    });
};
 
 
module.exports = db
//module.exports = pool;


// // Dotenv est un module sans dépendance qui charge les variables d'environnement d'un fichier .env dans process.env.    
// module.exports = pool;

// module.exports= {
//     HOST: 'localhost',
//     USER: 'root',
//     PASSWORD:'',
//     DB: 'website_project',
//     dialect: 'mysql',

//     pool: {
//         max: 5,
//         min: 0,
//         acquire: 30000,
//         idle: 10000
//     }

// }