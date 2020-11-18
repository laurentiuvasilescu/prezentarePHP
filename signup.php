
<!DOCTYPE html>
<html>
<style>

body {
  background-image: url(booksBG.jpg);
}

input[type=text], select {
  width: 40%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=password], select {
  width: 40%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 10%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 50px;
  cursor: pointer;
}



input[type=submit]:hover {
  background-color: #45a049;
}

div {
  width: 50%;
  border-radius: 25px;
  background-color: rgb(220,220,220);   
  padding: 20px;
}


.center {
  position: center;
  margin: auto;
  top: 50%;
  left: 50%;
  width: 800px;
  height: 600px;
  margin:0 auto;
  border: 3px solid #73AD21;
  padding: 10px;
}


</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light" >
  <a class="navbar-brand" href="#">Biblioteca</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      <form method="get" action="signin.php">
      <button  type="submit"  class="btn btn-outline-success">Log-in</button>
      </form>
      </li>
      
      <li class="nav-item">
      <form method="get" action="http://vasilescu-laurentiu.infinityfreeapp.com/biblioteca/detalii.html?i=1">
        <button type="submit" class="btn btn-outline-info">Details</button>
      </form>
      </li>
    </ul>
  </div>
</nav>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<body>
<br><br><br><br><br><br><br>
<div class="center">
    <br><br><br><br><br>
  <form align="center " method="POST" action="signup.php">

    
    <label  for="fname">Name* :</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">
    <br>
    <label for="lname">Surname* :</label>
    <input type="text" id="lname" name="lastname" placeholder="Your surname..">
    <br>

    <label for="email">Email* :</label>
    <input type="text" id="email" name="email" placeholder="Your email..">
    <br>
    <label for="password">Password* :</label>
    <input type="password" id="password" name="password" placeholder="Your password..">
    <br>
    <button  type="submit" class="btn btn-success">Register</button>
  </form>
</div>
<br>  

</body>
</html>

<?php

function validateString($string){
  $ok=1;
  for($i=0; $i<strlen($string);$i++){
    if(is_numeric($string[$i]))
      {
        $ok=0;
      break;
      }
    }
  if($ok==1)
    return TRUE;  
  else return FALSE;

}


function validatePassword($Password){
  if(strlen($Password)>5)
    return TRUE;
  else return FALSE;
}

$nume=$_POST['firstname'];
$prenume=$_POST['lastname'];
$email=$_POST['email'];
$parola=$_POST['password'];
$rol='Administrator';


$link = mysqli_connect('127.0.0.1','root','', 'biblioteca');



if(!$link){
        echo "Error: Unable to connect to MySQL";
        exit;
}
if ($nume=='' || $prenume=='' || $parola=='' || $email=='')
  echo '<div class="alert alert-danger" role="alert">Empty fields</div>';

else if(validateString($nume)==FALSE)
    echo '<div class="alert alert-danger" role="alert">Field: Name contain numbers</div>';

else if(validateString($prenume)==FALSE)
    echo '<div class="alert alert-danger" role="alert">Field: Surname contain numbers</div>';

else if(validatePassword($parola)==FALSE)
    echo '<div class="alert alert-danger" role="alert">Password too short</div>';

else if(validateString($nume)==TRUE && validateString($prenume)==TRUE && validatePassword($parola)==TRUE){

    $parola=password_hash($_POST['password'], PASSWORD_BCRYPT);
    $query="INSERT INTO useri (nume,prenume,email,parola,rol) VALUES('$nume','$prenume','$email','$parola','$rol')";
    $link -> query($query);
    echo '<div class="alert alert-success" role="alert">'.$nume.' '.$prenume.' '.'you have successfully registered</div>';
}   

mysqli_close($link);

?>