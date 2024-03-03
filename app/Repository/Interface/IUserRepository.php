<?php

namespace App\Repository\Interface;

interface IUserRepository 
{
    public function list();
    public function findById($id);
    public function findByEmail($email);
    public function storeOrUpdate( $id = null, $data= [] );
    public function destroyById($id);
}