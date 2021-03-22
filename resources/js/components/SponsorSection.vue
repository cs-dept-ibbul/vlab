<template>
  <div class="sponsors w-100 d-flex ">  	
		<div class=" ">
			<h2 class="sponsors__title">
				Partners
			</h2>
			<div class="sponsors__list row">
				<img src="/images/ibbul.jpg">
				<img src="/images/baze.png">
				<img src="/images/sedi.png">
				<img src="/images/seamliness.png">
			</div>
		</div>
		<div class="">
			<h2 class="sponsors__title text-center">
				Sponsor
			</h2>
			<div class="sponsors__list pull-right">
				<img src="/images/ibbul.jpg">
			</div>
		</div>
  </div>
</template>

<script>
export default {
  name: 'SponsorSection',
};
</script>

<style lang="scss" scoped>
	img{
		width: 60px;
		height: 60px;
		display: inline-block;
		margin: 5px;
		box-shadow: 0px 0px 3px #ccc;
		border-radius: 8px;
		padding: 5px;

	}
.sponsors {
	justify-content: space-between;
	padding: 25px 128px;
	color: #2F2651;
	&__title {
		font-weight: 600;
		font-size: 1.8rem;
	}
}

.custom-section {
  width: 15%;
  margin: 10px;
  padding: 15px;
  background-color: #eeeeef;
  border-radius: 1rem;
}
</style>

