<?php

namespace App\Http\Controllers;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index($tab = null)
    {
        $user = Auth::user();
        $countries = Country::all();

        return view('pages.profile.index', [
            'user' => $user,
            'countries' => $countries,
            'tab' => $tab
        ]);
    }

    public function account(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'gender' => 'required|string',
            'dob' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('profile.index', 'account')->withErrors($validator)->withInput();
        }

        $user = Auth::user();

        $user->update(['name' => $request->input('name')]);
        $user->metas()->updateOrCreate(['meta_key' => 'gender'], ['meta_value' => $request->input('gender')]);
        $user->metas()->updateOrCreate(['meta_key' => 'dob'], ['meta_value' => $request->input('dob')]);

        if ($request->has('profile_picture')) {
            $user_id = $user->id;

            $file = $request->file('profile_picture');
            $file_name = sprintf('%s_%s_%s.%s', 'profile_picture', $user_id, time(), $file->getClientOriginalExtension());
            if (Storage::disk('public')->put('/profiles/' . $file_name, $file->get())) {
                $user->metas()->updateOrCreate(['meta_key' => 'profile_picture'], ['meta_value' => $file_name]);
            }
        }

        Session::flash('account', "Account information successfully updated.");
        return redirect()->route('profile.index', 'account');
    }

    public function address(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'street_1' => 'required|string',
            'city' => 'required|string',
            'region' => 'required|string',
            'country' => 'required',
            'zipcode' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->route('profile.index', 'address')->withErrors($validator)->withInput();
        }

        $user = Auth::user();

        $user->address()->updateOrCreate(['user_id' => $user->id], $request->all());

        Session::flash('address', "Address successfully updated.");
        return redirect()->route('profile.index', 'address');
    }
}
