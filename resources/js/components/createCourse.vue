<template>
	<div class="m-0 p-0">
		
	<div class="row bg-light m-0 px-2 pt-4">
            <div class="col-lg-3 col-md-5 col-sm-12 m-0">
            	<p class="fs2 fw8 font">Create Course</p>
            	<div  class="w-100 bg-white r2 px-4 py-4"><!-- loop weekly -->
						<div class="d-flex flex-wrap-center mb-4" >
							<span class="ncircle" v-bind:class="{tactive:stageone,stageonep:tsuccess}" >1</span>
							<span class="tline" v-bind:class="{tlactive:stageone,tlsuccess:stageonep}"></span>
							<div class="fs1 w10 no-break ml-3">Course Details </div>						
						</div>
						<div class="d-flex flex-wrap-center mb-4 ">	
							<span class="ncircle">2</span>
							<span class="tline"></span>
							<div class="fs1 w10 no-break ml-3">Add Experiment</div>							
						</div>
						<div class="d-flex flex-wrap-center mb-4 ">	
							<span class="ncircle">3</span>
							<span class="tline"></span>
							<div class="fs1 w10 no-break ml-3">Add Resources</div>
						</div>
						<div class="d-flex flex-wrap-center mb-4 ">	
							<span class="ncircle">4</span>							
							<div class="fs1 w10 no-break ml-3">Add Instruction</div>
						</div>
				</div>
            			   	
            </div>
            	
            <div class="col-lg-8 col-md-7 col-sm-12 pt-3">
            	<!-- course detatil -->            	
            	<div id="cdetail" class="py-4 px-4 mt-3 r2 bg-white">
            		<p class="fw8 fs1 font" style="color: #777;">Course Details</p>
            		<div class="row">            			
            			<div class="col-lg-8 col-md-6 m-0">
            				<p class="fs001 my-1">Course Title</p>
            				<input type="text" class="form-control" id="ctitle">
            			</div>
            			<div class="col-lg-1 col-md-1 m-0 px-0"></div>
            			<div class="col-lg-3 col-md-5 m-0">
            				<p class="fs001 my-1">Course Code</p>
            				<input type="text" class="form-control" id="ctitle">
            			</div>
            			<div class="col-lg-12 col-md-12 mt-3">
            				<p class="fs001 my-1">Course Code</p>            				
            				<textarea class="form-control" rows="6"></textarea>
            			</div>

            		</div>
            	</div>
            	<br><br><br><br>
            </div> 
   		</div>
        <div class="row bg-white m-0">
            <div class="col-lg-8 col-md-7 col-sm-12">
            </div>
            <div class="col-lg-2 col-md-3 col-sm-12 mx-auto py-2">
            	<button class="btn p-success text-white py-2 px-3"> Continue <span class="fa fa-arrow-right"></span></button>
            </div>
            <div class="col-lg-2 col-md-1 col-sm-12 mx-auto">
            </div>
        </div>
	</div>
</template>

<script>
	export default{

	 data:function() {
	    	return{
	    	 stageone:true,
	    	 stageonep:false,
	    	 stagetwo:false,
	    	 stagetwop:false,
	    	 stagethree:false,
	    	 stagethreep:false,
	    	 stagefour:false,
	    	 stagefourp:false,
	    	 navState:false,
	    	 courseTrend: 4,
	    	}
        },
        methods:{
        	toggleExperimentGuider: function () {
//        		alert(this.navState);
        		this.navState = !this.navState;
			   this.$eventBus.$emit('toggleClick',{text:this.navState});
			    //this.newTodoText = ''
			}
        },	
        
         props: [],
         mounted(){	         	
         },
         events :{
         	'toggleClick':'toggleClick'
         }

	}
</script>
<style scoped>
	.ncircle{
		border: 2px solid #bbb; 
		border-radius: 50%;
		width: 25px;
		height: 25px;
		font-size: 0.9em;
		padding: 2px 0px 0px 6.5px !important;
	}
	div{
		font-family: 'Roboto', sans-serif;
	}
	.no-break{
		white-space: nowrap;
		word-break:keep-all;
	}
	.tline{
		height: 27px; width: 2px; background: #bbb; position: relative; top:26px; left: -13px;
	}
	@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');
	.syscircle{
		width: 12px !important;
		height: 12px !important;
		border-radius: 50%;
		background: #00b96b;
		display: block;
		margin: 0px 0px 0px 12px;
	}
	.tactive{
		border:2px solid #222 !important;
	}
	.tlactive{
		background: #222 !important;
	}
	.syscircle-o{
		width: 12px;
		height: 12px;
		border-radius: 50%;
		border: 2px solid #999;
		display: block;	
		margin-left:12px;
	}
	.syscircle-o-l{
		width: 22px;
		height: 22px;
		border-radius: 50%;
		border: 2px solid #999;
		display: block;	
		margin-left: 5px;
	}
	.fs3{
		font-size: 1.7em;
	}
	.fs1{
		font-family: 'Roboto', sans-serif;
		font-size: 0.9em;
		color: #888;
		font-weight: 300;
	}
	.flex-wrap-center{
		flex-wrap: wrap;
		align-items: center;
	}
	.w10{
		width: 60px;
	}
	.timelineX{
		margin-top: 10px; 
		margin-bottom: 120px; 
	}
	.timelineX-o{
		margin-top: 10px; 
		margin-bottom: 120px; 
	}
	.timelineSM:before{
		content: "";
		height: 40px;
		width: 2px;
		background: #00b96b;		
		display: block;
		position: relative;
		top: 31px;		
		left: 77px;
	}
	.timelineSM-o:before{
		content: "";
		height: 40px;
		width: 2px;
		background: #999;		
		display: block;
		position: relative;
		top: 31px;		
		left: 77px;
	}
	.timelineX-o:before{
		content: "";
		height: 140px;
		width: 2px;
		background: #999;		
		display: block;
		position: relative;
		top: 31px;		
		left: 77px;
	}
	.timelineX:before{
		content: "";
		height: 132px;
		width: 2px;
		background: #00b96b;		
		display: block;
		position: relative;
		top: 10px;		
		left: 5px;
	}
	.timelineX-o:before{
		content: "";
		height: 130px;
		width: 2px;
		background: #999;		
		display: block;
		position: relative;
		top: 10px;		
		left: 3px;
	}
	.fw8{
		font-weight: 600;
		color: #222;
	}
	.fs001{
		font-size: 0.8em;
		color: #888;
	}
	.fs2{
		font-size: 1.2em;
	}
</style>