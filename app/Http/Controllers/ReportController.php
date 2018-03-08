<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\Course;
use App\Company;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    
    public function index()
    {
		$users = User::whereHas('roles', function($q){$q->whereIn('name', ['client']);})->get();
        
        $companies = Company::all();
        
        $courses = Course::with(array('modules'=>function($query){
                                        $query->with(array('lessons'=>function($query){
                                            $query->with('tests');
                                        }));
                                    }))->get();

        $coursesThisYear = Course::all(); //Course::whereYear('created_at', '=', date('Y'))->get();

        $monthsOfTheYear = ['January'=> 0,'February'=> 0,'March'=> 0, 'April'=> 0,'May'=> 0,'June'=> 0,
                            'July'=> 0,'August'=> 0,'September'=> 0,'October'=> 0,'November'=> 0,'December'=> 0];

        /*  GENDER STATS   */

        $genderStats = collect($users)->groupBy('gender');

        $genderLabels = array_flatten(collect($genderStats)->map(function($genderValue, $genderLabel){
            return $genderLabel;
        })->reverse()->toArray());

        $genderValues = array_flatten(collect($genderStats)->map(function($genderValue, $genderLabel){
            return $genderValue->count();
        })->reverse()->toArray());

        /*  ACTIVE CLIENT STATS   */

        $activeStats = collect($users)->groupBy('status');

        $activeLabels = array_flatten(collect($activeStats)->map(function($activeValue, $activeLabel){
            if($activeLabel == 0){
                return 'InActive';
            }else{
                return 'Active';
            }
        })->reverse()->toArray());

        $activeValues = array_flatten(collect($activeStats)->map(function($activeValue, $activeLabel){
            return $activeValue->count();
        })->reverse()->toArray());

        /*  AGE STATS   */

        $ageStats = array_count_values( array_flatten(collect($users)->map(function($user){
        	return [Carbon::createFromDate($user->year_of_birth)->diff(Carbon::now())->format('%y')];
        })->toArray()));

        $ageLabels = array_flatten(collect($ageStats)->map(function($ageValue, $ageLabel){
            return $ageLabel;
        })->reverse()->toArray());

        $ageValues = array_flatten(collect($ageStats)->map(function($ageValue, $ageLabel){
            return $ageValue;
        })->reverse()->toArray());

        /*  COURSE ENROLLMENT STATS   */

        $courseEnrollmentStats = collect($courses)->map(function($course){
            if($course->totalClients->first() == null){
                return collect([$course->title, 0]);
            }else{
                return collect([$course->title, $course->totalClients->first()->count ]);
            }
            
        })->toArray();

        $courseEnrollmentLabels = collect($courseEnrollmentStats)->map(function($course){
            return $course[0];
        })->toArray();

        $courseEnrollmentValues = collect($courseEnrollmentStats)->map(function($course){
            return $course[1];
        })->toArray();

        /*  COURSE ENROLLMENT VS GENDER STATS   */

        $courseEnrollmentGenderStats = collect($courses)->map(function($course){
            
            return [$course->title, $clients = collect($course->clients)->map(function($client){
            
                return $client;

            })->groupBy('gender')];
            
        })->toArray();

        $courseEnrollmentGenderLabels = array_flatten(collect($courseEnrollmentGenderStats)->map(function($value){
            return $value[0];
        })->toArray());

        $courseEnrollmentMaleValues = collect($courseEnrollmentGenderStats)->map(function($value){
            return collect($value[1])->map(function($gender){
                        return $gender->count();
                    })->only('Male')->sum();
        })->toArray();

        $courseEnrollmentFemaleValues = collect($courseEnrollmentGenderStats)->map(function($value){
            return collect($value[1])->map(function($gender){
                        return $gender->count();
                    })->only('Female')->sum();
        })->toArray();

        /*  COURSE ENROLLMENT VS ACTIVE STATE STATS   */

        $courseEnrollmentActiveStats = collect($courses)->map(function($course){
            
            return [$course->title, $clients = collect($course->clients)->map(function($client){
            
                return $client;

            })->groupBy('status')];
            
        })->toArray();

        $courseEnrollmentActiveLabels = array_flatten(collect($courseEnrollmentActiveStats)->map(function($value){
            return $value[0];
        })->toArray());

        $courseEnrollmentActiveValues = collect($courseEnrollmentActiveStats)->map(function($value){
            return collect($value[1])->map(function($status){
                        return $status->count();
                    })->only('1')->sum();
        })->toArray();

        $courseEnrollmentInActiveValues = collect($courseEnrollmentActiveStats)->map(function($value){
            return collect($value[1])->map(function($status){
                        return $status->count();
                    })->only('0')->sum();
        })->toArray();

        /*  COURSE MODULE STATS   */

        $courseModuleStats = collect($courses)->map(function($course){
            return [$course->title, $course->modules->count()];
        })->toArray();

        $courseModuleLabels = collect($courseModuleStats)->map(function($course){
            return $course[0];
        })->toArray();

        $courseModuleValues = collect($courseModuleStats)->map(function($course){
            return $course[1];
        })->toArray();

        /*  COURSE LESSON STATS   */

        $courseLessonStats = collect($courses)->map(function($course){

            return [$course->title, $topics = collect($course->modules)->map(function($module){
                return $module->lessons->count();
            })->sum()];

        })->toArray();

        $courseLessonLabels = collect($courseLessonStats)->map(function($course){
            return $course[0];
        })->toArray();

        $courseLessonValues = collect($courseLessonStats)->map(function($course){
            return $course[1];
        })->toArray();

        /*  COURSE LESSON VIEWS STATS   */

        $courseLessonViewsStats = collect($courses)->map(function($course){

            return [$course->title, $topics = collect($course->modules)->map(function($module){
            
                return collect($module->lessons)->map(function($lesson){
                        return $lesson->viewedUsers->count();
                    })->sum();

            })->sum()];

        })->toArray();

        $courseLessonViewsLabels = collect($courseLessonViewsStats)->map(function($course){
            return $course[0];
        })->toArray();

        $courseLessonViewsValues = collect($courseLessonViewsStats)->map(function($course){
            return $course[1];
        })->toArray();

        /*  COURSE LESSON VIEWS VS GENDER STATS   */

        $courseLessonViewsByGenderStats = collect($courses)->map(function($course){
            
            return [$course->title, $topics = collect($course->modules)->map(function($module){
            
                return collect($module->lessons)->map(function($lesson){
                        return collect($lesson->viewedUsers);
                    })->collapse();

            })->collapse()->groupBy('gender')];
            
        })->toArray();

        $courseLessonViewsByMaleLabels = array_flatten(collect($courseLessonViewsByGenderStats)->map(function($value){
            return $value[0];
        })->toArray());

        $courseLessonViewsByFemaleValues = collect($courseLessonViewsByGenderStats)->map(function($value){
            return collect($value[1])->map(function($status){
                        return $status->count();
                    })->only('1')->sum();
        })->toArray();

        $courseEnrollmentInActiveValues = collect($courseLessonViewsByGenderStats)->map(function($value){
            return collect($value[1])->map(function($status){
                        return $status->count();
                    })->only('0')->sum();
        })->toArray();

        /*  COURSE TEST STATS   */

        $courseTestStats = collect($courses)->map(function($course){

            return [$course->title, $topics = collect($course->modules)->map(function($module){
            
                return collect($module->lessons)->map(function($lesson){
                        return $lesson->tests->count();
                    })->sum();

            })->sum()];

        })->toArray();

        $courseTestLabels = collect($courseTestStats)->map(function($course){
            return $course[0];
        })->toArray();

        $courseTestValues = collect($courseTestStats)->map(function($course){
            return $course[1];
        })->toArray();

        /*  COMPANY STATS   */

        $companies = collect($companies)->map(function($company){
        	return [$company->name, $company->clients->count()];
        })->toArray();

        $companyLabels = array_flatten(collect($companies)->map(function($company){
            return $company[0];
        })->toArray());

        $companyValues = array_flatten(collect($companies)->map(function($company){
            return $company[1];
        })->toArray());

        return view('reports.index', compact('genders', 
                                             'ageLabels', 'ageValues', 
                                             'genderLabels', 'genderValues',
                                             'activeLabels', 'activeValues',
                                             'companyLabels', 'companyValues',
                                             'courseEnrollmentLabels', 'courseEnrollmentValues',
                                             'courseEnrollmentGenderLabels', 'courseEnrollmentMaleValues', 'courseEnrollmentFemaleValues',
                                             'courseEnrollmentActiveLabels', 'courseEnrollmentActiveValues', 'courseEnrollmentInActiveValues',
                                             'courseModuleLabels', 'courseModuleValues',
                                             'courseLessonLabels', 'courseLessonValues',
                                             'courseLessonViewsLabels', 'courseLessonViewsValues',
                                             'courseTestLabels', 'courseTestValues',
                                             'status', 'companies', 'courses'));
    }

}
