const { createPresta, getPresta, getPrestaByPrestaID, updatePresta, deletePresta } =require("./presta.controller");

const router = require("express").Router();

router.post("/", createPresta);
router.get("/",  getPresta);
router.get("/:id_service", getPrestaByPrestaID);
router.patch("/", updatePresta);
router.delete("/", deletePresta);


module.exports = router;