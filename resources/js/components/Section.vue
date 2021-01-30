<template>
  <div>
    <div id="alignment">
      <div class="row custom-section d-flex align-items-center">
        <div class="col-12 col-lg-8">
          <h2>Virtual Laboratory</h2>
          <p>A Simulation Virtual Environment for Experiment and Research</p>
          <div class="links">
            <router-link to="/explore" class="nav-link">Explore V-lab</router-link>
            <router-link to="/practice">Practice a Practical</router-link>
          </div>
        </div>
      </div>
    </div>

    <div class="intro_vid"></div>
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
  background-color: #0c105a;
  width: 25rem;
  height: 28rem;
  z-index: 1;
  border-radius: 2rem;
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
  width: 95%;
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
      color: #0c105a;
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
      color: #0c105a;
      font-size: 14px;
      margin-top: 30px;
    }
    a {
      display: inline-block;
      padding: 8px 22px;
      color: #ffffff;
      background-color: #0c105a;
      border: 1px solid transparent;
      margin-top: 60px;
      text-decoration: none;
      transition: 5s cubic-bezier(0.785, 0.135, 0.15, 0.86);

      &:hover {
        color: white;
        background-color: darkblue;
        border: 1px solid rgb(0, 0, 255);
      }
    }
  }
}
</style>
