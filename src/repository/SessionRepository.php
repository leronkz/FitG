<?php
require_once 'Repository.php';

class SessionRepository extends Repository
{
    public function addSession(int $ID_user){
           $stmt = $this->database->connect()->prepare('
           INSERT INTO public.sessions ("ID_user", login_time) 
           VALUES(?,?)
           ');

           $stmt->execute([
               $ID_user,
               date('Y-m-d H:i:s')
           ]);
    }

    public function updateSession(int $ID_user){
        $stmt = $this->database->connect()->prepare(' 
         UPDATE public.sessions SET logout_time=:time WHERE "ID_user"=:ID_user AND logout_time IS NULL
        ');
        $date = date('Y-m-d H:i:s');
        $stmt->bindParam(":time", $date,PDO::PARAM_STR);
        $stmt->bindParam(":ID_user",$ID_user,PDO::PARAM_INT);
        $stmt->execute();
    }
}