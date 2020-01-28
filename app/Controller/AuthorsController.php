<?php

class AuthorsController
{
    public function index()
    {
        try{
            $authors = Authors::selectAuthors();

            echo "<button style='margin-left: 10px' type='button' class='btn btn-success' data-toggle='modal' data-target='#modalAddAuthor'>Add an Author</button><br><br>";  
            echo "</button>";
            
            // <ADD MODAL>
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
            // echo "<form class='dropzone' method='post' action='?page=authors&method=insert'>";
            echo "<form class='dropzone' method='post' action='upload.php'>";
            // echo "<div class='form-group'>";
            // echo "<label for='nameInput'>Name</label>";
            // echo "<input required name='name' type='text' class='form-control' id='nameInput' placeholder='Ex.: José'>";
            // echo "<label for='lastnameInput'>Last Name</label>";
            // echo "<input required name='lastname' type='text' class='form-control' id='lastnameInput' placeholder='Ex.: da Silva'>";
            
            // echo "</div>";
            // echo "</div>";
            echo "<div class='modal-footer'>";
            
            echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
            echo "<button type='submit' class='btn btn-success'>Add</button>";
            echo "</div>";
            echo "</form>";

            echo "</div>";
            echo "</div>";
            echo "</div>";
            // </ADD MODAL>

            // <UPDATE MODAL>
            echo "<div class='modal fade' id='modalUpdateAuthor' tabindex='-1' role='dialog' aria-labelledby='modalUpdateAuthorTitle' aria-hidden='true'>";
            echo "<div class='modal-dialog' role='document'>";
            echo "<div class='modal-content'>";
            echo "<div class='modal-header'>";
            echo "<h5 class='modal-title' id='modalUpdateAuthorTitle'>Add an Author</h5>";
            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
            echo "<span aria-hidden='true'>&times;</span>";
            echo "</button>";
            echo "</div>";
            echo "<div class='modal-body'>";
            echo "<form method='post' action='?page=authors&method=update'>";
            echo "<div class='form-group'>";
            echo "<label for='idInput'>Author ID</label>";
            echo "<input required name='id' readonly='readonly' type='text' class='form-control' id='idInput'>";
            echo "<label for='nameInput'>Name</label>";
            echo "<input required name='name' type='text' class='form-control' id='nameInput' placeholder='Ex.: José'>";
            echo "<label for='lastnameInput'>Last Name</label>";
            echo "<input required name='lastname' type='text' class='form-control' id='lastnameInput' placeholder='Ex.: da Silva'>";
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
            // </UPDATE MODAL>

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
                echo "<td> <button type='button' class='btn btn-info' data-toggle='modal' data-target='#modalUpdateAuthor' data-author-id='".$value->authorid."'>Update</button></td>";
                echo "<td> <a type='button' class='btn btn-danger' href='?page=authors&method=delete&id=$value->authorid'>Delete</a></td>";
                echo "</tr>";
            }
            echo "</table>";     

            echo "<script>";
            echo "$('#modalUpdateAuthor').on('shown.bs.modal', function (e) {";
            echo "var authorId = $(e.relatedTarget).data('author-id');";
            echo "$(e.currentTarget).find('input[name=\"id\"]').val(authorId);";
            echo "});";
            echo "</script>";

        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function insert()
    {
        var_dump($_POST);
        // Authors::addAuthor($_POST['name'], $_POST['lastname']);
        // header("location:?page=authors");
    }

    public function update()
    {
        Authors::updateAuthor($_POST['id'], $_POST['name'], $_POST['lastname']);
        header("location:?page=authors");
        var_dump($_POST);
    }

    public function delete()
    {
        Authors::deleteAuthor($_GET['id']);
        header("location:?page=authors");
        var_dump($_GET);
    }
}