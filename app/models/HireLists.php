<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 8/31/2016
 * Time: 3:49 AM
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class HireLists extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'hirelist';
    protected $primaryKey = 'id';
    protected $date = ['deleted_at'];
}