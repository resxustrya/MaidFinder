<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 8/20/2016
 * Time: 8:19 PM
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Plans extends Eloquent {
    use SoftDeletingTrait;
    protected $table = 'plan';
    protected $primaryKey = 'planid';
    protected $date = ['deleted_at'];
}