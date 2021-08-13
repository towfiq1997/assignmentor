const express = require("express");
const app = express();
app.get("/", (req, res) => {
  res.sendFile(__dirname + "/index.html");
});
const server = app.listen(5000, () => {
  console.log("Connectedd to server");
});
const io = require("socket.io")(server);
io.on("connection", (socket) => {
  socket.emit("hello", "world");
  socket.on("hi", (arg) => {
    console.log(arg);
  });
});
