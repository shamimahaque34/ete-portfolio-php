<?php
namespace App\classes;
class Front
{
    public function index()
    {
        header('Location: frontend/pages/action.php?status=portfolio');
    }
}