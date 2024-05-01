<?php

session_start();
include "./database/db_connect.php";

if ( isset($_SESSION["user_id"]) ) {

  // $mysqli = require __DIR__ . "/dbConfig.php";

  $sql = "SELECT * FROM users WHERE user_id = {$_SESSION['user_id']}";

  $result = $conn->query($sql);

  $user = $result->fetch_assoc();

}
?>
<?php

// session_start();
include "./database/db_connect.php";

if ( isset($_SESSION["res_id"]) ) {

  // $mysqli = require __DIR__ . "/dbConfig.php";

  $sql = "SELECT * FROM RESTAURANT WHERE res_id = {$_SESSION['res_id']}";

  $result = $conn->query($sql);

  $user2 = $result->fetch_assoc();

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MealMate</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    
<header class="text-gray-600 body-font">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
      <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
      </svg> -->
      <span class="ml-3 text-xl">MealMate</span>
    </a>
    <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
      <a class="mr-5 hover:text-gray-900" href="index.php">Home</a>
      <a class="mr-5 hover:text-gray-900" href="seat_reserve.php">Seat Reservation</a>
      <a class="mr-5 hover:text-gray-900" href="user_reservations.php">Your Reservations</a>
      <?php  
        
        if ( isset($_SESSION["res_id"]) ) {

        // $mysqli = require __DIR__ . "/dbConfig.php";

        $sql = "SELECT * FROM RESTAURANT WHERE res_id = {$_SESSION['res_id']}";

        $result = $conn->query($sql);

        $res_user = $result->fetch_assoc();
        }
       if( isset($res_user) ):
        ?>
      <a class="mr-5 hover:text-gray-900" href="./authentication/client_logout.php">Restaurant Logout</a>
      <a class="mr-5 hover:text-gray-900" href="client_panel.php">Restaurant Panel</a>
        <?php elseif( !isset($res_user) ): ?>
      <a class="mr-5 hover:text-gray-900" href="client_login.php">Restaurant Login</a>
        <?php else: endif; ?>
    </nav>
    <?php if( isset($user) ): ?>
    <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0" ><a href="./authentication/user_logout.php">Logout</a>
      <!-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
        <path d="M5 12h14M12 5l7 7-7 7"></path>
      </svg> -->
    </button>
    <?php else: ?>
    <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0" ><a href="user_signup.php">Signup / Login</a>
      <!-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
        <path d="M5 12h14M12 5l7 7-7 7"></path>
      </svg> -->
    </button>
    <?php endif; ?>
  </div>
</header>

</body>
</html>