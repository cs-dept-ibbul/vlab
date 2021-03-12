<template>
  <div class="contener">
    <b class="title">All Pracrical Class Timeline</b>
    <div class="vlab-practicals">
      <div class="container mb-12">
        <div class="row">
          <div class="col-md-12">
            <div class="parentTimeline" v-for="x in 3" :key="x">
              <b>Week {{x}}</b>
              <div>
                <ul class="timeline">
                  <li class="child" v-for="y in 2" :key="y">
                    <div class="col-md-10">
                      <div>
                        <span class="text">100 level</span>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="bttn-container">
                        <button class="btn btn-secondary" type="submit">
                          <i class="fa fa-good"></i>
                        </button>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
.contener {
  margin: 0;
  display: flex;
  justify-content: space-between;
  flex-direction: column;
  width: 100%;
}

.title {
  padding: 35px 20px 20px 65px;
}

.timeline {
  margin-top: 10px;
}

.parentTimeline b {
    width: 8%;
}

.text {
  background-color: #d4d9df;
  padding: 8px;
  border-radius: 10px;
  font-size: 16px;
}

.practical-desc {
  display: flex;
  justify-content: space-between;
  width: 52%;
  font-size: 16px;
  padding: 8px 0;
}

.col-md-10 {
  display: flex;
  flex-direction: column;
  height: 8rem;
}

.col-md-2 {
  display: flex;
  flex-direction: column;
  justify-content: space-around;
}

.practical-title {
  font-weight: bolder;
  padding-top: 10px;
  text-transform: capitalize;
}

.parentTimeline {
  list-style-type: none;
  position: relative;
  display: flex;
  padding: 0px 20px 0px 65px;
}

.parentTimeline div {
    width: 100%;
}

.parentTimeline > div:before {
  content: "";
  background: #0b0524;
  display: inline-block;
  position: absolute;
  border-radius: 50%;
  border: 1px solid #0b0524;
  left: 161px;
  width: 20px;
  height: 20px;
  z-index: 400;
}

.child {
  background-color: #fff;
  margin-bottom: 30px;
  margin-top: 10px;
  border-radius: 0.5rem;
  padding: 10px;
  height: 10rem;
  display: flex;
  justify-content: space-between;
}
ul.timeline {
  list-style-type: none;
  position: relative;
  padding-top: 30px;
}
ul.timeline:before {
  content: " ";
  background: #d4d9df;
  display: inline-block;
  position: absolute;
  top: 10px;
  left: 29px;
  width: 2px;
  height: 100%;
  z-index: 400;
}
ul.timeline > li {
  margin: 0px 0;
  padding-left: 20px;
  margin-bottom: 10px;
  margin-left: 10px;
}

ul.timeline > li:before {
  content: "";
  background: #0b0524;
  display: inline-block;
  position: absolute;
  border-radius: 50%;
  border: 1px solid #0b0524;
  left: 22px;
  width: 15px;
  height: 15px;
  z-index: 400;
}

.vlab-practicals {
  width: 100%;
  background-color: #ebeaef;
  max-height: 700px;
  border-radius: 2.5rem;
  overflow-y: scroll;
}

.instructors {
  color: #959399;
  margin-bottom: 0%;
}

.view-practicals {
  width: 95%;
  background-color: #ebeaef;
  height: 200px;
  border-radius: 2rem;
  margin-top: 55px;
  display: flex;
}

.view-practicals-box {
  width: 12%;
  background-color: #adaabb;
  height: 150px;

  position: absolute;
  z-index: 1;
  border-radius: 2.5rem;
  right: 55%;
  top: 38%;
}
.view-Practical_text {
  align-self: flex-end;
  padding-left: 20px;
}

.fa {
  padding-left: 5px;
}

.side {
  display: flex;
  justify-content: flex-end;
}

.expect {
  width: 55%;
  background-color: #ebeaef;
  height: 300px;
  border-radius: 2rem;
  margin-top: 55px;
}

.what-to-expect-text {
  padding-left: 20px;
  padding-top: 20px;
  font-weight: bold;
  color: #0b0524;
}
.expect-content {
  width: 90%;
  overflow-x: hidden;
  overflow-y: scroll;
  scrollbar-color: #0b0524 #bebebe;
  scrollbar-width: thin;
  max-height: 220px;
  margin-left: 15px;
}
.input-row {
  margin-top: 20px;
}
.md-size {
  font-size: 16px;
}
</style>