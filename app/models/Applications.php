<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 8/5/2016
 * Time: 11:14 PM
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Applications extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'application';
    protected $primaryKey = 'applicationid';
    protected $date = ['deleted_at'];
}