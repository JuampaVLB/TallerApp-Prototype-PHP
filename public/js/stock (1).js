const fs = require('fs');

//fs.writeFile('tools_id.json');
let rawdata = fs.readFileSync('tools_id.json');
let student = JSON.parse(rawdata);
console.log(student);