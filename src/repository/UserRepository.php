<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/UserProfile.php';

class UserRepository extends Repository
{

    public function getUserByEmail(string $email){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email',$email,PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($user==false){
            return null;
        }
        return new User(
            $user['email'],
            $user['password'],
            $user['ID_user']
        );
    }
    public function getUserByID(int $ID_user){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE "ID_user" = :ID_user
        ');
        $stmt->bindParam(':ID_user',$ID_user,PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user==false){
            return null;
        }
        return new User(
            $user['email'],
            $user['password'],
            $user['ID_user']
        );
    }
    public function addUser(User $user){
        $stmt = $this->database->connect()->prepare('
            INSERT INTO public.users (email, password) 
            VALUES (?, ?)
        ');
        $stmt->execute([
            $user->getEmail(),
            $user->getPassword()
        ]);
    }

    public function addUserData(UserProfile $profile){
        $stmt = $this->database->connect()->prepare('
        INSERT INTO public.users_data ("ID_user", sex, birth_date, height, weight, image, name, surname) 
        VALUES (?,?,?,?,?,?,?,?)');
        $stmt->execute([
            $profile->getIDUser(),
            $profile->getSex(),
            $profile->getBirthDate(),
            $profile->getHeight(),
            $profile->getWeight(),
            $profile->getImage(),
            $profile->getName(),
            $profile->getSurname()
        ]);
    }
    public function updateUserData(int $ID_user,UserProfile $profile){
        $stmt = $this->database->connect()->prepare('
        UPDATE public.users_data SET sex = :sex, birth_date=:date, height=:height, weight=:weight, image=:image, name=:name, surname=:surname
        WHERE "ID_user"=:ID_user
        ');
        $sex = $profile->getSex();
        $birth_date = $profile->getBirthDate();
        $height = $profile->getHeight();
        $weight = $profile->getWeight();
        $image = $profile->getImage();
        $name = $profile->getName();
        $surname = $profile->getSurname();
        $stmt->bindParam(':sex', $sex,PDO::PARAM_STR);
        $stmt->bindParam(':date', $birth_date,PDO::PARAM_STR);
        $stmt->bindParam(':height', $height,PDO::PARAM_STR);
        $stmt->bindParam(':weight', $weight,PDO::PARAM_STR);
        $stmt->bindParam(':image', $image,PDO::PARAM_STR);
        $stmt->bindParam(':name', $name,PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname,PDO::PARAM_STR);
        $stmt->bindParam(':ID_user', $ID_user,PDO::PARAM_INT);

        $stmt->execute();
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
        return new UserProfile(
            $userData['image'],
            $userData['name'],
            $userData['surname'],
            $userData['sex'],
            $userData['birth_date'],
            $userData['height'],
            $userData['weight'],
            $userData['ID_user']
        );
    }

    public function updateUserPassword(int $ID_user, string $password){
        $stmt = $this->database->connect()->prepare('
        UPDATE public.users SET password=:pass WHERE "ID_user"=:ID_user
        ');
        $stmt->bindParam(":pass",$password,PDO::PARAM_STR);
        $stmt->bindParam(":ID_user",$ID_user,PDO::PARAM_INT);
        $stmt->execute();
    }

    public function getUserRoleByID(int $ID_user){
        $stmt = $this->database->connect()->prepare('
        SELECT u."ID_user", r.role
        FROM public.users u
        LEFT OUTER JOIN public.roles ri on u."ID_user" = ri."ID_user"
        INNER JOIN public.roles_info r on r."ID_role" = ri."ID_role"
        WHERE u."ID_user"=:ID_user
        ');
        $stmt->bindParam(":ID_user",$ID_user,PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result == false)
            return null;
        return $result;
    }

    public function getAllUsers(){
        $stmt=$this->database->connect()->prepare('
        SELECT * FROM users WHERE email !=:email
        ');
        $admin = $this->getUserByID($_COOKIE['ID_user']);
        $email = $admin->getEmail();
        $stmt->bindParam(":email", $email,PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($users == false)
            return null;
        $result = [];
        foreach ($users as $user){
            $result[] = new User(
                $user['email'],
                "password"
            );
        }
        return $result;
    }

    public function deleteUser($email){
        $stmt= $this->database->connect()->prepare('
        DELETE FROM users WHERE email=:email
        ');
        $stmt->bindParam(":email",$email,PDO::PARAM_STR);
        $stmt->execute();
    }
}