<?php
/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 9/7/2016
 * Time: 6:33 PM
 */



class AdminController extends BaseController
{
    private $admin;
    private $url;
    public function __construct()
    {

        $this->beforeFilter(function () {
            $ok = false;
            if(Session::has('admin')) {
                $this->admin = Session::get('admin');
                $ok = true;
            }
            if($ok == false) {
                return Redirect::to('/admin/account/login');
            }
        });

    }
    public function dashboard() {
        return View::make('admin.home');
    }
    public function admin_staffs() {
        Session::put('url', 'staffs');
        if($this->admin->usertype == 'admin') {
            $admin_staffs = Admins::where('usertype', '=', 'adminstaff')->get();
            return View::make('admin.staffs')
                    ->with('admin_staffs', $admin_staffs)
                    ->with('admin', $this->admin);
        }
       return View::make('admin.staffs-err')->with('admin', $this->admin);
    }
    public function new_staff() {
        $admin = new Admins();
        $admin->username = Input::get('username');
        $admin->password = Input::get('password');
        $admin->fname = Input::get('fname');
        $admin->lname = Input::get('lname');
        $admin->usertype = Input::get('type');
        $admin->save();
        return Redirect::to('/admin/staffs')->with('new_staff', 'New staff was added.');
    }
    public function get_staff() {
        $id = Input::get('id');
        $admin = Admins::find($id);
        return $admin;
    }
    public function edit_staff() {
        $admin = Admins::find(Input::get('adminid'));
        $admin->username = Input::get('username');
        $admin->password = Input::get('password');
        $admin->fname = Input::get('fname');
        $admin->lname = Input::get('lname');
        $admin->usertype = Input::get('type');
        $admin->save();
        return Redirect::to('/admin/staffs')->with('update_staff', 'Staff was updated');
    }
    public function remove_staff() {
        $admin = Admins::find(Input::get('id'));
        if($admin and count($admin) > 0) {
            $admin->delete();
            return "ok";
        }
        return "false";
    }

    public function account_users() {
        Session::put('url', 'accounts');
        return View::make('admin.user-accounts');
    }
    public function applicants_pending() {
      Session::put('url', 'accounts');
      $app = Applicants::where('isVerified', '=', 0)->get();
      $count = count($app);
      $accounts = Applicants::where('isVerified', '=', 0)->paginate(10);
      return View::make('admin.app-pending')
                  ->with('applicants', $accounts)
                  ->with('count', $count);
    }
    public function applicant_profile_pending($id) {
        return $id;
    }
}
