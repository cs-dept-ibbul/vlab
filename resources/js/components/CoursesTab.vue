<template>
    <div style="display: flex;" class="px-0 mx-0">
            <div class="w-100 bg-white px-4" style="box-shadow: 1px 6px 5px rgba(100,100,100,.1);position: relative;z-index: 2;">
                <a href="/course-activities" class="font2 fw4  systab" v-bind:class="{systabActive:activities}">
					Activities
			</a>

             <a href="/course-experiments" class="font2 fw4  systab" v-bind:class="{systabActive:experiments}">
					Experiments
			</a>

             <a href="/courses-students" class="font2 fw4  systab" v-bind:class="{systabActive:students}">
					Students
			</a>

             <a href="/course-resources" class="font2 fw4  systab" v-bind:class="{systabActive:resources}">
					Resources
			</a>

             <a href="course-details" class="font2 fw4  systab" v-bind:class="{systabActive:details}">
					Details
			</a>
                
            </div>
           
        </div>
</template>

<script>	
	export default {
		    data:function() {
		    	return{
           
            activities:false,
            experiments:true,
            students:false,
            resources:false,
            details:false
		    	}
        },
        methods:{
           
        },


        created:function(){		  
        	if (this.active=='activities'){
        		this.activities = true;
        	}
            if (this.active=='experiments'){
        		this.experiments = true;
        	}
            if (this.active=='students'){
        		this.students = true;
        	}
            if (this.active=='resources'){
        		this.resources = true;
        	}
            if (this.active=='details'){
        		this.details = true;
        	}
        	
        },
        
	
};

</script> 

<style>

</style>