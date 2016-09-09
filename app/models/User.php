<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
        use Illuminate\Database\Eloquent\SoftDeletingTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
        protected $primaryKey = 'id';


        /**
	 * The attributes excluded from the model's JSON form.
	 *
         * 
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
        
        public function employer() {
            return $this->hasOne('Employer');
        }
        
        public function applicant() {
            return $this->hasOne('Applicants');
        }
        public function admin() {
            return $this->hasOne('Admin');
        }


}
