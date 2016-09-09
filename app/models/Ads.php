<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 7/30/2016
 * Time: 12:09 PM
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Ads extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'ad';
    protected $primaryKey = 'adid';
    protected $date = ['deleted_at'];
}