<?php

class AuthorsController
{
    public function index()
    {
        try{
            $authors = Authors::selectAuthors();
            echo "<button style='margin-left: 10px' type='button' class='btn btn-success'>Add an author</button><br><br>";
            echo "<table class='table table-dark'>";
            echo "<thead class='thead-dark'>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Firstname</th>";
            echo "<th>Lastname</th>";
            echo "<th>Options</th>";
            echo "<th></th>";
            echo "</tr>";

            foreach($authors as $value)
            {
                echo "<tr>";
                echo "<td>".$value->authorid."</td>";
                echo "<td>".$value->name."</td>";
                echo "<td>".$value->lastname."</td>";
                echo "<td> <button type='button' class='btn btn-info'>Update</button></td>";
                echo "<td> <button type='button' class='btn btn-danger'>Delete</button></td>";
                echo "</tr>";
            }
            echo "</table>";                

            // print_r($authors[0]);
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }
}