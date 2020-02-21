<?php
class ContactsController{
    public function actionInfo(){
        require_once(ROOT . '/views/contacts/contacts.php');
        return true;
    }
}