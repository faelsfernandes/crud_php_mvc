<?php

class AuthorsController
{
    public function index()
    {
        try{
            $authors = Authors::selectAuthors();
            echo "blablabla";
            var_dump($authors);
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }
}