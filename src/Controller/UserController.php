<?php

namespace App\Controller;

use App\Entity\UserRegistration;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Controller\Responce;

class UserController extends AbstractController
{
  /**
   * @Route("",name="login")
   */

  public function loginPage(): Response
  {
    return $this->render('user/login.html.twig', [
      "error_message" => ""
    ]);
  }
  /**
   * @Route("/signup",name="signup")
   */
  public function index(): Response
  {
    return $this->render('user/signup.html.twig');
  }

  /**
   * @Route("/register",name="register")
   */
  public function signUp(Request $req, EntityManagerInterface $em): Response
  {
    $firstName = $req->get("firstName");
    $lastName = $req->get("lastName");
    $password = $req->get("password");
    $email = $req->get("email");
    $uploadedFile = $req->files->get("image");
    $bio = $req->get("bio");
    $gender = $req->get("gender");
    $test = new UserRegistration();
    $test->setFirstName($firstName);
    $test->setLastName($lastName);
    $test->setPassword($password);
    $test->setProfilePhoto("https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png");
    $test->setEmail($email);
    $test->setBio($bio);
    $test->setGender($gender);
    $data = $em->getRepository(UserRegistration::class)->findAll(["id" => 2]);
    $em->persist($test);
    $em->flush();
    return $this->render("user/login.html.twig");
  }

  /**
   * @Route("/home",name="homepage")
   */
  public function userLogin(Request $req, EntityManagerInterface $em): Response
  { 

    $userData = $em->getRepository(UserRegistration::class)->findOneBy([
      "email" => $req->get("email"),
      "password" => $req->get("password")
    ]);
    if (isset($_POST["login-btn"])) {
      $cookie_value = $req->get('email'); 
      //  print_r($cookie_value);
      setcookie("user", $cookie_value, time() + (86400 * 30), "/");
      if ($userData != NULL) {
        return $this->render("user/homepage.html.twig", [
          "userData" => $userData,
        ]);
      } else {
        return $this->render("user/login.html.twig", [
          "error_message" => "Invalid Credentials",
        ]);
      }
    }
  }
  /**
   * @Route("update",name="update_profile")
   */
  public function updateProfile(EntityManagerInterface $em):Response {
    // print_r($_COOKIE['user']);
    $userData = $em->getRepository(UserRegistration::class)->findOneBy(["email" => $_COOKIE["user"]]);
    return $this->render("user/update.html.twig",[
      "userval"=>$userData,
    ]);
  }
  
  /**
   * @Route("home",name="back_home")
   */
  public function getBack(){
    return $this->redirectToRoute('homepage');
  }
}
