<?php
require_once '../../vendor/autoload.php';
use App\classes\Auth;
use App\classes\Backend;
if ($_GET['status'] == 'index')
    {   $home = new Backend();
        $homes = $home->getAllHomeInfo();
        include 'home.php';
    }


    else if (isset($_GET['status'])){

     if($_GET['status'] == 'about'){

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



}



    else if (isset($_POST['loginBtn']))
{
    $auth = new Auth($_POST);
    $message = $auth->login();
    include 'login.php';
}