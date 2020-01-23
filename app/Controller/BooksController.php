<?php

class BooksController
{
    public function index()
    {
        try{
            $books = Books::selectBooks();

            echo "<button style='margin-left: 10px' type='button' class='btn btn-success' data-toggle='modal' data-target='#modalAdd'>Add a book</button><br><br>";  
            echo "</button>";
            
            // < ADD MODAL >
            echo "<div class='modal fade' id='modalAdd' tabindex='-1' role='dialog' aria-labelledby='modalAddTitle' aria-hidden='true'>";
            echo "<div class='modal-dialog' role='document'>";
            echo "<div class='modal-content'>";
            echo "<div class='modal-header'>";
            echo "<h5 class='modal-title' id='modalAddTitle'>Add a Book</h5>";
            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
            echo "<span aria-hidden='true'>&times;</span>";
            echo "</button>";
            echo "</div>";
            echo "<div class='modal-body'>";
            echo "<form method='post' action='?page=books&method=insert'>";
            echo "<div class='form-group'>";
            echo "<label for='titleInput'>Name</label>";
            echo "<input name='title' type='text' class='form-control' id='titleInput' placeholder='Ex.: A culpa é das estrelas'>";
            echo "<label for='quantityInput'>Quantity</label>";
            echo "<input name='quantity'type='number' min='1' class='form-control' id='quantityInput' placeholder='Ex.: 10'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label name='authorid' for='authorsSelect'>Authors</label>";
            echo "<select multiple name='authorid' class='form-control' id='authorsSelect'>";
            $authors = Authors::selectAuthors();
            foreach($authors as $value)
            {
                echo "<option value=".$value->authorid.">".$value->name." ".$value->lastname."</option>";

            }
            echo "</select>";
            echo "</div>";
            echo "</div>";
            echo "<div class='modal-footer'>";
            echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
            echo "<button type='submit' class='btn btn-success'>Add</button>";
            echo "</div>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            // < /ADD MODAL >

            //< UPDATE MODAL >
            echo "<div class='modal fade' id='modalUpdate' tabindex='-1' role='dialog' aria-labelledby='modalUpdate' aria-hidden='true'>";
            echo "<div class='modal-dialog' role='document'>";
            echo "<div class='modal-content'>";
            echo "<div class='modal-header'>";
            echo "<h5 class='modal-title' id='modalAddTitle'>Add a Book</h5>";
            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
            echo "<span aria-hidden='true'>&times;</span>";
            echo "</button>";
            echo "</div>";
            echo "<div class='modal-body'>";
            echo "<form method='post' action='?page=books&method=update'>";
            echo "<div class='form-group'>";
            // echo "<label for='titleInput'>ID</label>";
            echo "<input name='updateValue' id='updateValue' type='hidden' class='form-control'>";
            echo "<label for='titleInput'>Name</label>";
            echo "<input name='title' type='text' class='form-control' id='titleInput' placeholder='Ex.: A culpa é das estrelas'>";
            echo "<label for='quantityInput'>Quantity</label>";
            echo "<input name='quantity'type='number' min='1' class='form-control' id='quantityInput' placeholder='Ex.: 10'>";
            echo "</div>";
            echo "<div class='form-group'>";
            echo "<label name='authorid' for='authorsSelect'>Authors</label>";
            echo "<select multiple name='authorid' class='form-control' id='authorsSelect'>";
            $authors = Authors::selectAuthors();
            foreach($authors as $value)
            {
                echo "<option value=".$value->authorid.">".$value->name." ".$value->lastname."</option>";

            }
            echo "</select>";
            echo "</div>";
            echo "</div>";
            echo "<div class='modal-footer'>";
            echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
            echo "<button type='submit' class='btn btn-info'>Update</button>";
            echo "</div>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            //</ UPDATE MODAL >


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
                echo "<td>".$value->bookid."</td>";
                echo "<td>".$value->title."</td>";
                echo "<td>".$value->quantity."</td>";
                echo "<td>".$value->authorid."</td>";
                echo "<td>".$author->name." ".$author->lastname."</td>";
                echo "<td> <button type='button' class='btn btn-info' id='updateID' data-toggle='modal' data-target='#modalUpdate' value='".$value->bookid."'>Update</button></td>";
                echo "<td> <button type='button' class='btn btn-danger'>Delete</button></td>";
                echo "</tr>";
            }
            echo "</table>";        
            // echo "<script>";
            // // echo "$(document).on('click', '.testeID', function () {";
            // // echo "var myBookId = $(this).data('id');";
            // // echo "$('.modal-body #updateValue').val( myBookId );";
            // // echo "});";
            // echo "window.document.getElementById('updateValue').value = window.document.getElementById('updateID').value;";

            // echo "</script>";
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function insert()
    {
        Books::addBook($_POST['title'], $_POST['quantity'], $_POST['authorid']);
        header("location:?page=books");
    }

    public function update()
    {
        // Books::addBook($_POST['title'], $_POST['quantity'], $_POST['authorid']);
        // header("location:?page=books");
        var_dump($_POST);
    }
}