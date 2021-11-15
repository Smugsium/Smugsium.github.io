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


.carousel-caption {
position: absolute;
left:0;
width:100%;
}

.carousel-caption h5 {
  font-size :6vw;
}

.carousel-caption p {
  font-size :2vw;
}


svg {
  display:block;
  margin:auto;
  margin-top:15px;
}

h1 {
  text-align:center;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 7px;
  justify-content: center;
  border: none;
  cursor: pointer;
  width:200px;
  border-radius:10px;
  border: solid #037c50 4px;
  font-weight:bold;

}

button:hover {
  opacity: 0.8;
}

</style>

</head>
<body style="background-color:white;">

  <div class="container-fluid">
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

    <div class="row justify-content-center" style="padding:20px;">
      <div class="container" style="text-align:center;">
        <h1>BOOKINGS</h1>
        <p1>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
          incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
          exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p1>
        </br>
        </br>
        <button type="button" onclick="location.href='ReservationForm.php'">Book a Room</button>
      </div>
    </div>


    <?php

    date_default_timezone_set('Asia/Singapore');
    $today = date("Y-m-d");

    $conn = mysqli_connect("localhost","root","","bedandbreakfast");
    if($conn-> connect_error){
      die("Connection Failed:" . $conn-> connect_error);


      }
      $sql = "SELECT * FROM  rooms";
      $result = $conn-> query($sql);



      if ($result-> num_rows > 0) {
        while ($row = $result-> fetch_assoc()){
          $roomID = $row["RoomID"];
          echo '<hr class="solid">';
          echo '<div class="row" style="padding-top:20px;background-color:white;">';
          echo '<div class="col-md-4">';

          echo '<img src="images/' . $roomID . '.jpg" width="100%" height="auto" class="img-rounded img-repsonsive" style="border:solid grey 8px;min-width:50%;max-width:100%;margin-top:25px;margin-bottom:25px;">';
          echo '</div>';
          echo '<div class="col-md-8">';
          echo '<h1>ROOM ' . $roomID . '</h1>';
          echo '<p>' . $row["RoomDesc"] . '</p>';
          echo '<p style="text-align:center;">Rate: Php' . $row["RoomPrice"] . '.00/day</p>';
          echo '<p style="text-align:center;">Reservation Status: ';

          $sql2 = "SELECT * FROM activebooking WHERE RoomID = '$roomID' AND (CheckIn <= '$today' AND CheckOut >= '$today')";
          $result2 = $conn-> query($sql2);


          if (!empty($result) && $result-> num_rows > 0 && $row2 = $result2-> fetch_assoc()) {
            echo '<p style="font-weight:bold;text-align:center;color:red;">BOOKED UNTIL' . $row2["CheckOut"] . '</p>';
          } else {
            echo '<p style="font-weight:bold;text-align:center;color:green;">AVAILABLE</p>';
          }

          echo '</p>';
          echo '</div>';
          echo '</div>';
        }

    }
    ?>



  <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<hr class="solid">

    <!-- FOOTER -->
    <footer class="container">
      <p  class="float-start">&copy; 2022 Company, Inc.</p>
    </footer>

</body>


</html>
