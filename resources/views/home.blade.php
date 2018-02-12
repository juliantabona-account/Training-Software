@extends('layouts.app')

@section('title')
    Dashboard｜
@endsection

@section('style')
    
    <style>

    </style>

@endsection


@section('content')

    <div class="col-md-12 res-pb-lg-10-2 res-brs-lg-b">

        <div class="container res-pt-xl-10-2 mt-0">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-8">
                            <h2 class = "res-text-7 res-text-sm-5 res-text-md-3">
                                <i class="fa fa-crosshairs"></i>
                                <span>Inbound Sales Incubation Programme</span>
                            </h2>
                        </div>
                        <div class="col-2">
                            <h2 class = "res-mt-lg-10-1 res-text-7 res-text-md-8 res-text-sm-5">
                                <i class="fa fa-users"></i>
                                <span>Enrolled:</span>
                                <span>42</span>
                            </h2>
                        </div>

                        <div class="col-2">
                            <button type="submit" class="btn res-button app-red-btn">
                                <i class="fa fa-plus res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
                                <span class = "res-text-9 res-text-sm-7 res-text-md-9">Add Lesson</span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid res-mt-lg-10-5">
        <div class="row">
            <div class="col-lg-7 res-ml-lg-10-15">

                <div class = "row">

                    <div class = "col-lg-11 master-path-guideline res-ml-lg-10-5">

                        <div class = "module-row res-pl-10-1">
                            <div class = "module-path-guideline"><i class="fa fa-minus-circle" aria-hidden="true"></i></div>
                            <h2 class = "res-text-6 col-md-10">Module 1: Introduction</h1>
                            <div class = "lesson-row">
                                <div class = "lesson-path-guideline"><i class="fa fa-circle-o" aria-hidden="true"></i></div>
                                <table class="table res-ml-lg-10-3">
                                    <tbody>
                                        <tr>
                                            <td width="100">
                                                <img data-src="holder.js/200x200" class="img-thumbnail" alt="150x120" 
                                                     src="/assets/temp/1.jpg"  
                                                     data-holder-rendered="true" style="width: 80px; height: 80px;">
                                            </td>
                                            <td class="desc">
                                                
                                                <h4 class = "res-mt-lg-10-1">
                                                    <a href="#" class="res-text-7">
                                                        Lesson 1.1 What is inbound sales?
                                                    </a>
                                                </h4>
                                                <p class="res-text-9">
                                                    This is a sample placeholder description of the lesson. It will be explaining in brief what the client will learn.
                                                </p>

                                                <div class = "row">
                                                    <div class = "col-lg-6"> 
                                                        <div class="m-t-sm">
                                                            <a href="#" class="text-muted res-text-lg-9"><i class="fa fa-pencil"></i> Edit</a>
                                                            |
                                                            <a href="#" class="text-muted res-text-lg-9"><i class="fa fa-trash"></i> Trash Lesson</a>
                                                        </div>
                                                    </div>
                                                    <div class = "col-lg-6"> 
                                                        <div class="m-t-sm">
                                                            <a href="#" class="text-muted res-text-lg-9"><i class="fa fa-eye"></i> 13</a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                            <td class="desc">
                                                
                                                <button type="submit" class="btn res-button app-white-btn res-mt-lg-10-4">
                                                    <i aria-hidden="true" class="fa fa-file-text-o res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>
                                                    <span class = "res-text-9 res-text-sm-7 res-text-md-9">Make Test</span>
                                                </button>  

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class = "module-row res-pl-10-1">
                            <div class = "module-path-guideline"><i class="fa fa-minus-circle" aria-hidden="true"></i></div>
                            <h2 class = "res-text-6 col-md-10">Module 2: Building Leads</h1>
                            <div class = "lesson-row">
                                <div class = "lesson-path-guideline"><i class="fa fa-circle-o" aria-hidden="true"></i></div>
                                <table class="table res-ml-lg-10-3">
                                    <tbody>
                                        <tr>
                                            <td width="100">
                                                <img data-src="holder.js/200x200" class="img-thumbnail" alt="150x120" 
                                                     src="/assets/temp/2.jpg"  
                                                     data-holder-rendered="true" style="width: 80px; height: 80px;">
                                            </td>
                                            <td class="desc">
                                                
                                                <h4 class = "res-mt-lg-10-1">
                                                    <a href="#" class="res-text-7">
                                                        Lesson 2.1 How inbound sales works?
                                                    </a>
                                                </h4>
                                                <p class="res-text-9">
                                                    This is a another sample placeholder description of the lesson similar to the other. It will be explaining in brief what the client will learn
                                                </p>

                                                <div class = "row">
                                                    <div class = "col-lg-6"> 
                                                        <div class="m-t-sm">
                                                            <a href="#" class="text-muted res-text-lg-9"><i class="fa fa-pencil"></i> Edit</a>
                                                            |
                                                            <a href="#" class="text-muted res-text-lg-9"><i class="fa fa-trash"></i> Trash Lesson</a>
                                                        </div>
                                                    </div>
                                                    <div class = "col-lg-6"> 
                                                        <div class="m-t-sm">
                                                            <a href="#" class="text-muted res-text-lg-9"><i class="fa fa-eye"></i> 8</a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                            <td class="desc">
                                                
                                                <button type="submit" class="btn res-button app-white-btn res-mt-lg-10-4">
                                                    <i aria-hidden="true" class="fa fa-file-text-o res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>
                                                    <span class = "res-text-9 res-text-sm-7 res-text-md-9">Make Test</span>
                                                </button>  

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class = "lesson-row">
                                <div class = "lesson-path-guideline"><i class="fa fa-circle-o" aria-hidden="true"></i></div>
                                <table class="table res-ml-lg-10-3">
                                    <tbody>
                                        <tr>
                                            <td width="100">
                                                <img data-src="holder.js/200x200" class="img-thumbnail" alt="150x120" 
                                                     src="/assets/temp/3.jpg" 
                                                     data-holder-rendered="true" style="width: 80px; height: 80px;">
                                            </td>
                                            <td class="desc">
                                                
                                                <h4 class = "res-mt-lg-10-1">
                                                    <a href="#" class="res-text-7">
                                                        Lesson 2.2 Why inbound sales works?
                                                    </a>
                                                </h4>
                                                <p class="res-text-9">
                                                    This is a another sample placeholder description of the lesson similar to the other. It will be explaining in brief what the client will learn
                                                </p>

                                                <div class = "row">
                                                    <div class = "col-lg-6"> 
                                                        <div class="m-t-sm">
                                                            <a href="#" class="text-muted res-text-lg-9"><i class="fa fa-pencil"></i> Edit</a>
                                                            |
                                                            <a href="#" class="text-muted res-text-lg-9"><i class="fa fa-trash"></i> Trash Lesson</a>
                                                        </div>
                                                    </div>
                                                    <div class = "col-lg-6"> 
                                                        <div class="m-t-sm">
                                                            <a href="#" class="text-muted res-text-lg-9"><i class="fa fa-eye"></i> 8</a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                            <td class="desc">
                                                
                                                <button type="submit" class="btn res-button app-white-btn res-mt-lg-10-4">
                                                    <i aria-hidden="true" class="fa fa-file-text-o res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>
                                                    <span class = "res-text-9 res-text-sm-7 res-text-md-9">Make Test</span>
                                                </button>  

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class = "module-path-end-guideline">
                                <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                <p class="res-text-9 res-text-sm-7 res-text-md-9 mb-2">Done</p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class = "col-lg-3">

                <div class="card m-3 mt-4">
                    <div class="card-header">
                        <div class = "row">
                            <div class = "col-lg-6"> 
                                <h2 class = "res-text-6 mt-1">Overview</h2>
                            </div>
                            <div class = "col-lg-6"> 
                                <button type="submit" class="btn res-button app-white-btn float-right">
                                    <i aria-hidden="true" class="fa fa-eye res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>
                                    <span class = "res-text-9 res-text-sm-7 res-text-md-9">Preview</span>
                                </button> 
                            </div> 
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="series-heading">Heading</label>
                            <textarea id = "series-heading" class="form-control res-text-9 res-text-sm-8 res-text-md-9" rows="2">Inbound Sales Incubation Programme</textarea>
                        </div>
                        <div class="form-group">
                            <label for="series-description">Description</label>
                            <textarea id = "series-description" class="form-control res-text-9 res-text-sm-8 res-text-md-9" rows="4">In today's world, making sales is all about building  relationships. In this series we learn how to use inbound techniques to close sales</textarea>
                        </div>
                        <div class="form-group">
                            <label for="series-description">Course Annoucements</label>
                            <textarea id = "series-description" class="form-control res-text-9 res-text-sm-8 res-text-md-9" rows="4">Good Day! Insure that your complete all tests assigned to unlock other module lessons. Thank you</textarea>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn res-button app-red-btn float-right">
                            <i class="fa fa-floppy-o res-text-9 res-text-sm-7 res-text-md-9" aria-hidden="true"></i>
                            <span class = "res-text-9 res-text-sm-7 res-text-md-9">Save</span>
                        </button>
                    </div>


                </div>

            </div>
        </div>
    </div>



@endsection
