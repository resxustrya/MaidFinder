<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author Hp
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Admins  extends Eloquent {
    //put your code here
    use SoftDeletingTrait;
    protected $table = 'admin';
    protected $primaryKey = 'adminid';
    protected $date = ['deleted_at'];
}
