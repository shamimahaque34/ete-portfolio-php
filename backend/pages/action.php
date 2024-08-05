<?php
require_once '../../vendor/autoload.php';
use App\classes\Backend;
use App\classes\Auth;
use App\classes\About;
use App\classes\Service;
use App\classes\Portfolio;
use App\classes\Contact;
use App\classes\SkillCategory;
use App\classes\Skill;
use App\classes\SocialIcon;

if (isset($_POST['homeBtn']))
{
    $home = new Backend($_POST, $_FILES);
    $message = $home->save();
    include 'home/add.php';
}

else if (isset($_POST['aboutBtn']))
{
    $about = new About($_POST, $_FILES);
    $message = $about->save();
    include 'about/add.php';
}


else if (isset($_POST['serviceBtn']))
{
    $service = new Service($_POST, $_FILES);
    $message = $service->save();
    include 'service/add.php';
}

else if (isset($_POST['portfolioBtn']))
{
    $portfolio = new Portfolio($_POST, $_FILES);
    $message = $portfolio->save();
    include 'portfolio/add.php';
}

else if (isset($_POST['contactBtn']))
{
    $contact = new Contact($_POST, $_FILES);
    $message = $contact->save();
    include 'contact/add.php';
}

else if (isset($_POST['skillCategoryBtn']))
{
    $skillCategory = new SkillCategory($_POST, $_FILES);
    $message = $skillCategory->save();
    include 'skill-category/add.php';
}

else if (isset($_POST['skillBtn']))
{
    $skill = new Skill($_POST, $_FILES);
    $message = $skill->save();
    include 'skill/add.php';
}

else if (isset($_POST['socialIconBtn']))
{
    $socialIcon = new SocialIcon($_POST, $_FILES);
    $message = $socialIcon->save();
    include 'social-icon/add.php';
}

else if (isset($_GET['status'])){
 if ($_GET['status'] == 'index')
    {
        include 'home/index.php';
    }

    else if ($_GET['status'] == 'logout')
    {
        $auth = new Auth();
        $auth->logout();
    }

 else if ($_GET['status'] == 'add-home')
    {
        include 'home/add.php';
    }

    else if ($_GET['status'] == 'add-about')
    {
        include 'about/add.php';
    }
    else if ($_GET['status'] == 'add-service')
    {
        include 'service/add.php';
    }
    else if ($_GET['status'] == 'add-portfolio')
    {
        include 'portfolio/add.php';
    }
    else if ($_GET['status'] == 'add-contact')
    {
        include 'contact/add.php';
    }
    else if ($_GET['status'] == 'add-skill-category')
    {
        include 'skill-category/add.php';
    }
    else if ($_GET['status'] == 'add-skill')
    {
        include 'skill/add.php';
    }
    else if ($_GET['status'] == 'add-social-icon')
    {
        include 'social-icon/add.php';
    }

   else if ($_GET['status'] == 'manage-home')
    {   $home = new Backend();
        $homes = $home->getAllHomeInfo();
        include 'home/manage.php';
    }

    else if ($_GET['status'] == 'manage-about')
    {   $about = new About();
        $abouts = $about->getAllAboutInfo();
        include 'about/manage.php';
    }

    else if ($_GET['status'] == 'manage-service')
    {   $service = new Service();
        $services = $service->getAllServiceInfo();
        include 'service/manage.php';
    }

    else if ($_GET['status'] == 'manage-portfolio')
    {   $portfolio = new Portfolio();
        // $portfolios = $portfolio->getAllPortfolioInfo();
        include 'portfolio/manage.php';
    }

    else if ($_GET['status'] == 'manage-contact')
    {   $contact = new Contact();
        $contacts = $contact->getAllContactInfo();
        include 'contact/manage.php';
    }

    else if ($_GET['status'] == 'manage-skill-category')
    {   $skillCategory = new SkillCategory();
        $skillCategories = $skillCategory->getAllSkillCategoryInfo();
        include 'skill-category/manage.php';
    }

    else if ($_GET['status'] == 'manage-skill')
    {   $skill = new Skill();
        $skills = $skill->getAllSkillInfo();
        include 'skill/manage.php';
    }

    else if ($_GET['status'] == 'manage-social-icon')
    {   $socialIcon = new SocialIcon();
        $socialIcons = $socialIcon->getAllSocialIconInfo();
        include 'social-icon/manage.php';
    }

    else if ($_GET['status'] == 'edit-home')
    {
        $id = $_GET['id'];
        $home = new Backend();
        $homeInfo = $home->getHomeInfoById($id);
        extract($homeInfo);
        include 'home/edit.php';
    }

    else if ($_GET['status'] == 'edit-about')
    {
        $id = $_GET['id'];
        $about= new About();
        $aboutInfo = $about->getAboutInfoById($id);
        extract($aboutInfo);
        include 'about/edit.php';
    }
    else if ($_GET['status'] == 'edit-service')
    {
        $id = $_GET['id'];
        $service = new Service();
        $serviceInfo = $service->getServiceInfoById($id);
        extract($serviceInfo);
        include 'service/edit.php';
    }
    else if ($_GET['status'] == 'edit-portfolio')
    {
        $id = $_GET['id'];
        $portfolio = new Portfolio();
        // $portfolioInfo = $portfolio->getPortfolioInfoById($id);
        // extract($portfolioInfo);
        include 'portfolio/edit.php';
    }
    else if ($_GET['status'] == 'edit-contact')
    {
        $id = $_GET['id'];
        $contact = new Contact();
        $contactInfo = $contact->getContactInfoById($id);
        extract($contactInfo);
        include 'contact/edit.php';
    }
    else if ($_GET['status'] == 'edit-skill-category')
    {
        $id = $_GET['id'];
        $skillCategory = new SkillCategory();
        $skillCategoryInfo = $skillCategory->getSkillCategoryInfoById($id);
        extract($skillCategoryInfo);
        include 'skill-category/edit.php';
    }
    else if ($_GET['status'] == 'edit-skill')
    {
        $id = $_GET['id'];
        $skill = new Skill();
        $skillInfo = $skill->getSkillInfoById($id);
        extract($skillInfo);
        include 'skill/edit.php';
    }
    else if ($_GET['status'] == 'edit-social-icon')
    {
        $id = $_GET['id'];
        $socialIcon = new SocialIcon();
        $socialIconInfo = $socialIcon->getSocialIconInfoById($id);
        extract($socialIconInfo);
        include 'social-icon/edit.php';
    }
    else if ($_GET['status'] == 'delete-home')
    {
        $id = $_GET['id'];
        $home = new Backend();
        $home->deleteHome($id);
    }

    else if ($_GET['status'] == 'delete-about')
    {
        $id = $_GET['id'];
        $about = new About();
        $about->deleteAbout($id);
    }

    else if ($_GET['status'] == 'delete-service')
    {
        $id = $_GET['id'];
        $service = new Service();
        $service->deleteService($id);
    }

    else if ($_GET['status'] == 'delete-portfolio')
    {
        $id = $_GET['id'];
        $portfolio = new Portfolio();
        // $portfolio->deletePortfolio($id);
    }

    else if ($_GET['status'] == 'delete-contact')
    {
        $id = $_GET['id'];
        $contact = new Contact();
        $contact->deleteContact($id);
    }

    else if ($_GET['status'] == 'delete-skill-category')
    {
        $id = $_GET['id'];
        $skillCategory = new SkillCategory();
        $skillCategory->deleteSkillCategory($id);
    }

    else if ($_GET['status'] == 'delete-skill')
    {
        $id = $_GET['id'];
        $skill = new Skill();
        $skill->deleteSkill($id);
    }

    else if ($_GET['status'] == 'delete-social-icon')
    {
        $id = $_GET['id'];
        $socialIcon = new SocialIcon();
        $socialIcon->deleteSocialIcon($id);
    }


}

    else if (isset($_POST['updateBtn']))
{


    $id = $_POST['id'];
    $home = new Backend($_POST, $_FILES);
    $homeInfo = $home->getHomeInfoById($id);
    $home->updateHomeInfo($homeInfo);
}


else if (isset($_POST['updateAboutBtn']))
{


    $id = $_POST['id'];
    $about = new About($_POST, $_FILES);
    $aboutInfo = $about->getAboutInfoById($id);
    $about->updateAboutInfo($aboutInfo);
}

else if (isset($_POST['updateSkillBtn']))
{


    $id = $_POST['id'];
    $skill = new Skill($_POST, $_FILES);
    $skillInfo = $skill->getSkillInfoById($id);
    $skill->updateSkillInfo($skillInfo);
}

else if (isset($_POST['updatePortfolioBtn']))
{


    $id = $_POST['id'];
    $portfolio = new Portfolio($_POST, $_FILES);
    // $portfolioInfo = $portfolio->getPortfolioInfoById($id);
    // $portfolio->updateportfolioInfo($portfolioInfo);
}

else if (isset($_POST['updateContactBtn']))
{


    $id = $_POST['id'];
    $contact = new Contact($_POST, $_FILES);
    $contactInfo = $contact->getContactInfoById($id);
    $contact->updateContactInfo($contactInfo);
}

else if (isset($_POST['updateSkillCategoryBtn']))
{


    $id = $_POST['id'];
    $skillCategory = new SkillCategory($_POST, $_FILES);
    $skillCategoryInfo = $skillCategory->getSkillCategoryInfoById($id);
    $skillCategory->updateSkillCategoryInfo($skillCategoryInfo);
}

else if (isset($_POST['updateSkillBtn']))
{


    $id = $_POST['id'];
    $skill = new Skill($_POST, $_FILES);
    $skillInfo = $skill->getSkillInfoById($id);
    $skill->updateSkillInfo($skillInfo);
}

else if (isset($_POST['updateSocialIconBtn']))
{


    $id = $_POST['id'];
    $socialIcon = new SocialIcon($_POST, $_FILES);
    $socialIconInfo = $socialIcon->getSocialIconInfoById($id);
    $socialIcon->updateSocialIconInfo($socialIconInfo);
}