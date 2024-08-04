<?php
namespace App\classes;
class About
{
    private $cv;
    private $cvName;
    private $directory;
    private $cvURL;
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
            $this->cv = $data['cv'];
            
        }
        if ($file)
        {
            $this->file = $file;
        }
    }

    protected function getCVURL()
    {
        $this->cvName = $this->file['cv']['name'];
        $this->directory = '../../backend/assets/images/'.$this->cvName;
        move_uploaded_file($this->file['cv']['tmp_name'], $this->directory);
        return $this->directory;
    }

    public function save()
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {
            if (empty($this->file['cv']['name']))
            {
                $this->cvURL = '';
            }
            else
            {
                $this->cvURL = $this->getCVURL();
            }

            $this->sql = "INSERT INTO `abouts` ( `cv`) VALUES ('$this->cvURL')";
            if (mysqli_query($this->link, $this->sql))
            {
                return 'About Info added successfully';
            }
            else
            {
                die('Query problem...'.mysqli_error($this->link));
            }
        }
    }

    public function getAllAboutInfo()
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {
            $this->sql = "SELECT * FROM `abouts`";
            if (mysqli_query($this->link, $this->sql))
            {
                $this->queryResult = mysqli_query($this->link, $this->sql);
                $this->i = 0;
                while ($this->row = mysqli_fetch_assoc($this->queryResult))
                {
                    $this->data[$this->i]['id']  = $this->row['id'];
                    $this->data[$this->i]['cv']  = $this->row['cv'];
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

    public function getAboutInfoById($id)
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {
            $this->sql = "SELECT * FROM `abouts` WHERE `id` = '$id'";
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

    public function updateAboutInfo($aboutInfo)
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {
            if (empty($this->file['cv']['name']))
            {
                $this->cvURL = $aboutInfo['cv'];
            }
            else
            {
                if (file_exists($aboutInfo['image']))
                {
                    unlink($aboutInfo['image']);
                }
                $this->cvURL = $this->getCVURL();
            }

            $this->sql = "UPDATE `abouts` SET  `cv` = '$this->cvURL' WHERE `id` = '$aboutInfo[id]'";
            if (mysqli_query($this->link, $this->sql))
            {
                session_start();
                $_SESSION['message'] = 'About Info information updated';
                header('Location: action.php?status=manage-about');
            }
            else
            {
                die('Query problem...'.mysqli_error($this->link));
            }
        }
    }

    public function deleteAbout($id)
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {
            $this->row = $this->getAboutInfoById($id);
            if (file_exists($this->row['cv']))
            {
                unlink($this->row['cv']);
            }
            $this->sql = "DELETE FROM `abouts` WHERE `id` = '$id'";
            if (mysqli_query($this->link, $this->sql))
            {
                session_start();
                $_SESSION['message'] = 'About info deleted successfully';
                header('Location: action.php?status=manage-about');
            }
            else
            {
                die('Query problem...'.mysqli_error($this->link));
            }
        }

    }
}