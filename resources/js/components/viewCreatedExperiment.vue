<template>
	<div>
		<table id="experimenttable" class="table table-hover">
			<thead>
				<tr id="cheadV">								
	            <th width="25%">Experiment Name</th>	            
	       <!--      <th width="10%">Video</th>
	            <th width="15%">diagram</th>	  -->         
	            <th width="10%">Actions</th>
				</tr>
			</thead>
			<tbody v-if="tableLoaded">
	        <tr v-for="(experiment, index) in createdexperiments" :key="experiment.id">	       
	            <td width="25%" :title="experiment.title">{{experiment.name}} {{experiment.experiment_number}}</td>	            
	            <!-- <td width="10%" ><a :href="experiment.experiment_url">video link</a></td> -->
	           <!--  <td width="5%">
	            	<span v-if="experiment.diagram == ''">
	            		<label class="container"><span class="checkmark"></span></label>
	            	</span>
	            	<span else>
	            		<img src="experiment.diagram" width="10%">
	            	</span>
	            </td>	           -->  
	           <!--  <td width="15%" :title="experiment.theory">{{experiment.aim.slice(0,20)}} ...</td>	             -->
	            <td width="10%">

	            	<span class="ml-2 fa fa-edit pl-3  fs01 cursor-1" @click="editexperiment(createdexperiments[index])" style="border-left: 1px solid #ccc;"></span>
	            	<span class="ml-2 fa fa-trash pl-3  fs01 cursor-1" @click="deleteexperiment(experiment.id)"></span>
	            </td>
	        </tr>
	    	</tbody>
    	</table>
	</div>
</template>

<script>
	import addexperiment from './addExperiment.vue';
	export default{
		components:{
			addexperiment,
		},
		data(){
			return{
				createdexperiments:null,
				tableLoaded:false
			}
		},
		methods: {
				editexperiment:function(obj){
					this.VueSweetAlert2('v-addexperiment',{
						update:true,
						alldata: [], //obj
						experiment_id:2 //id
					})
					},
					deleteexperiment: function(id){
						Swal.fire('delete');					
					}
		},
		async created(){

		    this.createdexperiments  = await this.axiosGet('api/experiments/experiments');
		    //console.log(this.createdexperiments)
		    this.tableLoaded = true;
		    
		    /*initialize datatable */
             setTimeout(function() {
             	 $('#experimenttable').DataTable({
			    	pageLength : 5,
			    });
             }, 200);
		},
		mounted(){	
		//this.editexperiment();		
			this.$nextTick(function(){ 
			}); 
		}
	};
</script>
<style type="text/css">
	
</style>