<template>
	<div class="mx-auto p-5 taskForm">         
          <h3 class="form-header">Create Task</h3>
          <div class="m-0 row  p-3 form-body">
          	 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mt-4" id="titleForm">
          	 	<label>Title</label>
          	 	<input type="text" name="title" id="titleD" :value="title" class="form-control w-100 vI">
          	 </div>
          	 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  mt-4">
          	 	<label>Course</label>
          	 	<select class="form-control w-100" id="courseD"  @change="loadExperiment($event.target)">
          	 		<option value="-"></option>
          	 		<option v-for="course in faculty_courses" :selected="ucourse.code == course.code" :value="course.id">{{course.code}}</option>
          	 	</select>          	 	
          	 </div>
          	 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  mt-4" id="experimentDForm">
          	 	<label>Experiment</label>
          	 	<select id="experimentD" @change="experimentInputSelectField($event.target)" data-style="btn-new" class="form-control w-100 selectpicker  text-danger " multiple title="Select Experiments">
                      <option value="-">-</option>
                      <option>-</option>
                      <option>-</option>
                    </select>
 
          	 </div>
          	 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  mt-4" id="accessCodeForm">
          	 	<label>Access Code</label>
          	 	<input type="password" name="code" id="codeD" :value="access_code" class="form-control w-100 vI">
          	 </div>
          	 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  mt-4" id="openForm">
          	 	<label>Open</label>
          	 	<input type="text" name="title" id="openD" :value="open" date-format='dd-mm-yyyy'  autocomplete="off" class="form-control w-100 vI datepicker2">
          	 </div>
          	 <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  mt-4" id="closeForm">
          	 	<label>Close</label>
          	 	<input type="text" name="title" id="closeD" :value="close" date-format='dd-mm-yyyy' autocomplete="off" class="form-control w-100 vI datepicker2">
          	 </div>   
            
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  mt-4" id="closeForm">
              <label>Timing</label>
              <input type="time" name="title" v-model="limitation" min="00:00" class="form-control w-100 vI without_ampm">
            </div>                 
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12  mt-4" id="closeForm">
              <input id="swal-input2" type="checkbox" class="mr-1 mt-2 d-inline-block"><label class="mb-1 d-inline-block">Activate Test Mode</label>
            </div>  
              <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12  mt-4">
                  <label class="fs1 fw5 font form-header">Select Experiment to Set Data  
                   </label>
                  <span v-if="flipNow" class="w-100">                
                    <div v-for="exp in experiments" class="w-100">
                        <span v-if="selectedExerpiment.includes(exp.id)">                      
                        <input @click="InputData(exp.id)" value="exp.id" type="radio" name="exp_t11" class="mr-1 mt-2 d-inline-block"><label class="mb-1 d-inline-block text-capitalize">{{exp.name}}</label>                  
                        </span>
                        <span v-if="experiment_data_format[exp.page] !== undefined" class="w-100">
                          <div :id="exp.id" class="formExp w-100" v-html="experiment_data_format[exp.page]">      
                          </div>                          
                        </span>
                        <span v-else class="w-100">                          
                            <span  :id="exp.id" class="formExp w-100 fs01 fw6 text-dark">No Form Available For this Experiment</span>
                        </span>
                    </div>       
                  </span>
                  
             
                </div>
          </div>
          <br>
          <div class="row">            
              <div class="col-lg-2 col-md-7 col-sm-6 col-xs-12 mt-4" style="visibility: hidden;">hidden
              </div>
                <div class="col-lg-2 col-md-5 col-sm-6 col-xs-12  mt-4" style="position: relative;">
                    <button @click="createTask" class="button bg-success text-white w-75 px-3 py-3" style="position: absolute;bottom: 0;">
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
                    flipNow:true,
                    setdata:{},
                    limitation:'01:30'

               }
          },
          methods:{
               experimentInputSelectField: function(e){
                    this.flipNow = false;                
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
                    this.flipNow = true;
               },   
               InputData:function(id){
                  $('.formExp').not('#'+id).slideUp(50);
                  $('#'+id).slideDown(50);                                 
               },
               createTask: function(){
                    var ActivateMode = '0';
                    if($('#swal-input2').prop('checked')){
                        ActivateMode = '1';                   
                    }
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
                         $('.btn-new')[0].after('Please Select Experiment!');
                        $('.btn-new')[0].css({'border':'1px solid red'});
                         return 0;
                    }               

                    /*get set data*/
                    let state = true;
                    let thisID, values = [],rowCounter=0;
                    for(let j=0; j<this.selectedExerpiment.length; j++){
                        thisID = this.selectedExerpiment[j];
                        this.setdata[thisID] = [];
                          rowCounter = 0;
                        if ($('#'+thisID+'>table').find('tr').length>1){
                          $('#'+thisID+'>table').find('tr').each(function(index){                            

                            values = [];
                            $(this).find('.valueReading').each(function(index2){
                              if (index == 0) { //to get equal data for all rows dependent on first row count
                                if ($(this).val() != '') {
                                  rowCounter += 1;
                                  values.push($(this).val());
                                }                                   
                              }else{                              
                                if (index2 < rowCounter) {
                                   $(this).css({'border':'1px solid #ccc'});

                                  if ($(this).val() != '') {                                  
                                    values.push($(this).val());
                                  }else{
                                    alert('All Field in Red Border is Required !')
                                    $(this).css({'border':'1px solid red'});                                  
                                    state =false;
                                    return false;
                                  }     
                                 }
                              }
                            });     
                            if (values.length != 0) {
                              $this.setdata[thisID].push(values);
                            }                       
                          })                          
                        }else{
                          values = [];
                          $('#'+thisID+'>table tr').find('.valueReading').each(function(index){
                                if ($(this).val() != '') {                                  
                                  values.push($(this).val());
                                }                                                                                  
                          });
                          if (values.length != 0) {
                            $this.setdata[thisID]= values;
                          }                       
                        }
                    }
                  if (state) {                      
                    this.show_loader();                    
                    let route = 'create';
                    let success_msg = $this.createdMessage                    
                    let formData = { setdata: JSON.stringify(this.setdata), mode:ActivateMode, course_id:this.selectedCourse,title:title.val(), date_open:open.val(), date_close:close.val(), experiment_ids:this.selectedExerpiment,access_code:access.val(), limitation:this.limitation}
                     if (this.update === true){ 
                        formData = {setdata: JSON.stringify(this.setdata), mode:ActivateMode, course_id:this.selectedCourse,work_id: this.alldata.id, title:title.val(), date_open:open.val(), date_close:close.val(), experiment_ids:JSON.stringify(this.selectedExerpiment),access_code:access.val(),limitation:this.limitation}
                         route = 'update';                         
                        success_msg = "updated successfully";
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
                  }
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
                   if (this.experiments.length <1) {
                        opthtml = `<option value="">No Experiment in Selected Course</option>`;                    
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
                    this.limitation = this.alldata.limitation;
                                       
                    let $this = this;
                    this.ucourse  = this.faculty_courses.filter(function(item){
                         return item.code === $this.alldata.course.code;
                    })
                    this.experiments = this.ucourse[0].experiments;

                    
                    let experimentids = [];                    
                    let exp;
                    for (var i = 0; i < this.alldata.weekly_work_experiments.length; i++) {
                        exp = this.alldata.weekly_work_experiments[i];
                        experimentids.push(exp.experiment_id);
                        this.setdata[exp.experiment_id]= JSON.parse(exp.setdata);
                    }                  
                    //console.log(experimentids);
                    $this.selectedExerpiment = experimentids;// from alldata.experiments
                    let selectedexp = [];
                    setTimeout(function() {
                         $('#courseD').val($this.ucourse[0].id)
                         $this.loadExperiment();                 
                         $('#experimentD').selectpicker('val',$this.selectedExerpiment);
                         $('#experimentD').selectpicker('refresh');
                    }, 100);
               }
                  
          },
      computed: {
        
        experimentDataFormat() {               
          return  this.experiment_data_format;
        },
  
      },
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
               experiment_data_format:{
                  type:Object,
                  default: function(){
                    return {}
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
            var $this = this;
               this.$nextTick(function() {
                  $(document).ready(function(){
                      if ($this.update){
                        if($this.alldata.mode == '1'){
                            $('#swal-input2').attr('checked','checked');
                        }            


                        let thisID;
                        for(let j=0; j<$this.selectedExerpiment.length; j++){
                            thisID = $this.selectedExerpiment[j];                                                        
                              $('#'+thisID+'>table').find('tr').each(function(index){   
                                $(this).find('.valueReading').each(function(index2){                                  
                                  if (typeof $this.setdata[thisID] != undefined && typeof $this.setdata[thisID][index2] != undefined) {                                
                                    console.log($this.setdata[thisID][index2])
                                      $(this).val($this.setdata[thisID][index2]);

                                  }
                                })                         
                              })
                        }     
                      }
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
     .bootstrap-select .dropdown-toggle, .form-control w-100{
          background: white !important;
          border: 1px solid #ccc !important;          
     }
    
    .bootstrap-select .dropdown-toggle:focus{
     outline: 0 !important;
    }
    .form-control w-100:focus{

     box-shadow: none;
    }
    .dropdown-item.active, .dropdown-item:active{
     background: white;
    }
    .btn:focus, .btn.focus{
     box-shadow: none;
     outline: 0;
    }
    .swal2-popup{      
      overflow-x: scroll;
      overflow-y: scroll;
      max-height: 90vh;
    }
    .formExp{       
      min-width: 300px;
      overflow-x: scroll;
      display: none;
    }
    .w-96{
      width: 95% !important;
    }
    .valueReading {
      border-radius: 0px !important;
      width: 85%!important;
      padding: 0px;      
    }
    .v-template{      
      padding: 2px;
      margin-bottom: 3px;      
    }
    table.table-stripped tr:nth-child(odd){
      background: rgba(5,90,20,.1);
    }
    .text-capitalize{
      text-transform: capitalize;
    }
    input[type='radio']{
      cursor: pointer;
    }
    .without_ampm::-webkit-datetime-edit-ampm-field {
   display: none !important;
 }
 input[type=time]::-webkit-clear-button {
   -webkit-appearance: none;
   -moz-appearance: none;
   -o-appearance: none;
   -ms-appearance:none;
   appearance: none;
   margin: -10px; 
 }
</style>