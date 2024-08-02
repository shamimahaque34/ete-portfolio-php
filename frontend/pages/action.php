<?php
if ($_GET['status'] == 'index')
    {
        include 'home.php';
    }

    else if($_GET['status'] == 'about'){

        include 'about.php';
    }

    else if($_GET['status'] == 'services'){

        include 'services.php';
    }

    else if($_GET['status'] == 'portfolio'){

        include 'portfolio.php';
    }

    else if($_GET['status'] == 'contact'){

        include 'contact.php';
    }