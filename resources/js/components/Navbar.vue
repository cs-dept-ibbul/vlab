<template>
  <div class="w-100 mainNav p-0 m-0">
    <div class="d-flex px-6 py-4 justify-content-between mainNavM w-100">
      
      <div style="width: 40px; height: 40px;border-radius:9px; background: green;" class="m-0 p-0"></div>
      <div class="p-0">
        <div class="navM p-0">
          <a :href="home" class="nbtn">Home</a>
          <a :href="explore" class="nbtn">Explore</a>
          <a href="" class="nbtn">Articles</a>
          <a href="" class="nbtn">Videos</a>        
          <a :href="login" class="nlogin ml-5">Login</a>
        </div>      
      </div>
    </div>   
    </div>
</template>
<script>
export default {
  name: "Navbar",
  props:['home','explore', 'login']
};
</script>
<style >
  @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');

  .mainNav{
    border-bottom: 1px solid #f2f2f2;  
  }
  .navM a{
     font-family: 'Roboto', serif;
     font-weight: 300;
     margin: 0px 10px;
     font-size: 0.9em;
     color: #333;
     text-decoration: none;
  }
  .navM a:last-child{
    margin-right: 0px !important;
  }
  .navM a:hover{
    color:#3c8; 
  }
  .nlogin{
    background: #3c8;
    color: #fff !important;
    padding: 10px 13px;
    border-radius: 5px;  
    border: 1px solid transparent;
  }
  .nlogin:hover{
    background: #fff !important;
    color: #368 !important;
    border: 1px solid #fefefe;
  }
  .mainNavM{
    flex-wrap: wrap;
    align-items: center;
  }
</style>

    