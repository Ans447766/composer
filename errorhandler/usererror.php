<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
    body{
        background-color: red;
        color: white;
        font-family: 'Courier New', Courier, monospace;
    }
    a{
        color: white;
        padding:5px 10px;
        transition:0.4s;
    }
    a:hover{
        background-color:white;
        color:red;
        border-radius:5px;
        padding:5px 10px;
        transition:0.4s;
    }
    </style>
    <title>ERROR</title>
</head>
<body>
<center>
    <h1>SOME THING WENT WRONG <br> CONTACT THE DEVELOPER</h1>
    <p>
        PHONE : 87687686 <br>
        email : ihih@some.com
    </p>
    <br><br>
    <hr>
    <h1>OR</h1>
    <hr>
    <br><br>
    <p>
    <h3>GO BACK AND RETRY</h3>
    <b><a href="http://localhost/MyWorks/ERPv1/">GO BACK TO RETRY</a></b>
    </p>
    <p>
    <?php
        echo $_GET['error'];
    ?>
    </p>
</center>
</body>
</html>