<?php
require_once '../../vendor/autoload.php';
if ($_GET['status'] == 'index')
    {
        include 'home/index.php';
    }

 else if ($_GET['status'] == 'add-home')
    {
        include 'home/add.php';
    }

   else if ($_GET['status'] == 'manage-home')
    {
        include 'home/manage.php';
    }