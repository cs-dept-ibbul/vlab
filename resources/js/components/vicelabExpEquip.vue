<template>
  <div>
    <div class="d-md-none d-flex  align-center pa-0 ma-0 alert alert-success pa-10 "  style="width: 105vw;height: 100%; position: fixed;top: 0;  z-index: 99990000000000;opacity: 0.9;text-align: center; text-transform: uppercase; ">
    <div class="" >
        <p style=" font-size: 1.4em; "> sorry this experiment can only be undertaken on a Personal Computer (PC)</p>
            <a to="/" class="v-btn v-btn--contained theme--light success" style="width: 220px !important; text-decoration: none;" >Back to home page</a>
    </div>
    </div>
	 <div v-if="has" class=" d-md-flex p-0" id="leftNav" style="; width: 100%; background: var(--color-t);flex-direction: column; ">
                <ul class="navBtn" style="">
                    <li v-bind:class="{navBtnActive:configBtn}" @click='navBtnFunc1'>
                        <span>Config</span>
                        <!-- <hr>  -->                       
                    </li>
                    <li v-bind:class="{navBtnActive:EquipBtn}" @click='navBtnFunc2'>
                        <span>Equipments</span>
                    <!-- <hr> -->
                    </li>
                </ul>
                 <transition name="component-fade" mode="out-in"  >                
                <div class="left-panel1 scrollbar mt-2 px-2" v-if="navSlide1 " v-bind:class='{show:navSlide1}' >
                        <h4 style="text-align: center;color: var(--color);" >Equipments</h4>
                        <center>                          
                          <span style="font-size: 0.9em;">click to select an equipment</span>                          
                        </center>
                        
                          <br>
                       <div class="m-0 p-0">                        
                                <img data-toggle="tooltip" title="Solar Cell" data-placement="top" class="picker" src="/expImages/physics/exp1/solar_cell3.jpeg" v-bind="attrs" v-on="on" @click='' id="scell" >
                         
                                <img data-toggle="tooltip" title="Voltmeter" data-placement="bottom" class="picker" src="/expImages/physics/exp1/voltmeter1.png" v-bind="attrs" v-on="on" @click='' id="voltmeter" >                                                   
                                <img data-toggle="tooltip" title="Ameter" data-placement="bottom"  class="picker" src="/expImages/physics/exp1/ameter.png" v-bind="attrs" v-on="on" @click='' id="ameter">
                          
                          <span v-bind:class="{tooltip:sunToolTip}" data-tooltip="Add Sun light by clicking">
                          </span>                                
                                <img data-toggle="tooltip" title="sun light" data-placement="bottom" class="picker" src="/expImages/physics/exp1/lightModulNav.jpg" width="100px" height="100px" v-bind="attrs" v-on="on" @click='sunToolTip= !sunToolTip' id="sun">                                                
                       </div>
                    </div>
                </transition>
                 <transition name="component-fade" mode="out-in"  >
                    <div class="left-panel" v-if="navSlide2" v-bind:class='{show:navSlide2}' style="display: none ;" >
                        <p style="text-align: center;color: var(--color); font-size: 105%;font-weight: bold" >CONFIGURATION</p>
                        <span v-if="ktype== -1">
                          
                        <input type="checkbox" id="spillAll" @click=""  name=""> <span class="config-label ml-1">arrage circuit</span><br>
                        </span>
                        <p class="my-2 green px-4 rounded" style="color: #fff; font-size: 0.9em; text-align: center;">MODE</p>
                        <input type="radio" id=""  name="mode" checked="" > <span class="config-label ml-1">Practice </span><br>                      
                        <input type="radio" id=""  name="mode"> <span class="config-label ml-1">Test </span><br>
                        <!-- experiment 4 only -->
                        <span v-if="ktype==1">      
                          <p class="my-2 green px-4 rounded" style="color: #fff; font-size: 0.9em; text-align: center;">WEATHER STATE</p>
                          <input type="radio" class="" @click="function1" name="weather" checked="" value="w"><span class="config-label ml-2">Winter</span><br>
                          <input type="radio" class="" @click="function2"  name="weather" value="s"><span class="config-label ml-2">Summer</span><br>
                          <label>Latitude: </label><input class="border" type="number" min="0" max="360" name="latitude" :value="latitude" @input="function3" @keyup="function3">
                        </span>
                        <!-- experiment 5 only -->
                        <span v-if="ktype==2">      
                          <p class="my-2 green px-4 rounded" style="color: #fff; font-size: 0.9em; text-align: center;">DATA</p>
                          <div class="row">
                            <div class="col-lg-7 my-1 py-0"><label width>lamp Strength: </label></div>
                            <div class=" col-lg-5 my-1 py-0">
                              <input class="border rounded px-3 my-0" type="number" min="0" max="360" name="exp4lampWatt" :value="lampStrenght" @input="exp4func1"></div>                                                        
                          </div>
                          
                          
                        </span>
                    </div>                    
                </transition>
   </div>
   <div v-else class=" d-md-flex" id="leftNav1" style="height: 100vh; width: 100%; background: var(--color-t); padding: 1px 5px 0px 15px;   flex-direction: column; ">
                <ul class="navBtn" style="">
                    <li v-bind:class="{navBtnActive:configBtn}" @click='navBtnFunc1'>
                        <span>Config</span>
                        <!-- <hr>  -->                       
                    </li>
                    <li v-bind:class="{navBtnActive:EquipBtn}" @click='navBtnFunc2'>
                        <span>Equipments</span>
                    <!-- <hr> -->
                    </li>
                </ul>
                 <transition name="component-fade" mode="out-in"  >                
                <div class="left-panel1 scrollbar" v-if="navSlide1" v-bind:class='{show:navSlide1}' style="display: none;margin-top: 6px; border:1px solid #ccc;box-shadow: 1px 2px 3px #ccc; overflow-y: scroll;" >
                        <h4 style="text-align: center;color: var(--color);" >Equipments</h4>
                        
                          <br>
                       <div> 
                        <v-tooltip bottom>
                          <template v-slot:activator="{ on, attrs }">
                                <img class="picker1" src="/expImages/physics/exp1/solar_cell3.jpeg" v-bind="attrs" v-on="on" @click='' id="scell" >
                          </template>
                          <span>Solar Cell</span>
                        </v-tooltip>
                        <v-tooltip bottom>
                          <template v-slot:activator="{ on, attrs }">                                
                                <img class="picker1" src="/expImages/physics/exp1/voltmeter1.png" v-bind="attrs" v-on="on" @click='' id="voltmeter" >
                          </template>
                          <span>Voltmeter</span>
                        </v-tooltip>
                        <v-tooltip bottom>
                          <template v-slot:activator="{ on, attrs }">                                
                                <img class="picker1" src="/expImages/physics/exp1/ameter.png" v-bind="attrs" v-on="on" @click='' id="ameter">
                          </template>
                          <span>Ameter</span>
                        </v-tooltip>
                         <v-tooltip bottom>

                          <template v-slot:activator="{ on, attrs }">
                          <span v-bind:class="{tooltip:sunToolTip}" data-tooltip="Add Sun light by clicking">
                          </span>                                
                                <img class="picker1" src="/expImages/physics/exp1/lightModul.jpg" v-bind="attrs" v-on="on" @click='sunToolTip= !sunToolTip' id="sun">
                          </template>
                          <span>sun light</span>
                        </v-tooltip>
                       </div>
                </div>
                </transition>
                 <transition name="component-fade" mode="out-in"  >
                    <div class="left-panel" v-if="navSlide2" v-bind:class='{show:navSlide2}' style="display: none ;" >
                        <p style="text-align: center;color: var(--color); font-size: 105%;font-weight: bold" >CONFIGURATION</p>
                        <input type="checkbox" id="spillAll" @click=""  name=""> <span class="config-label">arrage circuit</span><br>
                        
                        <input type="radio" id=""  name="mode"> <span class="config-label">Practice Mode</span><br>
                        
                        <input type="radio" id=""  name="mode"> <span class="config-label">Test Mode</span><br>
                    </div>                    
                </transition>
   </div>
 </div>
</template>
<script >
	export default {

  data () {
    return{
        
        attrs: false,
        on: false,
       sunToolTip: false,
        navSlide1: true,
        navSlide2: false,
        configBtn: false,
        EquipBtn:true      
    }
  },
  methods:{
        
        navBtnFunc1(){
            if (this.configBtn == true && this.EquipBtn == false){

            }else if(this.configBtn == false){
                this.navSlide2 = !this.navSlide2;
                this.navSlide1 = !this.navSlide1;

                this.configBtn = !this.configBtn;
                this.EquipBtn = !this.EquipBtn;

            }
        },
        navBtnFunc2(){
             if (this.configBtn == false && this.EquipBtn == true){

            }else if(this.EquipBtn == false){
                this.navSlide2 = !this.navSlide2;
                this.navSlide1 = !this.navSlide1;

                this.configBtn = !this.configBtn;
                this.EquipBtn = !this.EquipBtn;

            }
        }
  },
  props: ['has', 'ktype', 'function1','function2', 'function3', 'latitude', 'lampStrenght', 'exp4func1'],
  mounted(){
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
    });
  }
}
</script>
<style scoped>
     :root {
      --color:  rgb(38, 95, 9);
      --colorbtn: #fff;      
      --color-t: #6b3;
      --color-t1:  rgba(255, 255, 255);
      --color-primary: rgb(255, 255, 255) ;
      --color-secondary: rgb(255, 255, 255);
      --bg: rgb(0, 16, 65);
      --bg-secondary: rgb(0, 25, 165);
      --border-color: rgb(153, 214, 255);
    }
	    .v-btn{
        padding: 1px !important;
        width: 5px !important;
    }

    .navBtn{
        padding: 0px;
        margin: 0px;
        height: 40px;
        width: 100%;
        display: flex;
    }
    .navBtn li{
        cursor: pointer;
        box-shadow: 1px 2px 4px #ccc;
        list-style: none;
        display: inline-block;
        padding: 8px 0px 0px 0px;
         border: 1px solid #6b3;
        margin: 0px;
        color:#6b3;
        background: #fff;
        text-align: center;
        width: 50%;
        margin: 2px;

        height: 40px;
    }
    .navBtn li span{
        font-size: 0.8em;
        font-family: arial;
        font-weight: bold;
        text-transform: capitalize;
    }
    .navBtn li hr{
        margin: 8px 0px;
        padding: 0px;
        width: 100%;
        border:1px solid var(--color);
        box-shadow: 0px 3px 5px #000;   
    }
    .navBtnActive{
        background:  #6b3 !important;        
        /*box-shadow: 0px 2px 10px inset var(--color-t) !important;*/
        color: #fff !important;
       
        -webkit-transition : background 500ms linear;
        -moz-transition : background 500ms ease-out;
          -o-transition : background 500ms ease-out;
          transition : background 1000ms ease;
    }
    .navBtn li:hover hr{

        border:1px solid #555;
        -webkit-transition : border 500ms linear;
          -moz-transition : border 500ms ease-out;
          -o-transition : border 500ms ease-out;
          transition : border 500ms ease-out;
    }
    .component-fade-enter-active, .component-fade-leave-active {
  transition: 1s ease;
}
.component-fade-enter, .component-fade-leave-to
{
  transform: translateX(-250px);
}
	 .picker{
        width: 80px;
        height: 80px;
        
        margin: 5px;
        float: left;
        border-radius: 3px;        
        cursor: pointer;
        }
    .picker:hover{
        box-shadow: 1px 2px 2px #ccc;
    }
    .picker1{
        width: 140px;
        height: 140px;
        padding: 5px;
        border-radius: 3px;
        border: 1px solid #ccc;
        cursor: pointer;
        }
    .picker1:hover{
        box-shadow: 1px 2px 2px #ccc;
    }
.show{
    display: block !important;
}
    .left-panel1{  
        color: var(--color) !important;
        padding: 20px 0px;
        margin: 0px auto;
        background: var(--color-t);
        width:100%;
        height: 100%;
         

    }
    .left-panel{ 
        /*box-shadow: 1px 2px 8px #ccc; */
        border: 1px solid #ccc; 
           box-shadow: 1px 2px 3px #ccc;
       /* border-radius: 0px 8px 8px 0px; */
        height: 85%; 
        color: var(--color) !important;
        padding: 20px;
        position: absolute;
        z-index: 100;                     
        left:5px;
        top: 48px;
        width:95%;
        background: var(--color-t);
    }
    
    .v-btn{
        padding: 1px !important;
        width: 5px !important;
    }
    .smLong:hover{
      transform: translateX(-70px);
    }
    .smLong{      
        position: relative;
        z-index: 104;
        background: rgba(60,150,40,.4) !important;
        color: black !important;
    }

   
    .component-fade-enter-active, .component-fade-leave-active {
  transition: 1s ease;
}
.component-fade-enter, .component-fade-leave-to
{
  transform: translateX(-50px);
}
.show{
    display: block !important;
}
  
    .paneli{
        top:13px;       
        height: 96vh;
        position: fixed;
        z-index: 10;
        padding: 6px;        
    }

    .right-panel{
        display: none;
        right: 120px;         
        width: 400px;
        overflow-y:hidden;
        animation-name: rightP;
        animation-duration: 1.5s;
        animation-delay: 0s;
        animation-iteration-count: 1;
        animation-timing-function: ease;   
    }
    .right-panel1{
        display: none;
        right: 120px;         
        width: 250px;
        overflow-y:hidden;
        animation-name: rightP;
        animation-duration: 1.5s;
        animation-delay: 0s;
        animation-iteration-count: 1;
        animation-timing-function: ease;   
    }
    .paneliWidth{
        display: block;
        right: 120px;
        /*transition: width 0.9s linear 0s;*/
        animation-name: rightPi ;
         animation-duration: 1s;
    }
    @keyframes rightPi{
        0%{
            right: -100px;
            
        }
        100%{
            right: 120px ;
        }
    }
    .paneliWidth1{
        display: block;
        right: 50px;
        position: fixed;
        z-index: 102;
        box-shadow: 1px 3px 3px #ccc !important;
        border-radius: 15px !important;
        /*transition: width 0.9s linear 0s;*/
        animation-name: rightPii;
         animation-duration: 1s;
    }
   @media screen and (max-width: 959px){
        .styledBtn{
            position: relative !important;
            right: 23% !important;
        }
    }
    @keyframes rightPii{
        0%{
            right: -100px;
            
        }
        100%{
            right: 50px ;
        }
    }
   
    ol li{
        text-align:justify;
        font-size: 0.9em;
    }
    @keyframes leftP{
        0%{
            left: -380px;
            
        }
        100%{
            left: -100px;
        }
    }
    @keyframes rightP{
        0%{
            right: -100px;
            
        }
        100%{
            right: -100px;
        }
    }

    .styledBtn{
        padding:12px;
        border-radius: 5px;
        width:100%;
        text-align: center;
        cursor: pointer;
        margin:6px;
        color: var(--color-t);
        background: var(--colorbtn) ;
        box-sizing: border-box;
        box-shadow: 1px 2px 3px #ccc;
        outline: none;
    }
    .styledBtn:hover{
        background: white;
        color:#a93;
        box-shadow:inset 0 0 10px var(--color) !important;
    }
    .styledBtn:focus{
        background: white;
        color:#a93;
        box-shadow:inset 0 0 10px var(--color-t) !important;   
    }

    .hideC{
        display: none !important;
    }
    .cbtn button{        
        text-transform: capitalize;
        margin:5px;
        letter-spacing: 0.6px;
        font-size: 0.8em;
        padding: 4px;
        text-decoration: none;
        border-radius: 4px;
        width: 90px !important;
        background: rgba(150,150,150,.02);
        color:#ba6;
        box-shadow: 1px 2px 2px #eee;
        text-align: center;
    }
    .cbtn button:hover{
        background: orange !important;
        color:white;
    }
    .config-label{
        font-size: 0.8em;
        color:var(--color);
    }
    input[type=checkbox]{
        cursor: pointer;
    }
    .vr{
        top: 90px !important;
         left:330px !important;
        /*transition: width 0.9s linear 0s;*/
        animation-name: vresi !important;
        animation-duration: 2s;
         animation-iteration-count: 1;
         animation-delay: 0s;
        animation-timing-function: ease;   
    }
     @keyframes vresi{
        0%{
            top: 0px !important;            
        }
      
        100%{
            to:90px !important;
        }
    }
   
    .rightnav{
      box-shadow: 1px 2px 8px #ccc; 
        border-radius: 8px 0px 0px 8px;         
        padding: 16px;
        background: var(--color-t);
        width: 250px;
        height: 100%;
      font-size: 0.85em;
      text-align: justify !important;
    }
    .rightnav ol{
      padding: 8px 8px;
    }
    .tooltip {
  position: relative;
  color: #fff;
  padding: 0px 12px;
    text-align: center;
  height: 80px;
  margin: 5px;
  font-size: 15px;
  border-radius: 100%;
}

.tooltip:before,
.tooltip:after {
  position: absolute;
  content: '';
  opacity: 0;
  transition: all 0.4s ease;
}

.tooltip:before {
  border-width: 10px 8px 0 8px;
  border-style: solid;
  border-color: #c32 transparent transparent transparent;
  top: 20px;
  z-index: 3;

}

.tooltip:after {
  box-shadow: 1px 2px 8px #ccc;
  content: attr(data-tooltip);
  background: rgba(50,50,50,.7);
  width: 160px;
  height: 55px;
  font-size: 13px;
  font-weight: 300;
  top: -35px;
  left: -10px;
  z-index: 2;
  padding: 4px;
  border-radius: 5px;
  letter-spacing: 1px;
  transition: background 2s;
  transform: translateY(20px);  
}

.tooltip::before,
.tooltip::after {
  opacity: 1;
  transform: translateY(-2px);
}
</style>