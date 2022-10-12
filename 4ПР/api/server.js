const mysql = require("mysql2");
const express = require("express");
var cors = require("cors");
var bodyParser = require("body-parser");

const app = express();

const pool = mysql.createPool({
  host: "db",
  user: "root",
  database: "RSCHIR3",
  password: "1",
});

app.use(cors());
app.use(bodyParser.json());

app.get("/brand", function (req, res) {
  pool.query("SELECT * FROM brand", function (err, data) {
    res.json(data);
  });
});

app.get("/brand/:id", function (req, res) {
  const id = req.params.id;
  const query = "SELECT * FROM brand WHERE id=" + id;
  pool.query(query, function (err, data) {
    if (err) res.json(err);
    else res.json(data);
  });
});

app.post("/brand", function (req, res) {
  const name = req.body.name;
  const logo = req.body.logo;

  pool.query(
    "INSERT INTO brand (name, logo) VALUES (?, ?)",
    [name, logo],
    function (err, data) {
      if (!err) {
        res.json("Success!");
      } else {
        res.json(err);
      }
    }
  );
});

app.put("/brand/:id", function (req, res) {
  const id = req.params.id;
  const newName = req.body.name;
  const newLogo = req.body.logo;
  if (!newName && !newLogo) {
    return res.json("[]");
  }
  let query = "UPDATE brand SET";
  if (newName) {
    query += " name='" + newName + "'";
    if (newLogo) query += ",";
  }
  if (newLogo) {
    query += " logo='" + newLogo + "'";
  }
  query += " WHERE id=" + id;
  console.log(query);
  pool.query(query, function (err, data) {
    if (err) res.json(err);
    else res.json("Success!");
  });
});

app.delete("/brand", function (req, res) {
  pool.query("DELETE FROM brand", function (err) {
    if (err) res.json(err);
    else res.json("Success!");
  });
});

app.delete("/brand/:id", function (req, res) {
  const id = req.params.id;
  const query = "DELETE FROM brand WHERE id=" + id;
  pool.query(query, function (err, data) {
    if (err) res.json(err);
    else res.json(query);
  });
});

app.get("/car", function (req, res) {
  pool.query("SELECT * FROM car", function (err, data) {
    res.json(data);
  });
});

app.get("/car/:id", function (req, res) {
  const id = req.params.id;
  const query = "SELECT * FROM car WHERE id=" + id;
  pool.query(query, function (err, data) {
    if (err) res.json(err);
    else res.json(data);
  });
});

app.post("/car", function (req, res) {
  const name = req.body.name;
  const image = req.body.image;
  const brandId = req.body.brandId;

  pool.query(
    "INSERT INTO car (name, image, brandId) VALUES (?, ?, ?)",
    [name, image, brandId],
    function (err, data) {
      if (!err) {
        res.json("Success!");
      } else {
        res.json(err);
      }
    }
  );
});

app.put("/car/:id", function (req, res) {
  const id = req.params.id;
  const newName = req.body.name;
  const newImage = req.body.image;
  if (!newName && !newImage) {
    return res.json("[]");
  }
  let query = "UPDATE car SET";
  if (newName) {
    query += " name='" + newName + "'";
    if (newImage) query += ",";
  }
  if (newImage) {
    query += " image='" + newImage + "'";
  }
  query += " WHERE id=" + id;
  pool.query(query, function (err, data) {
    if (err) res.json(err);
    else res.json("Success!");
  });
});

app.delete("/car", function (req, res) {
  pool.query("DELETE FROM car", function (err) {
    if (err) res.json(err);
    else res.json("Success!");
  });
});

app.delete("/car/:id", function (req, res) {
  const id = req.params.id;
  const query = "DELETE FROM car WHERE id=" + id;
  pool.query(query, function (err, data) {
    if (err) res.json(err);
    else res.json(query);
  });
});

app.listen(3000, "0.0.0.0", function () {
  console.log("Server is waiting for connection...");
});
