<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Applicants
 *
 * @author Hp
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Applicants extends Eloquent {
    //put your code here
    use SoftDeletingTrait;
    protected $table = 'applicant';
    protected $primaryKey = 'appid';
    protected $date = ['deleted_at'];
}
