<?php
/**
 * Created by PhpStorm.
 * User: Lourence
 * Date: 8/14/2016
 * Time: 3:00 PM
 */
class ApplicationTableSeeder extends Seeder {
    public function run() {
        $application = new Applications();
        $application->appid = 1;
        $application->salary = 5000.00;
        $application->jobtypeid = 2;
        $application->capacity = 'Full Time';
        $application->edlevel = 2;
        $application->regionid = 5;
        $application->nationality = 'Filipino';
        $application->pitch = 'I am willing to handle all the task that would be given to me';
        $application->save();

        $duties = new Duties();
        $duties->cooking = 'Cooking';
        $duties->laundry = 'Laundry';
        $duties->gardening = 'Gardening';
        $duties->grocery = 'Grocery';
        $duties->cleaning = 'Cleaning';
        $duties->tuturing = 'Tutoring';
        $duties->other = 'I can also take care of a child aged 3 years old below';
        $duties->save();

        $skills = new ApplicantSkills();
        $skills->appid = 1;
        $skills->dutyid = $duties->dutyid;
        $skills->save();

        // END OF APP RECORD 1

        $application = new Applications();
        $application->appid = 2;
        $application->salary = 5000.00;
        $application->jobtypeid = 2;
        $application->capacity = 'Full Time';
        $application->edlevel = 2;
        $application->regionid = 5;
        $application->nationality = 'Filipino';
        $application->pitch = 'I am willing to handle all the task that would be given to me';
        $application->save();

        $duties = new Duties();
        $duties->cooking = 'Cooking';
        $duties->laundry = 'Laundry';
        $duties->gardening = 'Gardening';
        $duties->grocery = 'Grocery';
        $duties->cleaning = 'Cleaning';
        $duties->tuturing = 'Tutoring';
        $duties->other = 'I can also take care of a child aged 3 years old below';
        $duties->save();

        $skills = new ApplicantSkills();
        $skills->appid = 3;
        $skills->dutyid = $duties->dutyid;
        $skills->save();

        // END OF APP RECORD 2

        $application = new Applications();
        $application->appid = 2;
        $application->salary = 5000.00;
        $application->jobtypeid = 2;
        $application->capacity = 'Full Time';
        $application->edlevel = 2;
        $application->regionid = 5;
        $application->nationality = 'Filipino';
        $application->pitch = 'I am willing to handle all the task that would be given to me';
        $application->save();

        $duties = new Duties();
        $duties->cooking = 'Cooking';
        $duties->laundry = 'Laundry';
        $duties->gardening = 'Gardening';
        $duties->grocery = 'Grocery';
        $duties->cleaning = 'Cleaning';
        $duties->tuturing = 'Tutoring';
        $duties->other = 'I can also take care of a child aged 3 years old below';
        $duties->save();

        $skills = new ApplicantSkills();
        $skills->appid = 3;
        $skills->dutyid = $duties->dutyid;
        $skills->save();

        // END OF APP RECORD 3

        $application = new Applications();
        $application->appid = 4;
        $application->salary = 5000.00;
        $application->jobtypeid = 2;
        $application->capacity = 'Full Time';
        $application->edlevel = 2;
        $application->regionid = 5;
        $application->nationality = 'Filipino';
        $application->pitch = 'I am willing to handle all the task that would be given to me';
        $application->save();

        $duties = new Duties();
        $duties->cooking = 'Cooking';
        $duties->laundry = 'Laundry';
        $duties->gardening = 'Gardening';
        $duties->grocery = 'Grocery';
        $duties->cleaning = 'Cleaning';
        $duties->tuturing = 'Tutoring';
        $duties->other =  'I can also take care of a child aged 3 years old below';
        $duties->save();

        $skills = new ApplicantSkills();
        $skills->appid = 4;
        $skills->dutyid = $duties->dutyid;
        $skills->save();

        // END OF APP RECORD 4
    }
}