<?php
ob_start();
class DosenController
{
    private $dosenDao;
    private $roleDao;

    public function __construct()
    {
        $this->dosenDao = new DosenDaoImpl();
        $this->roleDao = new RoleDaoImpl();
    }

    public function tampilDosen()
    {
        /* fungsi delete dosen */
        $deleteApproved = filter_input(INPUT_GET, 'delcomDosen');
        // var_dump($deleteApproved);
        if(isset($deleteApproved)&&$deleteApproved==1){
            $deletedId = filter_input(INPUT_GET,'didDosen');
            $result = $this->dosenDao->deleteDosen($deletedId);
        }
        $dosen = $this->dosenDao->fetchAllDosen();
        include_once 'view/dosen-view.php';
    }

    public function index(){
        $dosenDao = new DosenDaoImpl();
        $loginPressed = filter_input(INPUT_POST,'btnLogin');
        if (isset($loginPressed)){
            $nik = filter_input(INPUT_POST, 'txtNIK');
            $password = filter_input(INPUT_POST, 'txtPassword');
//            print_r($password);
            $md5Password = md5($password);
            $result = $dosenDao->dosenLogin($nik, $md5Password);
            // print_r($result);
            if(isset($result) && $result != null && $result[0]['nik'] == $nik){
                $_SESSION['web_is_logged'] = true;
                $_SESSION['web_full_name'] = $result[0]['nama_dosen'];
                $_SESSION['web_nik'] = $result[0]['nik'];
                $_SESSION['web_role'] = $result[0]['role_id_role'];
                header('location:index.php');
            }
            else{
                echo'<div class="bg-error">Invalid nik or password</div>';
            }
        }
        include_once 'view/login-view.php';
    }

    public function register(){
        $buttonPressed = filter_input(INPUT_POST,'btnAddDosen');
        if(isset($buttonPressed)){
            $nikDosen = filter_input(INPUT_POST,'nikDosen');
            $namaDosen = filter_input(INPUT_POST,'namaDosen');
            $emailDosen = filter_input(INPUT_POST,'emailDosen');
            $passwordDosen = filter_input(INPUT_POST, 'passwordDosen');
            $roleDosen = filter_input(INPUT_POST, 'role');

            $trimmedNik = trim($nikDosen);
            $trimmedNama = trim($namaDosen);
            $trimmedEmail = trim($emailDosen);
            $trimmedPassword = trim($passwordDosen);

            $trimmedPasswordMD5 = md5($trimmedPassword);
            $trimmedRole = trim(substr($roleDosen, 0, 1));
            var_dump($trimmedRole);

            $dosen = new Dosen();
            $dosen->setNik($trimmedNik);
            $dosen->setNamaDosen($trimmedNama);
            $dosen->setEmail($trimmedEmail);
            $dosen->setPassword($trimmedPasswordMD5);
            $dosen->getRole()->setIdRole($trimmedRole);

            $result = $this->dosenDao->saveDosen($dosen);
            if(isset($result) && $result != null){
                $_SESSION['web_is_logged'] = true;
                $_SESSION['web_full_name'] = $trimmedNama;
                $_SESSION['web_nik'] = $trimmedNik;
                $_SESSION['web_role'] = $trimmedRole;
                header('location:index.php');
            }
            else{
                echo'<div class="bg-error">Invalid nik or password</div>';
            }
        }
        $dosen = $this->dosenDao->fetchAllDosen();
        $role = $this->roleDao->fetchAllRole();
        include_once 'view/register-view.php';
    }

    public function addDosen(){
        $buttonPressed = filter_input(INPUT_POST,'btnAddDosen');
        if(isset($buttonPressed)){
            $nikDosen = filter_input(INPUT_POST,'nikDosen');
            $namaDosen = filter_input(INPUT_POST,'namaDosen');
            $emailDosen = filter_input(INPUT_POST,'emailDosen');
            $roleDosen = filter_input(INPUT_POST, 'role');

            $trimmedNik = trim($nikDosen);
            $trimmedNama = trim($namaDosen);
            $trimmedEmail = trim($emailDosen);
            $trimmedRole = trim(substr($roleDosen, 0, 1));
            var_dump($trimmedRole);

            $dosen = new Dosen();
            $dosen->setNik($trimmedNik);
            $dosen->setNamaDosen($trimmedNama);
            $dosen->setEmail($trimmedEmail);
            $dosen->getRole()->setIdRole($trimmedRole);

            $result = $this->dosenDao->saveDosen($dosen);
        }
        $dosen = $this->dosenDao->fetchAllDosen();
        $role = $this->roleDao->fetchAllRole();
        include_once 'view/dosen-form-view.php';
    }

    public function updateDosen(){
        $editedId = filter_input(INPUT_GET,'eidDosen');
        if(isset($editedId) && $editedId != ''){
            $dosen = $this->dosenDao->fetchDosenByNik($editedId);
        }
        $buttonPressed = filter_input(INPUT_POST,'btnUpdateDosen');
        if(isset($buttonPressed)){
            $namaDosen = filter_input(INPUT_POST,'namaDosen');
            $emailDosen = filter_input(INPUT_POST,'emailDosen');
            $roleDosen = filter_input(INPUT_POST, 'role');

            $updatedDosen = new Dosen();
            $updatedDosen->setNik($dosen->getNik());
            $updatedDosen->setNamaDosen($namaDosen);
            $updatedDosen->setEmail($emailDosen);
            $updatedDosen->getRole()->setIdRole(substr($roleDosen, 0, 1));
            $result = $this->dosenDao->updateDosen($updatedDosen);

            if ($result){
                header('location:index.php?webmenu=dosen');
            }
            else{
                echo '<div class="bg-error">Failed to update</div>';
            }
        }
        $role = $this->roleDao->fetchAllRole();
        include_once 'view/update-dosen-view.php';
    }
}