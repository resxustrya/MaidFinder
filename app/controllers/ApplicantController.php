<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApplicantController
 *
 * @author Hp
 */
class ApplicantController extends BaseController {

    private $app;
    public function __construct() {

        $this->beforeFilter(function () {
            if (!Session::has('applicant')) {
                return Redirect::to('user-login');
            }
        });

        if(Session::has('applicant')) {
            $this->app = Applicants::find(Session::get('applicant')->appid);
        }
    }

    public function applicant_home() {
        return View::make('applicant.home')
                        ->with('app', $this->app)
                        ->with('jobtype', JobTypes::all())
                        ->with('location', Regions::all());
    }
    public function applicant_profile() {
        return View::make('applicant.profile')
                    ->with('app', $this->app)
                    ->with('location', Regions::find($this->app->regionid));
    }
    public function update_profile() {
      return View::make('applicant.update')
                        ->with('app', $this->app)
                        ->with('location', Regions::all());
    }
    public function handle_update() {

      $app = Applicants::find(Session::get('applicant')->appid);

        $app->fname = Input::get('fname');
        $app->lname = Input::get('lname');
        $app->address = Input::get('address');
        $app->birth = Input::get('year')."-".Input::get('month')."-".Input::get('day');
        $app->gender = Input::get('gender');
        $app->religion = Input::get('religion');
        $app->civilstatus = Input::get('civilstatus');
        $app->contactno = Input::get('contactno');
        $app->nationality = Input::get('nationality');
        $app->pitch = Input::get('pitch');
        $app->regionid = Input::get('location');

        if(Input::hasFile('profilepic')) {
            $filename = \Illuminate\Support\Facades\Input::file('profilepic')->getClientOriginalName();
            $path = base_path() . '/public/uploads/profile/';
            Input::file('profilepic')->move($path, $this->app->email.$filename);
            $app->profilepic = $this->app->email.$filename;
        }
        $app->save();
        return Redirect::to('applicant/profile')
                        ->with('message','Profile updated.');
    }

    public function change_picture() {
           $app = Applicants::find($this->app->appid);

        if(Input::hasFile('profilepic')) {
            $filename = \Illuminate\Support\Facades\Input::file('profilepic')->getClientOriginalName();
            $path = base_path() . '/public/uploads/profile/';
            Input::file('profilepic')->move($path, $this->app->email.$filename);
            $app->profilepic = $this->app->email.$filename;
            $app->save();

            return Redirect::to('/applicant/profile');
        }
    }
    public function applicant_skill() {
        $skills = Skills::where('appid' ,'=', Session::get('applicant')->appid)->get();
        return View::make('applicant.skills')->with('skills', $skills);
    }
    public function add_skill() {
        return View::make('applicant-add-skill');
    }

     public function create_application() {
        return View::make('applicant.create-application')
            ->with('app', $this->app)
            ->with('location', Regions::all())
            ->with('jobtype', JobTypes::all())
            ->with('salary', Salaries::all());
    }
    public function profile_application() {
        $application = Applications::where('appid','=', $this->app->appid)->first();
        return View::make('applicant.profile')
            ->with('app', $this->app)
            ->with('application', $application)
            ->with('location', Regions::find($this->app->regionid));
    }
    public function application_update($id) {
        $application = Applications::find($id);
        $skills = ApplicantSkills::where('applicationid', '=', $application->applicationid)->first();
        $duties = Duties::find($skills->dutyid);
        return View::make('applicant.application-update')
                    ->with('app', $this->app)
                    ->with('location', Regions::all())
                    ->with('jobtype', JobTypes::all())
                    ->with('application', $application)
                    ->with('skills', $skills)
                    ->with('salary', Salaries::all())
                    ->with('duties', $duties);
    }
    public function application_delete($id) {
        $application = Applications::find($id);
        $application->delete();
        return Redirect::to('/applicant/profile')->with('message', 'Job application deleted');
    }
    public function handle_application_update() {

        $application = Applications::find(Input::get('applicationid'));

        $temp = array (
            'location' => Input::get('location'),
            'position' => Input::get('jobtype'),
            'salary' => Input::get('salary'),
            'capacity' => Input::get('capacity'),
            'edlevel' => Input::get('edlevel'),
            'dayof' => Input::get('dayof'),
            'pitch' => Input::get('pitch')
        );

        $rules = array(
            'location' => 'required',
            'position' => 'required',
            'salary' => 'required',
            'capacity' => 'required',
            'edlevel' => 'required',
            'dayof' => 'required',
            'pitch' => 'required'
        );
        $messages = array(
            'location.required' => 'Chose a location',
            'position.required' => 'Chose a position',
            'salary.required' => 'Chose a salary',
            'capacity.required' => 'Chose acapacity',
            'edlevel.required' => 'Chose a education level',
            'dayof.required' => 'Chose a dayof',
            'pitch.required' => 'Pitch must not be empty'
        );
        $validator = Validator::make($temp,$rules,$messages);
        if($validator->fails()) {
            $messages = $validator->messages();
            return Redirect::to('/applicant/job/application/edit/'. Input::get('applicationid'))
                ->with('error', $messages)
                ->with('message','Your job application is not created');
        }


        $application->regionid = Input::get('location');
        $application->capacity = Input::get('capacity');
        $application->salaryid =Input::get('salary');
        $application->dayof = Input::get('dayof');
        $application->edlevel = Input::get('edlevel');
        $application->jobtypeid = Input::get('jobtype');
        $application->pitch = Input::get('pitch');
        $application->save();

        $app_skill = ApplicantSkills::where('applicationid', '=', $application->applicationid)->first();
        $duties = Duties::find($app_skill->dutyid);

        $duties->cooking = Input::has('cooking') ? Input::get('cooking') : null;
        $duties->laundry = Input::has('laundry') ? Input::get('laundry') : null;
        $duties->gardening = Input::has('gardening') ?Input::get('gardening') : null;
        $duties->grocery = Input::has('grocery') ? Input::get('grocery') : null;
        $duties->cleaning = Input::has('cleaning') ? Input::get('cleaning') : null;
        $duties->tuturing = Input::has('tutoring') ? Input::get('tutoring') : null;
        $duties->driving = Input::has('driving') ? Input::get('driving') : null;
        $duties->pet = Input::has('pet') ? Input::get('pet') : null;
        $duties->other = Input::has('other') ? Input::get('other') : null;
        $duties->save();


        return Redirect::to('applicant/profile')
                        ->with('message', 'Job application updated');
    }
    public function handle_application() {

        $temp = array (
            'location' => Input::get('location'),
            'position' => Input::get('jobtype'),
            'salary' => Input::get('salary'),
            'capacity' => Input::get('capacity'),
            'edlevel' => Input::get('edlevel'),
            'dayof' => Input::get('dayof'),
            'pitch' => Input::get('pitch')
        );

        $rules = array(
            'location' => 'required',
            'position' => 'required',
            'salary' => 'required',
            'capacity' => 'required',
            'edlevel' => 'required',
            'dayof' => 'required',
            'pitch' => 'required'
        );
        $messages = array(
            'location.required' => 'Chose a location',
            'position.required' => 'Chose a position',
            'salary.required' => 'Chose a salary',
            'capacity.required' => 'Chose acapacity',
            'edlevel.required' => 'Chose a education level',
            'dayof.required' => 'Chose a dayof',
            'pitch.required' => 'Pitch must not be empty'
        );
        $validator = Validator::make($temp,$rules,$messages);
        if($validator->fails()) {
            $messages = $validator->messages();
            return Redirect::to('/applicant/create/application')
                ->with('error', $messages)
                ->with('message','Your job application is not created');
        }

        $application = new Applications();
        $application->appid = $this->app->appid;
        $application->regionid = Input::get('location');
        $application->capacity = Input::get('capacity');
        $application->salaryid =Input::get('salary');
        $application->dayof = Input::get('dayof');
        $application->edlevel = Input::get('edlevel');
        $application->jobtypeid = Input::get('jobtype');
        $application->pitch = Input::get('pitch');
        $application->save();

        $duties = new Duties();
        $duties->adid = $application->adid;
        $duties->cooking = Input::has('cooking') ? Input::get('cooking') : null;
        $duties->laundry = Input::has('laundry') ? Input::get('laundry') : null;
        $duties->gardening = Input::has('gardening') ?Input::get('gardening') : null;
        $duties->grocery = Input::has('grocery') ? Input::get('grocery') : null;
        $duties->cleaning = Input::has('cleaning') ? Input::get('cleaning') : null;
        $duties->tuturing = Input::has('tutoring') ? Input::get('tutoring') : null;
        $duties->driving = Input::has('driving') ? Input::get('driving') : null;
        $duties->pet = Input::has('pet') ? Input::get('pet') : null;
        $duties->other = Input::has('other') ? Input::get('other') : null;
        $duties->save();

        $app_skill = new ApplicantSkills();
        $app_skill->applicationid = $application->applicationid;
        $app_skill->dutyid = $duties->dutyid;
        $app_skill->save();

        return Redirect::to('applicant/profile')
                        ->with('message', 'Job application created. Your job application is now published into the employers helpers matching.');
    }
    public function employer_ads() {
        return View::make('ads.ads')
                    ->with('ads', Ads::paginate(20))
                    ->with('app', $this->app)
                    ->with('jobtypes',JobTypes::all())
                    ->with('locations', Regions::all())
                    ->with('salary', Salaries::all());
    }

    public function emp_ad_profile($id) {

        $ad = Ads::find($id);
        $profile = Employers::find($ad->empid);
        $location = Regions::find($ad->regionid);
        $jobtype = JobTypes::find($ad->jobtypeid);
        $dayof =  array('Monday', 'Tuesday', 'Wednesday','Thursday', 'Friday','Saturday','Sunday');
        $edlevel = array("Elementary", "High School", "College graduate");
        $duties = Duties::where('adid', '=', $ad->adid)->first();
        $salary = Salaries::find($ad->salaryid);
        $bdate = explode('-', $profile->bdate);
        $age = date('Y') - $bdate[0];
        $job_desc = AdDesc::where('adid', '=', $ad->adid)->get();
        return View::make('ads.employer-ads-profile')
                        ->with('app', $this->app)
                        ->with('emp', $profile)
                        ->with('location', $location)
                        ->with('ads',$ad)
                        ->with('age', $age)
                        ->with('salary', $salary)
                        ->with('jobtype', $jobtype)
                        ->with('dayof', $dayof[$ad['dayof']])
                        ->with('edlevel' ,$edlevel[$ad['edlevel']])
                        ->with('duties', $duties)
                        ->with('job_desc', $job_desc);
    }
    public function apply_ad() {
        $apply = new ApplyAds();
        $apply->adid = Input::get('adid');
        $apply->message = Input::get('pitch-message');
        $apply->empid = Input::get('empid');
        $apply->appid = $this->app->appid;
        $apply->save();

        return "ok";
    }
    public function message() {
        return View::make('applicant.message')
                    ->with('app', $this->app);
    }
    public function shortlist() {
        $list = AppShortList::all();
        return View::make('applicant.shortlist')
                    ->with('list',$list)
                    ->with('app', $this->app);
    }
    public function add_shortlist() {
        $list = new AppShortList();
        $list->adid = Input::get('adid');
        $list->save();
        $status = array('status' => 404);
        return $status;
    }
    public function view_shortlist($id) {
        $list = AppShortList::all();

        return View::make('applicant.shortlist')
                ->with('app', $this->app)
                ->with('list', $list);
    }
    public function job_request() {

    }
    public function applications_list() {
        
    }
    public function  applicantPost()
    {

        $application = Applications::where('appid','=', $this->app->appid)->first();
        return View::make('applicant.applicantPost')
            ->with('app', $this->app)
            ->with('application', $application)
            ->with('location', Regions::find($this->app->regionid));
    }
    public function applicant_logout() {
       Session::forget('applicant');
       Session::flush();
       return Redirect::to('/');
    }
}
