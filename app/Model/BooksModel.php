<?php

class Books
{
    public static function selectBooks()
    {
        // try{
        //     $con = Connection::getCon();
        // } catch (PDOException $e) {
        //     print "Something went wrong :X " . $e->getMessage() . "<br/>";
        //     die();
        // }
        $con = Connection::getCon();
        $data = "SELECT * FROM Books";
        $data = $con->prepare($data);
        $data->execute();
        $result = array();
        while ($row = $data->fetchObject('Books'))
        {
            $result[] = $row;
        }

        if(!$result)
        {
            throw new Excepction("No books has been found");
        }
        return $result; 
    }

    public static function selectAuthor($id)
    {
        $con = Connection::getCon();
        $data = "SELECT `name`, `lastname` FROM `Authors` where `authorid` = $id";
        $data = $con->prepare($data);
        $data->execute();
        $result = $data->fetchObject('Authors');
        return $result; 
    }

    public static function deleteAuthor($id)
    {
        $con = Connection::getCon();
        $data = "SELECT `name`, `lastname` FROM `Authors` where `authorid` = $id";
        $data = $con->prepare($data);
        $data->execute();
        $result = $data->fetchObject('Authors');
        return $result; 
    }

    public static function addBook($title, $quantity, $authorid)
    {
        $con = Connection::getCon();
        $data = "INSERT INTO  `Books` (`title`, `quantity`, `authorid`) VALUES ('$title', $quantity, $authorid)";
        $data = $con->prepare($data);
        $data->execute();
    }

    // public static function updateBook($title, $quantity, $authorid)
    // {
    //     $con = Connection::getCon();
    //     $data = "UPDATE  `Books` SET title='$title', quantity=$quantity, authorid=$authorid";
    //     $data = $con->prepare($data);
    //     $data->execute();
    // }
}   