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
        $courses = Course::all();

        $genders = collect($users)->map(function($user){
        	return $user->gender;
        })->toArray();

        $ageStats = array_count_values( array_flatten(collect($users)->map(function($user){
        	return [Carbon::createFromDate($user->year_of_birth)->diff(Carbon::now())->format('%y')];
        })->toArray()));

        //return $ageStats;

        $ageLabels = array_flatten(collect($ageStats)->map(function($ageValue, $ageLabel){
            return $ageLabel;
        })->toArray());

        //return $ageLabels;

        $ageValues = array_flatten(collect($ageStats)->map(function($ageValue, $ageLabel){
            return $ageValue;
        })->toArray());

        //return $ageValues;

        $status = collect(['active' => $users->where('status', 1)->count(), 'InActive' => $users->where('status', 0)->count()])->toArray();

        $companies = collect($companies)->map(function($company){
        	return [$company->name, $company->clients->count()];
        })->toArray();

        $courses = collect($courses)->map(function($course){
        	return [$course->title, $course->clients->count()];
        })->toArray();

        //return $ageLabels;

        //return $ageStats;
        return asort(array_keys ($ageStats));
        //return array_values ($ageStats);

        return view('reports.index', compact('genders', 'ageStats', 'status', 'companies', 'courses'));
    }

}
