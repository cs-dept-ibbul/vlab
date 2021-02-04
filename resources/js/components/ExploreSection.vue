<template>
  <div>
    <div id="alignment">
        <div id="title">
            <h2 class="page-title">Explore V-Lab Available Courses</h2>
            <p>Most Visited Courses</p>
        </div>
      <div class="row custom-section ">
       
      </div>
    </div>

   
  </div>
</template>

<script>
export default {
  name: "Section",
};
</script>

<style lang="scss" scoped>


#alignment {
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
}
#title {
    width: 95%;
    margin-top:50px;
}
//section
.custom-section {
  width: 99%;
  padding: 40px 0px;
  background-color: #eeeeef;
  border-radius: 2rem;
  height: 250px;

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
      color: #000000;
      line-height: 1;
    }
    p {
      padding-top: 100px;
      color: #0c105a;
      font-size: 14px;
      
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
        border: 1px solid rgb(1, 1, 59);
      }
    }
  }
}
</style>
