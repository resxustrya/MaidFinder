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
        if($this->admin->usertype == 'admin') {

            $admin_staffs = Admins::where('usertype', '=', 'adminstaff')->paginate(10);
            return View::make('admin.staffs')
                    ->with('admin_staffs', $admin_staffs)
                    ->with('admin', $this->admin)
                    ->with('url', 'staffs');
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
        return View::make('admin.user-accounts')
                        ->with('url', 'users');
    }
    public function applicants_pending() {
      $app = Applicants::where('isVerified', '=', 0)->get();
      return View::make('admin.app-pending')
                  ->with('applicants', $app);
    }
}
