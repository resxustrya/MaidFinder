<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 8/27/2016
 * Time: 9:53 PM
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class AdReq extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'ad_req';
    protected $pimaryKey = 'ad_reqid';
    protected $date = ['deleted_at'];
}