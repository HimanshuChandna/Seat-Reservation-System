<?php

    include "./header_footer/header.php";

?>
<?php

// session_start();
// include "./database/db_connect.php";

// if ( isset($_SESSION["res_id"]) ) {

//   // $mysqli = require __DIR__ . "/dbConfig.php";

//   $sql = "SELECT * FROM RESTAURANT WHERE res_id = {$_SESSION['res_id']}";

//   $result = $conn->query($sql);

//   $user = $result->fetch_assoc();

// }

?>
<?php
// require "../database/db_connect.php";
// session_start();

$sql = "SELECT * FROM USER_RESERVATIONS";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?php
if($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    echo"<div class='max-w-sm rounded overflow-hidden shadow-lg m-9'>
  <div class='px-6 py-4'>
    <div class='font-bold text-xl mb-2'>".$row["date_of_reservation"]."(".$row["time_of_reservation_start"]."-".$row["time_of_reservation_end"].")</div>
    <p class='text-gray-700 text-base'>
      Name: ".$row["fullname"]."
    </p>
    <p class='text-gray-700 text-base'>
      Email: ".$row["email"]."
    </p>
    <p class='text-gray-700 text-base'>
      Mobile: ".$row["mobile"]."
    </p>
    <p class='text-gray-700 text-base'>
      Persons: ".$row["no_of_persons"]."
    </p>
  </div>
  <div class='px-6 pt-4 pb-2'>
    <span class='inline-block bg-green-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2'><button><a>Accept</a></button></span>
    <span class='inline-block bg-red-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2'><button><a>Cancel</a></button></span>
  </div>
</div>";
  }
}
else{
  echo "0 results";
}
$conn -> close();
?>
</body>
</html>
<?php

    include "./header_footer/footer.php";

?>