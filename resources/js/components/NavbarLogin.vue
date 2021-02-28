<template>
  <div class="head my-3">
      <nav class="navbar navbar-expand-lg navbar-light head_custom-nave">
        <div class="collape navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
             <b class="account-text">Already have account</b>
              <a href="/" class="nav-link-login"
                >Home</a>
              <a href="/login" class="nav-link-login"
                >Login</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
</template>
<script>
export default {
  name: "Navbar",
};
</script>
<style lang="scss" scoped>
#navbarNav {
  .navbar-nav {
    .nav-link {
      color: #0B0524;
      font-size: large;
      padding: 8px 15px;
      white-space: nowrap;
      transition: 0.5s cubic-bezie(0.785, 0.135, 0.15, 0.86);

      &:hover {
        color: darkblue;
      }
    }
  }

  .nav-link-login {
    color: #ffffff;
    font-weight: 200;
    font-size: large;
    padding: 10px 25px;
    white-space: nowrap;
    
  }
  .account-text{
    color: #fff;
    font-size: 13px;
    font-weight:1;
  }
}



</style>

    