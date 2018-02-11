let juice = require("juice");
let fsPath = require("fs-path");

juice.juiceFile('./src/email/table.html', {}, (err, html) => {
    console.log("E-mail template created");
    fsPath.writeFile('./dev/email/table.html', html);
});
