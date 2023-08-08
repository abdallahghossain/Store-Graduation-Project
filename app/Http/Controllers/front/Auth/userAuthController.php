<?php

namespace App\Http\Controllers\front\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class userAuthController extends Controller
{
    //
    public function showRegister() {
        return response()->view('front.userAuth.userRegister');
    }
    public function register(Request $request)
    {

        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:4',
        ]);

        if (!$validator->fails()) {

            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $saved = $user->save();
            return response()->json(['status' => $saved, 'message' => $saved ? "Registered Successfully" : "Registeration Failed!", 'object' => $user],
                $saved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['status' => false ,'message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST);
        }
    }
    public function showLogin() {
        return response()->view('front.userAuth.userLogin');
    }

    public function Login (Request $request) {

            $validator = validator($request->all(), [
                'email' => 'required|email|exists:users,email',
                'password' => 'required',
            ]);

            if (!$validator->fails()) {
                $credentials = ['email' => $request->input('email'), 'password' => $request->input('password')];
                if (Auth::guard('web')->attempt($credentials)) {
                    return response()->json(
                        [
                            'message' ? "logged in seccessfuly": "Check your email or password , try again"
                        ],
                    $credentials ? Response::HTTP_OK :  Response::HTTP_BAD_REQUEST
                    );
                }
            } else {
                return response()->json(
                    ['message' => $validator->getMessageBag()->first()],
                    Response::HTTP_BAD_REQUEST
                );
            }
    }

    public function logout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect()->guest(route('home'));
    }
}
