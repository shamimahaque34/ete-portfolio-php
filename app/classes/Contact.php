<?php
namespace App\classes;
class Contact
{
    private $phone;
    private $email;
    private $address;
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
            $this->email   = $data['email'];
            $this->phone   = $data['phone'];
            $this->address = $data['address'];
        }
       
    }

    

    public function save()
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {

            $this->sql = "INSERT INTO `cintacts` (`email`, `phone`, `address`) VALUES ('$this->email', '$this->phone', '$this->address')";
            if (mysqli_query($this->link, $this->sql))
            {
                return 'Contact Info added successfully';
            }
            else
            {
                die('Query problem...'.mysqli_error($this->link));
            }
        }
    }

    public function getAllContactInfo()
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {
            $this->sql = "SELECT * FROM `contacts`";
            if (mysqli_query($this->link, $this->sql))
            {
                $this->queryResult = mysqli_query($this->link, $this->sql);
                $this->i = 0;
                while ($this->row = mysqli_fetch_assoc($this->queryResult))
                {
                    $this->data[$this->i]['id']    = $this->row['id'];
                    $this->data[$this->i]['email']  = $this->row['email'];
                    $this->data[$this->i]['phone'] = $this->row['phone'];
                    $this->data[$this->i]['address'] = $this->row['address'];
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

    public function getContactInfoById($id)
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {
            $this->sql = "SELECT * FROM `contacts` WHERE `id` = '$id'";
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

    public function updateContactInfo($homeInfo)
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {

            $this->sql = "UPDATE `contacts` SET `email` = '$this->email', `phone` = '$this->phone',`address` = '$this->address',  WHERE `id` = '$homeInfo[id]'";
            if (mysqli_query($this->link, $this->sql))
            {
                session_start();
                $_SESSION['message'] = 'Contact Info information updated';
                header('Location: action.php?status=manage-contact');
            }
            else
            {
                die('Query problem...'.mysqli_error($this->link));
            }
        }
    }

    public function deleteContact($id)
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {
            $this->row = $this->getContactInfoById($id);
           
            $this->sql = "DELETE FROM `contacts` WHERE `id` = '$id'";
            if (mysqli_query($this->link, $this->sql))
            {
                session_start();
                $_SESSION['message'] = 'Contact info deleted successfully';
                header('Location: action.php?status=manage-contact');
            }
            else
            {
                die('Query problem...'.mysqli_error($this->link));
            }
        }

    }
}