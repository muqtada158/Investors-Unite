<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\MoneyLender;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MemberAuthController extends Controller
{
    public function showMemberLoginForm()
    {
        // return view('members.login');
        return view('members.login-register');
    }

    public function memberLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('member')->attempt($request->only(['email', 'password']), $request->get('remember')))
        {
            if(Auth::guard('member')->user()->status === 1 )
            {
                if(Auth::guard('member')->user()->type === 3)
                {
                    return redirect()->intended(route('dashboard.dashboard'));
                }
                else
                {
                    return redirect()->intended(route('index'));
                }
            }
            else
            {
                return back()->withErrors(['login' => 'Your id is InActive kindly contact Admin.']);
            }
        }
        else
        {
            return back()->withErrors(['login' => 'Invalid email or password.']);
        }
    }

    public function showMemberRegisterForm()
    {
        return view('auth.register', ['route' => route('member.register-view'), 'title'=>'Member']);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:members'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function createMember(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:members'],
            'password' => ['required', 'min:6', 'required_with:password_confirmation', 'same:password_confirmation'],
            'password_confirmation' => ['required', 'min:6'],
        ]);

        $member = Member::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        Auth::guard('member')->login($member);
        $notification = [
            'message' => 'Registered Successfully.',
            'alert-type' => 'success'
        ];
        return redirect()->intended(route('index'))->with($notification);
    }

    public function storeDeviceToken(Request $request)
    {
        $user = Member::where('id',auth()->guard('member')->user()->id)->update(['device_token'=> $request->token]);
        return response()->json(['status' => 1],200);
    }

    public function signup_money_lender()
    {
        return view('members.signup-money-lender');
    }

    public function register_money_lender(Request $request)
    {
        $this->validate($request, [
            'years_of_lending' => ['required', 'string', 'max:255'],
            'lending_min' => ['required', 'numeric'],
            'lending_max' => ['required', 'numeric'],
            'type_of_lending' => ['required', 'string', 'max:255'],
            'interest_rate' => ['required','numeric'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:members'],
            'password' => ['required', 'min:6', 'required_with:password_confirmation', 'same:password_confirmation'],
            'password_confirmation' => ['required', 'min:6'],
        ]);

        try {
            DB::beginTransaction();
            // Create a new Member
            $member = Member::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'type' => 4,
            ]);

            // Create a new MoneyLender associated with the member
            $money_lender = new MoneyLender([
                'years_of_lending' => $request['years_of_lending'],
                'lending_min' => $request['lending_min'],
                'lending_max' => $request['lending_max'],
                'type_of_lending' => $request['type_of_lending'],
                'interest_rate' => $request['interest_rate'],
                'status' => 1,
            ]);

            // Associate the MoneyLender with the Member
            $member->moneyLender()->save($money_lender);

            // Commit the transaction
            DB::commit();

            // Log in the member
            Auth::guard('member')->login($member);

            $notification = [
                'message' => 'Registered Successfully.',
                'alert-type' => 'success'
            ];

            return redirect()->intended(route('index'))->with($notification);
        } catch (\Exception $e) {
            DB::rollBack();

            $notification = [
                'message' => 'Registration failed. Please try again. Error '.$e,
                'alert-type' => 'error'
            ];

            return redirect()->back()->withInput()->with($notification);
        }
    }
}
