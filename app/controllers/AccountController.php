<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccountController
 *
 * @author Hp
 */
class AccountController extends BaseController {


    public function handleLogin() {

        $emp = Employers::where('email', '=', Input::get('email'))
                ->where('password', '=', Input::get('password'))
                ->first();

        if($emp and ($emp->email == Input::get('email') and $emp->password == Input::get('password'))) {
            Session::put('employer', $emp);
            Session::put('isAuth',true);


            return Redirect::to('employer/home');
        }
        $app = Applicants::where('email', '=', Input::get('email'))
                ->where('password', '=', Input::get('password'))
                ->first();
        if($app and ($app->email == Input::get('email') and $app->password == Input::get('password'))) {
            Session::put('applicant',$app);
            Session::put('isAuth',true);
            return Redirect::to('applicant/home');
        }
        return Redirect::to('user-login')->with('msg','Invalid email or password');
    }

    /*
    * Check if email is already exists into employers and applicants table
    * if exits, redirect back to registration page and try another email
    * otherwise create a new user record
     * With validator
    */
    public function account_type()
    {

        $emp = Employers::where('email', '=', Input::get('email'))->first();
        $app = Applicants::where('email', '=', Input::get('email'))->first();

        if (($emp and $emp->email == Input::get('email')) or ($app and $app->email == Input::get('email'))) {
            return Redirect::to('user-register')
                ->with('message', 'Email is already used');

        }

        /*
         *
         * User registration validation rules
         *
         *
         */
        $temp = array(
            'email' => Input::get('email'),
            'fname' => Input::get('fname'),
            'lname' => Input::get('lname'),
            'pass' => Input::get('password'),
            'confirm' => Input::get('confirm')
        );

        $rules = array(
            'email' => 'required|email',
            'fname' => 'required',
            'lname' => 'required',
            'pass' => 'required|max:10',
            'confirm' => 'same:pass'
        );
        $messages = array(
            'email.required' => 'Email is required',
            'email.email' => 'Invalid email',
            'fname.required' => 'First name is required',
            'lname.required' => 'Last name is required',
            'pass.required' => 'Password is required',
            'confirm.same' => 'Password do not match'
        );

        $validator = Validator::make($temp, $rules, $messages);

        if ($validator->fails()) {

            $messages = $validator->messages();
            return Redirect::to('user-register')
                ->with('error', $messages)
                ->with('input', $temp);
        }
        Session::put('temp', $temp);

        return View::make('home.user-type');
    }

    public function handle_type() {

        if(Session::has('temp')) {
            $type = Input::get('type');
            if($type == "employer"){
                $temp = Session::get('temp');
                $emp = new Employers();
                $emp->email = $temp['email'];
                $emp->fname = $temp['fname'];
                $emp->lname = $temp['lname'];
                $emp->password = $temp['pass'];
                $emp->save();
                $emp = Employers::find($emp->empid);
                if($emp and ($emp->email == $temp['email'] and $emp->password == $temp['pass'])) {
                    Session::put('employer', $emp);
                    Session::forget('temp');
                    return Redirect::to('/create/profile');
                }
            }
            if($type == "applicant") {
                $temp = Session::get('temp');
                $app = new Applicants();
                $app->email = $temp['email'];
                $app->fname = $temp['fname'];
                $app->lname = $temp['lname'];
                $app->password = $temp['pass'];
                $app->save();
                $app = Applicants::find($app->appid);
                if($app and ($app->email == $temp['email'] and $app->password == $temp['pass'])) {
                    Session::put('applicant', $app);
                    Session::forget('temp');
                    return Redirect::to('/create/profile');
                }
            }
        }
        return Redirect::to('user-register');
    }
    public function logout() {
        Session::flush();
        return Redirect::to('/user-login');
    }
    public function create_profile() {
        $user = null;
        if(Session::has('applicant')) {
            $user = Session::get('applicant');
        }
        if(Session::has('employer')) {
            $user = Session::get('employer');
        }
        return View::make('home.profile')
                    ->with('user', $user)
                    ->with('location', Regions::all());
    }
    public function handle_profile() {
    
        $input = Input::all();

        $rules = array(
            'fname' => 'required',
            'lname' => 'required',
            'year' => 'required',
            'month' => 'required',
            'day' => 'required',
            'gender' => 'required',
            'contactno' => 'required',
            'location' => 'required',
            'address' => 'required',
            'nationality' => 'required',
            'religion' => 'required',
            'civilstatus' => 'required'
        );
        $messages = array(
            'fname.required' => 'Can\'t be blank',
            'lname.required' => 'Can\'t be blank',
            'year.required' => 'Can\'t be blank',
            'month.required' => 'Can\'t be blank',
            'day.required' => 'Can\'t be blank',
            'gender.required' => 'Can\'t be blank',
            'contactno.required' => 'Can\'t be blank',
            'location.required' => 'Can\'t be blank',
            'address.required' => 'Can\'t be blank',
            'nationality.required' => 'Can\'t be blank',
            'religion.required' => 'Can\'t be blank',
            'civilstatus.required' => 'Can\'t be blank'
        );
        
        $validator = Validator::make($input,$rules,$messages);
        if($validator->fails()) {
            Session::put('input', $input);
            $messages = $validator->messages();
            return Redirect::to('/create/profile')
                ->with('error', $messages)
                ->with('message','Your profile was not yet created.');
        }
        $user = null;
        if(Session::has('employer')){
            $emp = Session::get('employer');
            $user = Employers::find($emp->empid);
            $user->fname = $input['fname'];
            $user->lname = $input['lname'];
            $user->gender = $input['gender'];
            $user->civilstatus = $input['civilstatus'];
            $user->bdate = Input::get('year')."-".Input::get('month')."-".Input::get('day');
            $user->contactno = $input['contactno'];
            $user->regionid = $input['location'];
            $user->address = $input['address'];
            $user->isVerified = false;
            $user->nationality = $input['nationality'];
            $user->religion = $input['religion'];
            $user->save();
        }
        if(Session::has('applicant')) {
            $app = Session::get('applicant');
            $user = Applicants::find($app->appid);
            $user->fname = $input['fname'];
            $user->lname = $input['lname'];
            $user->gender = $input['gender'];
            $user->civilstatus = $input['civilstatus'];
            $user->birth = Input::get('year')."-".Input::get('month')."-".Input::get('day');
            $user->contactno = $input['contactno'];
            $user->regionid = $input['location'];
            $user->isVerified = false;
            $user->address = $input['address'];
            $user->nationality = $input['nationality'];
            $user->religion = $input['religion'];
            $user->save();
        }
        return Redirect::to('/upload/photo')->with('message', 'Your profile was successfully created.');
    }
    public function upload() {
        return View::make('home.upload');
    }
    public function handle_upload() {

        if(Input::hasFile('photo')) {
            if(Session::has('employer')) {
                $emp = Session::get('employer');
                $user = Employers::find($emp->empid);
                $filename = \Illuminate\Support\Facades\Input::file('photo')->getClientOriginalName();
                $path = base_path() . '/public/uploads/profile/';
                Input::file('photo')->move($path, $user->email . $filename);
                $user->profilepic = $user->email . $filename;
                $user->save();
                return Redirect::to('/employer/home');
            }
            if(Session::has('applicant')) {
                $app = Session::get('applicant');
                $user = Applicants::find($app->appid);
                $filename = \Illuminate\Support\Facades\Input::file('photo')->getClientOriginalName();
                $path = base_path() . '/public/uploads/profile/';
                Input::file('photo')->move($path, $user->email . $filename);
                $user->profilepic = $user->email . $filename;
                $user->save();
                return Redirect::to('/applicant/home');
            }
        }
        return Redirect::to('/upload/photo')->with('message', 'Upload a your profile picture');
    }
}
