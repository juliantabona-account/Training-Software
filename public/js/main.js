$(document).on("click",".add-true-false-btn",function() {

    $(this).closest('li').after(

        '<li class = "question-box">'+
            '<input class = "question-type" type = "hidden" value = "truefalse">'+
            '<div class="lesson-row">'+
                '<input class="avail_lesson" type="hidden" value="31">'+
                '<div class="lesson-path-guideline"><i class="fa fa-circle-o" aria-hidden="true"></i></div>'+
                '<table class="table">'+
                    '<tbody>'+
                        '<tr>'+
                            '<td class="desc table-content">'+ 
                                '<span class="question-number-tag res-text-9 res-text-sm-8 res-text-md-9">Question 1</span>'+ 
                                '<i class="btn fa fa-arrows dragger-btn" aria-hidden="true"></i>'+
                                '<div class="lesson-content">'+
                                    '<div class="row">'+
                                        '<div class="col-12">'+
                                            '<div class="form-group">'+
                                                '<textarea name="question" placeholder="Enter question..." required="required" class="question form-control mt-4 res-text-9 res-text-sm-8 res-text-md-9"></textarea>'+
                                            '</div>'+
                                            '<div class="form-check abc-radio abc-radio-success form-check-inline ml-2">'+
                                                '<input class="form-check-input" type="radio" id="inlineRadio1" value="true" name="radioInline" checked>'+
                                                '<label class="form-check-label res-text-9 res-text-sm-8 res-text-md-9" for="inlineRadio1"> True </label>'+
                                            '</div>'+
                                            '<div class="form-check abc-radio abc-radio-success form-check-inline">'+
                                                '<input class="form-check-input" type="radio" id="inlineRadio2" value="false" name="radioInline">'+
                                                '<label class="form-check-label res-text-9 res-text-sm-8 res-text-md-9" for="inlineRadio2"> False </label>'+
                                            '</div>'+
                                            '<button type="button" class="add-multiple-choice-btn btn btn-sm btn-success float-right res-text-9 res-text-sm-8 res-text-md-9 res-pl-10-1 ml-2">'+
                                                '<i aria-hidden="true" class="fa fa-plus res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>Multiple Choice'+
                                            '</button>'+   
                                            '<button type="button" class="add-true-false-btn btn btn-sm btn-success float-right res-text-9 res-text-sm-8 res-text-md-9 res-pl-10-1 ml-2">'+
                                                '<i aria-hidden="true" class="fa fa-plus res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>True/False'+
                                            '</button>'+                                                                        
                                            '<button type="button" class="delete-question-btn btn btn-sm btn-danger res-pl-10-1 float-right res-text-9 res-text-sm-8 res-text-md-9">'+
                                                '<i aria-hidden="true" class="fa fa-trash res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>'+
                                            '</button>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</td>'+
                        '</tr>'+
                    '</tbody>'+
                '</table>'+
            '</div>'+
        '</li>'

    );

    updateQuestions();

});

$(document).on("click",".add-multiple-choice-btn",function() {

    $(this).closest('li').after(

        '<li class = "question-box">'+
            '<input class = "question-type" type = "hidden" value = "multiplechoice">'+
            '<div class="lesson-row">'+
                '<input class="avail_lesson" type="hidden" value="31">'+
                '<div class="lesson-path-guideline"><i class="fa fa-circle-o" aria-hidden="true"></i></div>'+
                '<table class="table">'+
                    '<tbody>'+
                        '<tr>'+
                            '<td class="desc table-content">'+ 
                                '<span class="question-number-tag res-text-9 res-text-sm-8 res-text-md-9">Question 1</span>'+ 
                                '<i class="btn fa fa-arrows dragger-btn" aria-hidden="true"></i>'+
                                '<div class="lesson-content">'+
                                    '<div class="row">'+
                                        '<div class="col-12">'+
                                            '<div class="form-group">'+
                                                '<textarea name="question" placeholder="Enter question..." required="required" class="question form-control mt-4 res-text-9 res-text-sm-8 res-text-md-9"></textarea>'+
                                            '</div>'+
                                            '<div class = "questions-option-box">'+
                                                '<div class="form-check abc-radio abc-radio-success ml-2">'+
                                                    '<input class="form-check-input" type="radio" id="inlineRadio1" value="true" name="radioInline" checked>'+
                                                    '<label class="form-check-label res-text-9 res-text-sm-8 res-text-md-9" for="inlineRadio1">'+ 
                                                        '<input type="text" name="multiple-choice-option" placeholder="Enter option 1" required="required" class="multiple-choice-option d-inline-block form-control res-text-9 res-text-md-9 res-text-sm-8 w-50">'+
                                                        '<div class = "multiple-choice-toolbox d-inline">'+
                                                            '<button type="button" class="btn btn-sm delete-multiple-choice-option-btn btn-danger ml-2 res-pl-10-1 res-text-9 res-text-sm-8 res-text-md-9">'+
                                                                '<i aria-hidden="true" class="fa fa-trash res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>'+
                                                            '</button>'+
                                                            '<button type="button" class="btn btn-sm add-multiple-choice-option-btn btn-success res-text-9 res-text-sm-8 res-text-md-9 res-pl-10-1 ml-2">'+
                                                                '<i aria-hidden="true" class="fa fa-plus res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>'+
                                                            '</button>'+ 
                                                        '</div>'+
                                                     '</label>'+
                                                '</div>'+
                                                '<div class="form-check abc-radio abc-radio-success ml-2">'+
                                                    '<input class="form-check-input" type="radio" id="inlineRadio1" value="true" name="radioInline">'+
                                                    '<label class="form-check-label res-text-9 res-text-sm-8 res-text-md-9" for="inlineRadio1">'+ 
                                                        '<input type="text" name="multiple-choice-option" placeholder="Enter option 2" required="required" class="multiple-choice-option d-inline-block form-control res-text-9 res-text-md-9 res-text-sm-8 w-50">'+
                                                        '<div class = "multiple-choice-toolbox d-inline">'+
                                                            '<button type="button" class="btn btn-sm delete-multiple-choice-option-btn btn-danger ml-2 res-pl-10-1 res-text-9 res-text-sm-8 res-text-md-9">'+
                                                                '<i aria-hidden="true" class="fa fa-trash res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>'+
                                                            '</button>'+
                                                            '<button type="button" class="btn btn-sm add-multiple-choice-option-btn btn-success res-text-9 res-text-sm-8 res-text-md-9 res-pl-10-1 ml-2">'+
                                                                '<i aria-hidden="true" class="fa fa-plus res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>'+
                                                            '</button>'+ 
                                                        '</div>'+
                                                     '</label>'+
                                                '</div>'+
                                            '</div>'+
                                            '<div class = "pt-2 mt-3 res-brs-t">'+
                                                '<button type="button" class="add-multiple-choice-btn btn btn-sm btn-success float-right res-text-9 res-text-sm-8 res-text-md-9 res-pl-10-1 ml-2">'+
                                                    '<i aria-hidden="true" class="fa fa-plus res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>Multiple Choice'+
                                                '</button>'+   
                                                '<button type="button" class="add-true-false-btn btn btn-sm btn-success float-right res-text-9 res-text-sm-8 res-text-md-9 res-pl-10-1 ml-2">'+
                                                    '<i aria-hidden="true" class="fa fa-plus res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>True/False'+
                                                '</button>'+                                                                         
                                                '<button type="button" class="delete-question-btn btn btn-sm btn-danger res-pl-10-1 float-right res-text-9 res-text-sm-8 res-text-md-9">'+
                                                    '<i aria-hidden="true" class="fa fa-trash res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>'+
                                                '</button>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</td>'+
                        '</tr>'+
                    '</tbody>'+
                '</table>'+
            '</div>'+
        '</li>'

    );

    updateQuestions();

});

$(document).on("click",".delete-question-btn",function() {
    
    if($(this).closest('ul').find('li').length > 1){

        $(this).closest('li').remove();

    }else{

        alert('You must have atleast one question');

    }

    updateQuestions();

});

$(document).on("click",".add-multiple-choice-option-btn",function() {
    
    $(this).closest('.form-check').after(
        '<div class="form-check abc-radio abc-radio-success ml-2">'+
            '<input class="form-check-input" type="radio" id="inlineRadio1" value="true" name="radioInline" checked>'+
            '<label class="form-check-label res-text-9 res-text-sm-8 res-text-md-9" for="inlineRadio1">'+ 
                '<input type="text" name="multiple-choice-option" placeholder="Enter option 1" required="required" class="multiple-choice-option d-inline-block form-control res-text-9 res-text-md-9 res-text-sm-8 w-50">'+
                '<div class = "multiple-choice-toolbox d-inline">'+
                    '<button type="button" class="btn btn-sm delete-multiple-choice-option-btn btn-danger ml-2 res-pl-10-1 res-text-9 res-text-sm-8 res-text-md-9">'+
                        '<i aria-hidden="true" class="fa fa-trash res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>'+
                    '</button>'+
                    '<button type="button" class="btn btn-sm add-multiple-choice-option-btn btn-success res-text-9 res-text-sm-8 res-text-md-9 res-pl-10-1 ml-2">'+
                        '<i aria-hidden="true" class="fa fa-plus res-text-9 res-text-sm-7 res-text-md-9 mr-1"></i>'+
                    '</button>'+ 
                '</div>'+
             '</label>'+
        '</div>'
    );

    updateQuestions();

});

$(document).on("click",".delete-multiple-choice-option-btn",function() {
    
    if($(this).closest('.questions-option-box').find('.form-check').length > 2){

        $(this).closest('.form-check').remove();

    }else{

        alert('You must have atleast have 2 multiple choices');

    }

    updateQuestions();

});

$(document).on("change blur",".question, .form-check-input, .multiple-choice-option",function() {

    updateQuestions();

});


function updateQuestions(){

    var questions = $('.module-row li');
    var questionsCount = $(questions).length == 1 ? $(questions).length + ' Question': $(questions).length + ' Questions'; 

    $('.question-count-tracker').text( questionsCount );

    $.each( questions, function( key, question ) {
        $(this).find('.question-number-tag').text('Question ' + (key + 1));
        
        var options = $(this).find('.form-check');                
        
        $.each( options, function( num, question ) {

            $(this).find('.form-check-input').attr('id', 'questionChoice' + (key + 1) + (num + 1));
            $(this).find('.form-check-label').attr('for', 'questionChoice' + (key + 1) + (num + 1));
            $(this).find('.multiple-choice-option').attr('placeholder', 'Enter option ' + (num + 1))

        });

        $(this).find('.form-check-input').attr('name', 'question' + (key + 1));
    });

    runQuestionsArrangement();

    $('.question-count-tracker').text( questionsCount );

}

/*

  MODULE AND LESSON DRAG AND DROP HANDLER

*/

var adjustment;

$("ul.draggable").sortable({
  group: 'draggable',
  handle: '.dragger-btn',
  pullPlaceholder: false,
  // animation on drop
  onDrop: function  ($item, container, _super) {
    var $clonedItem = $('<li/>').css({height: 0});
    $item.before($clonedItem);
    $clonedItem.animate({'height': $item.height()});

    $item.animate($clonedItem.position(), function  () {
      $clonedItem.detach();
      _super($item, container);
    });

    $.each( $('ul.draggable') , function( i, draggable ) {

        if( $(draggable).has('li').length == 0){
            if( $(this).has('.no-lessons').length == 0){
                $(this).append(
                    '<div class="alert alert-warning no-lessons pt-4 pb-4" role="alert">'+
                        '<i class="fa fa-book mr-2" aria-hidden="true"></i>'+
                        '<span>No Lessons! Add a lesson.</span>'+
                    '</div>');
            }
        }else{
            $(this).find('.no-lessons').remove();
        }

    });

    $.each( $('.module-row, .question-row') , function( i, draggable ) {

        var module_spotter_num = parseInt( $(this).find('.module-row-title .module-spotter-num').text() );

        $.each( $(this).find('.module-content .lesson-row') , function( i, draggable ) {

            var lesson_spotter = $(this).find('.lesson-module-spotter-num'); 
            var lesson_spotter_num = parseInt( $(lesson_spotter).text() ); 

            if( module_spotter_num != lesson_spotter_num && lesson_spotter.length){
                
                if( $(this).find('.new-zone-lesson').length == 0 ){

                $(this).append(
                    '<span href="#" class="new-zone-lesson res-text-sm-9">'+
                             '<i class="fa fa-exclamation-circle mr-2" aria-hidden="true"></i> '+
                              '<span>from Module '+lesson_spotter_num+'</span>'+
                    '</span>');
                }
            }else{
                $(this).find('.new-zone-lesson').remove();
            }

        });

    });

    runLessonsArrangement();

    runQuestionsArrangement();

  },

  // set $item relative to cursor position
  onDragStart: function ($item, container, _super) {
    var offset = $item.offset(),
        pointer = container.rootGroup.pointer;

    adjustment = {
      left: pointer.left - offset.left,
      top: pointer.top - offset.top
    };

    _super($item, container);
  },
  onDrag: function ($item, position) {
    $item.css({
      left: position.left - adjustment.left,
      top: position.top - adjustment.top
    });
  }
});


function runLessonsArrangement(){

    //Run Arrangement Of Modules & Lessons

    var lesson_collection = [];

    lesson_collection = $('ul.draggable').map(function(){

        var module_id = parseInt($(this).find('.avail_module').val());
        var lesson_ids = $(this).find('.avail_lesson').map(function(){return $(this).val();}).get();

        var arrangement = {'module_id': module_id , 'lesson_ids': lesson_ids};

        return arrangement;

    });
    
    $('.arrangement').val(JSON.stringify(JSON.decycle(lesson_collection, true)));

}

function runQuestionsArrangement(){

    //Run Arrangement Of Questions

    var question_collection = [];

    question_collection.push($('ul.draggable > li.question-box').map(function(){

        var question = $(this).find('.question').val();
        
        var questionType = $(this).find('.question-type').val();
        var answers = [];


        if(questionType == 'truefalse'){

            answers = $(this).find('.form-check-input').map(function(){
                        return $(this).is(':checked');
                    }).get();
        
        }else if(questionType == 'multiplechoice'){

            answers = $(this).find('.form-check').map(function(){
                            var option_answer = $(this).find('.form-check-input').is(':checked');
                            var option_text = $(this).find('.multiple-choice-option').val();
                            var option = {'choice': option_text, 'correct': option_answer};
                            return option;
                        }).get();
        }

        var arrangement = {'question': question, 'type': questionType, 'answers': answers};

        return arrangement;

    }));
        
    $('.arrangement').val(JSON.stringify(JSON.decycle(question_collection, true)));
    $('.arrangement_state').val(1);
}

/*

  MODULE AND LESSON EXPAND AND COLLAPSE HANDLER

*/

$('.module-path-guideline').click(function() {
    $(this).next('.module-content').slideToggle( "slow", function() {

    });

    $(this).find('i').toggleClass("fa-minus-circle fa-plus-circle");

    $(this).prev('h2').toggleClass("minimized-module-header");

    if($(this).find('i').hasClass('fa-plus-circle')){
        
        $(this).parent().addClass('closed');
        $(this).prev('h2').addClass("minimized-module-header");

    }else{

        $(this).parent().removeClass('closed');
        $(this).prev('h2').removeClass("minimized-module-header");
    }

    var all_modules = $('.module-row').length;
    var closed_modules = $('.module-row.closed').length;

    if(all_modules != closed_modules){

        $('.collapse-modules-btn').removeClass('active').addClass('btn-default').removeClass('btn-warning');
        $('.collapse-modules-btn').find('i').removeClass("fa-plus-circle").addClass("fa-minus-circle");

    }else{

        $('.collapse-modules-btn').addClass('active').removeClass('btn-default').addClass('btn-warning').css('color', '#ffffff');
        $('.collapse-modules-btn').find('i').removeClass("fa-minus-circle").addClass("fa-plus-circle");

    }

});

$('.collapse-modules-btn').click(function(e) {

    e.preventDefault();

    if($(this).hasClass('active')){

        $('.module-row').removeClass('closed');
        $(this).removeClass('active').addClass('btn-default').removeClass('btn-warning');
        $(this).find('i').removeClass("fa-plus-circle").addClass("fa-minus-circle");

        $('.module-content').slideDown("slow");

        $('.module-path-guideline').find('i').removeClass("fa-minus-circle");
        $('.module-path-guideline').find('i').removeClass("fa-plus-circle");

        $('.module-path-guideline').find('i').addClass("fa-minus-circle");

        $('.module-path-guideline').prev('h2').removeClass("minimized-module-header");

    }else{

        $('.module-row').addClass('closed');
        $(this).addClass('active').removeClass('btn-default').addClass('btn-warning').css('color', '#ffffff');
        $(this).find('i').removeClass("fa-minus-circle").addClass("fa-plus-circle");

        $('.module-content').slideUp("slow");

        $('.module-path-guideline').find('i').removeClass("fa-minus-circle");
        $('.module-path-guideline').find('i').removeClass("fa-plus-circle");
        
        $('.module-path-guideline').find('i').addClass("fa-plus-circle");
        
        $('.module-path-guideline').prev('h2').addClass("minimized-module-header");

    }
});

$('.collapse-lessons-btn').click(function(e) {

    e.preventDefault();

    if($(this).hasClass('active')){

        $(this).removeClass('active').addClass('btn-default').removeClass('btn-warning');
        $(this).find('i').removeClass("fa-plus-circle").addClass("fa-minus-circle");

        $('.module-row').addClass('closed');
        $('.module-content .lesson-row .table-video').slideDown("fast");
        $('.module-content .lesson-row .table-content .lesson-content').slideDown("slow");
        $('.module-content .lesson-row .table-content .lesson-editor').delay(500).fadeIn("slow");
        $('.module-content .lesson-row .table-action').slideDown("fast");

        var questions = $('.module-row li .table-content .question-summary').remove();
        
    }else{
        
        $(this).addClass('active').removeClass('btn-default').addClass('btn-warning').css('color', '#ffffff');
        $(this).find('i').removeClass("fa-minus-circle").addClass("fa-plus-circle");

        $('.module-row').removeClass('closed');
        $('.module-content .lesson-row .table-video').slideUp("fast");
        $('.module-content .lesson-row .table-content .lesson-content').slideUp("slow");
        $('.module-content .lesson-row .table-content .lesson-editor').delay(500).fadeOut("slow");
        $('.module-content .lesson-row .table-action').slideUp("fast");

        var questions = $('.module-row li.question-box');



        $.each( questions, function( key, question ) {

            var question_text = $(this).find('.question').val();
            if(question_text == ''){
                question_text = '<i class="fa fa-frown-o" aria-hidden="true"></i> No Question';
            }
            $(this).find('.table-content').prepend('<p class = "question-summary mt-4 mb-0 pl-1 res-text-9 res-text-md-9 res-text-sm-9">'+question_text+'</p>');
            $(this).find('.question-summary').hide().slideDown(1500)
        });

        

    }
});

/*

  ADD DEFAULT COURSE IMAGE WHEN IMAGE ERROR APPEARS

*/

//Wait for all the images to load
$("img").one('load', function() {

    //Run through each image
    $('img').each(function(){

        var isChecked = $(this).hasClass('error-image-checked');

        $(this).on("error", function () {
            
            if( isChecked == false ){
                
                var img_type = $(this).attr('img-died');
                var placeholder = 'image_placeholder_icon';

                $(this).addClass('error-image')
                       .attr('src', 'http://saleschief-bucket.s3.amazonaws.com/assets/icons/'+placeholder+'.png');

           }
        }); 

        $(this).addClass('error-image-checked').fadeIn(800);

        
    });

});

/*

  IMAGE UPLOAD

*/

$(document).on('change', '.btn-file :file', function() {
    var input = $(this),
    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label]);
    $('#img-upload').css('display', 'block');
});

$('.btn-file :file').on('fileselect', function(event, label) {
    var input = $(this).parents('.input-group').find(':text'),
        log = label;
    
    if( input.length ) {
        input.val(log);
    } else {
        if( log ) alert(log);
    }

});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            $('#img-upload').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});  

/*

  INITIATE TOOLTIPS

*/

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})