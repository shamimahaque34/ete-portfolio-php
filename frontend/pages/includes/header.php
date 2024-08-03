<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        html,body{
            width: 100%;
            height: 100%;
            margin: 0px;
            overflow-x: hidden;
        }
    </style>
    
    <!-- Required meta tags link Start Here -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Hello! I'm Shamima Haque. I'm a Web Developer">
    <meta name="author" content="Shamima Haque">
    <!-- Required meta tags link End Here -->

    <!-- Bootstrap CSS link  Start Here-->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- Bootstrap CSS link End Here -->
    
    <!--owl carousel css link Starts Here-->
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/css/owl.theme.min.css">
    <link rel="stylesheet" href="../assets/css/owl.transitions.min.css">
    <!--owl carousel css link Ends Here-->
    
    
    <!-- Fontawesome link Start Here   -->
    <link rel="stylesheet" href="../assets/css/fontawesome-all.min.css">
    <!-- Fontawesome link End Here   -->

    <!--    Favicon link Start Here-->
    <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon" />
    <!--    Favicon link End Here-->

    <!--Custom CSS link Start Here-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!--Custom CSS link End Here-->

    <title>Shamima Haque</title>
</head>

<body onload="myFunction()">

<!--Preloader Starts Here-->
<!-- <div id="loading"></div> -->
<!--Preloader Ends Here-->
      
<!--Header Starts Here-->
<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand logo" href="action.php?status=index">
        <img src="../assets/images/logo.png" alt="logo">
<!--       <h2>Shamima Haque</h2>-->
        </a>
        
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse menu" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item <?php if($activePage == "home"){echo"active";}?>">
        <a class="nav-link" href="action.php?status=index">Home</a>
      </li>
      <li class="nav-item <?php if($activePage == "about"){echo"active";}?>">
        <a class="nav-link" href="action.php?status=about">About</a>
      </li>
      <li class="nav-item <?php if($activePage == "services"){echo"active";}?>">
        <a class="nav-link" href="action.php?status=services">Services</a>
      </li>
       <li class="nav-item <?php if($activePage == "portfolio"){echo"active";}?>">
        <a class="nav-link" href="action.php?status=portfolio">Portfolio</a>
      </li>
       <li class="nav-item <?php if($activePage == "contact"){echo"active";}?>">
        <a class="nav-link" href="action.php?status=contact">Contact</a>
      </li>
      <li class="nav-item <?php if($activePage == "login"){echo"active";}?>">
        <a class="nav-link" href="login.php">Login</a>
      </li>
    </ul>
  </div>
</nav>
    </div>
</header>
<!--Header Ends Here-->   

