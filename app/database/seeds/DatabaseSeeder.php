<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();


        $this->call('ApplicantTableSeeder');
        $this->call('EmployerTableSeeder');
        $this->call('RegionTableSeeder');
        $this->call('JobTypeTableSeeder');
        $this->call('AdsTableSeeder');
        $this->call('ApplicationTableSeeder');
        $this->call('SalaryTableSeeder');
        $this->command->info('All tables has been seeded');
    }
}

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
class AdsTableSeeder extends Seeder{
    public function run() {
        $ad = new Ads();
        $ad->empid = 2;
        $ad->regionid = 3;
        $ad->startdate = '2017-4-5';
        $ad->capacity = 'Full Time';
        $ad->salaryid = 3;
        $ad->pitch = 'A honest and hardworking helper that can handle any household work';
        $ad->dayof = 5;
        $ad->gender = 'Female';
        $ad->yearexp = 2;
        $ad->edlevel = 2;
        $ad->contractyears = 3;
        $ad->jobtypeid = 2;
        $ad->save();

        $duties = new Duties();
        $duties->empid = 2;
        $duties->cooking = "Cooking";
        $duties->laundry = "Laundry";
        $duties->gardening = "Gardening";
        $duties->grocery = "Grocery";
        $duties->cleaning = "Cleaning";
        $duties->tuturing = "Tutoring";
        $duties->other = "The helper must also help us taking our 3 year old child";
        $duties->save();

        //  END OF RECORD 1

        $ad = new Ads();
        $ad->empid = 3;
        $ad->regionid = 3;
        $ad->startdate = '2017-4-5';
        $ad->capacity = 'Full Time';
        $ad->salaryid = 3;
        $ad->pitch = 'A honest and hardworking helper that can handle any household work';
        $ad->dayof = 5;
        $ad->gender = 'Female';
        $ad->yearexp = 2;
        $ad->edlevel = 2;
        $ad->contractyears = 3;
        $ad->jobtypeid = 2;
        $ad->save();

        $duties = new Duties();
        $duties->empid = 3;
        $duties->cooking = "Cooking";
        $duties->laundry = "Laundry";
        $duties->gardening = "Gardening";
        $duties->grocery = "Grocery";
        $duties->cleaning = "Cleaning";
        $duties->tuturing = "Tutoring";
        $duties->other = "The helper must also help us taking our 3 year old child";
        $duties->save();

        //END OF RECORD 2

        $ad = new Ads();
        $ad->empid = 1;
        $ad->regionid = 3;
        $ad->startdate = '2017-4-5';
        $ad->capacity = 'Full Time';
        $ad->salaryid = 3;
        $ad->pitch = 'A honest and hardworking helper that can handle any household work';
        $ad->dayof = 5;
        $ad->gender = 'Female';
        $ad->yearexp = 2;
        $ad->edlevel = 2;
        $ad->contractyears = 3;
        $ad->jobtypeid = 2;
        $ad->save();

        $duties = new Duties();
        $duties->empid = 1;
        $duties->cooking = "Cooking";
        $duties->laundry = "Laundry";
        $duties->gardening = "Gardening";
        $duties->grocery = "Grocery";
        $duties->cleaning = "Cleaning";
        $duties->tuturing = "Tutoring";
        $duties->other = "The helper must also help us taking our 3 year old child";
        $duties->save();

        //END OF RECORD 3
    }
}
class ApplicantTableSeeder extends Seeder {
    public function run() {
        $app = new Applicants();
        $app->email = 'rexustraya@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Lourence';
        $app->lname = 'Traya';

        $app->save();

        $app = new Applicants();
        $app->email = 'lourence@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Rex';
        $app->lname = 'Bohol';

        $app->save();

        $app = new Applicants();
        $app->email = 'rextraya@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Rexus_a';
        $app->lname = 'Traya';

        $app->save();

        $app = new Applicants();
        $app->email = 'rextraya@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Rexus_b';
        $app->lname = 'Traya';

        $app->save();

        $app = new Applicants();
        $app->email = 'rextraya@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Rexus_c';
        $app->lname = 'Traya';

        $app->save();

        $app = new Applicants();
        $app->email = 'rextraya@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Rexus_d';
        $app->lname = 'Traya';

        $app->save();

        $app = new Applicants();
        $app->email = 'rextraya@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Rexus_e';
        $app->lname = 'Traya';

        $app->save();

        $app = new Applicants();
        $app->email = 'rextraya@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Rexus_f';
        $app->lname = 'Traya';

        $app->save();

        $app = new Applicants();
        $app->email = 'rextraya@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Rexus_g';
        $app->lname = 'Traya';

        $app->save();

        $app = new Applicants();
        $app->email = 'rextraya@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Rexus_h';
        $app->lname = 'Traya';

        $app->save();

        $app = new Applicants();
        $app->email = 'rextraya@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Rexus_i';
        $app->lname = 'Traya';

        $app->save();

        $app = new Applicants();
        $app->email = 'rextraya@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Rexus_j';
        $app->lname = 'Traya';

        $app->save();

        $app = new Applicants();
        $app->email = 'rextraya@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Rexus_k';
        $app->lname = 'Traya';

        $app->save();

        $app = new Applicants();
        $app->email = 'rextraya@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Rexus_m';
        $app->lname = 'Traya';

        $app->save();

        $app = new Applicants();
        $app->email = 'rextraya@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Rexus_l';
        $app->lname = 'Traya';

        $app->save();

        $app = new Applicants();
        $app->email = 'rextraya@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Rexus_m';
        $app->lname = 'Traya';

        $app->save();

        $app = new Applicants();
        $app->email = 'rextraya@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Rexus_n';
        $app->lname = 'Traya';

        $app->save();

        $app = new Applicants();
        $app->email = 'rextraya@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Rexus';
        $app->lname = 'Traya';

        $app->save();

        $app = new Applicants();
        $app->email = 'rextraya@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Rexus_o';
        $app->lname = 'Traya';

        $app->save();

        $app = new Applicants();
        $app->email = 'rextraya@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Rexus_p';
        $app->lname = 'Traya';

        $app->save();

        $app = new Applicants();
        $app->email = 'rextraya@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Rexus_q';
        $app->lname = 'Traya';

        $app->save();

        $app = new Applicants();
        $app->email = 'rextraya@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Rexus_r';
        $app->lname = 'Traya';

        $app->save();

        $app = new Applicants();
        $app->email = 'rextraya@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Rexus_s';
        $app->lname = 'Traya';

        $app->save();

        $app = new Applicants();
        $app->email = 'rextraya@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Rexus_t';
        $app->lname = 'Traya';

        $app->save();

        $app = new Applicants();
        $app->email = 'rextraya@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Rexus_u';
        $app->lname = 'Traya';

        $app->save();

        $app = new Applicants();
        $app->email = 'rextraya@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Rexus_v';
        $app->lname = 'Traya';

        $app->save();

        $app = new Applicants();
        $app->email = 'rextraya@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Rexus_w';
        $app->lname = 'Traya';

        $app->save();

        $app = new Applicants();
        $app->email = 'rextraya@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Rexus_x';
        $app->lname = 'Traya';

        $app->save();

        $app = new Applicants();
        $app->email = 'rextraya@gmail.com';
        $app->password = 'hahahehe';
        $app->fname = 'Rexus_y';
        $app->lname = 'Traya';

        $app->save();
    }
}
class EmployerTableSeeder extends Seeder {
    public function run() {
        $emp = new Employers();
        $emp->email = 'rex@outlook.com';
        $emp->password = 'hahahehe';
        $emp->fname = 'Rexus';
        $emp->lname = 'Muana';
        $emp->gender = 'Male';
        $emp->save();

        $emp = new Employers();
        $emp->email = 'ruseltayong@gmail.com';
        $emp->password = 'hahahehe';
        $emp->fname = 'Rusel';
        $emp->lname = 'Tayong';
        $emp->gender = 'Male';
        $emp->save();

        $emp = new Employers();
        $emp->email = 'mark.com';
        $emp->password = 'hahahehe';
        $emp->fname = 'Mark';
        $emp->lname = 'Mamogay';
        $emp->gender = 'Male';
        $emp->save();

        $emp = new Employers();
        $emp->email = 'myfirstemail@gmail.com';
        $emp->password = 'hahahehe';
        $emp->fname = 'First';
        $emp->lname = 'Account';
        $emp->gender = 'Female';
        $emp->save();

        $emp = new Employers();
        $emp->email = 'mysecondemail@gmail.com';
        $emp->password = 'hahahehe';
        $emp->fname = 'Second';
        $emp->lname = 'Account';
        $emp->gender = 'Female';
        $emp->save();

        $emp = new Employers();
        $emp->email = 'myfifthemail@gmail.com';
        $emp->password = 'hahahehe';
        $emp->fname = 'Fith';
        $emp->lname = 'Account';
        $emp->gender = 'Female';
        $emp->save();
        $emp = new Employers();
        $emp->email = 'mythirdemail@gmail.com';
        $emp->password = 'hahahehe';
        $emp->fname = 'Third';
        $emp->lname = 'Account';
        $emp->gender = 'Female';
        $emp->save();

        $emp = new Employers();
        $emp->email = 'mythirdemail@gmail.com';
        $emp->password = 'hahahehe';
        $emp->fname = 'Third';
        $emp->lname = 'Account';
        $emp->gender = 'Female';
        $emp->save();

        $emp = new Employers();
        $emp->email = 'myfourthemail@gmail.com';
        $emp->password = 'hahahehe';
        $emp->fname = 'Fourth';
        $emp->lname = 'Account';
        $emp->gender = 'Female';
        $emp->save();

    }
}

class RegionTableSeeder extends Seeder {
    public function run() {
        $regions = new Regions();
        $regions->location = 'Cebu City';
        $regions->save();

        $regions = new Regions();
        $regions->location = 'Davao city';
        $regions->save();

        $regions = new Regions();
        $regions->location = 'Zaboanga Del Sur';
        $regions->save();

        $regions = new Regions();
        $regions->location = 'Zamboanga Del Norte';
        $regions->save();


        $regions = new Regions();
        $regions->location = 'Mandaue City';
        $regions->save();

        $regions = new Regions();
        $regions->location = 'Danao City';
        $regions->save();

        $regions = new Regions();
        $regions->location = 'Consocalcion City';
        $regions->save();

        $regions = new Regions();
        $regions->location = 'Lilion City';
        $regions->save();

        $regions = new Regions();
        $regions->location = 'Talisay City';
        $regions->save();

        $regions = new Regions();
        $regions->location = 'Lapu-Lapu City';
        $regions->save();
    }
}

class JobTypeTableSeeder extends Seeder {
    public function run() {
        $type = new JobTypes();
        $type->description = 'Nanny';
        $type->save();

        $type = new JobTypes();
        $type->description = 'Baby Sitter';
        $type->save();

        $type = new JobTypes();
        $type->description = 'Adsult Sitter';
        $type->save();

        $type = new JobTypes();
        $type->description = 'Nanny';
        $type->save();

        $type = new JobTypes();
        $type->description = 'Pet Sitter';
        $type->save();

        $type = new JobTypes();
        $type->description = 'AU Pair';
        $type->save();

        $type = new JobTypes();
        $type->description = 'Tutor';
        $type->save();

        $type = new JobTypes();
        $type->description = 'All Around';
        $type->save();
    }
}