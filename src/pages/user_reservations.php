<?php

    include "./header_footer/header.php";

?>
<?php

include "./database/db_connect.php";

if ( isset($_SESSION["user_id"]) ) {

  $sql = "SELECT * FROM users WHERE user_id = {$_SESSION['user_id']}";

  $result = $conn->query($sql);

  $user = $result->fetch_assoc();
  $user_id = $_SESSION["user_id"];
  $sql = "SELECT * FROM USER_RESERVATIONS WHERE user_id = '$user_id' ORDER BY TIME_STAMP asc;";

  $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php if( isset($user) ): ?>
<div class="m-9">
  <div class="px-4 sm:px-0">
    <h3 class="text-base font-semibold leading-7 text-gray-900">Reservation Details</h3>
  </div>
<?php 
if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
  echo "<div class='inline-flex mr-8 mt-6 max-w-sm rounded overflow-hidden shadow-lg  border-t border-gray-100'>
    <dl class='divide-y px-6 py-4 divide-gray-100'>
      <div class='px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0'>
        <dt class='text-sm font-medium leading-6 text-gray-900'>Fullname</dt>
        <dd class='mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0'>".$row["fullname"]."</dd> <!-- Name Field -->
      </div>
      <div class='px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0'>
        <dt class='text-sm font-medium leading-6 text-gray-900'>Number of persons:</dt>
        <dd class='mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0'>".$row["no_of_persons"]."</dd> <!-- Number of persons -->
      </div>
      <div class='px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0'>
        <dt class='text-sm font-medium leading-6 text-gray-900'>Date:</dt>
        <dd class='mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0'>".$row["date_of_reservation"]."</dd> <!-- Date filed -->
      </div>
      <div class='px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0'>
        <dt class='text-sm font-medium leading-6 text-gray-900'>Time:</dt>
        <dd class='mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0'>". $row["time_of_reservation_start"]. " - " . $row["time_of_reservation_end"]."</dd> <!-- Time -->
      </div>
    </dl>
  </div>";
  }
} else {
    echo "0 results";
}

$conn->close();
  ?>
</div>
<?php else: ?>
  <main class="grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
  <div class="text-center">
    <p class="text-4xl font-semibold text-indigo-600">Nothing to show</p>
    <p class="mt-4 text-2xl font-bold tracking-tight text-gray-900 sm:text-2xl">Please login first!</p>
    <div class="mt-10 flex items-center justify-center gap-x-6">
      <a href="user_login.php" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</a> 
    </div>
  </div>
</main>
<?php endif; ?>
</body>
</html>

<?php

    include "./header_footer/footer.php";

?>