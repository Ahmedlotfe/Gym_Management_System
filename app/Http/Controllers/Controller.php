<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\UserSubscription;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function check_validation(Request $request)
    {
        $image = $request->get('image');

        $user = User::where('image', $image)->first();

        $user_subscription = UserSubscription::latest('created_at')
            ->where('user_id', $user->id)
            ->where('subscriped', true)
            ->first();

        if ($user_subscription && $user_subscription->end_date > date("Y/m/d")) {
            return response()->json(["validation" => "valid"]);
        } else {
            return response()->json(["validation" => "invalid"]);
        }
    }
}
