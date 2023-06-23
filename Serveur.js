require("dotenv").config();

const https = require('https');
const fs = require('fs');
//const d3 = require('d3');
const express = require("express");
const ejs = require("ejs");
const bodyParser = require('body-parser');
const cors = require('cors');
const cookieParser = require('cookie-parser');
const paypal = require("paypal-rest-sdk");
const { Server } = require('http');

const apiRouter = require('./apiRouter');
//const userRouter = require('./api/user/user');
const swaggerJsdoc = require("swagger-jsdoc");
const swaggerUi = require("swagger-ui-express");
/* paypal.configure({
    "mode": "sandbox",
    "client_id": 'ASoOUCFD4K0FL_PNlRiA87CrUr7Fc9fDlGpb6mNUgk_YH-yWOhHiIamMccnmvYZu6W-9ahI2i9EpvWLi',
    'client_secret': 'ED7vf2HhutPwm3ukWq-1S76i_-vJN1lZbQup1MRDUTAIy7VY7JAl99VNe-dG_rAUzpUlEl3OaSH4l_F1'
    
}); */
const app = express();

// const userRouter = require("./api/user/user.router");
/* 
// Middleware pour gérer les requêtes HTTP
app.use((req, res, next) => {
    res.setHeader('Content-Type', 'text/plain');
    res.send('This is an HTTPS server');
  });
  
  // Configuration du serveur HTTPS
  const options = {
    key: fs.readFileSync('path/to/private.key'),
    cert: fs.readFileSync('path/to/certificate.crt')
  };
  
  // Démarrage du serveur HTTPS
  https.createServer(options, app).listen(443, () => {
    console.log('Server started on port 443');
  }); */
app.use(express.json());
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

/** Swagger Initialization - START */
const swaggerSpec = swaggerJsdoc({
    swaggerDefinition: {
        openapi: "3.0.2",
        info: {
            title: "API STAGE",
            version: "1.0.0",
            description:
                "API documentation",
            servers: [`http://localhost:${process.env.APP_PORT || 3000}/`],
        },
        components: {
            securitySchemes: {
                jwt: {
                    type: "http",
                    scheme: "bearer",
                    in: "header",
                    bearerFormat: "JWT"
                },
            }
        }
        ,
        security: [{
            jwt: []
        }],
    },
    apis: ["Serveur.js", "./apiRouter.js"],
});
app.use("/api-docs", swaggerUi.serve, swaggerUi.setup(swaggerSpec));
/** Swagger Initialization - END */








    /**
     * @swagger
     * /apiRouter/register:
     *   post:
     *      description: Used to signup user
     *      tags:
     *          - user
     *      requestBody:
     *          required: true
     *          content:
     *             application/json:
     *                schema:
     *                    type: object
     *                    properties:
     *                        userName:
     *                          type: string
     *                          minLength: 1
     *                          maxLength: 50
     *                          example: firstname
     *                        role:
     *                          type: string
     *                          minLength: 1
     *                          maxLength: 50
     *                          example: employee
     *                        email:
     *                          type: string
     *                          minLength: 1
     *                          maxLength: 50
     *                          example: test@something.com
     *                        password:
     *                          type: string
     *                          minLength: 4
     *                          maxLength: 50
     *                          example: 123user5
     *      security:
     *	       - jwt: []
     *      responses:
     *          '200':
     *              description: Resource added successfully
     *          '500':
     *              description: Internal server error
     *          '400':
     *              description: Bad request
     */


     /**
      * @swagger
      * /apiRouter/login:
      *   post:
      *      description: Used to sign in user
      *      tags:
      *          - user
      *      requestBody:
      *          required: true
      *          content:
      *             application/json:
      *                schema:
      *                    type: object
      *                    properties:
      *                        :
      *                        userName:
     *                          type: string
     *                          minLength: 1
     *                          maxLength: 50
     *                          example: firstname
      *                        password:
      *                          type: string
      *                          minLength: 4
      *                          maxLength: 50
      *                          example: 123user5
      *      security:
      *	       - jwt: []
      *      responses:
      *          '200':
      *              description: Resource added successfully
      *          '500':
      *              description: Internal server error
      *          '400':
      *              description: Bad request
      */



      /**
       * @swagger
       * /apiRouter/user:
       *   get:
       *      security:
       *	       - jwt: []
       *      description: Used to access public content
       *      tags:
       *          - user
       *      responses:
       *          '200':
       *              description: Resource returned successfully
       *          '500':
       *              description: Internal server error
       *          '400':
       *              description: Bad request
       */


       

    /**
     * @swagger
     * /apiRouter/refreshtoken:
     *   post:
     *      description: Used to refresh token
     *      tags:
     *          - user
     *      requestBody:
     *          required: true
     *          content:
     *             application/json:
     *                schema:
     *                    type: object
     *                    properties:
     *                        refreshToken:
     *                          type: string
     *                          minLength: 1
     *                          maxLength: 100
     *      security:
     *	       - jwt: []
     *      responses:
     *          '200':
     *              description: Resource added successfully
     *          '500':
     *              description: Internal server error
     *          '400':
     *              description: Bad request
     */

app.use(cors());
app.use(cors({
    origin: 'http://localhost:3001',
    credentials: true
}));
 
apiRouter.use(cookieParser());

 

app.use('/apiRouter',apiRouter);
//app.use('/userRouter',userRouter);



// app.use("/api/user", userRouter);
//app.use("/api/reservation", reservationRouter);
//app.use("/api/logement", logementRouter);
//app.use("/api/service", serviceRouter);
//app.use("/api/comment", commentRouter);


app.use(express.static('public'));
//template engine
//app.engine('html', exphtml( {extname: 'html'}));
app.set('views', './views');
app.set('view engine', 'ejs');
app.use('/css', express.static(__dirname + 'public/css'))
app.use('/images', express.static(__dirname + 'public/images'))
app.use('/js', express.static(__dirname + 'public/js'))
app.use('/vendors', express.static(__dirname + 'public/vendors'))
// app.use('/product', express.static(__dirname + 'api/product'))






// app.get('', (req, res) => {
//     res.sendFile(__dirname + '/views/index.html')
// })

// page evenement
// app.get('/events.html', (req, res) => {
//     res.sendFile(__dirname + '/views/events.html')
// })
// // page principale
// app.get('/index.html', (req, res) => {
//     res.sendFile(__dirname + '/views/index.html')
// })
// // page des mentions legales
// app.get('/legalmentions.html', (req, res) => {
//     res.sendFile(__dirname + '/views/legalmentions.html')
// })

// // page de localisation
// app.get('/ourlocation.html', (req, res) => {
//     res.sendFile(__dirname + '/views/ourlocation.html')
// })

// // page de connexion
// app.get('/pagedeconnexion.html', (req, res) => {
//     res.sendFile(__dirname + '/views/pagedeconnexion.html')

// })
// // page de d'inscription
// app.get('/InscriptionPage.html', (req, res) => {
//     res.sendFile(__dirname + '/views/InscriptionPage.html')

// })


// // page events
// app.get('/events-single3.html', (req, res) => {
//     res.sendFile(__dirname + '/views/events-single3.html')

// })

// // page events
// app.get('/events-single2.html', (req, res) => {
//     res.sendFile(__dirname + '/views/events-single2.html')

// })

// // page events
// app.get('/events-single1.html', (req, res) => {
//     res.sendFile(__dirname + '/views/events-single1.html')

// })
// // page events
// app.get('/events-single.html', (req, res) => {
//     res.sendFile(__dirname + '/views/events-single.html')

// })


// lecture du port defini plus haut 8080
// app.listen(port, () => console.info('listening on port ${port}'))
app.use('/', require('./routes'));
app.listen(process.env.APP_PORT, () => {
 console.log('listening on port ${port}:', process.env.APP_PORT);
    
});

module.exports = app;