<?php
class Profile extends Controller
{

    public function __construct()
    {
        if (!$_SESSION['kkAuth']) {
            Flasher::setFlash('Access forbidden', 'danger');
            header('Location: ' . BASEURL);
            die;
        }
    }

    public function index()
    {
        $this->view('admin/templates/header');
        $this->view('admin/profile/profile', '', $this->model('User_model')->readByUsername($this->sanitizeString($_SESSION['kkUsername'])));
        $this->view('admin/templates/footer');
    }

    public function save()
    {
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';
        // die;
        $id = $this->sanitizeInt($_POST['id']);
        $fullName = $this->sanitizeString($_POST['full-name']);
        $password = $this->sanitizeString($_POST['password']);
        $repeatPassword = $this->sanitizeString($_POST['repeat-password']);
        if ($password === $repeatPassword) {
            $data = [
                'name' => $fullName
            ];
            if ($password != '' && $repeatPassword != '') {
                $data['password'] = md5($password);
            }
            $update = $this->model('User_model')->update($data, $id);
            if ($update) {
                Flasher::setFlash('Your profile is updated', 'success');
                $_SESSION['kkName'] = $fullName;
            } else {
                Flasher::setFlash('Failed to update your profile', 'danger');
            }
            if ($password == '') {
                header('Location: ' . BASEURL . 'profile');
            } else {
                header('Location: ' . BASEURL . 'login/logout');
            }
        } else {
            Flasher::setFlash('Password and repeat password do not match', 'danger');
            header('Location: ' . BASEURL . 'profile');
        }
    }
}
