<?php

namespace Source;

Class User
{
    public static function logar($params = array())
    {
        $user = $params['inpLogin'];
        $password = $params['inpPassword'];
        $sql = new Sql();
        try
        {
            $result = $sql->select("SELECT ID_STUDENT, LOGIN, NAME, PASSWORD, RA, IS_ADMIN, ACTIVE
                FROM STUDENT WHERE LOGIN=:login", [':login'=>$user]);
            if(isset($result[0]))
            {
                if((bool)$result[0]['ACTIVE'] === true)
                {
                    $en = new Encryption();
                    if($password !== $en->decrypt($result[0]['PASSWORD']))
                    {
                        return "User or password incorrect!";
                    }
                    else
                    {
                        $_SESSION['user']['id_student'] = $result[0]['ID_STUDENT'];
                        $_SESSION['user']['login'] = $result[0]['LOGIN'];
                        $_SESSION['user']['name'] = $result[0]['NAME'];
                        $_SESSION['user']['ra'] = $result[0]['RA'];
                        $_SESSION['user']['is_admin'] = (int)(bool)$result[0]['IS_ADMIN'];
                        $_SESSION['user']['active'] = (int)(bool)$result[0]['ACTIVE'];
                        return "";
                    }
                }
                else
                {
                    return "User disabled! Contact the admin!";
                }
            }
            else
            {
                return "User or password incorrect!";
            }
        }
        catch(Exception $e)
        {
            return "Authentication error!";
        }
    }

    public static function verifyLogin()
    {
        if(!isset($_SESSION['user']))
        {
            \redirect('/login');
        }
    }

    public static function verifyLoginAdmin()
    {
        if(!isset($_SESSION['user']) ||
           $_SESSION['user']['is_admin'] != 1 ||
           $_SESSION['user']['active'] != 1)
        {
            \redirect('/');
        }
    }

    public static function logout()
    {
        if (isset($_SESSION['user']))
        {
            unset($_SESSION['user']);
        }
        \redirect('/login');
    }

    public static function listAll()
    {
        $sql = new Sql();
        return $sql->select("SELECT ID_STUDENT, NAME, RA, LOGIN, PASSWORD, IS_ADMIN, ACTIVE FROM STUDENT");
    }

    public function alterActive($idStudent, $status)
    {
        $sql = new Sql();
        $params = [":status" => (int)(bool)$status,
                   ":student" => (int)$idStudent];
        $sql->query("UPDATE STUDENT SET ACTIVE=:status WHERE ID_STUDENT=:student",
            $params);
    }

    public function load($student)
    {
        $sql = new Sql();
        return $sql->select("SELECT ID_STUDENT, NAME, RA, LOGIN, PASSWORD, IS_ADMIN, ACTIVE FROM STUDENT WHERE ID_STUDENT=:student", [':student' => (int)$student]);
    }

    public function add($params = array())
    {
        $sql = new Sql();
        $cript = new Encryption();
        $pass = $cript->encrypt($params['inpPassword']);
        $sql->query("INSERT INTO STUDENT (NAME, RA, LOGIN, PASSWORD, IS_ADMIN, ACTIVE)
            VALUES (:name, :ra, :login, :password, :is_admin, :active)",
            [
                ':name' => $params['inpName'],
                ':ra' => $params['inpRa'],
                ':login' => $params['inpLogin'],
                ':password' => $pass,
                ':is_admin' => (int)(bool)$params['inpAdmin'],
                ':active' => (int)(bool)$params['inpActive']
            ]);
    }

    public function update($params = array())
    {
        $sql = new Sql();
        $cript = new Encryption();
        $pass = $cript->encrypt($params['inpPassword']);
        $sql->query("
            UPDATE STUDENT
            SET NAME = :name,
                RA = :ra,
                LOGIN = :login,
                PASSWORD = :password,
                IS_ADMIN = :is_admin,
                ACTIVE = :active
            WHERE ID_STUDENT = :student",
            [
                ':name' => $params['inpName'],
                ':ra' => $params['inpRa'],
                ':login' => $params['inpLogin'],
                ':password' => $pass,
                ':is_admin' => (int)(bool)$params['inpAdmin'],
                ':active' => (int)(bool)$params['inpActive'],
                ':student' => (int)$params['inpId']
            ]);
    }
}

?>