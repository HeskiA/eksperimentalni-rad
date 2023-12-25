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
        $n = 10;
        for($i=0; $i<$n; $i++)
        {
            $profile = new Profile;
            $user = new User;
            $region = new Region;
            $region2 = new Region2;
            $industry = new Industry;
            $industry2 = new Industry2;


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
        }
    }
}
