<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
//tesssss

class HomeController extends Controller
{
    /**
     * Handle user login.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws ValidationException
     */
    public function login(Request $request)
{
    // Validate the login request data
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');
    $remember = $request->filled('remember');

    // Attempt to authenticate the user
    if (Auth::attempt($credentials, $remember)) {
        // Redirect the user based on their level
        if (Auth::user()->level === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->level === 'panitia') {
            return redirect()->route('panitia.dashboard');
        } else {
            return redirect()->route('user.landing');
        }
    }

    // If authentication fails, redirect back with an error
    throw ValidationException::withMessages([
        'email' => [trans('auth.failed')],
    ]);
}

    /**
     * Show the login form.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle password change.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws ValidationException
     */
    public function changePassword(Request $request)
    {
        // Validate the password change request data
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        // Check if the current password matches the user's password
        if (Hash::check($request->current_password, $user->password)) {
            // Update the user's password with the new one
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->route('password.change')->with('status', 'Password changed successfully.');

        }

        // If current password doesn't match, redirect back with an error
        throw ValidationException::withMessages([
            'current_password' => ['Incorrect current password.'],
        ]);
    }

    /**
     * Show the change password form.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showChangePasswordForm()
    {
        return view('auth.change_password');
    }

    /**
     * Handle password reset.
     *
     * @param  Request  $request
     * @return void
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('status', 'Password reset successful. Please log in with your new password.');
    }

    /**
     * Show the reset password form.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showResetPasswordForm()
    {
        return view('auth.reset_password');
    }

    /**
     * Handle user logout.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();

        Session::flush();

        // Redirect to the landing page
        return redirect('/');
    }
    

    /**
     * Handle user registration.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validate the registration request data
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user with the provided data and default level as 'user'
        $user = User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'user',
        ]);

        // Log in the newly registered user
        Auth::login($user);

        // Redirect the user to their respective dashboard
        return redirect()->route('user.landing');
    }

    /**
     * Show the register form.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Show the user dashboard.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showUserDashboard()
    {
        $user = Auth::user(); // Get the authenticated user
        return view('user.dashboard', compact('user')); // Pass the user variable to the view
    }
    public function UserLanding()
    {
        $user = Auth::user(); // Get the authenticated user
        return view('user.landing', compact('user')); // Pass the user variable to the view
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showAdminDashboard()
    {
    $user = Auth::user(); // Get the authenticated user
    $adminCount = User::where('level', 'admin')->count();
    $panitiaCount = User::where('level', 'panitia')->count();
    $pendaftarCount = User::where('level', 'user')->count();

    return view('admin.dashboard', compact('adminCount', 'panitiaCount', 'pendaftarCount', 'user'));
    }

    /**
     * Show the panitia dashboard.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function showPanitiaDashboard()
    {
    $user = Auth::user(); // Get the authenticated user
    return view('panitia.dashboard', compact('user')); // Pass the user variable to the view
    }

    public function viewProfile()
    {
        $user = Auth::user();
        $level = $user->level;

        if ($level === 'admin') {
            // Custom logic for admin level
            return view('admin.profile', compact('user'));
        } elseif ($level === 'panitia') {
            // Custom logic for moderator level
            return view('panitia.profile', compact('user'));
        } elseif ($level === 'user') {
            // Custom logic for regular user level
            return view('user.profile', compact('user'));
        } 
    }
}
