<template>
  <nav id="navbarId" class="navbar py-3" :style="'width:'+currentWidth+'%;'" >
    <div class="container align-items-center mb-0">
      <div class="navbar__logo">
        <img src="/vlab.png"  width="100" class="mt-2" alt="vlab-logo" />
      </div>
      <ul
        class="navbar__list d-lg-flex mobile-nav mb-0"
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
        <div v-if="username == ''" class="d-inline-block d-lg-none">
          <li class="navbar__list__item"><a :href="login">Login</a></li>
          <li class="navbar__list__item navbar__list__item--btn">
            <a href="#">Signup</a>
          </li>
        </div>
        <div class="d-inline-block d-lg-none sys-acc" @click="forLogout =!forLogout"  v-if="username != '' ">
            <span class="fa fa-user mr-2"></span>
            <span style="font-size: 0.9em; font-weight: 300;">{{username}}</span>
            <span class="fa fa-chevron-down ml-2"></span>
            <a @click="logout" class="forLogout" v-bind:class="{extra:forLogout}">Logout</a>            
          </div>
      </ul>
      <ul id="lnav" class="navbar__list d-none d-lg-flex align-items-lg-center mb-0">
        <li v-if="username == ''"  class="navbar__list__item"><a :href="login">Login</a></li>
        <li v-if="username == ''" class="navbar__list__item navbar__list__item--btn">
          <a href="#">Signup</a>
        </li>
          <li class="sys-acc p-0" @click="forLogout =!forLogout" v-if="username != '' " >
            <span class="fa fa-user mr-2"></span>
            <span style="font-size: 0.9em; font-weight: 300;">{{username}}</span>
            <span class="fa fa-chevron-down ml-2"></span>
            <div class="forLogout" v-bind:class="{extra:forLogout}">
              <a :href="mydashboard">My Account</a>
              <a @click="logout">Logout</a>              
            </div>
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
  data(){
    return{

    showNav: false,
    username:'',
    mydashboard: '#',
    forLogout:false,
    role_id:'',
    }
  },
  created(){        
      if(localStorage.hasOwnProperty('LoggedUser')){                                
        let role_id =  JSON.parse(localStorage.getItem('LoggedUser')).user.role_id;          
        if (this.all_roles !== '') {
         let RoleName = this.getKeyByValue(JSON.parse(this.all_roles),role_id)
         if (RoleName != undefined) {
           if (RoleName == 'admin'){
            this.mydashboard = '/manage-user'
           }
           if (RoleName == 'instructor'){
            this.mydashboard = '/view-student';
           }
           if (RoleName == 'student'){
            this.mydashboard = '/userDashboard';
           }
         }    

        }
        this.username =  JSON.parse(localStorage.getItem('LoggedUser')).user.first_name;          
      }else{
        this.username ='';
      }
  },
  props: {
    home:String,
    explore:String,
    login:String,
    all_roles:{
        type:String,
        default:function(){
          return '';
        }
    }
  },
  methods: {
    getDashboard(){
              
    },
    getKeyByValue(object, value) {
      for(let k in object){                       
        if (object[k] === value) {
          return k;
          break;
        }
      }    
    },
    toggleNav() {
      this.showNav = !this.showNav;
    },
    sysAcc(){

    }
  },
  mounted(){
    let $this =this;
    $('#navbarId').next().click(function(){      
      $this.forLogout = false;
    })
  }
};
</script>
<style lang="scss" scoped>
  #navbarId{
    user-select: none;
  }
  .forLogout{
    position: absolute;
    left: -15px;
    top: 0px;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 0px;
    background: #fff;
    width: 150px;    
    text-align: center;
    transition: 1s top;
    display: none;
  }
  .forLogout a{
    display: block;
    border-bottom: 1px solid #eee;
    padding: 10px 15px;
  }
  .forLogout a:hover{
    background: rgba(30,10,60,.5);
    color: white;
  }

@keyframes fdown {
  
    100% { transform:scale(1.0); opacity:1.0; top:35px}

}

  .extra{
    display: block;
    animation: fdown 0.2s forwards;
    -webkit-animation: fdown 0.2s forwards;
    
    
  }
  .sys-acc{
    display: flex;flex-wrap: wrap;align-items: center;
    cursor: pointer;
    position: relative;
  }
.navbar {
  position: fixed;
  top: 0;
  width: 100%;
  max-height: 81px;
  background-color: #fff;
  box-shadow: 6px 4px 3px rgba($color: #000, $alpha: .1);
  z-index: 10;

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
      z-index: 11;
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
        top: 18px;
        right: 31px;
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
</style>

    