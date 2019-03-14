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
            $projects = factory(App\Models\Project::class, rand(9, 14))->create([
                'user_id' => $user->id, 'status_id' => App\Models\Status::all()->random()->id, 'duration_id' => App\Models\Duration::all()->random()->id, 'repayment_id' => App\Models\RepaymentPlan::all()->random()->id,
            ]);
            $projects->each(function ( $project ) {
                factory(App\Models\Photo::class)->create([
                    'imageable_id' => $project->id, 'imageable_type' => "App\Models\Project", 'avatar' => Faker\Factory::create()->image('storage/app/public/avatars/projects', 400, 400, null, false),
                ]);
            });

            factory(App\Models\Photo::class)->create([
                'imageable_id' => $user->id, 'imageable_type' => "App\User", 'avatar' => Faker\Factory::create()->image('storage/app/public/avatars/users', 400, 400, null, false),
            ]);

            factory(App\Models\bvn::class)->create([
                'user_id' => $user->id, 'status_id' => App\Models\Status::all()->random()->id, 'number' => Faker\Factory::create()->randomNumber(5),
            ]);

        });
    }

}
