<template>
  <div class="head my-3">
      <nav class="navbar navbar-expand-lg navbar-light head_custom-nave">
        <a href="/" class="navbar-brand d-flex align-items-center">
          <img src="" alt="Logo" />
          <span>V-Lab</span>
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collape"
          data-terget="#navbarNav"
        >
          <span><img src="../../images/logo.png" class="img-circle" alt="Menu" /></span>
        </button>

        <div
          class="collapse navbar-collapse justify-content-center"
          id="navbarNav"
        >
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="/learn" class="nav-link">Learn</a>
            </li>
            <li class="nav-item">
              <a href="/Articles" class="nav-link">Articles</a>
            </li>
            <li class="nav-item">
              <a href="/about" class="nav-link">About</a>
            </li>
            <li class="nav-item">
              <a href="/learn" class="nav-link">Blog</a>
            </li>
          </ul>
        </div>
        <div class="collape navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
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
    background-color: rgba(25,10,100,.2);
    border-radius: 10px;
    color:#000000;

    &:hover {
      color: rgb(255, 255, 255);
      background-color: #D4D2DC;
    }
  }
}


</style>

    