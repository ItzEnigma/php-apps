const express = require("express");
const redis = require("redis");

const app = express();
const client = redis.createClient({
  host: "redis",
  port: 6379,
});

// Set the initial visits counter
client.set("visitsCounter", 0);

// Start the server
app.get("/", (req, res) => {
  client.get("visitsCounter", (err, visitsCounter) => {
    res.send("Visits: " + visitsCounter);
    client.set("visitsCounter", parseInt(visitsCounter) + 1);
  });
});

// Listen on port 8080
app.listen(8080, () => {
  console.log("Server is running on port 8080");
});
