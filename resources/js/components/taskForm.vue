<template>
	<div class="mx-auto p-5 taskForm">         
          <h3 class="form-header">Create Task</h3>
          <div class="m-0 row  p-3 form-body">
          	 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-4" id="titleForm">
          	 	<label>Title</label>
          	 	<input type="text" name="title" id="titleD" class="form-control vI">
          	 </div>
          	 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  mt-4">
          	 	<label>Course</label>
          	 	<select class="form-control" id="courseD" @change="loadExperiment($event.target)">
          	 		<option value="-"></option>
          	 		<option v-for="course in faculty_courses" :value="course.id">{{course.code}}</option>
          	 	</select>          	 	
          	 </div>
          	 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  mt-4" id="experimentDForm">
          	 	<label>Experiment</label>
          	 	<select id="experimentD" @change="experimentInputSelectField($event.target)" data-style="btn-new" class="form-control selectpicker" multiple title="Select Experiments">
                      <option value="-">-</option>
                      <option>-</option>
                      <option>-</option>
                    </select>
 
          	 </div>
          	 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  mt-4" id="accessCodeForm">
          	 	<label>Access Code</label>
          	 	<input type="text" name="code" id="codeD" class="form-control vI">
          	 </div>
          	 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  mt-4" id="openForm">
          	 	<label>open</label>
          	 	<input type="text" name="title" id="openD" date-format='dd-mm-yyyy'  autocomplete="off" class="form-control vI datepicker2">
          	 </div>
          	 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  mt-4" id="closeForm">
          	 	<label>Close</label>
          	 	<input type="text" name="title" id="closeD" date-format='dd-mm-yyyy' autocomplete="off" class="form-control vI datepicker2">
          	 </div>                
                <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12  mt-4">
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12  mt-4">
                    <button @click="createTask" class="button bg-success text-white w-100 px-3 py-3">Create</button>
                </div>
          </div>
	</div>
</template>
<script>

     export default{
          data(){
               return{
             
                    experiments:[],
                    selectedExerpiment:"",
                    selectedCourse:""
               }
          },
          methods:{
               experimentInputSelectField: function(e){
                    
                    let selected = $('#experimentDForm .dropdown-menu.inner').find('.selected .text');
                    let $this = this, experimentname="";
                    this.selectedExerpiment = [];
                    selected.each(function(){
                         experimentname = $(this).text();
                         console.log(experimentname)
                         $this.selectedExerpiment = $this.faculty_courses.map(function(e){
                              console.log($this.selectedCourse)
                              if (e.course_id == $this.selectedCourse){
                                   for (var i = 0; i < e[experiments].length; i++) {
                                        if (e[experiments][i].name = experimentname )
                                             return e.experiment_id;                                   
                                   }
                              }
                         })

                    })
                    console.log(this.selectedExerpiment);
               },
               createTask: function(){
                    let title  = $('#titleForm').find('.vI');
                    let access = $('#accessCodeForm').find('.vI');
                    let open   = $('#openForm').find('.vI');
                    let close  = $('#closeForm').find('.vI');
                    let course = $('#courseD');
                    let experiment = $('#experimentD');                         
                    if (title.val() == '') {
                         $('.requiredv').remove();
                         title.after('<span class="text-danger requiredv">Required !</span>');
                         return 0;
                    }
                    if (access.val() == '') {
                         $('.requiredv').remove();
                         access.after('<span class="text-danger requiredv">Required !</span>');
                         return 0;    
                    }
                    if (open.val() == "") {
                         $('.requiredv').remove();
                         open.after('<span class="text-danger requiredv">Required !</span>');
                         return 0;
                    }
                    if (close.val()== "") {
                         $('.requiredv').remove();                         
                         close.after('<span class="text-danger requiredv">Required !</span>');
                         return 0;
                    }
                    if (course.val() == "-") {
                         $('.requiredv').remove();
                         course.after('<span class="text-danger requiredv">Required !</span>');
                         return 0;
                    }
                    if (this.selectedExerpiment == "") {                         
                         $('.requiredv').remove();
                         $('.btn-new')[0].after('Required');
                         return 0;
                    }



               },
               loadExperiment:function(e){    
                    let course_id = e.value;  
                    this.selectedCourse = course_id;                            
                   this.faculty_courses.map((e)=>{                         
                         if (e['id'] == course_id) {
                               this.experiments = e['experiments'];
                         }
                    });
                   let opthtml = "";
                   for (var i = 0; i < this.experiments.length; i++) {
                        opthtml += `<option value="${this.experiments[i].id}">${this.experiments[i].name}</option>`;
                   }
                   $('#experimentD').html(opthtml);
                   $('#experimentD').selectpicker('refresh');
                         //console.log(this.experiments);
               }
          },
          created(){                     

          }
         ,
          props:{
               update:{
                    type:Boolean,
                    default:function () {
                         return false;
                    }
               },
               task_id:{
                    type:String,
                    default:function () {
                         return '';
                    }
               },
               alldata:{
                    type:Object              
               },
               faculty_courses:{
                    type:Array,             
                    default:function(){
                         return [{"empty":"-"}]
                    }
               },
               courses_experiments:{
                    type:Array,             
                    default:function(){
                         return [{"empty":"-"}]
                    }
               }
          },
          mounted(){
               this.$nextTick(function() {
                    $(document).ready(function(){

                    $('.datepicker2').datepicker({});
                    })
               })
        
          }
     }
</script>
<style >
     div.datepicker{
          padding: 10px !important;
     }
     td.day{
          font-size: 0.9em;
          font-weight: 400;
     }
     .bootstrap-select .dropdown-toggle, .form-control{
          background: white !important;
          border: 1px solid #ccc !important;          
     }
    
    .bootstrap-select .dropdown-toggle:focus{
     outline: 0 !important;
    }
    .form-control:focus{

     box-shadow: none;
    }
    .dropdown-item.active, .dropdown-item:active{
     background: white;
    }
    .btn:focus, .btn.focus{
     box-shadow: none;
     outline: 0;
    }
</style>