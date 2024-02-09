<?php

require_once __DIR__ . '/../Connection/Connessione.php';
class Product
{
    private $id;
    private $nome;
    private $prezzo;
    private $marca;


    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getPrezzo()
    {
        return $this->prezzo;
    }

    public function setPrezzo($prezzo)
    {
        $this->prezzo = $prezzo;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public static function Find($id)
    {
        $pdo = self::Connect();
        $stmt = $pdo->prepare("select * from tommaso_zamboni_ecommerce.products where id = :id");
        $stmt->bindParam(":id", $id);
        if ($stmt->execute()) {
            return $stmt->fetchObject("Product");
        } else {
            return false;
        }
    }

    public static function Create($params)
    {
        $pdo = self::Connect("tommaso_zamboni_ecommerce");
        $stmt = $pdo->prepare("insert into tommaso_zamboni_ecommerce.products (nome,prezzo,marca) values (:nome,:prezzo,:marca)");
        $stmt->bindParam(":nome", $params["nome"]);
        $stmt->bindParam(":prezzo", $params["prezzo"]);
        $stmt->bindParam(":marca", $params["marca"]);
        if ($stmt->execute()) {
            $stmt = $pdo->prepare("select * from tommaso_zamboni_ecommerce.products order by id desc limit 1");
            $stmt->execute();
            return $stmt->fetchObject("Product");
        } else {
            throw new PDOException("Errore Nella Creazione");
        }
    }
    public static function Update($params)
    {
        $pdo = self::Connect("tommaso_zamboni_ecommerce");
        $stmt = $pdo->prepare("UPDATE tommaso_zamboni_ecommerce.products SET nome = :nome, marca=:marca,prezzo=:prezzo WHERE id = 1");
        $stmt->bindParam(':nome', $params['nome']);
        $stmt->bindParam(':marca', $params['marca']);
        $stmt->bindParam(':prezzo', $params['prezzo']);
        $stmt->execute();
        /*
        if () {
            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }*/
    }
    public static function FetchAll()
    {
        $pdo = self::Connect("tommaso_zamboni_ecommerce");
        $stmt = $pdo->query("select * from tommaso_zamboni_ecommerce.products");
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Product');

    }

    public static function Connect($dbname)
    {
        return Connessione::Connect($dbname);
    }


}