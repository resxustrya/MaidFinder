<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 7/30/2016
 * Time: 4:41 PM
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Regions extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'region';
    protected $primaryKey = 'regionid';
    protected $date = ['deleted_at'];
}