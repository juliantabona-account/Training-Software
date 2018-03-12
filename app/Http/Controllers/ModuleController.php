<?php

namespace App\Http\Controllers;

use Request;
use App\Course;
use App\Module;

class ModuleController extends Controller
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

    public function store(Request $request, $course_id)
    {

        $validator = $request::validate([
            'module-title' => 'required'
        ]);

        try{    //catching module saving process

            $module = Module::create([
                        'title' => $request::input('module-title'),
                    ]);

            $course = Course::find($course_id);

            $course->modules()->attach($module);

            return redirect('/courses/'.$course_id.'/edit');

        }catch(Exception $e){    //something went wrong saving the module

            $request::session()->flash('status', 'Something went wrong creating the module. Try again');
            $request::session()->flash('type', 'danger');

            return back()->withInput();
        
        } 

    }

    public function edit($course_id, $module_id)
    {

        try{    //catching module on preparing to edit

            $module = Module::find($module_id);
            
            return view('modules.edit', compact('course_id', 'module'));
        
        }catch(Exception $e){    //something went wrong preparing to edit

            $request::session()->flash('status', 'Something went wrong preparing to edit the module. Try again');
            $request::session()->flash('status-icon', 'fa fa-book');
            $request::session()->flash('type', 'danger');

            return back();
        
        } 

    }

    public function update(Request $request, $course_id, $module_id)
    {

        try{    //catching module on saving the edit

            $module = Module::find($module_id)->update([
                        'title' => $request::input('module-title')
                    ]);

            return redirect('/courses/'.$course_id.'/edit');
        
        }catch(Exception $e){    //something went wrong saving the edit

            $request::session()->flash('status', 'Something went wrong trying to save the module. Try again');
            $request::session()->flash('status-icon', 'fa fa-floppy-o');
            $request::session()->flash('type', 'danger');

            return back();
        
        } 

    }

    public function delete($course_id, $module_id)
    {

        try{    //catching module on delete

            Module::find($module_id)->delete();

            return redirect('/courses/'.$course_id.'/edit');

        }catch(Exception $e){    //something went wrong deleting the module

            $request::session()->flash('status', 'Something went wrong trying to delete the module. Try again');
            $request::session()->flash('status-icon', 'fa fa-trash');
            $request::session()->flash('type', 'danger');

            return back();
        
        } 

    }

}
