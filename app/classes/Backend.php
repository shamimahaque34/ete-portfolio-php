<?php
namespace App\classes;
class Backend
{
    private $name;
    private $designation;
    private $description;
    private $imageName;
    private $directory;
    private $imageURL;
    private $file;
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
            $this->designation  = $data['designation'];
            $this->description  = $data['description'];
        }
        if ($file)
        {
            $this->file = $file;
        }
    }

    protected function getImageURL()
    {
        $this->imageName = $this->file['image']['name'];
        $this->directory = '../../backend/assets/images/'.$this->imageName;
        move_uploaded_file($this->file['image']['tmp_name'], $this->directory);
        return $this->directory;
    }

    public function save()
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {
            if (empty($this->file['image']['name']))
            {
                $this->imageURL = '';
            }
            else
            {
                $this->imageURL = $this->getImageURL();
            }

            $this->sql = "INSERT INTO `homes` (`name`, `designation`, `description`, `image`) VALUES ('$this->name', '$this->designation', '$this->description', '$this->imageURL')";
            if (mysqli_query($this->link, $this->sql))
            {
                return 'Home Info added successfully';
            }
            else
            {
                die('Query problem...'.mysqli_error($this->link));
            }
        }
    }

    public function getAllHomeInfo()
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {
            $this->sql = "SELECT * FROM `homes`";
            if (mysqli_query($this->link, $this->sql))
            {
                $this->queryResult = mysqli_query($this->link, $this->sql);
                $this->i = 0;
                while ($this->row = mysqli_fetch_assoc($this->queryResult))
                {
                    $this->data[$this->i]['id']    = $this->row['id'];
                    $this->data[$this->i]['name']  = $this->row['name'];
                    $this->data[$this->i]['designation'] = $this->row['designation'];
                    $this->data[$this->i]['description'] = $this->row['description'];
                    $this->data[$this->i]['image'] = $this->row['image'];
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

    public function getHomeInfoById($id)
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {
            $this->sql = "SELECT * FROM `homes` WHERE `id` = '$id'";
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
            if (empty($this->file['image']['name']))
            {
                $this->imageURL = $homeInfo['image'];
            }
            else
            {
                if (file_exists($homeInfo['image']))
                {
                    unlink($homeInfo['image']);
                }
                $this->imageURL = $this->getImageURL();
            }

            $this->sql = "UPDATE `homes` SET `name` = '$this->name', `designation` = '$this->designation',`description` = '$this->description', `image` = '$this->imageURL' WHERE `id` = '$homeInfo[id]'";
            if (mysqli_query($this->link, $this->sql))
            {
                session_start();
                $_SESSION['message'] = 'Home Info information updated';
                header('Location: action.php?status=manage-home');
            }
            else
            {
                die('Query problem...'.mysqli_error($this->link));
            }
        }
    }

    public function deleteHome($id)
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {
            $this->row = $this->getHomeInfoById($id);
            if (file_exists($this->row['image']))
            {
                unlink($this->row['image']);
            }
            $this->sql = "DELETE FROM `homes` WHERE `id` = '$id'";
            if (mysqli_query($this->link, $this->sql))
            {
                session_start();
                $_SESSION['message'] = 'Home info deleted successfully';
                header('Location: action.php?status=manage-home');
            }
            else
            {
                die('Query problem...'.mysqli_error($this->link));
            }
        }

    }
}
