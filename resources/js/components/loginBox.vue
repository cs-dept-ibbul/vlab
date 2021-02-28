<template>
  <div class="">
    <div class="loginBox">
        <div class="login-title">
            <b class="login-text">Login</b>
            <p>Hi, This will only take a minute</p>
        </div>
       <div class="form-group">
			<input class="form-control form-control-lg" type="text" placeholder="Matriculation Number">                    	
		</div>
        <div class="form-group">
			<input class="form-control form-control-lg" type="text" placeholder="Password">                    	
		</div>

         <div class="form-group">
			<a href="/UserDashboard" class="btn btn-success form-control-lg">Login</a>                   	
		</div>                       

         <div class="passwd">
			<a href="" class="f-password">Forgot password?</a>                   	
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
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');
div{
  font-family: 'Roboto', sans-serif;
}
.loginBox {
  position: absolute;
  background-color: #FFF;
  width: 25rem;
  height: 23rem;
  z-index: 1;
  border-radius: 20px;
  right: 10%;
  top: 20%;
}

.form-group{
    padding-left:20px;
    padding-right:20px;
}
  
.login-title{
    padding-left:20px;
    padding-right:20px;
    padding-top: 20px;
}
.login-text{
     font-size: 25px;
    font-weight: bolder;
    
}
.btn{
    width: 100%;
    border-radius: 10px;
}
.passwd{
    text-align: center;
    padding-top: 10px;
}
.f-password{
    color:#000;
   
}
.form-control{
    background-color: rgb(238, 238, 238);
}
</style>
