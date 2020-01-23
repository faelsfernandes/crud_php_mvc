<?php

class AuthorsController
{
    public function index()
    {
        try{
            $authors = Authors::selectAuthors();

            echo "<button style='margin-left: 10px' type='button' class='btn btn-success' data-toggle='modal' data-target='#modalAddAuthor'>Add an Author</button><br><br>";  
            echo "</button>";
            
            echo "<div class='modal fade' id='modalAddAuthor' tabindex='-1' role='dialog' aria-labelledby='modalAddAuthorTitle' aria-hidden='true'>";
            echo "<div class='modal-dialog' role='document'>";
            echo "<div class='modal-content'>";
            echo "<div class='modal-header'>";
            echo "<h5 class='modal-title' id='modalAddAuthorTitle'>Add an Author</h5>";
            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
            echo "<span aria-hidden='true'>&times;</span>";
            echo "</button>";
            echo "</div>";
            echo "<div class='modal-body'>";
            echo "<form>";
            echo "<div class='form-group'>";
            echo "<label for='nameInput'>Name</label>";
            echo "<input type='text' class='form-control' id='nameInput' placeholder='Ex.: José'>";
            echo "<label for='lastnameInput'>Last Name</label>";
            echo "<input type='text' class='form-control' id='lastnameInput' placeholder='Ex.: da Silva'>";
            echo "</div>";
            echo "</form>";
            echo "</div>";
            echo "<div class='modal-footer'>";
            echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
            echo "<button type='button' class='btn btn-success'>Add</button>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";

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