<template>
	<div class="mx-auto p-5 taskForm">         
          <h3 class="form-header">Create Task</h3>
          <div class="m-0 row  p-3 form-body">
          	 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-4" id="titleForm">
          	 	<label>Title</label>
          	 	<input type="text" name="title" id="titleD" :value="title" class="form-control vI">
          	 </div>
          	 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  mt-4">
          	 	<label>Course</label>
          	 	<select class="form-control" id="courseD" @change="loadExperiment($event.target)">
          	 		<option value="-"></option>
          	 		<option v-for="course in faculty_courses" :selected="ucourse.code == course.code" :value="course.id">{{course.code}}</option>
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
          	 	<input type="password" name="code" id="codeD" :value="access_code" class="form-control vI">
          	 </div>
          	 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  mt-4" id="openForm">
          	 	<label>open</label>
          	 	<input type="text" name="title" id="openD" :value="open" date-format='dd-mm-yyyy'  autocomplete="off" class="form-control vI datepicker2">
          	 </div>
          	 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  mt-4" id="closeForm">
          	 	<label>Close</label>
          	 	<input type="text" name="title" id="closeD" :value="close" date-format='dd-mm-yyyy' autocomplete="off" class="form-control vI datepicker2">
          	 </div>                
                <div class="col-lg-10 col-md-9 col-sm-8 col-xs-12  mt-4">
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12  mt-4">
                    <button @click="createTask" class="button bg-success text-white w-100 px-3 py-3">
                         <span v-if="!update">Create</span>
                         <span v-if="update">Update</span>
                    </button>
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
                    selectedCourse:"",
                    selectedCourseObj:{},
                    title:"",
                    access_code:"",
                    open:"",
                    close:"",
                    ucourse:"",
                    experiment:"",

               }
          },
          methods:{
               experimentInputSelectField: function(e){
                    
                    let selected = $('#experimentDForm .dropdown-menu.inner').find('.selected .text');
                    let $this = this, experimentname="";
                    this.selectedExerpiment = [];                         
                    let j=0 ;                    
                    selected.each(function(){
                         experimentname = $(this).text(); 
                         for (j= 0; j < $this.experiments.length; j++) {

                              if ($this.experiments[j].name === experimentname ){
                                   $this.selectedExerpiment.push($this.experiments[j].id);                              
                              }                              
                         }
                    })                       
               },   
               
               createTask: function(){
                    let title  = $('#titleForm').find('.vI'),
                    access = $('#accessCodeForm').find('.vI'),
                    open   = $('#openForm').find('.vI'),
                    close  = $('#closeForm').find('.vI'),
                    course = $('#courseD'),
                    experiment = $('#experimentD'),
                    $this = this;

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

                    this.show_loader();
                     if (this.update){
                         const formData = {work_id: this.alldata.id, title:title.val(), date_open:open.val(), date_close:close.val(), experiment_id:this.selectedExerpiment,access_code:access.val()}
                         let route = 'update';                         
                         let success_msg = "updated successfully";
                     }else{
                         let route = 'create';
                         const formData = {title:title.val(), date_open:open.val(), date_close:close.val(), experiment_id:this.selectedExerpiment,access_code:access.val()}
                         let success_msg = $this.createdMessage
                     }
                    this.axios.post(this.baseApiUrl+'works/'+route,this.createFormData(formData),{headers:this.axiosHeader})
                    .then(function(response, status, request) {                                          
                              $this.hide_loader();
                              if(response.status == 200){
                                   Swal.fire({
                                     title: success_msg,                              
                                     icon:'success',                                     
                                     showCancelButton: true,
                                     confirmButtonText: `Ok`,                                          
                                     cancelButtonColor: `red`,                                          
                                   }).then((result) => {                                        
                                       location.reload();                                          
                                   })
                              }else if(response.status == 401){
                                   Swal.fire({
                                     title: $this.errorSessionMessage,                                       
                                     icon:'error',                                                                 
                                    confirmButtonText: `Ok`,                                                                         
                                   }).then((result) => {                                         
                                     if (result.isConfirmed) {
                                       $this.frontendLogout();
                                     } else if (result.isDenied) {                                           
                                     }
                                   })
                              }else if (e.response.status == 409) {                                   
                                    Swal.fire({
                                     title: 'already exist',                                       
                                     icon:'warning',                                     
                                     confirmButtonText: `Ok`,                                         
                                   })
                              }                             
                           }, function(e) {                                       
                                   $this.hide_loader();
                                   let errMsg = $this.errorSessionMessage;                                 
                                  if (e.response.status == 409) {                                   
                                   errMsg = e.response.data.error;
                                  }                             
                           });

               },
               loadExperiment:function(e){    
                    let course_id;
                    if (this.update){                        
                    }else{
                         course_id = e.value;  
                        this.selectedCourse = course_id;                            
                        this.faculty_courses.map((e)=>{                         
                              if (e['id'] == course_id) {
                                    this.experiments = e['experiments'];
                              }
                         });
                    }
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
               if (this.update) {
                    this.title = this.alldata.title;                    
                    this.open = this.alldata.date_open;                    
                    this.close = this.alldata.date_close;                    
                    this.access_code = this.alldata.access_code;                    
                    let $this = this;
                    this.ucourse  = this.faculty_courses.filter(function(item){
                         return item.code === $this.alldata.course_code;
                    })
                    this.experiments = this.ucourse[0].experiments;
                    $this.selectedExerpiment = [1,2];// from alldata.experiments
                    let selectedexp = [];
                    setTimeout(function() {
                         $('#courseD').val($this.ucourse[0].id)
                         $this.loadExperiment();                 
                         $('#experimentD').selectpicker('val',$this.selectedExerpiment);
                         $('#experimentD').selectpicker('refresh');

                    }, 100);
               }
                  
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