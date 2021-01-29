var mysql = require('mysql');

var con = mysql.createConnection({
  host: "127.0.0.1",
  user: "root",
  password: "",
  database: "react"
});

con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
  /*Create a table named "customers":*/
  var sql = "CREATE TABLE form (questions VARCHAR(255))";
  con.query(sql, function (err, result) {
    if (err) throw err;
    console.log("Table created");
  });
});