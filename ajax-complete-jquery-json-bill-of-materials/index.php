<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="process.php" method="post" id="my_form">
        <label>Name</label>
        <input type="text" name="name" /> <br>
        <label>Email</label>
        <input type="email" name="email" /><br>
        <label>Website</label>
        <input type="url" name="website" /><br>
        <input type="submit" name="submit" value="Submit Form" />
    <div id="server-results"><!-- For server results --></div>
    </form>

    <table class="table table-dark my-table" id="mytable">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
    
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
            </tr>
        </tfoot>
    </table>
    <div id="server-result"></div>
<script src="jquery.min.js"></script>
    <script>
    $("#my_form").submit(function (event){
event.preventDefault(); //prevent default action 
var post_url = $(this).attr("action");
var method = $(this).attr("method");
var Form_data = $(this).serialize(); 
$.ajax({
url:post_url,
type:method,
dataType: 'JSON',
data:Form_data 
}).done(function (response) {
    var len = response.length;

    for (var i = 0; i < len; i++) {
                     var id = response[i].id;
                var username = response[i].username;
                var name = response[i].name;
                var email = response[i].email;
                var tr_str = "<tr>" +
                    "<td align='center'>" + (i+1) + "</td>" +
                    "<td align='center'>" + name + "</td>" +
                    "<td align='center'>" + username + "</td>" +
                    "<td align='center'>" + email + "</td>" +
                    "</tr>";
                    $("#mytable tbody").append(tr_str);

    }
});

    });
    </script>
</body>
</html>