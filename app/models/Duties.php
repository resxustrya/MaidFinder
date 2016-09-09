<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 7/26/2016
 * Time: 11:24 AM
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Duties extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'duty';
    protected $primaryKey = 'dutyid';
    protected $dates = ['deleted_at'];
}