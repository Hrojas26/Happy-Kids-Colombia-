<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\Gifts;
use App\Models\StateDonation;
use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class DashboradController extends Controller
{

    public function index(Request $request)
    {
        $gifts = Gifts::get();
        $donationStatuses = StateDonation::with('donation')->get();

        return View::make('page.empresa.dashboard', ['users' => User::all(), 'gifts' => $gifts, 'donationes' => $donationStatuses]);
    }
}
