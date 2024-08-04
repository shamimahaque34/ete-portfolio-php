<?php
require_once '../../vendor/autoload.php';
use App\classes\Backend;

if (isset($_POST['homeBtn']))
{
    $home = new Backend($_POST, $_FILES);
    $message = $home->save();
    include 'home/add.php';
}
else if (isset($_GET['status'])){
 if ($_GET['status'] == 'index')
    {
        include 'home/index.php';
    }

 else if ($_GET['status'] == 'add-home')
    {
        include 'home/add.php';
    }

   else if ($_GET['status'] == 'manage-home')
    {   $home = new Backend();
        $homes = $home->getAllHomeInfo();
        include 'home/manage.php';
    }

    else if ($_GET['status'] == 'edit-home')
    {
        $id = $_GET['id'];
        $home = new Backend();
        $homeInfo = $home->getHomeInfoById($id);
        extract($homeInfo);
        include 'home/edit.php';
    }
    else if ($_GET['status'] == 'delete-home')
    {
        $id = $_GET['id'];
        $home = new Backend();
        $home->deleteHome($id);
    }

}

    else if (isset($_POST['updateBtn']))
{
//    echo '<pre>';
//    print_r($_POST);
//    print_r($_FILES);
//    echo '</pre>';
//
//    if (empty($_FILES['image']['name']))
//    {
//        echo 'Hello';
//    }
//    else
//    {
//        echo 'Hi';
//    }
//    exit();

    $id = $_POST['id'];
    $home = new Backend($_POST, $_FILES);
    $homeInfo = $home->getHomeInfoById($id);
    $home->updateHomeInfo($homeInfo);
}