
const { createReservation, getReservation, getReservationByReservationID, updateReservation, deleteReservation } =require("./reservation.controller");

const router = require("express").Router();

router.post("/", createReservation);
router.get("/", getReservation);
router.get("/:id_reservation", getReservationByReservationID);
router.patch("/", updateReservation);
router.delete("/", deleteReservation);


module.exports = router;