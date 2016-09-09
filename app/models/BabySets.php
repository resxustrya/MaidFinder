<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 8/21/2016
 * Time: 1:00 AM
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class BabySets extends Eloquent {
    use SoftDeletingTrait;
    protected $table = 'baby_set';
    protected $primaryKey = 'baby_set_id';
    protected $date = ['deleted_at'];
}