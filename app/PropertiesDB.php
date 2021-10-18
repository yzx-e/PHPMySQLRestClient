<?php

class PropertiesDB {

    var $pdo;
    function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=epropertiesdb', 'root', '');
    }

    function addProperties($values)
    {
        $sql = "insert into properties
    (street_address, suburb, state, property_type, land_area, selling_price, filename)
    values (?,?,?,?,?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $success = $statement->execute($values);
        
        header("location:?action=getProperties");

        return $success;
    }
    function getProperties()
    {
        $sql = "select * from properties";
        $statement = $this->pdo->query($sql);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $records = $statement->fetchAll();
        return $records;
    }
    function searchProperties($keyword)
    {
        $sql = "select * from properties where
                id like '%$keyword%'
                or street_address like '%$keyword%'
                or suburb like '%$keyword%'
                or state like '%$keyword%'
                or property_type like '%$keyword%'
                or land_area like '%$keyword%'
                or selling_price like '%$keyword%'
                or filename like '%$keyword%'";

        $statement = $this->pdo->query($sql);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $records = $statement->fetchAll();
        return $records;
    }


}
