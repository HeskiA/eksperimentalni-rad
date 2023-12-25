<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//use Faker\Generator as Faker;
use App\Models\Profile;
use App\Models\User;
use App\Models\Region;
use App\Models\Region2;
use App\Models\Industry;
use App\Models\Industry2;
use App\Models\Position2;
use App\Models\Position;
use App\Models\Education2;
use App\Models\Education;
use App\Models\ContactInfo2;
use App\Models\ContactInfo;





class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = \Faker\Factory::create();
        $faker->seed(1234);
        $n = 500;
        for($i=0; $i<$n; $i++)
        {
            $profile = new Profile;
            $user = new User;
            $region = new Region;
            $region2 = new Region2;
            $industry = new Industry;
            $industry2 = new Industry2;
            $position = new Position;
            $position2 = new Position2;
            $education = new Education;
            $education2 = new Education2;
            $contactinfo = new ContactInfo;
            $contactinfo2 = new ContactInfo2;


            $profile->first_name = $faker->firstName;
            $user->first_name = $profile->first_name;

            $profile->last_name = $faker->lastName;
            $user->last_name = $profile->last_name;

            $profile->summary = $faker->text;
            $user->summary = $profile->summary;

            $region->region_name = $faker->city;
            $region2->region_name = $region->region_name;

            $region->save();
            $region2->save();

            $user->region_id = $region->id;
            $profile->region_id = $region2->id; 

            $industry->industry_name = $faker->jobTitle;
            $industry2->industry_name = $industry->industry_name;
            
            $industry->save();
            $industry2->save();

            $user->industry_id = $industry->id;
            $profile->industry_id = $industry2->id;

            $profile->save();
            $user->save();

            $position->user_id = $user->id;
            $position2->user_id = $profile->_id;
            $position->job_title = $faker->jobTitle;
            $position2->job_title = $position->job_title;
            $position->organization = $faker->company;
            $position2->organization = $position->organization;
            
            $position->save();
            $position2->save();

            $profile->positions = array(['id' => $position2->id, 'user_id' => $position2->user_id, 
                'job_title' => $position2->job_title, 'organization' => $position2->organization]);
            $profile->save();

            $education->user_id = $user->id;
            $education2->user_id = $profile->_id;
            $education->school_name = $faker->catchPhrase; // nema nista za school name u fakerphp-u
            $education2->school_name = $education->school_name;
            $education->start = $faker->numberBetween(1950,2000);
            $education2->start = $education->start;
            $education->end = $education->start + 5;
            $education2->end = $education->end;

            $education->save();
            $education2->save();

            $profile->education = array(['id' => $education2->id, 'user_id' => $education2->user_id, 
            'school_name' => $education2->school_name, 'start' => $education2->start, 'end' => $education2->end]);
            $profile->save();

            $types = ["twitter", "blog", "facebook", "linkedin"];
            $contactinfo->user_id = $user->id;
            $contactinfo2->user_id = $profile->_id;
            $contactinfo->type = $types[$faker->numberBetween(0,3)];
            $contactinfo2->type = $contactinfo->type;
            $contactinfo->url = $faker->url;
            $contactinfo2->url = $contactinfo->url;

            $contactinfo->save();
            $contactinfo2->save();

            $profile->contact_info = [
                $contactinfo2->type => $contactinfo2->url];
            $profile->save();

        }
    }
}
