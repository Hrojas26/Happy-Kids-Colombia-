<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gifts;
use App\Models\StateDonation;
use App\Models\User;
use Illuminate\Support\Facades\View;

class DashboradController extends Controller
{

    public function index()
    {
        $currentUser = \Auth::user();
        if ($currentUser->rol == 'admin') {
            $gifts = Gifts::where('company', $currentUser->id)->get();
        } else {
            $gifts = Gifts::where('company', $currentUser->id)->get();
        }

        //$gifts = Gifts::get();
        $donationStatuses = StateDonation::with('donation')->get();

        return View::make('page.empresa.dashboard', ['users' => User::all(), 'gifts' => $gifts, 'donationes' => $donationStatuses]);
    }
}