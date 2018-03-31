const express = require('express');

const app = express();
const port = process.env.PORT || 5000;

//example of get request on backend
app.get('/api/hello', (req, res) => {
  res.json({message: "hello"});
});


//Example of post request on backend
app.post('/api/hello', (req, res) => {
    res.json({message: "hello"});
});

app.listen(port, () => console.log(`Listening on port ${port}`));