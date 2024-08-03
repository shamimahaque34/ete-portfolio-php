<?php
namespace App\classes;
class Front
{
    public function index()
    {
        header('Location: backend/pages/action.php?status=index');
    }
}