<template>
  <div id="alignment">
    <div class="AvalaibleCourses">
      <div class="row">
        <div v-for="x in 8" :key="x" class="col-md-3">
          <div class="card" style="width: 18rem">
            <img src="images/course_image.png" class="card-img-top" alt="" />
            <div class="card-body">
              <a href="#" class="btn btn-secondary">Applied Science</a>
              <h5 class="card-title">Physical Science</h5>
              <p class="card-text">Dr Kawu</p>
            </div>
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

<style>
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