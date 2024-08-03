<?php
require_once '../../vendor/autoload.php';
use App\classes\Auth;
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


    else if (isset($_POST['loginBtn']))
{
    $auth = new Auth($_POST);
    $message = $auth->login();
    include 'login.php';
}