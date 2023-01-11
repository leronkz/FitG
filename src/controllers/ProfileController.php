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
    private $profileImage;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->profileImage = new UserProfile();
    }

    public function changePicture(){
        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])){
            move_uploaded_file($_FILES['file']['tmp_name'],dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']);
        }
        $this->profileImage->setImage($_FILES['file']['name']);
//        return $this->render('profile');
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

    public function setUserData(){
        if(!$this->isPost()){
            return $this->render('profile');
        }
        $userProfile = new UserProfile();
        $userProfile->setName($_POST['name']);
        $userProfile->setSurname($_POST['surname']);
        $userProfile->setSex($_POST['sex']);
        $userProfile->setBirthDate($_POST['birthday']);
        $userProfile->setHeight($_POST['height']);
        $userProfile->setWeight($_POST['weight']);
        $userProfile->setImage($this->profileImage->getImage());
        $this->userRepository->addUserData($userProfile);
        $this->render('profile');
    }
    public function profile(){
        $image = $this->profileImage->getImage();
        $this->render('profile',['image'=>$image]);
    }
}