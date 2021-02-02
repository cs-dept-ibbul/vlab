<template>
  <div class="head my-3">
      <nav class="navbar navbar-expand-lg navbar-light head_custom-nave">
        <router-link to="/" class="navbar-brand d-flex align-items-center">
          <img src="" alt="Logo" />
          <span>V-Lab</span>
        </router-link>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collape"
          data-terget="#navbarNav"
        >
          <span><img src="" alt="Menu" /></span>
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
              <router-link to="/Articles" class="nav-link"
                >Articles</router-link
              >
            </li>
            <li class="nav-item">
              <router-link to="/about" class="nav-link">About</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/learn" class="nav-link">Blog</router-link>
            </li>
          </ul>
        </div>
        <div class="collape navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <router-link to="/login" class="nav-link-login"
                >Login</router-link
              >
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
      color: #161d99;
      font-weight: 800;
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
    font-weight: 800;
    font-size: large;
    padding: 8px 15px;
    white-space: nowrap;
    background-color: #161d99;
    border-radius: 1rem;
    &:hover {
      color: rgb(255, 255, 255);
      background-color: #454aa1;
    }
  }
}


</style>

    