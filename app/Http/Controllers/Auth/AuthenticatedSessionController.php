<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\FinancialYear;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $currentYear = date('Y');
        $currentdate = date('Y-m-d');
       
        $financialYear = FinancialYear::where('start_date', '<=', $currentdate)
        ->where('end_date', '>=', $currentdate)
        ->first();

        if ($financialYear) {
            $sessionYear = $currentYear . '_' . ($currentYear + 1);
            session(['current_year' => $sessionYear]);
            return view('auth.login');
        } 
        else {

            $newFinancialYear = new FinancialYear();
            $newFinancialYear->start_date = $currentYear . '-04-01'; 
            $newFinancialYear->end_date = $currentYear + 1 . '-3-31';
            $newFinancialYear->name = $currentYear . '-' . ($currentYear + 1);
            $newFinancialYear->save();
    
            // Artisan::call('migrate  DischargeSummary.$financialYear ');



            // Set the current year session
            $sessionYear = $currentYear . '_' . ($currentYear + 1);
            session(['current_year' => $sessionYear]);
    
            return view('auth.login');

        }
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
