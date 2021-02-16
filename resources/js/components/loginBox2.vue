<template>
  <div class="">
    <div class="loginBox2"></div>
  </div>
</template>

<script>
export default {
  name: "Section",
};
</script>

<style lang="scss" scoped>
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap");
div {
  font-family: "Roboto", sans-serif;
}
.loginBox2 {
  position: absolute;
  background-color: #2c1e63;
  width: 26rem;
  height: 30rem;
  z-index: 1;
  border-radius: 20px;
  left: 10%;
  top: 30%;
}

.form-group {
  padding-left: 20px;
  padding-right: 20px;
}

.login-title {
  padding-left: 20px;
  padding-right: 20px;
  padding-top: 20px;
}
.login-text {
  font-size: 25px;
  font-weight: bolder;
}
.btn {
  width: 100%;
  border-radius: 10px;
}
.passwd {
  text-align: center;
  padding-top: 10px;
}
.f-password {
  color: #000;
}
.form-control {
  background-color: rgb(238, 238, 238);
}
</style>
