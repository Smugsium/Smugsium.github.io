<?php
  session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="ITF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap v5 = Alpha2</title>

  <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">
    <link href="bootstrap-5.1.1-dist/css/bootstrap.min.css" rel="stylesheet">


<style>

.navbar-brand {
  padding-left:25px;
  padding-right:25px;
}
.navbar-nav{
  padding-left:15px;
  padding-right:15px;

}


.nav-item{
  margin-left:15px;
}

svg {
  display:block;
  margin:auto;
  margin-top:15px;
}

h1 {
  text-align:center;
}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  display:inline-block;

}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}



</style>

</head>
<body style="background-color:white;">

  <div class="row">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Tenth navbar example">
      <div class="container-fluid">

        <a class="navbar-brand" href="#">[BNB LOGO HERE]</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample08">
          <ul class="navbar-nav ms-auto" style="margin-right:25px;">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="HomePage.html">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Accommodations.php">ACCOMMODATIONS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Gallery.html">GALLERY</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="AboutUs.html">ABOUT US</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="bnblogin.php">ADMIN LOGIN</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

    <div class="row">
      <img src="images/banner.jpg" class="img-fluid" alt="..." >
    </div>

    <div class="row" style="margin:auto;padding-top:20px;padding-bottom:20px;">
      <h2 style="text-align:center;">Admin Login</h2>

      <form action="http://localhost/Website_Proper/bnblogin.php" method="post">

        <div class="container">
          <label for="uname"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="uname" required>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" required>

          <button type="submit" name="login">Login</button>

        </div>

        <div class="container" style="background-color:#f1f1f1;text-align:center;">
          <button type="button" class="cancelbtn">Cancel</button>
        </div>
      </form>
    </div>

    <?php


      $conn = mysqli_connect("localhost","root","","bedandbreakfast");
      if($conn-> connect_error){
        die("Connection Failed:" . $conn-> connect_error);
      }

      if (isset($_POST['login'])) {

        $username = $_POST["uname"];
        $password = $_POST["psw"];

        $select = mysqli_query($conn, "SELECT * FROM admin WHERE Username = '$username' AND Password = '$password'");
        $row = mysqli_fetch_array($select);

        if(is_array($row)){
          $_SESSION["Username"] = $row["Username"];
          $_SESSION["Password"] = $row["Password"];
        } else{
          echo '<script type = "text/javascript">';
          echo 'alert("Invalid Username or Password")';
          echo '</script>';
        }
      }

      if (isset($_SESSION["Username"])) {
        echo '<script type = "text/javascript">';
        echo 'alert("Login Successful!")';
        header("Location:bnbindex.php");
        echo '</script>';


      }



     ?>

    <hr class="solid">

        <!-- FOOTER -->
        <footer class="container">
          <p  class="float-start">&copy; 2022 Company, Inc.</p>
        </footer>


  <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>




</body>


</html>
