var db = require('/database.js');

app.use(express.static('public'));
app.get('/eightball.htm', function (req, res) {
   res.sendFile( __dirname + "/" + "eight-ball.htm" );
})

app.get('/process_get', function (req, res) {
    // Prepare output in JSON format
    response = {
        question: req.query.question
    };
    query = db.query("insert query", [params]
        , (err, result) => {
            res.end(JSON.stringify(response));
        })

})