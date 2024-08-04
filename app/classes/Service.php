<?php
namespace App\classes;
class Service
{
    private $icon;
    private $title;
    private $description;
    private $link;
    private $sql;
    private $queryResult;
    private $row;
    private $data = [];
    private $i;

    public function __construct($data = null, $file = null)
    {
        if ($data)
        {
            $this->icon         = $data['icon'];
            $this->title        = $data['title'];
            $this->description  = $data['description'];
        }
        
    }

    public function save()
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {

            $this->sql = "INSERT INTO `services` (`icon`, `title`, `description`) VALUES ('$this->icon', '$this->title', '$this->description')";
            if (mysqli_query($this->link, $this->sql))
            {
                return 'Service Info added successfully';
            }
            else
            {
                die('Query problem...'.mysqli_error($this->link));
            }
        }
    }

    public function getAllServiceInfo()
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {
            $this->sql = "SELECT * FROM `services`";
            if (mysqli_query($this->link, $this->sql))
            {
                $this->queryResult = mysqli_query($this->link, $this->sql);
                $this->i = 0;
                while ($this->row = mysqli_fetch_assoc($this->queryResult))
                {
                    $this->data[$this->i]['id']          = $this->row['id'];
                    $this->data[$this->i]['icon']        = $this->row['icon'];
                    $this->data[$this->i]['title']       = $this->row['title'];
                    $this->data[$this->i]['description'] = $this->row['description'];
                    $this->i++;
                }
                return $this->data;
            }
            else
            {
                die('Query problem...'.mysqli_error($this->link));
            }
        }
    }

    public function getServiceInfoById($id)
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {
            $this->sql = "SELECT * FROM `services` WHERE `id` = '$id'";
            if (mysqli_query($this->link, $this->sql))
            {
                $this->queryResult = mysqli_query($this->link, $this->sql);
                return mysqli_fetch_assoc($this->queryResult);
            }
            else
            {
                die('Query problem...'.mysqli_error($this->link));
            }
        }
    }

    public function updateHomeInfo($homeInfo)
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {

            $this->sql = "UPDATE `sevices` SET `icon` = '$this->icon', `title` = '$this->title',`description` = '$this->description', WHERE `id` = '$homeInfo[id]'";
            if (mysqli_query($this->link, $this->sql))
            {
                session_start();
                $_SESSION['message'] = 'Service Info information updated';
                header('Location: action.php?status=manage-ervice');
            }
            else
            {
                die('Query problem...'.mysqli_error($this->link));
            }
        }
    }

    public function deleteService($id)
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {
            $this->row = $this->getServiceInfoById($id);
            $this->sql = "DELETE FROM `services` WHERE `id` = '$id'";
            if (mysqli_query($this->link, $this->sql))
            {
                session_start();
                $_SESSION['message'] = 'Service info deleted successfully';
                header('Location: action.php?status=manage-service');
            }
            else
            {
                die('Query problem...'.mysqli_error($this->link));
            }
        }

    }
}