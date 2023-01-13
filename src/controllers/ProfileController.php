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
        $user = $this->userRepository->getUser($email);
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
        $userProfile = new UserProfile("profile_picture.svg","Imie","Nazwisko",null,null,null,null,5);
        $this->userRepository->addUser($user);
        $this->userRepository->addUserData($userProfile);
        return $this->render('login',['messages'=> ['Użytkownik zarejestrowany pomyślnie']]);
    }

    public function setUserData(){
        if(!$this->isPost()){
            return $this->render('profile');
        }
        $fileName = "profile_picture.svg";
        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])){
            move_uploaded_file($_FILES['file']['tmp_name'],dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']);
            $fileName = $_FILES['file']['name'];
        }
        if(!is_null($this->userRepository->getUserData(1))){
            $updateProfile = $this->userRepository->getUserData(1);//ciasteczko
            $updateProfile->setImage($fileName);
            $updateProfile->setName($_POST['name']);
            $updateProfile->setSurname($_POST['surname']);
            $updateProfile->setSex($_POST['sex']);
            $updateProfile->setBirthDate($_POST['birthday']);
            $updateProfile->setHeight($_POST['height']);
            $updateProfile->setWeight($_POST['weight']);
            $updateProfile->setIDUser(1);
            $this->userRepository->updateUserData(1,$updateProfile);
        } //ZAMIAST 1 BEDZIE ID Z CIASTECZKA
        else {
            $userProfile = new UserProfile($fileName, $_POST['name'], $_POST['surname'], $_POST['sex'], $_POST['birthday']
                , $_POST['height'], $_POST['weight'], 1);
            $this->userRepository->addUserData($userProfile);
        }
        return $this->profile();
    }
    public function profile(){
        $userData = $this->userRepository->getUserData(1); // TU tez ciasteczko
        return $this->render('profile',['userData'=>$userData]);
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