<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 8/29/2016
 * Time: 12:18 AM
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class ApplyAds extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'apply_ad';
    protected $primaryKey = 'id';
    protected $date = ['deleted_at'];
}