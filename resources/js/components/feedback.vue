<template>	
	<div>
		
	</div>
</template>

<script >
	export default{
		data(){
			return{
				feedbacks:[]
			}
		},
		methods:{

		},
		async created(){
			this.feedbacks = await this.axiosGet('api/getfeedbacks', true);
		},
		mounted(){


		}
	}
</script>