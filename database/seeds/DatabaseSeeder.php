<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        // Ask for db migration refresh, default is no
        if ($this->command->confirm('Do you wish to refresh migration before seeding, it will clear all old data ?')) {

            // Call the php artisan migrate:fresh using Artisan
            $this->command->call('migrate:fresh');

            $this->command->line("Database cleared.");
        }


        $this->call(DurationSeeder::class);
        $this->call(RepaymentPlanSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(EmailSubscriptionSeeder::class);
        $this->call(SubscriptionAmountSeeder::class);
        $this->call(StateSeeder::class);
        $this->call(LocalGovernmentAreaSeeder::class);
        $this->call(UserSeeder::class);

        $this->command->info("Database seeded.");

        // Re Guard model
        Eloquent::reguard();
    }
}
