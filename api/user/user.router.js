
const { createUser, getUser, getUserByUserID, updateUser, deleteUser } =require("./user.controller");

const router = require("express").Router();

router.post("/", createUser);
router.get("/", getUser);
router.get("/:id_utilisateur", getUserByUserID);
router.patch("/", updateUser);
router.delete("/", deleteUser);


module.exports = router;