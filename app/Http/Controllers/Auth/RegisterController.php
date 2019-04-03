<?php

namespace App\Http\Controllers\Auth;

use App\Models\bvn;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Ramsey\Uuid\Uuid;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/registerphase';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'bvn' => ['required', 'string', 'min:11', 'max:11']
        ]);
    }


    protected function create(array $data)
    {
        $data['id'] = Uuid::uuid1();

        $user =  User::create([
            'id' => $data['id'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'slug' => $this->generateSlug($data),
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => $data['password'],
            'details' => '',
            'gender' => '',
            'is_admin' => '',
        ]);

        if($user){
            bvn::create([
                'user_id' => $data['id'],
               'number' => $data['bvn'],
                'status_id' => 1
            ]);
        }

        return $user;

    }

     public function generateSlug(array $data){
        do {
            //generate a random slug using Laravel's str_random helper
            $slug = $data['first_name'] . '_' . $data['last_name'] . '_' . str_random(4);
        } //check if the slug already exists and if it does, try again
        while (User::where('slug', $slug)->first());

        return $slug;
    }


}
