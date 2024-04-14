<?php
require_once('ExDataBase.php');

class Model {
    public static function getListeFilms(){
        return ExDataBase::getListe();
    }
}
 