<?php

namespace App\Http\Controllers;

use Auth;
use Image;
use Storage;
use Request;
use App\User;
use App\Role;
use App\Course;
use Illuminate\Support\Str;
use App\Mail\EnrollStudent;
use App\Mail\AccountActivated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clients = User::all(); 

        return view('clients.index', compact('clients'));
    }

    public function show($client_id)
    {

        $client = User::where('id', $client_id)->with(array('company', 'lessonViews', 

        'testReports'=>function($query){
            $query->with('test');
        }, 
        'courses'=>function($query){
            $query->with(array('modules'=>function($query){
                $query->with(array('lessons'=>function($query){
                    $query->with('tests');
                }));
            }));
        }))->first();

        $thread = new Thread();
        $threads =  Thread::between([$client_id, Auth::id()])->get();

        return view('clients.show', compact('client', 'threads'));
    }

    public function profile()
    {

        $user = User::find(Auth::user()->id);

        return view('users.show', compact('user'));

    }

    public function create()
    {     

        $courses = Course::all();

        return view('clients.create', compact('courses'));
    }

    public function enroll($course_id)
    {     

        $course = Course::find($course_id);

        COUNT($course->totalClients) ? $totalClients = $course->totalClients()->first()->count: $totalClients = 0;

        return view('clients.enroll', compact('course', 'totalClients'));
    }

    public function store(Request $request)
    {


        
        if($request::has('client-id')){

            //Get existing client
            $client = User::find($request::input('client-id'));

        }else{

            //Check if user has been created before

            $client = User::where('email', $request::input('email'))->first();

            if ($client === null) {

                //Create a new client
                $client = User::create([
                                    'first_name' => $request::input('first-name'),
                                    'email' => $request::input('email'),
                                    'verifyToken' => Str::random(40)
                                ]);

                

                //Send Verification Email
                $email = Mail::to( $request::input('email') )->send(new EnrollStudent($client));

            }
        }

        $course_id = $request::input('course_id');
        $request::session()->forget('status');

        
        if($client){

            $isAlreadyMember = $client->courses()->where('course_id', $course_id)->count();

            if($isAlreadyMember){

                $request::session()->flash('status', $client->first_name . ' is already a member for this course!');
                $request::session()->flash('type', 'warning');

            }else{

                //Register the clients role
                $client_role_id = Role::where('name', 'client')->first()->id;
                $client->roles()->sync([$client_role_id], false);

                //Assign the client to the associated course
                $client->courses()->sync([$course_id], false);

                $request::session()->flash('status', $client->first_name . ' has been successfully enrolled!');
                $request::session()->flash('type', 'success');

            }

        }

        if($request::has('url')){
            return redirect($request::input('url'));
        }else{
            return redirect('/clients/create');
        }
        
    }


    public function activate($client_email, $client_token)
    {

        $client = User::where('email', $client_email)->first();

        if($client->email == $client_email && $client->verifyToken == $client_token){

            //Verify Acccount
            $verified = $client->update([
                                'status' => 1,
                                'verifyToken' => Null
                            ]);    

            if($verified){

                $client = User::where('email', $client_email)->first();

                //Send Account Verified Email

                Mail::to( $client_email )->send(new AccountActivated($client));                

                return redirect('/clients/account/setup/'.$client_email);

            }            

        }else{

            echo 'Account activation link has expired!';

        }
        
    }

    public function setup($client_email)
    {

        $client = User::where('email', $client_email)->first();

        if($client->status == 1 && $client->verifyToken == Null){

            return view('clients.setup', compact('client'));           

        }else{

            echo 'Account Setup Restricted!';

        }
        
    }

    public function update(Request $request, $course_id)
    {

        $image_name = '';

        if(Input::file())
        {

            $image = Input::file('profile-image');
            
            Image::make($image->getRealPath())->widen(318, function ($constraint) {
                $constraint->upsize();
            })->crop(80, 80, 0, 0);

            if($image->guessClientExtension() == 'jpeg' || $image->guessClientExtension() == 'jpg'){
                
                Image::make($image)->encode('jpg', 60);
            
            }else if($image->guessClientExtension() == 'png'){
                
                Image::make($image)->encode('png', 60);
            
            }

            $image_name = 'profiles/pr_'.time().uniqid().'.'.$image->guessClientExtension();
            
            Storage::disk('s3')->put($image_name, file_get_contents($image), 'public');

            $image_name = env('AWS_URL').$image_name;
        }

        $client = User::where('email', $request::input('old_email'))->first(); 

        $client->first_name = $request::input('first_name');
        $client->last_name = $request::input('last_name');
        $client->gender = $request::input('gender');
        $client->year_of_birth = $request::input('year_of_birth');
        $client->bio = $request::input('bio');
        $client->email = $request::input('email');
        $client->mobile = $request::input('mobile');
        $client->avatar = $image_name;
        $client->status = 1;
        $client->verifyToken = Null;
        $client->password = bcrypt( $request::input('password') );
        $client->save();

        if( $request::input('url') ){

            return redirect('/users/'.Auth::id());

        }else{

            Auth::login($client);

            return redirect('/courses');

        }

    }

    public function updatePassword(Request $request)
    {

        $user = User::where('id', Auth::id())->first(); 

        $user->password = bcrypt( $request::input('new-password') );
        $user->save();

        return redirect('users/'.Auth::id());

    }

    
}
