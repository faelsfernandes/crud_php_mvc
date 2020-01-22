<?php

class HomeController
{
    public function index()
    {
        try{
            $authors = Authors::selectAuthors();
            var_dump($authors);
        } catch(Exception $e){
            echo $e->getMessage();
        }

    }
}