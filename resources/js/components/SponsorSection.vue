<template>
  <div class="sponsors">
		<div class="container">
			<h2 class="sponsors__title">
				Sponsors
			</h2>
			<div class="sponsors__list row">
				<div class="row custom-section d-flex align-items-center"></div>
				<div class="row custom-section d-flex align-items-center"></div>
				<div class="row custom-section d-flex align-items-center"></div>
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
.sponsors {
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

