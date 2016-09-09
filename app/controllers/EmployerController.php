


<?php

class EmployerController extends BaseController {

    private $emp;
    public function __construct() {


        $this->beforeFilter(function () {
            if (!Session::has('employer')) {
                return Redirect::to('user-login');
            }
        });
        if(Session::has('employer')) {
            $this->emp = Employers::find(Session::get('employer')->empid);
        }
    }

    public function employer_home() {
        $application = Applications::all();
      $ads = Ads::where('empid', '=', $this->emp->empid)->get();
      return View::make('employer.home')
                    ->with('emp', $this->emp)
                    ->with('ads',$ads)
                    ->with('application', $application);
    }
    public function employer_profile() {

        $location = Regions::where('regionid', '=',$this->emp->regionid)->first();
        $ads = Ads::where('empid', '=', $this->emp->empid)->first();

        return View::make('employer.profile')
                        ->with('emp',$this->emp)
                        ->with('location', $location)
                        ->with('ads', $ads);
    }
    public function update_profile() {
        $region = Regions::all();
      return View::make('employer.update')
                    ->with('emp', $this->emp)
                    ->with('location', $region);
    }
    public function change_picture() {
        $emp = Employers::find($this->emp->empid);

        if(Input::hasFile('profilepic')) {
            $filename = \Illuminate\Support\Facades\Input::file('profilepic')->getClientOriginalName();
            $path = base_path() . '/public/uploads/profile/';
            Input::file('profilepic')->move($path, $this->emp->email.$filename);
            $emp->profilepic = $this->emp->email.$filename;
            $emp->save();

            return Redirect::to('/employer/profile');
        }
    }
    public function handle_update() {

        $emp = Employers::find($this->emp->empid);
        $emp->fname = Input::get('fname');
        $emp->lname = Input::get('lname');
        $emp->address = Input::get('address');
        $emp->bdate = Input::get('year')."-".Input::get('month')."-".Input::get('day');
        $emp->gender = Input::get('gender');
        $emp->religion = Input::get('religion');
        $emp->civilstatus = Input::get('status');
        $emp->contactno = Input::get('contactno');
        $emp->nationality = Input::get('nationality');
        $emp->regionid = Input::get('location');
        $emp->pitch = Input::get('pitch');
        
        $emp->save();

        return Redirect::to('employer/profile')
                        ->with('message', 'Profile updated.');
    }
    public function job_ads() {

        $subscription = DB::table('plan')
                            ->join('subscription', function($join){
                                $join->on('plan.planid', '=', 'subscription.planid')
                                    ->where('subscription.empid', '=', $this->emp->empid);
                            })->first();
        $ads = Ads::where('empid', '=', $this->emp->empid)->get();
        if(isset($ads) and count($ads) >0) {
            return View::make('employer.ads')
                        ->with('emp', $this->emp)
                        ->with('ads', $ads)
                        ->with('subscription',$subscription);
        }
        return Redirect::to('create/ad');
    }
    public function create_ads() {

        $jobtype = JobTypes::all();
        $location = Regions::all();
        return View::make('employer.create-ad')
                    ->with('emp', $this->emp)
                    ->with('jobtype', $jobtype)
                    ->with('location', $location)
                    ->with('salary', Salaries::all());
    }

    public function new_ads() {

        $temp = array (
            'location' => Input::get('location'),
            'position' => Input::get('jobtype'),
            'salary' => Input::get('salary'),
            'capacity' => Input::get('capacity'),
            'yearexp' => Input::get('yearexp'),
            'edlevel' => Input::get('edlevel'),
            'dayof' => Input::get('dayof'),
            'month' => Input::get('month'),
            'day' => Input::get('day'),
            'year' => Input::get('year')
        );

        $rules = array(
            'location' => 'required',
            'position' => 'required',
            'salary' => 'required',
            'capacity' => 'required',
            'edlevel' => 'required',
            'yearexp' => 'required',
            'dayof' => 'required',
            'month' => 'required',
            'year' => 'required',
            'day' => 'required'
        );
        $messages = array(
            'location.required' => 'Chose a location',
            'position.required' => 'Chose a position',
            'salary.required' => 'Chose a salary',
            'capacity.required' => 'Chose acapacity',
            'edlevel.required' => 'Chose a education level',
            'dayof.required' => 'Chose a dayof',
            'yearexp.required' => 'Chose a years of experience',
            'month.required' => 'Chose a month',
            'year.required' => 'Chose a year',
            'day.required' => 'Chose a day'
        );
        $validator = Validator::make($temp,$rules,$messages);
        if($validator->fails()) {
           $messages = $validator->messages();
            if(Input::has('job_desc') and Input::get('job_desc') > 0) {
                $job_desc = array();
                foreach(Input::get('job_desc') as $value) {
                    if($value != null) {
                        $job_desc[] = $value;
                    }
                }
                Session::put('job_desc', $job_desc);
            }
            return Redirect::to('/create/ad')
                            ->with('error', $messages)
                            ->with('message','Your ad is not created');
        }

        $ads = new Ads();
        $ads->empid = $this->emp->empid;
        $ads->regionid = Input::get('location');
        $ads->startdate = Input::get('year') .'-' . Input::get('month') .'-' .Input::get('day');
        $ads->capacity = Input::get('capacity');
        $ads->salaryid =Input::get('salary');
        $ads->gender = Input::get('gender');
        $ads->yearexp = Input::get('yearexp');
        $ads->contactno = $this->emp->contactno;
        $ads->dayof = Input::get('dayof');
        $ads->edlevel = Input::get('edlevel');
        $ads->jobtypeid = Input::get('jobtype');
        $ads->contractyears = Input::get('contractyears');
        $ads->pitch = Input::get('pitch');
        $ads->save();


        $duties = new Duties();
        $duties->adid = $ads->adid;
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


        if(Input::has('job_desc') and count(Input::get('job_desc')) > 0) {
            foreach(Input::get('job_desc') as $desc) {
                if($desc != null) {
                    $job_desc = new AdDesc();
                    $job_desc->adid = $ads->adid;
                    $job_desc->desc = $desc;
                    $job_desc->save();
                }
            }
            Session::forget('job_desc');
        }
        return Redirect::to('employer/ads')
                        ->with('message','New job ad created');

    }
    public function update_ads($id) {

        $ad = Ads::where('adid','=', $id)->first();
        $duties = Duties::where('adid', '=', $ad->adid)->first();
        $job_desc = AdDesc::where('adid', '=', $ad->adid)->get();
        if($job_desc and count($job_desc) >0 ) {
          Session::put('job_desc', $job_desc);
        }
        if($duties){
            Session::put('duties', $duties);
        }
        return View::make('employer.update-ad')
                    ->with('emp', $this->emp)
                    ->with('location', Regions::all())
                    ->with('ad', $ad)
                    ->with('salary', Salaries::all())
                    ->with('jobtype', JobTypes::all())
                    ->with('salary', Salaries::all());
    }
    public function handle_ad_update() {

          $ads = Ads::find(Input::get('adid'));
        $temp = array (
            'location' => Input::get('location'),
            'position' => Input::get('jobtype'),
            'salary' => Input::get('salary'),
            'capacity' => Input::get('capacity'),
            'yearexp' => Input::get('yearexp'),
            'edlevel' => Input::get('edlevel'),
            'dayof' => Input::get('dayof'),
            'month' => Input::get('month'),
            'day' => Input::get('day'),
            'year' => Input::get('year')
        );

        $rules = array(
            'location' => 'required',
            'position' => 'required',
            'salary' => 'required',
            'capacity' => 'required',
            'edlevel' => 'required',
            'yearexp' => 'required',
            'dayof' => 'required',
            'month' => 'required',
            'year' => 'required',
            'day' => 'required'
        );
        $messages = array(
            'location.required' => 'Chose a location',
            'position.required' => 'Chose a position',
            'salary.required' => 'Chose a salary',
            'capacity.required' => 'Chose acapacity',
            'edlevel.required' => 'Chose a education level',
            'dayof.required' => 'Chose a dayof',
            'yearexp.required' => 'Chose a years of experience',
            'month.required' => 'Chose a month',
            'year.required' => 'Chose a year',
            'day.required' => 'Chose a day'
        );
        $validator = Validator::make($temp,$rules,$messages);
        if($validator->fails()) {
           $messages = $validator->messages();
            return Redirect::to('/employer/ad/edit/'.$ads->adid)
                            ->with('error', $messages)
                            ->with('message','Your ad was not updated');
        }

        $ads->regionid = Input::get('location');
        $ads->startdate = Input::get('year') .'-' . Input::get('month') .'-' .Input::get('day');
        $ads->capacity = Input::get('capacity');
        $ads->salaryid =Input::get('salary');
        $ads->gender = Input::get('gender');
        $ads->yearexp = Input::get('yearexp');
        $ads->contactno = $this->emp->contactno;
        $ads->dayof = Input::get('dayof');
        $ads->edlevel = Input::get('edlevel');
        $ads->jobtypeid = Input::get('jobtype');
        $ads->contractyears = Input::get('contractyears');
        $ads->pitch = Input::get('pitch');
        $ads->save();



        $duties = Duties::find(Session::get('duties')->dutyid);
        $duties->cooking = Input::has('cooking') ? Input::get('cooking') : null;
        $duties->laundry = Input::has('laundry') ? Input::get('laundry') : null;
        $duties->gardening = Input::has('gardening') ?Input::get('gardening') : null;
        $duties->grocery = Input::has('grocery') ? Input::get('grocery') : null;
        $duties->cleaning = Input::has('cleaning') ? Input::get('cleaning') : null;
        $duties->tuturing = Input::has('tutoring') ? Input::get('tutoring') : null;
        $duties->driving = Input::has('driving') ? Input::get('driving') : null;
        $duties->pet = Input::has('pet') ? Input::get('pet') : null;
        $duties->other = Input::get('other');
        $duties->save();

      /*  if(Input::has('job_desc') and count(Input::get('job_desc')) > 0) {
            foreach(Input::get('job_desc') as $desc) {
                if($desc != null) {
                  //  $job_desc = where('')
                    $job_desc->adid = $ads->adid;
                    $job_desc->desc = $desc;
                    $job_desc->save();
                }
            }
            Session::forget('job_desc');

        }*/
        return Redirect::to('employer/ads')
                        ->with('message','Your job ad is updated.');

    }
    public function helpers() {
        $application = Applications::paginate(20);
        if(! $this->emp->subscribe) {
            return View::make('helpers.helpers')
                            ->with('emp', $this->emp)
                            ->with('application', $application)
                            ->with('locations', Regions::all())
                            ->with('jobtypes', JobTypes::all())
                            ->with('salary', Salaries::all());
        }
        return View::make('helpers.subscribed.helpers')
                        ->with('emp', $this->emp)
                        ->with('application', $application)
                        ->with('locations', Regions::all())
                        ->with('jobtypes', JobTypes::all())
                        ->with('salary', Salaries::all());
    }
    public function applicant_ad_profile($id) {

        $application = Applications::find($id);
        $applicant = Applicants::find($application->appid);
        $location = Regions::find($application->regionid);
        $jobtype = JobTypes::find($application->jobtypeid);
        $app_skill = ApplicantSkills::where('appid', '=', $application->appid)->first();
        $duties = Duties::find($app_skill->dutyid);

        return View::make('helpers.subscribed.applicant-application')
                        ->with('emp', $this->emp)
                        ->with('application', $application)
                        ->with('jobtype', $jobtype->description)
                        ->with('location', $location)
                        ->with('duties', $duties)
                        ->with('applicant', $applicant);

    }
    public function message_inbox() {
        return View::make('employer.message-inbox')->with('emp', $this->emp);
    }
    public function job_request() {
        $apply_ad = ApplyAds::where('empid', '=', $this->emp->empid)->get();
        return View::make('employer.job-request')
                    ->with('apply_ad',$apply_ad)
                    ->with('emp', $this->emp);
    }
    public function shortlist() {
        $shortlist = EmpShortList::where('empid', '=', $this->emp->empid)->get();
        return View::make('employer.shortlist')
                        ->with('emp',$this->emp)
                        ->with('shortlist',$shortlist);
    }
    public function hired_list() {

       $hirelist = HireLists::where('empid', '=', $this->emp->empid)->get();
        return View::make('employer.hired-list')
                        ->with('emp',$this->emp)
                        ->with('hirelist', $hirelist);
    }
    public function send_message() {
        $msg = new ApplicantMessages();
        $msg->appid = Input::get('applicationid');
        $msg->empid = Input::get('empid');
        $msg->message = Input::get('message');
        $msg->save();
        $status = array('status' => 200);
        return json_encode($status);
    }
    public function employer_logout() {

      Session::forget('employer');
      Session::flush();
      return Redirect::to('/');
    }
    public function notify() {
        $result = $this->itexmo('09226663075', 'Hello World','LOURE663075_MK585');
        if($result == "0") {
            return "Message sent";
        }
        return "Message not sent";
    }
    private function itexmo($number,$message,$apicode){
        $url = 'https://www.itexmo.com/php_api/api.php';
        $itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
        $param = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($itexmo),
            ),
        );
        $context  = stream_context_create($param);
        return file_get_contents($url, false, $context);
    }

}
