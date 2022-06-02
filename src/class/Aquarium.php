<?php

namespace App\class;

use Exception;
use PDOException;
use App\class\Database;
use PDO;

class AquariumException extends Exception
{
}

class Aquarium
{

    public static function getWithId(int $aquariumId)
    {
        $dbh = Database::connect();

        try {
            $query = "SELECT * FROM aquarium WHERE id = ?";
            $select = $dbh->prepare($query);
            $select->execute([$aquariumId]);

            return $select->fetch();
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public static function getAll()
    {
        $dbh = Database::connect();

        try {
            $query = "SELECT * FROM aquarium";
            $select = $dbh->query($query);

            return $select->fetchAll();
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public static function getListForCurrentPage(int $currentPage, int $limit = 9)
    {
        if ($currentPage < 1) {
            throw new Exception("[ValueError] : La valeur minimale est 0");
        }

        $offset = $currentPage * $limit - $limit;

        $dbh = Database::connect();

        try {
            $query = "SELECT * FROM aquarium WHERE display = 1 LIMIT $offset, $limit";
            $select = $dbh->query($query);

            return $select->fetchAll();
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public static function getDeletedAquarium()
    {
        $dbh = Database::connect();

        try {
            $query = "SELECT * FROM aquarium WHERE display = 0";
            $select = $dbh->query($query);

            return $select->fetchAll();
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public static function deleteAquarium(string|int $ID)
    {
        $dbh = Database::connect();

        try{
            $query = "UPDATE aquarium SET display = 0, deleted_date = :date WHERE id = :id";
            $update = $dbh->prepare($query);

            $res = $update->execute([
                ':date' => date("Y-m-d H:i:s"),
                ':id' => $ID
            ]);

            if(!$res){
                throw new Exception('Erreur inconnue lors de la suppression.');
            }

        }catch(PDOException $e){
            throw new PDOException($e->getMessage());
        }
    }

    public static function updateAquarium(string|int $ID, array $aquarium)
    {
        $dbh = Database::connect();

        try {
            $query = "UPDATE aquarium SET 
            num_bac = :numbac,
            conduct = :conduct,
            species = :species,
            volume = :volume,
            ph = :ph,
            water_type = :watertype,
            food_type = :foodtype,
            price = :price,
            img = :img 
            WHERE id = :id";

            $params = [
                ':numbac' => $aquarium['num_bac'],
                ':conduct' => $aquarium['conduct'],
                ':species' => $aquarium['species'],
                ':volume' => $aquarium['volume'],
                ':ph' => $aquarium['ph'],
                ':watertype' => $aquarium['water_type'],
                ':foodtype' => $aquarium['food_type'],
                ':price' => $aquarium['price'],
                ':img' => $aquarium['img'] ?? '',
                ':id' => $ID
            ];

            $update = $dbh->prepare($query);
            $res = $update->execute($params);

            if (!$res) {
                throw new AquariumException('Une erreur inconnue est survenue.', 001);
            }
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }

    public static function createAquarium(array $aquarium)
    {
        $dbh = Database::connect();

        try {
            $query = "INSERT INTO aquarium(num_bac, conduct, species, volume, ph, water_type, food_type, price, img) 
            VALUES(:num_bac, :conduct, :species, :volume, :ph, :water_type, :food_type, :price, :img)";
            $insert = $dbh->prepare($query);

            $params = [
                ':num_bac' => $aquarium['num_bac'],
                ':conduct' => $aquarium['conduct'],
                ':species' => $aquarium['species'],
                ':volume' => $aquarium['volume'],
                ':ph' => $aquarium['ph'],
                ':water_type' => $aquarium['water_type'],
                ':food_type' => $aquarium['food_type'],
                ':price' => $aquarium['price'],
                ':img' => $aquarium['img'] ?? '',
            ];

            $res = $insert->execute($params);

            if (!$res) {
                throw new Exception('Erreur inconnue lors de la création.');
            }
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage());
        }
    }
}
