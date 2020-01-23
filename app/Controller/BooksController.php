<?php

class BooksController
{
    public function index()
    {
        try{
            $books = Books::selectBooks();
            echo "<button style='margin-left: 10px' type='button' class='btn btn-success'>Add a book</button><br><br>";
            echo "<table class='table table-dark'>";
            echo "<thead class='thead-dark'>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Title</th>";
            echo "<th>Quantity</th>";
            echo "<th>Author ID</th>";
            echo "<th>Author Name</th>";
            echo "<th>Options</th>";
            echo "<th></th>";
            echo "</tr>";

            foreach($books as $value)
            {
                $author = Books::selectAuthor($value->authorid);
                // echo $value->authorid;
                echo "<tr>";
                echo "<td>".$value->authorid."</td>";
                echo "<td>".$value->title."</td>";
                echo "<td>".$value->quantity."</td>";
                echo "<td>".$value->authorid."</td>";
                echo "<td>".$author->name." ".$author->lastname."</td>";
                echo "<td> <button type='button' class='btn btn-info'>Update</button></td>";
                echo "<td> <button type='button' class='btn btn-danger'>Delete</button></td>";
                echo "</tr>";
            }
            echo "</table>";               
            
            // var_dump($author);
            // print_r($books[0]);
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }
}