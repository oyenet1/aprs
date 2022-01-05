<?php

namespace Database\Seeders;

use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $purpose = ['school fees', 'add and drop', 'hostel accommodation', 'exam card'];
        $amount = [1000, 5000, 40000, 1600];
        
        for ($i=0; $i < 2000; $i++) { 
            Payment::create([
                'user_id' => random_int(2, 20),
                'purpose' => $purpose[array_rand($purpose)],
                'amount' => $amount[array_rand($amount)],
                'reference' => Str::random(10),
                'date_payed' => Carbon::now()->subDays(random_int(2, 50))
            ]);
        }
    }
}
