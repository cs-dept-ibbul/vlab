<template>
	<div>
		<div class=""></div>
	</div>
</template>

<script >
	
export default{
	data(){
		return{
		  course_experiment: null,
		}
	},
	methods:{

	},
	props:{
		course:{
			type:Object
		}
	},
	async created(){
         this.course_experiment  = await this.axiosGetById('api/courses/faculty_courses','faculty_id', faculty_id);

	}
}
</script>