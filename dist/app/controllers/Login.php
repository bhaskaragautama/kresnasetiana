<?php
class Login extends Controller
{
   public function doLogin()
   {
      $pin = $this->sanitizeString($_POST["pin"]);
      $login = $this->model("Users_model")->readByPin(md5($pin));
      if ($login) {
         $_SESSION["flow-auth"] = true;
         $_SESSION["flow-name"] = $login["name"];
         $_SESSION["token"] = $login["pinhash"];
         echo json_encode("1");
      } else {
         echo json_encode("0");
      }
   }

   public function logout()
   {
      session_destroy();
      header('Location: ' . BASEURL);
   }
}
