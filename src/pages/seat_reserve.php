<?php

    include "./header_footer/header.php";

?>
<?php

include "./database/db_connect.php";

if ( isset($_SESSION["user_id"]) ) {

  $sql = "SELECT * FROM users WHERE user_id = {$_SESSION['user_id']}";

  $result = $conn->query($sql);

  $user = $result->fetch_assoc();

}

if($_SERVER["REQUEST_METHOD"] === "POST"){

  $fullname = $_POST["fullname"];
  $mobile_number = $_POST["mobile-number"];
  $email = $_POST["email"];
  $no_of_persons = $_POST["persons"];
  $date = $_POST["date"];
  $time_start = $_POST["start_time"];
  $time_end = $_POST["end_time"];
  $timestamp = date('Y/m/d H:i:s', time());
  $user_id = $_SESSION["user_id"];

  $sql = "INSERT INTO USER_RESERVATIONS VALUES('$user_id','$fullname',
  '$mobile_number','$email','$no_of_persons','$date','$time_start','$time_end','$user_id','$timestamp')";

  if($conn->query($sql) === TRUE){
      

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php echo "<div class='ml-7'><p><b>Booking Created Successfully!</b></p></div>";
    }
    else{
        echo "Error".$sql."<br>".$conn->error;
    }

  };
?>
<?php if( isset($user) ): ?>
<form class="m-9" action="" method="POST">
  <div class="space-y-12">

    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base font-semibold leading-7 text-gray-900">Reservation Information</h2>
      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-3">
          <label for="fullname" class="block text-sm font-medium leading-6 text-gray-900">Fullname</label>
          <div class="mt-2">
            <input type="text" name="fullname" id="fullname" autocomplete="given-name" class="block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-3">
          <label for="mobile-number" class="block text-sm font-medium leading-6 text-gray-900">Mobile Number</label>
          <div class="mt-2">
            <input type="text" name="mobile-number" id="mobile-number" autocomplete="mobile-number" class="block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-3">
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
          <div class="mt-2">
            <input id="email" name="email" type="email" autocomplete="email" class="block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-3">
          <label for="persons" class="block text-sm px-2 font-medium leading-6 text-gray-900">Number of persons:</label>
          <div class="mt-2">
            <select id="persons" name="persons" autocomplete="country-name" class="block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
              <option>2</option>
              <option>4</option>
              <option>6</option>
            </select>
          </div>
        </div>

        <div class="sm:col-span-2 sm:col-start-1">
          <label for="date" class="block text-sm font-medium leading-6 text-gray-900">Date</label>
          <div class="mt-2">
            <input type="date" name="date" id="date" autocomplete="no" class="block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
        </div>

        <div class="sm:col-span-1 sm:col-start-1">
          <label for="time" class="block text-sm font-medium leading-6 text-gray-900">Time</label>
          <div class="inline-flex items-center">
          <div class="mt-2 inline-flex items-center mr-5">
            <label for="time" class="block text-sm font-medium leading-6 text-gray-900 mr-2">From: </label>
            <input type="time" name="start_time" id="time" autocomplete="no" class="block w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
          <div class="mt-2 inline-flex items-center">
            <label for="time" class="block text-sm font-medium leading-6 text-gray-900 mr-2">To: </label>
            <input type="time" name="end_time" id="time" autocomplete="no" class="box w-full px-2 rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  


  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit Request</button>  
    <button type="reset" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
  </div>
</form>
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