<template>
  <div>
    <div id="alignment">
      <div class="row custom-section d-flex align-items-center">
        <div class="col-12 col-lg-8">
          <h2 class="page-title">Virtual Laboratory</h2>
          <p>A virtual environment for Science and Engineering Practicals</p>
          <div class="links">
            <a href="/explore" class="nav-link">Explore V-lab</a>
            <a href="/practice" class="Practice">Practice a Practical</a>
          </div>
        </div>
      </div>
    </div>

    <div class="intro_vid">
      <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
    </div>
  </div>
</template>

<script>
export default {
  name: "Section",
};
</script>

<style lang="scss" scoped>
.intro_vid {
  position: absolute;
  background-color: #2F2651;
  width: 25rem;
  height: 28rem;
  z-index: 1;
  border-radius: 2.5rem;
  right: 15%;
  top: 25%;
}

#alignment {
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
}

//section
.custom-section {
  width: 99%;
  padding: 40px 0px;
  background-color: #eeeeef;
  border-radius: 1rem;

  @media screen and (width: 991.98px) {
    flex-direction: column-reverse;
  }

  .col-lg-8 {
    margin-top: 100px;
    h2 {
      font-weight: 700px;
      font-size: 63px;
      color: #2F2651;
      margin-bottom: 0;
      line-height: 1;
      white-space: nowrap;
    }
    h3 {
      font-weight: 300px;
      font-size: 64px;
      color: #0c105a;
      line-height: 1;
    }
    p {
      color: #0d0d0e;
      font-size: 20px;
      margin-top: 30px;
    }
    a {
      display: inline-block;
      padding: 8px 22px;
      
      border: 1px solid transparent;
      margin-top: 60px;
      text-decoration: none;
      transition: 5s cubic-bezier(0.785, 0.135, 0.15, 0.86);
    }

  }
}
.nav-link{
			color:#FFF;
      font-size: large;
			padding:8px 15px;
			white-space:nowrap;
			background-color: #2F2651;
      border-radius: 1rem;
      
			&:hover{
				color:rgb(255, 255, 255);
				background-color: #454aa1;
			}
    }
  .Practice{

    color:#000;
  }
  
</style>
