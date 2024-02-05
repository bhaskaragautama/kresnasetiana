<?php
class Login extends Controller
{
   public function index() {
      $this->view('user/login/login');
   }

   public function doLogin()
   {
      // print_r($_POST);
      $username = $this->sanitizeString($_POST['username']);
      $password = $this->sanitizeString($_POST['password']);
      $login = $this->model('User_model')->readByUsernamePassword($username, $password);
      if($login) {
         $_SESSION['kkAuth'] = true;
         $_SESSION['kkName'] = $login['name'];
         $_SESSION['kkUsername'] = $login['username'];
         header('Location: ' . BASEURL . 'dashboard');
      } else {
         Flasher::setFlash('Username and password do not match', 'danger');
         header('Location: ' . BASEURL. 'login');
      }
   }

   public function logout()
   {
      session_destroy();
      header('Location: ' . BASEURL);
   }
}
