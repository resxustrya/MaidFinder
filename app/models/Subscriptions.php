<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 8/20/2016
 * Time: 8:25 PM
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;
class Subscriptions extends Eloquent {
    use SoftDeletingTrait;
    protected $table = 'subscription';
    protected $primaryKey = 'subscriptionid';
    protected $date = ['deleted_at'];
}