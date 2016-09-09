<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 8/14/2016
 * Time: 2:09 PM
 */

use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Salaries extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'salary';
    protected $primaryKey = 'salaryid';
    protected $date = ['deleted_at'];

}