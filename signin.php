<!DOCTYPE html>
<html>
<nav class="navbar navbar-expand-lg navbar-light bg-light" >
  <a class="navbar-brand" href="#">Biblioteca</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
      <form method="get" action="signup.php">
      <button  type="submit" class="btn btn-outline-success">Sign-up</button>
      </form>
      </li>
      
      <li class="nav-item">
      <form method="get" action="https://getbootstrap.com/docs/4.5/components/forms/">
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
  width: 650px;
  height: 400px;
  margin:0 auto;
  border: 3px solid #73AD21;
  padding: 10px;
}


</style>
<body>
<br><br><br><br><br><br><br>
<div class="center">
    <br><br><br><br>
  <form align="center " method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
    <label for="email">Email* :</label>
    <input type="text" id="email" name="email" placeholder="Your email..">
    <br>
    <label for="password">Password* :</label>
    <input type="password" id="password" name="password" placeholder="Your password..">
    <br><br>
    <button  type="submit" name="submit" id="submit"  class="btn btn-success">Log-in</button>
  </form>
</div>
  

</body>
<br><br><br> 
</html>




<?php 
$conn = mysqli_connect('127.0.0.1','root','', 'biblioteca');
if(isset($_POST['submit'])){
	$email = trim($_POST['email']);
	$password = trim($_POST['password']);
	
	$sql = "SELECT * from useri where email = '".$email."'";
	$rs = mysqli_query($conn,$sql);
	$numRows = mysqli_num_rows($rs);
	
	if($numRows  == 1){
    $row = mysqli_fetch_assoc($rs);
		if(strcmp(md5($password.'my encrypt password'),$row['parola'])==0){
      echo '<div class="alert alert-success" role="alert">'.'Password and email verified'.'</div>';
      
    
		}
		else{
			echo '<div class="alert alert-danger" role="alert">'.'Wrong password'.'</div>';
		}
	}
	else{
    echo '<div class="alert alert-danger" role="alert">'.'No user found'.'</div>';
	}
}
