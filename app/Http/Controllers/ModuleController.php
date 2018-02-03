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
        $module = Module::create([
	                'title' => $request::input('module-title'),
	            ]);

        $course = Course::find($course_id);

        $course->modules()->attach($module);

        return redirect('/courses/'.$course_id.'/edit');
    }

    public function edit($course_id, $module_id)
    {
        $module = Module::find($module_id);
        
        return view('modules.edit', compact('course_id', 'module'));
    }

    public function update(Request $request, $course_id, $module_id)
    {
        $module = Module::find($module_id)->update([
	                'title' => $request::input('module-title')
        		]);

        return redirect('/courses/'.$course_id.'/edit');
    }

    public function delete($course_id, $module_id)
    {
        Module::find($module_id)->delete();

        return redirect('/courses/'.$course_id.'/edit');
    }

}
