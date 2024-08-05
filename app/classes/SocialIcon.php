<?php
namespace App\classes;
class SocialIcon
{
    private $name;
    private $link_address;
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
            $this->name         = $data['name'];
            $this->link_address  = $data['link_address'];
        }
    }
    public function save()
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {

            $this->sql = "INSERT INTO `social_icons` (`name`, `link_address`) VALUES ('$this->name', '$this->link_address')";
            if (mysqli_query($this->link, $this->sql))
            {
                return 'Social Icon Info added successfully';
            }
            else
            {
                die('Query problem...'.mysqli_error($this->link));
            }
        }
    }

    public function getAllSocialIconInfo()
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {
            $this->sql = "SELECT * FROM `social_icons`";
            if (mysqli_query($this->link, $this->sql))
            {
                $this->queryResult = mysqli_query($this->link, $this->sql);
                $this->i = 0;
                while ($this->row = mysqli_fetch_assoc($this->queryResult))
                {
                    $this->data[$this->i]['id']    = $this->row['id'];
                    $this->data[$this->i]['name']  = $this->row['name'];
                    $this->data[$this->i]['link_address'] = $this->row['link_address'];
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

    public function getSocialIconInfoById($id)
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {
            $this->sql = "SELECT * FROM `social_icons` WHERE `id` = '$id'";
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

    public function updateSocialIconInfo($homeInfo)
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {

            $this->sql = "UPDATE `social_icons` SET `name` = '$this->name', `link_address` = '$this->link_address' WHERE `id` = '$homeInfo[id]'";
            if (mysqli_query($this->link, $this->sql))
            {
                session_start();
                $_SESSION['message'] = 'Social Icon Info information updated';
                header('Location: action.php?status=manage-social-icon');
            }
            else
            {
                die('Query problem...'.mysqli_error($this->link));
            }
        }
    }

    public function deleteSocialIcon($id)
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {
            $this->row = $this->getSocialIconInfoById($id);
            $this->sql = "DELETE FROM `social_icons` WHERE `id` = '$id'";
            if (mysqli_query($this->link, $this->sql))
            {
                session_start();
                $_SESSION['message'] = 'Social Icon info deleted successfully';
                header('Location: action.php?status=manage-social-icon');
            }
            else
            {
                die('Query problem...'.mysqli_error($this->link));
            }
        }

    }
}