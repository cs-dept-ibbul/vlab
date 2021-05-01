<template>
	<div class="mx-auto">
		  <a href="#" @click="create" class="btn py-3 mb-5 mr-2 px-4 text-white fs1 font1 p-success btn-lg" style="border-radius: 0.6rem">Create New <span class="text-white fa fa-chevron-down"></span></a>
         <div class="task-container" style="width: 100%;">
			<div v-for="weeklywork in weeklyworks" class="task-item1 " v-bind:class="{'task-not-active':weeklywork.is_expired,'task-active':!weeklywork.is_expired}" tabindex="1">
				<span>				
					<h5 class="t-h0">{{weeklywork.course_code}}</h5>
					<h4 class="t-h1">{{weeklywork.title}}</h4>			
				</span>
				<div class="task-overlay" >				
					<div class="task-text">
						<h5 >Experiments</h5>
						<ul>
							<li v-for="experiment in weeklywork.experiments">{{experiment.name}}</li>							
						</ul>
					</div>
					<div class="task-btns">					
						<div class="task-btn">Delete</div>
						<div class="task-btn" @click="editTask(weeklywork.id)">Edit</div>
						<div class="task-btn" @click="taskCode(weeklywork.code)">show Code</div>
					</div>
				</div>
			</div>		
        </div>
        <template id='code-toast'>
		  <swal-title></swal-title>
		</template>
	</div>
</template>

<script >
	export default{
		data(){
			return{
				courses_experiments:null,
				faculty_courses: null,
				loadederState: true,
				weeklyworks:[
					{id: 1, code:'1235', title: 'week 1',course_code:'phy 107',is_expired:true, experiments:[{id:1,name:'Vernier Caliper'},{id:2,name:'micrometer Screw Guage'}] },
					{id: 2, code:'1235', title: 'week 2',course_code:'phy 107',is_expired:true, experiments:[{id:1,name:'Simple Pendulum'}] },
					{id: 3, code:'1235', title: 'week 3',course_code:'phy 107',is_expired:true, experiments:[{id:1,name:'Vernier Caliper'}] },
					{id: 4, code:'1235', title: 'week 4',course_code:'phy 107',is_expired:true, experiments:[{id:1,name:'Micrometer Screw Guage'}] },
					{id: 5, code:'1235', title: 'week 6',course_code:'phy 107',is_expired:false, experiments:[{id:2,name:'micrometer Screw Guage'}] },
					{id: 6, code:'1235', title: 'Exam',course_code:'phy 107',is_expired:false, experiments:[{id:2,name:'micrometer Screw Guage'}] },
				] 
			}
		},
		methods:{
			create:function () {
				this.VueSweetAlert2('v-taskform',{
						faculty_courses:this.faculty_courses,
						courses_experiments:this.courses_experiments,
						update:false
					})
			},
			editTask:function(code){
					this.VueSweetAlert2('v-taskform',{
						faculty_courses:this.faculty_courses,
						courses_experiments:this.courses_experiments,
						update:1
					})
			},
			taskCode:function(code){
				/*Swal.fire({
					html: `<p class="text-success fs1 w-100 fw6 text-right mx-0" id="code-point">${code}</p>`,
					confirmButtonColor:'#00b96b',	
				});
				let charCode = code.split(''), c=-1;
				$('#code-point').animate(
					{'padding-right': '50%'}
				);
				return 0;*/
				let $this = this;
					Swal.fire({
						title: 'Verify Your Identity',
						html: `<p class="font1 fs01 fw6">Enter you password</p>
						<input type="password" id="swal-input1" class="swal2-input mt-1" value="">`,
						confirmButtonText:'Ok',					      
					      cancelButtonText:'Cancel',				      				      
					      cancelButtonColor:'#dd000f',					      
					      confirmButtonColor:'#00b96b',					      
					      showCancelButton:true,					      
					      showLoaderOnConfirm: true,	
					      focusConfirm: false,					  
						  preConfirm: () => {						  		
						  	return	$this.axios.post($this.baseApiUrl+'confirm_identity',$this.createFormData({username:$this.currentUser.username,password:document.getElementById('swal-input1').value}), $this.axiosHeader,{headers:$this.axiosHeader}).then(response => {	
						  				console.log(response)					  					      	
								        if (!response.data.sucess) {
								           throw new Error(response.statusText)	
								        }						   
								        return response.data.success;
						  		}).catch(error => {						  									  		
							      	if (error.response) {
								      	if (error.response.status == 409) {
								      	}else if(error.response.status == 401){
								      		location.reload();
								      	}else{
								      		Swal.showValidationMessage('Failed: Something went wrong');						      								      		
								      	}
							      	}
					      	})	
						  	
						  },
					}).then((result)=>{
						if (result.value){
							Swal.fire({
								html: `<p class="text-success fs1 w-100 fw6 text-right mx-0" id="code-point">${code}</p>`,
								confirmButtonColor:'#00b96b',	
							});
							let charCode = code.split(''), c=-1;
							$('#code-point').animate(
								{'padding-right': '50%'}
							);
						
						}
					})
			}

		},
		   async created(){        
         let faculty_id = this.currentUser.faculty_id;
         this.faculty_courses  = await this.axiosGetById('api/courses/faculty_courses','faculty_id', faculty_id);
         
         this.courses_experiments  = await this.axiosGet('api/experiments/course_experiments');
         
         this.loadederState = false;
         let $this = this;
   
          /*initialize datatable */
          setTimeout(function() {
            $this.rippleButton();
                    
          }, 200);
      
          },
		
	}
</script>