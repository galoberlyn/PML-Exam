<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Domino's Pizza</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
 <!--  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
 -->
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

</head>

<body>
  
@yield('home')

<main id="main">

@include('layouts.messages')

@yield('orders')

</main>
  <!-- JavaScript Libraries -->
  <script src="js/jquery/jquery.min.js"></script>
  <script src="js/jquery/jquery-migrate.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/easing.min.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/counterup.min.js"></script>
  <script src="js/hoverIntent.js"></script>
  <script src="js/superfish.min.js"></script>

    <!-- Dev Scripts here -->
  <script>
  $('#error').modal({
      show: true
  });

  $('#success').modal({
      show: true
  });

  $('#exists').modal({
    show: true
  });
  </script>


  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
</body>
</html>
