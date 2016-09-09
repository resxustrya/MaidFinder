<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Employers
 *
 * @author Hp
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Employers extends Eloquent{
    //put your code here
    
    use SoftDeletingTrait;
    protected $table = 'employer';
    protected $primaryKey = 'empid';
    protected $dates = ['deleted_at'];
}
