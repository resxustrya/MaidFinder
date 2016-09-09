<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 9/1/2016
 * Time: 3:22 PM
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class EmployerMessages extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'employer_msg';
    protected $primaryKey = 'id';
    protected $date = ['deleted_at'];
}