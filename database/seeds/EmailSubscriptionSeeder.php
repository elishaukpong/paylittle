<?php

use Illuminate\Database\Seeder;

class EmailSubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\EmailSubscription::class, 25)->create();
    }
}
