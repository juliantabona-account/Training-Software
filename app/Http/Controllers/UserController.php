<?php

namespace App\Http\Controllers;

use Request;
use App\User;
use App\Role;
use App\Course;

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

        $client = User::where('id', $client_id)->with(array('company', 'lessonViews', 'testSubmittions', 'courses'=>function($query){
            $query->with('moduleWithLessons');
        }))->first();

        return view('clients.show', compact('client'));
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
                                    'name' => $request::input('first-name'),
                                    'email' => $request::input('email'),
                                    'password' => bcrypt($request::input('first-name'))
                                ]);
            }
        }

        $course_id = $request::input('course_id');
        $request::session()->forget('status');

        
        if($client){

            $isAlreadyMember = $client->courses()->where('course_id', $course_id)->count();

            if($isAlreadyMember){

                $request::session()->flash('status', $client->name . ' is already a member for this course!');
                $request::session()->flash('type', 'warning');

            }else{

                //Register the clients role
                $client_role_id = Role::where('name', 'client')->first()->id;
                $client->roles()->sync([$client_role_id], false);

                //Assign the client to the associated course
                $client->courses()->sync([$course_id], false);

                $request::session()->flash('status', $client->name . ' has been successfully enrolled!');
                $request::session()->flash('type', 'success');

            }

        }

        if($request::has('url')){
            return redirect($request::input('url'));
        }else{
            return redirect('/clients/create');
        }
        
    }
    
}
