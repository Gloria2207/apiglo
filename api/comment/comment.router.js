const { createComment, getComment, getCommentByCommentID, updateComment, deleteComment } =require("./comment.controller");

const router = require("express").Router();

router.post("/", createComment);
router.get("/", getComment);
router.get("/:id_comment", getCommentByCommentID);
router.patch("/", updateComment);
router.delete("/", deleteComment);


module.exports = router;