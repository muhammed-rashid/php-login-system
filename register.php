<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rgister</title>
</head>
<body>
<h2>REGISTER</h2>

<form method = 'POST' action = 'server.php'>
<label for="user_name">user name</label><br>
    <input type="text" name = "user_name" placeholder = "user name"><br>
    <label for="email">email</label><br>
    <input type="email" name = "email" placeholder = "email adress"><br>
    <label for="password">password</label><br>
    <input type="password" name = "password_1" placeholder = "password"><br>
    <label for="confirm_password">confirm password</label><br>
    <input type="password" name = "password_2" placeholder = "password"><br>
    <button type="submit" name = 'register'>REGISTER</button>
    </form>
   
</body>
</html>