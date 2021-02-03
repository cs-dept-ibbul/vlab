<template>
    <div class="AvalaibleCourses">
      <div class="row" style="margin:0px;padding:0px">
          <div class="col-md-6" style="padding-left:35px">
              <p>Available V-lab Courses</p>
          </div>
           <div class="col-md-6" style="padding:0px;margin:0px">
             <input type="text" class="form-control" style="border-radius: 0.5rem;width:40%;float:right;background-color:#eeeeef;">
           </div>
      </div>
      <div class="row">
        <div v-for="x in 8" :key="x" class="col-md-3">
          <div class="card" style="width: 18rem;">
  <img src="../../images/course_image.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">
      <a href="#" class="btn btn-secondary">Applied Sciences</a>
    </h5>
    <p class="card-text">Electrical Engineering</p>
    
    <a href="#" class="card-link">
       <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
    </a>
    <a href="#" class="card-link">
      <i class="fa fa-copy"></i>
       <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
    </a>
  </div>
</div>
        </div>
      </div>
    </div>
</template>

<script>
export default {
  name: "AvalaibleCourses",
};
</script>

<style scoped>
.btn{
  border-radius: 1rem;
}
.card-text{
  color: #2F2651;
  font-weight: bold;

}
#alignment {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.card-img-top {
  border-radius: 1rem;
}
.card {
  padding: 10px;
  background-color: #eeeeef;
  margin: 20px;
}
.AvalaibleCourses {
  width: 95%;
  padding-top: 30px;
  padding-bottom: 30px;
}
</style>