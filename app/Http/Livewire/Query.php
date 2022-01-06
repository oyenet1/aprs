<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Livewire\Component;

class Query extends Component
{


    function query($id)
    {
        $payment = Payment::findOrFail($id);
        // dd($payment);
        $true = $payment->reversals()->create();

        if ($true) {
            $this->dispatchBrowserEvent('swal:success', [
                'icon' => 'success',
                'text' => 'If the reversal is succesful, you should have your money return to your bank account',
                'title' => 'Reversal Submitted',
                'timer' => 4000,
            ]);
        }
    }

    public function render()
    {
        $user = Auth()->user();
        $payments = Payment::where('user_id', auth()->user()->id)->get();
        return view('livewire.query', compact(['payments', 'user']));
    }
}
