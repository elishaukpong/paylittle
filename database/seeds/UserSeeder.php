<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = factory(App\User::class, 4)->create();

        $users->each(function ( $user ) {
            factory(App\Models\Guarantor::class, 4)->create([
                'user_id' => $user->id,
            ]);

            factory(App\Models\Project::class, rand(9, 14))->create([
                'user_id' => $user->id,
                'status_id' => App\Models\Status::all()->random()->id,
                'duration_id' => App\Models\Duration::all()->random()->id,
                'repayment_id' => App\Models\RepaymentPlan::all()->random()->id,
                'guarantor_id' => App\Models\Guarantor::whereUserId($user->id)->get()->random()->id,
            ])->each(function($project){
                $project->slug = $this->generateSlug($project->name);
                $project->save();
                factory(App\Models\Photo::class)->create([
                    'imageable_id' => $project->id,
                    'imageable_type' => "App\Models\Project",
                    'avatar' => Faker\Factory::create()->image('storage/app/public/avatars/projects', 400, 400, null, false),
                ]);
            });

            factory(App\Models\Photo::class)->create([
                'imageable_id' => $user->id,
                'imageable_type' => "App\User",
                'avatar' => Faker\Factory::create()->image('storage/app/public/avatars/users', 400, 400, null, false),
            ]);

            factory(App\Models\bvn::class)->create([
                'user_id' => $user->id,
                'status_id' => App\Models\Status::all()->random()->id,
                'number' => Faker\Factory::create()->randomNumber(5),
            ]);

        });

    }

        public function generateSlug($projectName){
        do {
            //generate a random slug using Laravel's str_slug and str_random helper
            $slug = str_slug($projectName) . '_' . rand(1000,9000);
        } //check if the slug already exists and if it does, try again
        while (App\Models\Project::where('slug', $slug)->first());

        return $slug;
    }

}
