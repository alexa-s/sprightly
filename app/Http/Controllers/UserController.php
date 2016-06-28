<?php
namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Contracts\Auth\Guard;

class UserController extends Controller {

  /**
   * the model instance
   * @var User
   */
  protected $user;

  /**
   * The Guard implementation.
   *
   * @var Authenticator
   */
  protected $auth;

  /**
   * @param Guard $auth
   * @param User  $user
   */
  public function __construct(Guard $auth, User $user)
  {
    $this->user = $user;
    $this->auth = $auth;

    $this->middleware('guest', ['except' => ['getLogout']]);
  }

  /**
   * Show the application registration form.
   *
   * @return Response
   */
  public function getRegister()
  {
    return view('user.register');
  }

  /**
   * Show the application login form.
   *
   * @return Response
   */
  public function getLogin()
  {
    return view('user.login');
  }

  /**
   * Handle a registration request for the application.
   *
   * @param  RegisterRequest  $request
   * @return Response
   */
  public function postRegister(RegisterRequest $request)
  {
    $this->user->email = $request->email;
    $this->user->password = bcrypt($request->password);
    $this->user->save();

    $this->auth->login($this->user);
    return redirect('projects');
  }

  /**
   * Handle a login request to the application.
   *
   * @param  LoginRequest  $request
   * @return Response
   */
  public function postLogin(LoginRequest $request)
  {
    if ($this->auth->attempt($request->only('email', 'password')))
    {
      return redirect('projects');
    }

    return redirect('/login')->withErrors(['The credentials you entered did not match our records. Try again?']);
  }

  /**
   * Log the user out of the application.
   *
   * @return Response
   */
  public function getLogout()
  {
    $this->auth->logout();
    return redirect('/');
  }
}