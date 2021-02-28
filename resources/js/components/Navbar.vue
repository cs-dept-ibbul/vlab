<template>
  <nav class="navbar">
    <div class="container align-items-center">
      <div class="navbar__logo">
        <img src="https://picsum.photos/200/300" alt="" />
      </div>
      <ul
        class="navbar__list d-lg-flex mobile-nav"
        :class="showNav ? 'mobile-nav--open' : null"
      >
        <button
          class="navbar__toggle d-inline-block d-lg-none"
          :class="showNav ? 'navbar__toggle--active' : null"
          @click="toggleNav"
        >
          <div class="navbar__toggle__block"></div>
        </button>
        <li class="navbar__list__item"><a :href="home">Home</a></li>
        <li class="navbar__list__item"><a :href="explore">Explore</a></li>
        <li class="navbar__list__item"><a href="#">Articles</a></li>
        <li class="navbar__list__item"><a href="#">Videos</a></li>
        <div class="d-inline-block d-lg-none">
          <li class="navbar__list__item"><a :href="login">Login</a></li>
          <li class="navbar__list__item navbar__list__item--btn">
            <a href="#">Signup</a>
          </li>
        </div>
      </ul>
      <ul class="navbar__list d-none d-lg-flex align-items-lg-center">
        <li class="navbar__list__item"><a :href="login">Login</a></li>
        <li class="navbar__list__item navbar__list__item--btn">
          <a href="#">Signup</a>
        </li>
      </ul>
      <button
        class="navbar__toggle d-inline-block d-lg-none"
        :class="showNav ? 'navbar__toggle--active' : null"
        @click="toggleNav"
      >
        <div class="navbar__toggle__block"></div>
      </button>
    </div>
  </nav>
</template>
<script>
export default {
  name: 'Navbar',
  props: ['home', 'explore', 'login'],
  data: () => ({
    showNav: false,
  }),
  methods: {
    toggleNav() {
      this.showNav = !this.showNav;
    },
  },
};
</script>
<style lang="scss" scoped>
.navbar {
  position: fixed;
  top: 0;
  width: 100%;
  max-height: 81px;
  background-color: #fff;

  &__logo {
    position: relative;
    width: 50px;
    height: 50px;
    overflow: hidden;

    img {
      max-width: 50px;
    }
  }
  &__list {
    list-style-type: none;
    padding: 0;

    &__item {
      margin: 10px;
      font-weight: 500;

      a {
        color: #2f2651;
        &:hover {
          color: rgba($color: #2f2651, $alpha: 0.8);
        }
      }

      &--btn a {
        background-color: rgba($color: #2f2651, $alpha: 0.1);
        padding: 10px 30px;
        border-radius: 5px;
        transition: background-color 0.2s ease;
        display: inline-block;

        &:hover,
        &:focus {
          background-color: rgba($color: #2f2651, $alpha: 0.2);
        }
      }
    }
  }

  &__toggle {
    position: relative;
    display: inline-block;
    width: 30px;
    height: 24px;
    border: none;
    background-color: transparent;
    transition-timing-function: linear;
    transition-duration: .15s;
    transition-property: opacity,filter;

    &__block {
      width: 100%;
      height: 4px;
      background-color: #2f2651;
      top: 50%;
      margin-top: -2px;
      display: block;
      position: absolute;
      transition-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19);
      transition-duration: 75ms;

      &::after,
      &::before {
        display: block;
        content: '';
        width: 100%;
        height: 4px;
        position: absolute;
        background-color: #2f2651;
      }

      &::after {
        bottom: -10px;
      }

      &::before {
        top: -10px;
      }
    }

    &--active {
      .navbar__toggle__block {
        transition-delay: .12s;
        transition-timing-function: cubic-bezier(.215,.61,.355,1);
        transform: rotate(45deg);
        &::before {
          top: 0;
          transition: top 75ms ease,opacity 75ms ease .12s;
          opacity: 0;
        }

        &::after {
          bottom: 0;
          transition: bottom 75ms ease,transform 75ms cubic-bezier(.215,.61,.355,1) .12s;
          transform: rotate(-90deg);
        }
      }
    }
  }

  .mobile-nav {
    display: none;

    &--open {
      position: fixed;
      z-index: 9999;
      top: 0;
      right: 0;
      height: 100vh;
      width: 300px;
      background-color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      text-align: center;

      li {
        margin: 15px 0;
      }

      .navbar__toggle {
        position: absolute;
        top: 20px;
        right: 20px;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        border: none;
      }

      @media screen and (min-width: 992px) {
        flex-direction: row;
        text-align: left;
        position: static;
        width: auto;

        li {
          margin: 10px;
        }
      }
    }
  }
}

/* .mainNav {
  border-bottom: 1px solid #f2f2f2;
}
.navM a {
  font-family: 'Roboto', serif;
  font-weight: 300;
  margin: 0px 10px;
  font-size: 0.9em;
  color: #333;
  text-decoration: none;
}
.navM a:last-child {
  margin-right: 0px !important;
}
.navM a:hover {
  color: #3c8;
}
.nlogin {
  background: #3c8;
  color: #fff !important;
  padding: 10px 13px;
  border-radius: 5px;
  border: 1px solid transparent;
}
.nlogin:hover {
  background: #fff !important;
  color: #368 !important;
  border: 1px solid #fefefe;
}
.mainNavM {
  flex-wrap: wrap;
  align-items: center;
} */
</style>

    