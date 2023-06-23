const { createLogement, getLogement, getLogementByLogementID, updateLogement, deleteLogement } =require("./logement.controller");

const router = require("express").Router();

router.post("/", createLogement);
router.get("/", getLogement);
router.get("/:id_logement", getLogementByLogementID);
router.patch("/", updateLogement);
router.delete("/", deleteLogement);


module.exports = router;