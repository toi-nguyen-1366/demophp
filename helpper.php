<?php
include 'bbeCore.php';

class helpper {

    public function isEmailEmpty(string $email){
        $model = new bbeCore();
        $user = $model->getAllData('MyGuests');

    }
}
