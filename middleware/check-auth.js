const jwt = require("jsonwebtoken");

function checkAuth(req, res, next){
    try{
        const token = req.headers.authorization.split("")[1];
        const decodedToken = jwtverify(token, process.env.SECRET_KEY);
        req.userData = decodedToken;
        next();
    }catch(e){
        return res.status(401).json({
            "message": "Invalid or expired token provided!",
            'error': e
        });
        

    }
    
}

module.exports = {
    checkAuth: checkAuth
}