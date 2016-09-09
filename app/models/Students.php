<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 7/27/2016
 * Time: 5:01 PM
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Students extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'student';
    protected $primaryKey = 'studid';
    protected $dates = ['deleted_at'];
}