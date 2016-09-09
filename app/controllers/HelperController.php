<?php

/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 8/17/2016
 * Time: 11:54 PM
 */
class HelperController extends BaseController {

    private $emp;
	public function __construct() {

        if(Session::has('employer')) {
            $this->emp = Employers::find(Session::get('employer')->empid);
        }
	}
    public function helpers() {
        if(! Session::has('employer')) {
            return Redirect::to('/user-login')->with('auth','To view helper profiles you must be already signed in');
        }
        $application = Applications::paginate(20);
        $subscription = Subscriptions::where('empid', '=' ,$this->emp->empid)->first();

        if($subscription == null and count($subscription) <= 0) {
            return View::make('helpers.helpers')
            				->with('emp',$this->emp)
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

    public function application_view($id) {
        $application = Applications::find($id);
        $applicant = Applicants::find($application->appid);
        $location = Regions::find($application->regionid);
        $jobtype = JobTypes::find($application->jobtypeid);
        $app_skill = ApplicantSkills::where('applicationid', '=', $application->applicationid)->first();
        $salary = Salaries::find($application->salaryid);
    
        $duties = Duties::find($app_skill->dutyid);

        return View::make('helpers.subscribed.applicant-application')
            ->with('emp', $this->emp)
            ->with('application', $application)
            ->with('jobtype', $jobtype->description)
            ->with('location', $location)
            ->with('duties', $duties)
            ->with('applicant', $applicant)
            ->with('salary', $salary);
    }
}
