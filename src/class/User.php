<?php


namespace App\class;


use Exception;
use PDOException;
use App\class\Database;

include_once(dirname(__DIR__) . '/func.php');

class UserException extends Exception{}
class User
{

    public static function isEmailAvailable(string $email)
    {
        $dbh = Database::connect();

        try{
            $query = "SELECT * FROM user WHERE email = :email";
            $select = $dbh->prepare($query);

            $select->execute([
                ':email' => strtolower($email)
            ]);

            if ($select->rowCount() > 0) {
                return false;
            }

            return true;

        }catch(PDOException $e){
            throw new PDOException($e->getMessage());
        }
    }

    public static function checkLoginPassword(string $email, string $password)
    {
        $dbh = Database::connect();

        try{
            $query = "SELECT * FROM user WHERE email = :email AND password = :password";
            $select = $dbh->prepare($query);

            $select->execute([
                ':email' => strtolower($email), 
                ':password' => encryptPassword($password)
            ]);

            if($select->rowCount() === 0){
                return false;
            }

            return $select->fetch();

        }catch(PDOException $e){
            throw new PDOException($e->getMessage());
        }
    }

    public static function createNewUser(array $user)
    {
        $dbh = Database::connect();

        try {
            // vérification de l'adresse email
            if(!self::isEmailAvailable($user['email'])){
                throw new UserException('Adresse email déjà utilisée', 001);
            }

            // insertion de l'utilisateur
            $query = "INSERT INTO user(firstname, lastname, birthdate, country, email, password, tel, role) 
            VALUES(:firstname, :lastname, :birthdate, :country, :email, :password, :tel, :role)";
            $insert = $dbh->prepare($query);

            $params = [
                ':firstname' => ucfirst(strtolower($user['firstname'])),
                ':lastname' => strtoupper($user['lastname']),
                ':birthdate' => $user['birthdate'],
                ':country' => $user['country'],
                ':email' => strtolower($user['email']),
                ':password' => encryptPassword(trim($user['password'])),
                ':tel' => $user['tel'],
                ':role' => 1
            ];

            $res = $insert->execute($params);

            if (!$res) {
                throw new UserException('Une erreur inconnue est survenue', 002);
            }
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public static function select()
    {
    }

    public static function update()
    {
    }

    public static function delete()
    {
    }

    public static function query(string $query, array $params = [])
    {
        $dbh = Database::connect();

        try {
            $req = $dbh->prepare($query);
            $req->execute($params);

            return $req->fetchAll();
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }
}
