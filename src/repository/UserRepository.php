<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{
    public function getUser(string $email){

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email',$email,PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user==false){
            return null;
//            WYRZUCAC WYJATEK
        }

        return new User(
            $user['email'],
            $user['password']
        );
    }

    public function addUserData(UserProfile $profile){
        $stmt = $this->database->connect()->prepare('
        INSERT INTO public.users_data ("ID_user", sex, birth_date, height, weight, image, name, surname) 
        VALUES (?,?,?,?,?,?,?,?)');
        $ID_user = 1;
        $stmt->execute([
            $ID_user,
            $profile->getSex(),
            $profile->getBirthDate(),
            $profile->getHeight(),
            $profile->getWeight(),
            $profile->getImage(),
            $profile->getName(),
            $profile->getSurname()
        ]);
    }
    public function getUserData(int $ID_user){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users_data WHERE "ID_user" = :ID_user
        ');

        $stmt->bindParam(':ID_user', $ID_user, PDO::PARAM_INT);
        $stmt->execute();

        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if($userData == false) {
            return null;
        }
        return $userData['image'];
    }

}