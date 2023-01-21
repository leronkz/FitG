<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/UserProfile.php';
require_once __DIR__.'/../repository/UserRepository.php';

class ProfileController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png','image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function hashPassword(string $password): string{
        $hash = password_hash($password,PASSWORD_BCRYPT);
        return $hash;
    }

    public function isEmailUsed($email): bool{
        $user = $this->userRepository->getUserByEmail($email);
        if(is_null($user)){
            return false;
        }
        return true;
    }

    public function createUser(){
        if(!$this->isPost()){
            return $this->render('register');
        }

        if($this->isEmailUsed($_POST['email'])){
            return $this->render('register',['messages'=>["Podany adres email jest juz zajęty"]]);
        }

        $hashed_password = $this->hashPassword($_POST['password']);
        $user = new User($_POST['email'],$hashed_password);
        $this->userRepository->addUser($user);
        $user = $this->userRepository->getUserByEmail($_POST['email']);
        $userProfile = new UserProfile("profile_picture.svg",null,null,null,null,null,null,$user->getIDUser());
        $this->userRepository->addUserData($userProfile);
        return $this->render('login',['messages'=> ['Użytkownik zarejestrowany pomyślnie']]);
    }

    public function setUserData(){
        $ID_user = $_COOKIE["ID_user"];
        if(!$this->isPost()){
            return $this->render('profile');
        }
        if(!is_null($this->userRepository->getUserData($ID_user))){
            $updateProfile = $this->userRepository->getUserData($ID_user);
            $fileName = $updateProfile->getImage();
            if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])){
                move_uploaded_file($_FILES['file']['tmp_name'],dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']);
                $fileName = $_FILES['file']['name'];
            }
            if($updateProfile->getImage() !== $fileName && $fileName !== "profile_picture.svg"){
                if($updateProfile->getImage() !== "profile_picture.svg") {
                    $file_to_delete = dirname(__DIR__) . self::UPLOAD_DIRECTORY . $updateProfile->getImage();
                    unlink($file_to_delete);
                }
            }
            $updateProfile->setImage($fileName);
            if(!isset($_POST['name']))
                $updateProfile->setName($updateProfile->getName());
            else
                $updateProfile->setName($_POST['name']);
            if(!isset($_POST['surname']))
                $updateProfile->setSurname($updateProfile->getSurname());
            else
                $updateProfile->setSurname($_POST['surname']);
            if(!isset($_POST['sex']))
                $updateProfile->setSex($updateProfile->getSex());
            else
                $updateProfile->setSex($_POST['sex']);
            if(!isset($_POST['birthday']) || $_POST['birthday']=="")
                $updateProfile->setBirthDate($updateProfile->getBirthDate());
            else
                $updateProfile->setBirthDate($_POST['birthday']);
            if(!isset($_POST['height']) || $_POST['height']=="")
                $updateProfile->setHeight($updateProfile->getHeight());
            else
                $updateProfile->setHeight($_POST['height']);
            if(!isset($_POST['weight']) || $_POST['weight']=="")
                $updateProfile->setWeight($updateProfile->getWeight());
            else
                $updateProfile->setWeight($_POST['weight']);

            $updateProfile->setIDUser($ID_user);
            $this->userRepository->updateUserData($ID_user,$updateProfile);
        }
        return $this->profile();
    }

    public function updatePassword(){
        $ID_user = $_COOKIE["ID_user"];
        if(!$this->isPost()){
            return $this->render("settings");
        }
        $user = $this->userRepository->getUserByID($ID_user);

        $current_password = $user->getPassword();
        $old_password = $_POST['current-password'];
        $new_password = $_POST['new-password'];
        if(!password_verify($old_password,$current_password)){
            return $this->render('settings',['messages'=>['Podałeś niepoprawne obecne hasło']]);
        }
        $this->userRepository->updateUserPassword($ID_user,$this->hashPassword($new_password));
        return $this->render('settings',['messages'=>['Hasło zostało pomyślnie zmienione']]);
    }

    public function profile(){
        try {
            if(!isset($_COOKIE['ID_user'])){
                throw new Exception("No user");
            }
            $ID_user = $_COOKIE['ID_user'];
            $userData = $this->userRepository->getUserData($ID_user);
            return $this->render('profile', ['userData' => $userData]);
        }catch(Exception $ex){
            return $this->render('login',['messages'=>['Aby przejść dalej musisz się zalogować']]);
        }
    }

    public function loadData(){
        header('Content-type: application/json');
        http_response_code(200);
        echo json_encode($this->userRepository->getUserData($_COOKIE["ID_user"]));
    }

    public function getRole(){
        header('Content-type: application/json');
        http_response_code(200);
        echo json_encode($this->userRepository->getUserRoleByID($_COOKIE["ID_user"]));
    }

    public function getUsers(){
        header('Content-type: application/json');
        http_response_code(200);
        $users = $this->userRepository->getAllUsers();
        echo json_encode($users);
    }

    public function toDelete(){
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if($contentType==="application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);
            $this->userRepository->deleteUser($decoded['email']);
        }
    }
    public function admin(){
        try{
            if(!isset($_COOKIE['ID_user'])){
                throw new Exception("No user");
            }
            if($this->userRepository->getUserRoleByID($_COOKIE['ID_user'])['role']!=="admin"){
                return $this->render('main',['messages'=>['Nie posiadasz uprawnień aby przejść na te stronę']]);
            }
            else {
                $users = $this->userRepository->getAllUsers();
                return $this->render('admin', ['users' => $users]);
            }
        }catch(Exception $ex){
            return $this->render('login',['messages'=>['Aby przejść dalej musisz się zalogować']]);
        }
    }
    private function validate(array $file) : bool
    {
        if($file['size']>self::MAX_FILE_SIZE){
            $this->messages[]="File is too large";
            return false;
        }
        if(!isset($file['type']) && !in_array($file['type'],self::SUPPORTED_TYPES)){
            $this->messages[]="File type is not supported";
            return false;
        }
        return true;
    }
}