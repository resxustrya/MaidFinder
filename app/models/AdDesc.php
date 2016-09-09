<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 8/27/2016
 * Time: 9:55 PM
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class AdDesc extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'ad_desc';
    protected $primaryKey = 'ad_descid';
    protected $date = ['deleted_at'];
}