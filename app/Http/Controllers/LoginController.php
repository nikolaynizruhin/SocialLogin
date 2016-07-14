<?php

namespace App\Http\Controllers;

use App\LoginUser;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Exceptions\SocialAuthException;

class LoginController extends Controller
{
    /**
     * Login user instance
     *
     * @var LoginUser
     */
    protected $loginUser;

    /**
     * Set LoginUser
     *
     * @param LoginUser $loginUser
     */
    public function __construct(LoginUser $loginUser)
    {
        $this->loginUser = $loginUser;
    }

    /**
     * Show Login Page
     *
     * @return Response
     */
    public function showLoginPage()
    {
        return view('login');
    }

    /**
     * Show Dashboard
     *
     * @return Response
     */
    public function showDashboard()
    {
        return view('dashboard');
    }

    /**
     * Authenticate
     *
     * @param string $provider
     */
    public function auth($provider)
    {
        return $this->loginUser->authenticate($provider);
    }

    /**
     * Login
     *
     * @param string $provider
     */
    public function login($provider)
    {
        try {
            $this->loginUser->login($provider);
            return redirect()->action('LoginController@showDashBoard');
        } catch (SocialAuthException $e) {
            return redirect()->action('LoginController@showLoginPage')
                ->with('flash-message', $e->getMessage());
        }
    }

    /**
     * Logout
     *
     * @return Response
     */
    public function logout()
    {
       auth()->logout();
       return redirect()->to('/'); 
    }
}
