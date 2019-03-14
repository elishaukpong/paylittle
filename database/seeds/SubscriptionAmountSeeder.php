<?php

use Illuminate\Database\Seeder;

class SubscriptionAmountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amounts = collect([10000, 20000,30000, 40000, 50000]);
        $amounts->each(function ($amount) {
            factory(App\Models\sponsorshipAmount::class)->create(['amount' => $amount]);
        });
    }
}
