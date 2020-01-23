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
}