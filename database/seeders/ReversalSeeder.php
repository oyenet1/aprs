<?php

namespace Database\Seeders;

use App\Models\Payment;
use App\Models\Reversal;
use Illuminate\Database\Seeder;

class ReversalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $payment = Payment::all()->count();
        $status = ['processing', 'denied', 'approved'];
        for ($i=0; $i < 100; $i++) { 
            Reversal::create([
                'payment_id' => random_int(3, $payment),
                'status' => $status[array_rand($status)]
            ]);
        }
    }
}
