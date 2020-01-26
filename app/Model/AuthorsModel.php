<?php

class Authors
{
    public static function selectAuthors()
    {
        // try{
        //     $con = Connection::getCon();
        // } catch (PDOException $e) {
        //     print "Something went wrong :X " . $e->getMessage() . "<br/>";
        //     die();
        // }
        $con = Connection::getCon();
        $data = "SELECT * FROM Authors";
        $data = $con->prepare($data);
        $data->execute();
        $result = array();
        while ($row = $data->fetchObject('Authors'))
        {
            $result[] = $row;
        }

        if(!$result)
        {
            throw new Excepction("No authors has been found");
        }
        return $result;
    }

    public static function addAuthor($name, $lastname)
    {
        $con = Connection::getCon();
        $data = "INSERT INTO  `Authors` (`name`, `lastname`) VALUES ('$name', '$lastname')";
        $data = $con->prepare($data);
        $data->execute();
    }

    public static function updateAuthor($authorid, $name, $lastname)
    {
        $con = Connection::getCon();
        $data = "UPDATE  `Authors` SET `name`='$name', `lastname`=$lastname WHERE `authorid` = $authorid";
        $data = $con->prepare($data);
        $data->execute();
    }

    public static function deleteAuthor($authorid)
    {
        $con = Connection::getCon();
        $data = "DELETE FROM  `Authors` WHERE `authorid` = $authorid";
        $data = $con->prepare($data);
        $data->execute();
    }
}