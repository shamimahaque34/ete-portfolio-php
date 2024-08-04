<?php
namespace App\classes;
class Skill
{   
    private $skill_category_id;
    private $name;
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
            $this->skill_category_id  = $data['skill_category_id'];
            $this->name               = $data['name'];
        }
    }

    public function save()
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {
            $this->sql = "INSERT INTO `skills` (,`skill_category_id`,`name`) VALUES ('$this->skill_category_id','$this->name')";
            if (mysqli_query($this->link, $this->sql))
            {
                return 'Skill Info added successfully';
            }
            else
            {
                die('Query problem...'.mysqli_error($this->link));
            }
        }
    }

    public function getAllSkillInfo()
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {
            $this->sql = "SELECT * FROM `skills`";
            if (mysqli_query($this->link, $this->sql))
            {
                $this->queryResult = mysqli_query($this->link, $this->sql);
                $this->i = 0;
                while ($this->row = mysqli_fetch_assoc($this->queryResult))
                {
                    $this->data[$this->i]['id']                = $this->row['id'];
                    $this->data[$this->i]['skill_category_id'] = $this->row['skill_category_id'];
                    $this->data[$this->i]['name']  = $this->row['name'];
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

    public function getSkillInfoById($id)
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {
            $this->sql = "SELECT * FROM `skills` WHERE `id` = '$id'";
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

    public function updateSkillInfo($homeInfo)
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {

            $this->sql = "UPDATE `skills` SET `skill_category_id` = '$this->skill_category_id, `name` = '$this->name' WHERE `id` = '$homeInfo[id]'";
            if (mysqli_query($this->link, $this->sql))
            {
                session_start();
                $_SESSION['message'] = 'Skill Info information updated';
                header('Location: action.php?status=manage-skill');
            }
            else
            {
                die('Query problem...'.mysqli_error($this->link));
            }
        }
    }

    public function deleteSkill($id)
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'ete_portfolio_php');
        if ($this->link)
        {
            $this->row = $this->getSkillInfoById($id);
            $this->sql = "DELETE FROM `skills` WHERE `id` = '$id'";
            if (mysqli_query($this->link, $this->sql))
            {
                session_start();
                $_SESSION['message'] = 'Skill info deleted successfully';
                header('Location: action.php?status=manage-skill');
            }
            else
            {
                die('Query problem...'.mysqli_error($this->link));
            }
        }

    }
}