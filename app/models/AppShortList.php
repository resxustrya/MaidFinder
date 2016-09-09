<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 8/13/2016
 * Time: 1:16 AM
 */
use  Illuminate\Database\Eloquent\SoftDeletingTrait;
class AppShortList extends Eloquent
{
    use SoftDeletingTrait;
    protected $table = 'app_shortlist';
    protected $primaryKey = 'listid';
    protected $date = ['deleted_at'];
}