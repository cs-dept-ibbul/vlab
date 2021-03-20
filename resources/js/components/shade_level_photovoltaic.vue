 <template>
  <div data-demo-id="draggableConnectors">

        <div class="main row">
            <!-- demo -->
            
            <div class="noticeboard" v-if='guidings'>
                <p><span class='noteb'></span> <i>Invalid/Required Connection</i></p>
            </div>
           
           
          <div class="w-100">
           
            
            <!-- Start sheet header -->
        <!--   <no-ssr> -->
        <!--     <div class="d-flex align-center" style="padding: 9px;   box-shadow: 0px 2px 10px  #ccc;  background: var(--color-t);color:var(--color);" >
              <span><span color="var(--color)">mdi-chevron-left</span></span>
              <a href="/experiment/" style="color:var(--color); font-size: 1em;">Experiments</a>              
           
                <button id="resetall" class="mx-2 bg-dark text-white" style="font-size: 0.75em;" >Clear</button><a href="" style="text-decoration: none;" >
                <button color="red" class="mr-2" style="color: #fff;font-size: 0.75em;" >Reset</button></a>
                <button class="read">Run</button>   
              <v-spacer></v-spacer>
            <saveTab :dataTosave1 ='resulInHtmlF' :exp_num = '$route.params.id' type='photovolatic' ></saveTab>    
              <v-spacer></v-spacer>
                <h3 style="text-transform: capitalize;font-weight: normal; font-size: 1em;">{{$route.params.id}}.{{expType}} </h3>
            </div> -->
     <!--      </no-ssr> -->
            <!-- end sheet header -->

             <img class="img-pos" src="/expImages/physics/exp1/1-0.png" width="200px">
            <div class="mainJ drag-drop scrollbar w-100"  id="mainSheet" >
                <div v-for="id in solarCell_id" v-bind:key="id.id" class="equipments drags  dp-none pointer-auto" :id="'solar_cell'+id.id" @mouseover="removeClass" >
                 
                    <span>                       
                        <img class="ek pointer-auto" src="/expImages/physics/exp1/solar_cell3.jpeg" width="100px" height="200px" >
                        <div style="" class="shadowCover"></div>
                    </span>
                  <div class="cbtn">
                    <button class="detach pointer-auto" :rel="'solar_cell'+id.id" style="">detach</button>                    
                     <button class="shadowRange pointer-auto" rel="zero" id="zero"><var>0</var></button>                    
                    <button class="shadowRange pointer-auto" rel="quater" id="quater" ><var>1/4</var></button>                    
                    <button class="shadowRange pointer-auto" rel="half" id="hlaf" ><var>1/2</var></button>                    
                    <button class="shadowRange pointer-auto" rel="threeQuater" id="quater" ><var>3/4</var></button>                    
                    <button class="shadowRange pointer-auto" rel="fullOne" id="quater" ><var>1</var></button>
                    <button class="deleteCell dp-none pointer-auto" :rel="'solar_cell'+id.id" @click='solar_num1--'  ><span style="color: #ba6;" class="fa fa-remove"></span></button>                    
                  </div>
                </div>
                    <div class="equipments drags dp-none" id="ameterRead" @mouseover="removeClass" >
                    <span>
                        <canvas id="ameter-gauage">
                        <center><h2>{{ ampValue }}A</h2></center>
                            <img class="ek" src="/expImages/physics/exp1/ameter.png" width="110px">
                        </canvas>
                      Ameter
                    </span>
                  <div class="cbtn">
                    <button class="detach" rel='ameterRead'>detach</button>        
                      <button class="read" rel='voltmeterRead'>Read</button>            
                  </div>
                </div>
                <div class="equipments drags dp-none" id="voltmeterRead" @mouseover="removeClass">
                    <span>
                     <!--   -->
                     <canvas id="another-gauge">
                        <center><h2>{{ voltValue }}V</h2></center>
                         <img class="ek" src="/expImages/physics/exp1/voltmeter1.png" width="120px">
                     </canvas>
                      Voltmeter
                    </span>
                  <div class="cbtn">
                    <button class="detach" rel='voltmeterRead'>detach</button>
                    <button class="read" rel='voltmeterRead'>Read</button>

                    
                  </div>
                </div>
                  <!-- sunligh  --> 

                  <div class="picker equipments drags dp-none pointer-auto forsunligt" id="sunLight" >
                    
                  <img   src="/expImages/physics/exp1/lightModul.jpg" v-bind="attrs" v-on="on" @click='' width="100%" >
                     <div class="cbtn">
                    <button class="deleteCell sunlightDelBtn" rel="sunLight" style="" ><span style="color: #ba6;" class="fa fa-remove"></span></button>                    
                  </div>              
                  </div>
               </div>          
          
         </div>
           <div id="list" ></div>
        </div>         
        
        </div>    
</template>

<script>


var ArrConn;
var experimenttwo, resulInHtml, iterationType;
export default {
  components:{
 
  },

computed: {

      experimenttwo() {       
        return  this.$store.state.exp2;
      }
  
    },


  data () {
    return{
      menuName1: "mdi-chevron-right",
      menuState1: false,
      menuName2: "mdi-chevron-left",
      menuState2: false,
      navdType:'none',
      experimenttwoResult:{
                  v: {zero:'-', onequater:'-', half:'-', threequater:'-', fullone:'-'},         
                  c: {zero:'-', onequater:'-', half:'-', threequater:'-', fullone:'-'},         
                  p: {zero:'-', onequater:'-', half:'-', threequater:'-', fullone:'-'}         
                },    
        iterationType:0,
        resulInHtml : '',
        resulInHtmlF: '',
        sunToolTip: false,
        attrs: false,
        on: false,
        expNum: 0,
        expType: 0,
        solar_num: 0,
        solar_num1: 0,
        amp_num: 0,
        sun_light: 0,
        volt_num: 0,
        navSlide1: true,
        navSlide2: false,
        configBtn: false,
        EquipBtn:true,
        naviconRight: 'mdi-reorder-horizontal',
        navClickRightState: false,
        guidings:false,
        solarCell_id: [
        {id:1,  volt:0},
        {id:2,  volt:0},
        {id:3,  volt:0},
        {id:4,  volt:0},
        {id:5,  volt:0},
        {id:6,  volt:0},
        {id:7,  volt:0},
        {id:8,  volt:0},
        {id:9,  volt:0},
        {id:10,  volt:0},
        {id:11,  volt:0},
        {id:12,  volt:0},
        {id:13,  volt:0},
        {id:14,  volt:0},
        {id:15,  volt:0},
        {id:16, volt:0}
        ],
        voltValue:0,
        ampValue:0
    }
  },
  methods:{
      menuClick1(){
      this.menuState1 = !this.menuState1;
      if(this.menuState1 == true){
        this.menuName1 = "mdi-chevron-left";
      }else{
        this.menuName1 = "mdi-chevron-right";
      }
    },
      menuClick2(){
      this.menuState2 = !this.menuState2;
      if(this.menuState2 == true){
        this.menuName2 = "mdi-chevron-right";
      }else{
        this.menuName2 = "mdi-chevron-left";
      }
    },
    onClickOutside () {
        this.sunToolTip = false;
      },
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
        },
        clickOutside(){
            this.navClickRightState = false;
            document.getElementsByClassName('right-panel')[0].classList.remove('paneliWidth');
            
            //d3.selectAll('.hideC').style('display','none');
            },
        switchStatefunc(){
            this.switchState = !this.switchState;            
            if(this.switchState){
                 this.switchStatebtn = 'open switch';
                this.switchSrc ="/expImages/physics/exp1/close_switch.png";               
            }else{
                this.switchStatebtn = 'close switch';
                this.switchSrc ="/expImages/physics/exp1/switch.png";
            }
        },
        addCellfunc(){
            this.cellCount++;
            if(this.cellCount >this.maxCell){
                alert('maximum cell is '+ this.maxCell);
                this.cellCount--;
            }
            else{                
                this.bcellvalue += 1.5;
                this.cellToAdd += singleCell
            }
        },
        removeCellfunc(){
            this.cellCount--;
            if(this.cellCount == 0){
                alert('minimum cell is 1')
                this.cellCount = 1;
            }else{
                this.bcellvalue -= 1.5;
                for (var i = 1; i <= this.cellCount; i++) {
                    if (i==1){
                        this.cellToAdd = singleCell;
                    }
                    else{
                        this.cellToAdd += singleCell;                        
                    }
                 }
            }
        },
        //remove class from equipment on hover 
        removeClass(e){
            let x = e.currentTarget;
               // console.log(x.className);
            if (x.className.indexOf("needConnection")>0) {
                document.getElementById(x.id).classList.remove('needConnection');
            }
        }
       



  },
  created(){    
    let subExp = [3,'photovolatic'];
      this.expNum = Number(subExp[0]);
      this.expType = Number(subExp[1])
  },
  mounted(){

    let $vm = this;
     this.$nextTick(function(){

        function resultTable(){
        
        for(let ai in $vm.experimenttwoResult){
          
          if (ai == 'v' ) {
          
            $vm.resulInHtml =" <h6>MEASURED VALUES</h6><table class='table table-bordered' style=''><thead><th></th><th style='word-wrap:wrap;'>0(not covered)</th><th>1/4</th><th>1/2</th><th>3/4</th><th>1</th></thead><tbody>";
            $vm.resulInHtml +="<tr><th>V<sub>oc</sub></th>";
            $vm.resulInHtml +="<td id='vsigna' class='Bsign'>"+$vm.experimenttwoResult[ai].zero+"</td>";
            $vm.resulInHtml +="<td id='vsignb' class='Bsign'>"+$vm.experimenttwoResult[ai].onequater+"</td>";
            $vm.resulInHtml +="<td id='vsignc' class='Bsign'>"+$vm.experimenttwoResult[ai].half+"</td>";
            $vm.resulInHtml +="<td id='vsignd' class='Bsign'>"+$vm.experimenttwoResult[ai].threequater+"</td>";
            $vm.resulInHtml +="<td id='vsigne' class='Bsign'>"+$vm.experimenttwoResult[ai].fullone+"</td>";            
          }else if(ai=='c'){
              $vm.resulInHtml +="<tr><th>I<sub>sc</sub></th>";
            $vm.resulInHtml +="<td id='csigna' class='Bsign'>"+$vm.experimenttwoResult[ai].zero+"</td>";
            $vm.resulInHtml +="<td id='csignb' class='Bsign'>"+$vm.experimenttwoResult[ai].onequater+"</td>";
            $vm.resulInHtml +="<td id='csignc' class='Bsign'>"+$vm.experimenttwoResult[ai].half+"</td>";
            $vm.resulInHtml +="<td id='csignd' class='Bsign'>"+$vm.experimenttwoResult[ai].threequater+"</td>";
            $vm.resulInHtml +="<td id='csigne' class='Bsign'>"+$vm.experimenttwoResult[ai].fullone+"</td>"; 
          } else if(ai=='p'){
            let p1='-',p2='-',p3='-',p4='-',p5 = '-';
            if ($vm.experimenttwoResult['v'].zero != '-' && $vm.experimenttwoResult['c'].zero != '-') {
                p1 = $vm.experimenttwoResult['v'].zero * $vm.experimenttwoResult['c'].zero;
            }
            if ($vm.experimenttwoResult['v'].onequater != '-' && $vm.experimenttwoResult['c'].onequater != '-') {
              p2 = $vm.experimenttwoResult['v'].onequater * $vm.experimenttwoResult['c'].onequater ;
            }
            if ($vm.experimenttwoResult['v'].half != '-' && $vm.experimenttwoResult['c'].half != '-') {
              p3 = $vm.experimenttwoResult['v'].half * $vm.experimenttwoResult['c'].half ;
            }
            if ($vm.experimenttwoResult['v'].threequater != '-' && $vm.experimenttwoResult['c'].threequater != '-') {
              p4 = $vm.experimenttwoResult['v'].threequater * $vm.experimenttwoResult['c'].threequater ;
            }
            if ($vm.experimenttwoResult['v'].fullone != '-' && $vm.experimenttwoResult['c'].fullone != '-') {
              p5 = $vm.experimenttwoResult['v'].fullone * $vm.experimenttwoResult['c'].fullone ;
            }
            
            
              $vm.resulInHtml +="<tr><th>P<code>I*V</code></th>";
            $vm.resulInHtml +="<td>"+p1+"</td>";
            $vm.resulInHtml +="<td>"+p2+"</td>";
            $vm.resulInHtml +="<td>"+p3+"</td>";
            $vm.resulInHtml +="<td>"+p4+"</td>";
            $vm.resulInHtml +="<td>"+p5+"</td>"; 
          }         
        }
     
      return $vm.resulInHtml;
      }
      

      function checkConnectionfunc(storedA, connA, guide=false ){
            let count = 0;
            let sobj = [];
           // let storedA2 = JSON.parse(JSON.stringify(storedA));
            for (var i = 0; i < storedA.length; i++) {
                for (var j = 0; j < connA.length; j++) {                    
                      if(storedA[i].source == connA[j].source && storedA[i].target == connA[j].target || storedA[i].source == connA[j].target && storedA[i].target == connA[j].source){
                            count++;
                            j = connA.length;
                            //remove from original correct connection
                            sobj.push(i);
                           // storedA2.splice(i, 1);
                        }
                    
                }
            }
            
            if(count == storedA.length){
                return true;
            }else{
              // console.log(storedA2);
             
                if (guide == true) {                        
                    for (var i = 0; i < storedA.length; i++) {
                            if (JSON.stringify(sobj).includes(i)) {}else{                        
                              document.getElementById(storedA[i].sid).classList.add('needConnection');
                              document.getElementById(storedA[i].tid).classList.add('needConnection');
                        }
                    }
                }
                return false;
            }
                    
        }

        function solveExpression(Array1, count, guid= false){
            let m, seriesCount = 0, parallelCount= 0;
            let confirm, result = [], keeperR, tracker=0, trackerC=-1, keeperC = ['voltmeterRead', 'ameterRead'], readerIsConnected=0;
            for(m in Array1){
              // check if any of the reader is connected
              if(keeperC.includes(Array1[m].sid) || keeperC.includes(Array1[m].tid)){
                  readerIsConnected = 1;
              }else{
                //check connection type
                 if (Array1[m].source != Array1[m].target ){
                    seriesCount++;
                }else{
                    parallelCount++;
                }   
              }
                if (tracker==0){
                   
                  if (Array1[m].sid == 'voltmeterRead' || Array1[m].sid == 'ameterRead' ||  Array1[m].tid == 'voltmeterRead' || Array1[m].tid == 'ameterRead' ){
                    if ( Array1[m].sid == 'voltmeterRead' || Array1[m].tid == 'voltmeterRead') {
                      if (Array1[m].sid == 'voltmeterRead') {
                        keeperR = Array1[m].sid;
                        tracker = 1; //to track the first source or target
                      }else{
                        keeperR = Array1[m].tid;
                        tracker = 1; //to track the first source or target
                      }                      
                    }else{
                      if (Array1[m].sid == 'ameterRead') {
                        keeperR = Array1[m].sid;
                        tracker = 1; //to track the first source or target
                      }else{
                        keeperR = Array1[m].tid;
                        tracker = 1; //to track the first source or target
                      }                      
                    }
                  }                  
                }else{
                  //alert(keeperR +'+'+Array1[m].sid+'+'+Array1[m].tid)
                  if(keeperC.includes(Array1[m].sid) || keeperC.includes(Array1[m].tid)){
                    if (Array1[m].sid == keeperR || Array1[m].tid == keeperR) {   
                      trackerC = 1;                                       
                    }else{
                      trackerC = 0;
                      break;                      
                    }

                  }
                }
            }
            if (readerIsConnected == 1) {
             
              if (trackerC == 1) {
                let readerT, rType;
                if (keeperR == 'ameterRead') {
                  readerT = 'c';
                  rType = 'current';
                }else{
                  rType = 'voltage';
                  readerT = 'v';                
                }
                

                if(count==0){
                  confirm = checkConnectionfunc($vm.experimenttwo['arr1'+readerT+1], Array1, guid ) ;
                  if(confirm){
                    if ($vm.sun_light == 1) {                  
                      result.push(rType, $vm.experimenttwo['arr1'+readerT]);
                     
                      if (rType=='voltage') {
                        $vm.experimenttwoResult['v'].zero = $vm.experimenttwo['arr1'+readerT]                        
                      }else{                     
                        $vm.experimenttwoResult['c'].zero = $vm.experimenttwo['arr1'+readerT]
                      }
                      return result;                
                    }else{
                      return 0;//no sun light 
                    }
                  }else{ result = null; return result;/* connection not valid */}
                }
                //quarter covered solar sell
                else if(count == 'quater'){
                   confirm = checkConnectionfunc($vm.experimenttwo['arr2'+readerT+1], Array1, guid ) ;
                  if(confirm){
                    if ($vm.sun_light == 1) {                  
                      result.push(rType, $vm.experimenttwo['arr2'+readerT]);
                     
                      if (rType=='voltage') {
                        $vm.experimenttwoResult['v'].onequater = $vm.experimenttwo['arr2'+readerT]                        
                      }else{                     
                        $vm.experimenttwoResult['c'].onequater = $vm.experimenttwo['arr2'+readerT]
                      }
                      return result;                
                    }else{
                      return 0;//no sun light 
                    }
                  }else{ result = null; return result;/* connection not valid */}
                 
                }
                //half covered solar cell
                else if(count == 'half'){
                   confirm = checkConnectionfunc($vm.experimenttwo['arr3'+readerT+1], Array1, guid ) ;
                  if(confirm){
                    if ($vm.sun_light == 1) {                  
                      result.push(rType, $vm.experimenttwo['arr3'+readerT]);
                     
                      if (rType=='voltage') {
                        $vm.experimenttwoResult['v'].half = $vm.experimenttwo['arr3'+readerT]                        
                      }else{                     
                        $vm.experimenttwoResult['c'].half = $vm.experimenttwo['arr3'+readerT]
                      }
                      return result;                
                    }else{
                      return 0;//no sun light 
                    }
                  }else{ result = null; return result;/* connection not valid */}
                
                }
                //three quarter covered solar cell
                else if(count == 'threeQuater'){
                   confirm = checkConnectionfunc($vm.experimenttwo['arr4'+readerT+1], Array1, guid ) ;
                  if(confirm){
                    if ($vm.sun_light == 1) {                  
                      result.push(rType, $vm.experimenttwo['arr4'+readerT]);
                     
                      if (rType=='voltage') {
                        $vm.experimenttwoResult['v'].threequater = $vm.experimenttwo['arr4'+readerT]                        
                      }else{                     
                        $vm.experimenttwoResult['c'].threequater = $vm.experimenttwo['arr4'+readerT]
                      }
                      return result;                
                    }else{
                      return 0;//no sun light 
                    }
                  }else{ result = null; return result;/* connection not valid */}
               
                }
                //fullone covered solar cell
                else if(count == 'fullOne'){
                   confirm = checkConnectionfunc($vm.experimenttwo['arr5'+readerT+1], Array1, guid ) ;
                  if(confirm){
                    if ($vm.sun_light == 1) {                  
                      result.push(rType, $vm.experimenttwo['arr5'+readerT]);
                      
                      if (rType=='voltage') {
                        $vm.experimenttwoResult['v'].one = $vm.experimenttwo['arr5'+readerT]                        
                      }else{                     
                        $vm.experimenttwoResult['c'].one = $vm.experimenttwo['arr5'+readerT]
                      }
                      return result;                
                    }else{
                      return 0;//no sun light 
                    }
                  }else{ result = null; return result;/* connection not valid */}
               
                }
              }else{
                document.getElementById('ameterRead').classList.add('needConnection');
                document.getElementById('voltmeterRead').classList.add('needConnection');
                return -1; //multi reading not allowed
              }
            }else{
              return -2; // no reader connected
            }

        }
     function DrawVolt(){
        new RadialGauge({
            renderTo: 'another-gauge',
            width: 150,
            height: 150,
            units: 'Volts',
            title: false,
            value: 0,
            minValue: 0,
            maxValue: 35,
            majorTicks: [
                '0','5','10','15','20','25','30','35'
            ],
            highlights: [
                {
                    "from": 0,
                    "to": 35,
                    "color": "#A8D3D5"
                }
            ],
            
            }).draw();
     }
     function DrawAmpere(){
         new RadialGauge({
            renderTo: 'ameter-gauage',
            width: 150,
            height: 150,
            units: 'A',
            title: false,
            value: 0,
            minValue: 0,
            maxValue: 20,
            majorTicks: [
                '0','5','10','15','20'
            ],
            highlightsWidth: 25,
            colorNeedle: "#3CA7DB",
            needleType: "arrow",
            colorPlate: "#fff",
            colorUnits: "#3CA7DB",
            colorNumbers: "#3CA7DB",
            highlights: [
                {
                    "from": 0,
                    "to": 20,
                    "color": "#A8D3D5"
                }
            ],
             borderShadowWidth: 0,
            borders: false,
            animateOnInit: true,
            animatedValue: true
            }).draw();
     }
     function DrawGauge(type1='', type2='', volt, ame ){
        if (type1 != '') {
           new RadialGauge({
            renderTo: 'another-gauge',
            width: 150,
            height: 150,
            units: 'Volts',
            title: false,
            value: volt,
            minValue: 0,
            maxValue: 35,
            majorTicks: [
                '0','5','10','15','20','25','30','35'
            ],
            highlights: [
                {
                    "from": 0,
                    "to": 35,
                    "color": "#A8D3D5"
                }
            ],
            
            }).draw();
        }else{
            console.log('empty volt data parameters 312');
        }

        if (type2 != '') {
           new RadialGauge({
            renderTo: 'ameter-gauage',
            width: 150,
            height: 150,
            units: 'A',
            title: false,
            value: ame,
            minValue: 0,
            maxValue: 20,
            majorTicks: [
                '0','5','10','15','20'
            ],
            highlightsWidth: 25,
            colorNeedle: "#3CA7DB",
            needleType: "arrow",
            colorPlate: "#fff",
            colorUnits: "#3CA7DB",
            colorNumbers: "#3CA7DB",
            highlights: [
                {
                    "from": 0,
                    "to": 20,
                    "color": "#A8D3D5"
                }
            ],
             borderShadowWidth: 0,
            borders: false/*,
            animateOnInit: true,
            animatedValue: true*/
            }).draw();
        }else{
            console.log('empty ameter data parameters');
        }


     }  
       DrawAmpere($vm.v);
       DrawVolt();
             (function () {

            var listDiv = document.getElementById("list"),

                showConnectionInfo = function (s) {
                    listDiv.innerHTML = s;
                    listDiv.style.display = "block";
                    listDiv.style.position = "fixed";
                    listDiv.style.zIndex = "10";
                    listDiv.style.top = "30px";
                    listDiv.style.left = "64%";
                    listDiv.style.width = "350px";
                    
                },
                hideConnectionInfo = function () {
                    listDiv.style.display = "none";
                },
                connections = [],
                updateConnections = function (conn, remove) {
                    if (!remove) connections.push(conn);
                    else {
                        var idx = -1;
                        for (var i = 0; i < connections.length; i++) {
                            if (connections[i] == conn) {
                                idx = i;
                                break;
                            }
                        }
                        if (idx != -1){
                          connections.splice(idx, 1)
                          //ArrConn.splice()
                        };
                    }
                    if (connections.length > 0) {
                        var s = "<span id='connNav1' style='font-size:2em; color:#d53; float:right;cursor:pointer' onclick='$(document).ready(function(){$(\"#connTable\").fadeOut(50); $(\"#connNav1\").fadeOut(50); $(\"#connNav2\").show(80);})' >-</span><span style='font-size:2em; color:#d53; float:right;cursor:pointer;display:none;' id='connNav2' onclick='$(document).ready(function(){$(\"#connTable\").fadeIn(50); $(\"#connNav1\").fadeIn(80); $(\"#connNav2\").fadeOut(50);})' >+</span><span style='clear:right;'><strong>Connections</strong></span><br/><br/><table id='connTable'><tr><th>Scope</th><th>Source</th><th>Target</th></tr>";
                        ArrConn = [];
                        let tid, sid;
                        for (var j = 0; j < connections.length; j++){
                         // console.log(connections);
                            tid = connections[j].targetId;
                            sid = connections[j].sourceId;                                                      
                            ArrConn.push({'source':connections[j].sourceId[0]+'_'+connections[j].endpoints[0].type, 'target':connections[j].targetId[0]+'_'+connections[j].endpoints[1].type, 'tid': tid, 'sid': sid});
                           // console.log(connections[j].endpoints[0].type);
                            s = s + "<tr><td>" + connections[j].scope + "</td>" + "<td>" + connections[j].sourceId + "</td><td>" + connections[j].targetId + "</td></tr>";
                        }
                        console.log(ArrConn)
                      
/////////////////////////evaluation if connnection //////////////////////////////                      
                      /* var connState = checkConnectionfunc(use_StoreArrConn,ArrConn, guidings);
                       //console.log($vm.switchState);
                        if (connState) {
                            //check if key is close
                            if ($vm.switchState){
                                let TOTAL_R =  (1/$vm.resistor) + (1/$vm.vResistor);
                                 $vm.ampValue = $vm.bcellvalue/TOTAL_R;
                                 intactCon = true;
                                DrawGauge( $vm.voltValue, $vm.ampValue);

                                 //animateGauges();
                            }else{
                                if(guidings){
                                    alert('Switch is open');
                                }
                            }
                        }*/
/////////////////////////End evaluation if connnection //////////////////////////////
                        //console.log(ArrConn);
                        showConnectionInfo(s);
                    } else
                        hideConnectionInfo();
                };

            jsPlumb.ready(function () {

                var instance = jsPlumb.getInstance({
                    DragOptions: { cursor: 'pointer', zIndex: 2000 },
                    PaintStyle: { stroke: '#a66' },
                    EndpointHoverStyle: { fill: "orange" },
                    HoverPaintStyle: { stroke: "orange" },
                    EndpointStyle: { width: 20, height: 16, stroke: '#666' },
                    Endpoint: "Rectangle",
                    Anchors: ["bottomLeft", "bottomRight"],
                    Container: "canvas"
                });
               
                // suspend drawing and initialise.
                instance.batch(function () {

                    // bind to connection/connectionDetached events, and update the list of connections on screen.
                    instance.bind("connection", function (info, originalEvent) {
                        updateConnections(info.connection);
                    });
                    instance.bind("connectionDetached", function (info, originalEvent) {
                        updateConnections(info.connection, true);
                    });

                    instance.bind("connectionMoved", function (info, originalEvent) {
                        //  only remove here, because a 'connection' event is also fired.
                        // in a future release of jsplumb this extra connection event will not
                        // be fired.
                        updateConnections(info.connection, true);
                    });

                    instance.bind("dblclick", function (info, originalEvent) {
                        
                        updateConnections(info.connection, true)
                    });

                    // configure some drop options for use by all endpoints.
                    var exampleDropOptions = {
                        tolerance: "touch",
                        hoverClass: "dropHover",
                        activeClass: "dragActive"
                    };

                    //
                    // first example endpoint.  it's a 25x21 rectangle (the size is provided in the 'style' arg to the Endpoint),
                    // and it's both a source and target.  the 'scope' of this Endpoint is 'exampleConnection', meaning any connection
                    // starting from this Endpoint is of type 'exampleConnection' and can only be dropped on an Endpoint target
                    // that declares 'exampleEndpoint' as its drop scope, and also that
                    // only 'exampleConnection' types can be dropped here.
                    //
                    // the connection style for this endpoint is a Bezier curve (we didn't provide one, so we use the default), with a strokeWidth of
                    // 5 pixels, and a gradient.
                    //
                    // there is a 'beforeDrop' interceptor on this endpoint which is used to allow the user to decide whether
                    // or not to allow a particular connection to be established.
                    //
                    var exampleColor = "#00f";
                    var exampleEndpoint = {
                        endpoint: "Rectangle",
                        paintStyle: { width: 45, height: 41, fill: exampleColor },
                        isSource: true,
                        reattach: true,
                        scope: "blue",
                        connectorStyle: {
                            gradient: {stops: [
                                [0, exampleColor],
                                [0.5, "#09098e"],
                                [1, exampleColor]
                            ]},
                            strokeWidth: 5,
                            stroke: exampleColor,
                            dashstyle: "2 2"
                        },
                        isTarget: true,
                        beforeDrop: function (params) {
                            return confirm("Connect " + params.sourceId + " to " + params.targetId + "?");
                        },
                        dropOptions: exampleDropOptions
                    };

                    //
                    // the second example uses a Dot of radius 15 as the endpoint marker, is both a source and target,
                    // and has scope 'exampleConnection2'.
                    //
                    var color2 = "red";
                    var exampleEndpoint2 = {
                        endpoint: "Rectangle",
                        paintStyle: { width: 25, height: 25, fill: color2},
                        isSource: true,
                        scope: "connect",
                        connectorStyle: { stroke: color2, strokeWidth: 2 },
                        connector: ["Bezier", { curviness: 63 } ],
                        maxConnections: 3,
                        isTarget: true,
                        uuid:'positive',
                        overlays: [                         
                                ['Label', {label:'+', location: 50, id: '+ive'}]
                                ],
                        labelStyle:{color:'var(--color)'},
                         beforeDrop: function (params) {
                            //console.log(params);
                            return true ;//confirm("Connect " + params.sourceId + " to " + params.targetId + "?");
                        },
                        dropOptions: exampleDropOptions
                    };
                    var color21 = "blue";
                    var exampleEndpoint21 = {
                        endpoint: ["Dot", { radius: 15 }],
                        paintStyle: { fill: color21 },
                        isSource: true,
                        scope: "connect",
                        connectorStyle: { stroke: color21, strokeWidth: 2 },
                        connector: ["Bezier", { curviness: 63 } ],
                        maxConnections: 3,
                        isTarget: true,
                        uuid:'negative',
                        overlays: [                         
                                ['Label', {label:'-', location: 50, id: '-ive'}]
                                ],
                         beforeDrop: function (params) {
                            //console.log(params);
                            return true ; //return confirm("Connect " + params.sourceId + " to " + params.targetId + "?");
                        },
                        dropOptions: exampleDropOptions
                    };

                    //
                    // the third example uses a Dot of radius 17 as the endpoint marker, is both a source and target, and has scope
                    // 'exampleConnection3'.  it uses a Straight connector, and the Anchor is created here (bottom left corner) and never
                    // overriden, so it appears in the same place on every element.
                    //
                    // this example also demonstrates the beforeDetach interceptor, which allows you to intercept
                    // a connection detach and decide whether or not you wish to allow it to proceed.
                    //
                    var example3Color = "rgba(229,219,61,0.5)";
                    var exampleEndpoint3 = {
                        endpoint: ["Dot", {radius: 6} ],
                        anchor: "BottomLeft",
                        paintStyle: { fill: example3Color, opacity: 0.5 },
                        isSource: true,
                        scope: 'blue',
                        connectorStyle: {
                            stroke: example3Color,
                            strokeWidth: 4
                        },
                        connector: "Straight",
                        isTarget: true,
                        dropOptions: exampleDropOptions,
                        beforeDetach: function (conn) {
                           // return confirm("Detach connection?");
                        },
                        onMaxConnections: function (info) {
                            //alert("Cannot drop connection " + info.connection.id + " : maxConnections has been reached on Endpoint " + info.endpoint.id);
                        }
                    };

                    // setup some empty endpoints.  again note the use of the three-arg method to reuse all the parameters except the location
                    // of the anchor (purely because we want to move the anchor around here; you could set it one time and forget about it though.)
                    
                    for (var i = 1; i <= 10; i++) {
                       
                    }
                    // setup some DynamicAnchors for use with the blue endpoints
                    // and a function to set as the maxConnections callback.
                    var anchors = [
                            [1, 0.2, 1, 0],
                            [0.8, 1, 0, 1],
                            [0, 0.8, -1, 0],
                            [0.2, 0, 0, -1]
                        ],
                        maxConnectionsCallback = function (info) {
                           // alert("Cannot drop connection " + info.connection.id + " : maxConnections has been reached on Endpoint " + info.endpoint.id);
                        };
/*----------------------------------large screen left nav, unique id was required--------------------------------*/
                   $('#leftNav').on('click', '.picker', function(e){

                        let type = e.currentTarget.id                            
                        if (type == 'scell'){
                            if ($vm.solar_num < 1) {
                                $vm.solar_num++;
                                $vm.solar_num1++;
                                $('#solar_cell'+$vm.solar_num).css('display','flex');
                      instance.addEndpoint('solar_cell'+$vm.solar_num, { anchor:  [0.16, 1.8, 0, 1]}, exampleEndpoint21);
                        instance.addEndpoint('solar_cell'+$vm.solar_num, { anchor:  [0.4, 1.8, 0, 1] }, exampleEndpoint2);
                            }else{
                              alert('only one solar cell allow in this experiment')
                            }
                        }else if(type =='voltmeter'){
                              
                            if ($vm.volt_num<1) {
                                
                                $vm.volt_num++;
                                $('#voltmeterRead').css('display','flex');
                                instance.addEndpoint('voltmeterRead', { anchor:  [0.3, 1.3, 0, 1]}, exampleEndpoint21);
                                instance.addEndpoint('voltmeterRead', { anchor:  [0.6, 1.3, 0, 1] }, exampleEndpoint2);
                                
                            }else{
                                alert('voltmeter already exist');
                            }
                        }else if (type=='ameter') {
                            if ($vm.amp_num<1) {
                                                    
                                $vm.amp_num++;
                                 $('#ameterRead').css('display','flex');
                                setTimeout(function(){
                                  instance.addEndpoint('ameterRead', { anchor:  [0.3, 1.3, 0, 1]}, exampleEndpoint21);
                                    instance.addEndpoint('ameterRead', { anchor:  [0.6, 1.3, 0, 1] }, exampleEndpoint2);

                                },700);
                            }else{
                                alert('ameter already exist');
                            }
                        }else if(type =='sun'){
                          if ($vm.sun_light==0) {
                               $vm.sun_light++;
                            $('#sunLight').css('display','flex');
                          }else{
                            alert('light module already added')
                          }
                        }
                    })
/*----------------------------------end of large screen left nav bar-----------------------------------------------*/
/*----------------------------for small screen left nav bar, unique id was required----------------------------------------*/
                    $('#leftNav1').on('click', '.picker', function(e){

                        let type = e.currentTarget.id                            
                        if (type == 'scell'){
                            if ($vm.solar_num < 10) {
                                $vm.solar_num++;
                                $vm.solar_num1++;
                                $('#solar_cell'+$vm.solar_num).show();
                      instance.addEndpoint('solar_cell'+$vm.solar_num, { anchor:  [-0.1, 0.94, 0, 1]}, exampleEndpoint21);
                        instance.addEndpoint('solar_cell'+$vm.solar_num, { anchor:  [0.5, 0.94, 0, 1] }, exampleEndpoint2);
                            }else{
                              document.location.reload(true);
                            }
                        }else if(type =='voltmeter'){
                              
                            if ($vm.volt_num<1) {
                                
                                $vm.volt_num++;
                                $('#voltmeterRead').show();
                                instance.addEndpoint('voltmeterRead', { anchor:  [0.3, 1.3, 0, 1]}, exampleEndpoint21);
                                instance.addEndpoint('voltmeterRead', { anchor:  [0.6, 1.3, 0, 1] }, exampleEndpoint2);
                                
                            }else{
                                alert('voltmeter already exist');
                            }
                        }else if (type=='ameter') {
                            if ($vm.amp_num<1) {
                                                    
                                $vm.amp_num++;
                                 $('#ameterRead').show();
                                setTimeout(function(){
                                  instance.addEndpoint('ameterRead', { anchor:  [0.3, 1.3, 0, 1]}, exampleEndpoint21);
                                    instance.addEndpoint('ameterRead', { anchor:  [0.6, 1.3, 0, 1] }, exampleEndpoint2);

                                },700);
                            }else{
                                alert('ameter already exist');
                            }
                        }else if(type =='sun'){
                          if ($vm.sun_light==0) {
                               $vm.sun_light++;
                            $('#sunLight').show();
                          }else{
                            alert('light module already added')
                          }
                        }
                    })
/*-----------------------------end of small screen left nav bar------------------------------------------------*/
                   //detach links
                    var detachLinks = jsPlumb.getSelector('.detach');
                    instance.on(detachLinks, "click", function (e) {
                        var rel = this.getAttribute("rel").split('-')
                        instance.deleteConnectionsForElement(this.getAttribute("rel"));
                        //console.log(this.getAttribute("rel"));
                        DrawGauge(1,1, 0, 0);

                        jsPlumbUtil.consume(e);
                    });

                     var shadowRangeBtn = jsPlumb.getSelector('.shadowRange');
                    instance.on(shadowRangeBtn, "click", function (e) {
                      let rel =  this.getAttribute("rel")


                      if (rel=='quater') {  
                        $vm.iterationType = 'quater';                      
                        $('.shadowCover').css('height','50px');                      
                      }else if(rel=='half'){
                        $vm.iterationType = 'half'; 
                        $('.shadowCover').css('height','100px');
                      }else if(rel=='threeQuater'){
                        $vm.iterationType = 'threeQuater'; 
                        $('.shadowCover').css('height','150px');
                      }else if(rel=='fullOne'){
                        $vm.iterationType = 'fullOne'; 
                        $('.shadowCover').css('height','200px');
                      }else if(rel=='zero'){
                        $vm.iterationType = 0; 
                        $('.shadowCover').css('height','0px');                        
                      }



                    })
///////////////////////////////main junction
                    //take reading
                    var readMeter = jsPlumb.getSelector('.read');
                    instance.on(readMeter, "click", function (e) {
                     // alert($vm.solar_num)
                      var connState = solveExpression(ArrConn, $vm.iterationType, true);
                        if (connState == null) {
                          alert('invalid connnections');
                        }else if(connState== 0){
                          alert('add sunLight')
                          $vm.sunToolTip = true;
                        }else if(connState == -1){
                          alert('multi reading not allowed');
                        }else if(connState == -2){
                          alert('connect the Reader');                          
                        }else if(connState == -3){
                          alert('Experiments one Required only Three solar Cell; please delete')
                        }else{
                          $vm.resulInHtmlF = resultTable()
                          
                          
                          if (connState[0] =='current'){
                              
                            DrawGauge('',1, 0,0);
                            setTimeout(function(){
                              DrawGauge('',1,0, connState[1]+ 5);
                              setTimeout(function(){
                                DrawGauge('',1, 0, connState[1]);
                              },200)  
                            },200)                            
                               /*sign on current iteration*/
                              if( $vm.iterationType==0){                            
                            setTimeout(function(){
                              $('.Bsign').removeClass('tableRow');
                              $('#csigna').addClass('tableRow');
                              },3000);                                            
                            } 
                            if($vm.iterationType=='quater'){                            
                            setTimeout(function(){
                                $('.Bsign').removeClass('tableRow');
                                $('#csignb').addClass('tableRow');                              
                              },3000);                                            
                            } 
                            if($vm.iterationType=='half'){                            
                            setTimeout(function(){
                                $('.Bsign').removeClass('tableRow');
                                $('#csignc').addClass('tableRow');                              
                              },3000);                                            
                            } 
                            if($vm.iterationType=='threeQuater'){                            
                            setTimeout(function(){
                                $('.Bsign').removeClass('tableRow');
                                $('#csignd').addClass('tableRow');                              
                              },3000);                                            
                            } 
                             if($vm.iterationType=='fullOne'){                            
                            setTimeout(function(){
                                $('.Bsign').removeClass('tableRow');
                                $('#csigne').addClass('tableRow');                              
                              },3000);                                            
                            } 
                            /*end */
                          }else{
                            
                             DrawGauge(1,1, 0,0);
                            setTimeout(function(){
                              DrawGauge(1,'', connState[1]+5,0);
                                setTimeout(function(){
                                DrawGauge(1,'', connState[1],0);                              
                              },200)                                   
                            },200)

                            /*sign on current iteration*/
                              if( $vm.iterationType==0){                            
                            setTimeout(function(){
                              $('.Bsign').removeClass('tableRow');
                              $('#vsigna').addClass('tableRow');
                              },3000);                                            
                            } 
                            if($vm.iterationType=='quater'){                            
                            setTimeout(function(){
                                $('.Bsign').removeClass('tableRow');
                                $('#vsignb').addClass('tableRow');                              
                              },3000);                                            
                            } 
                            if($vm.iterationType=='half'){                            
                            setTimeout(function(){
                                $('.Bsign').removeClass('tableRow');
                                $('#vsignc').addClass('tableRow');                              
                              },3000);                                            
                            } 
                            if($vm.iterationType=='threeQuater'){                            
                            setTimeout(function(){
                                $('.Bsign').removeClass('tableRow');
                                $('#vsignd').addClass('tableRow');                              
                              },3000);                                            
                            } 
                             if($vm.iterationType=='fullOne'){                            
                            setTimeout(function(){
                                $('.Bsign').removeClass('tableRow');
                                $('#vsigne').addClass('tableRow');                              
                              },3000);                                            
                            } 
                            /*end */     
                            
                          }                                                  
                        }
                      });
///////////////////////////////end main junction                    
                    // delete cell
                    var deleteCell = jsPlumb.getSelector('.deleteCell');
                    instance.on(deleteCell, "click", function (e) { 

                        //readding elelemt becaus jsplumb has remove the element completely
                        var rel = this.getAttribute("rel")
                        if(rel.includes('solar_cell')){
                        instance.remove(rel, false, [false]) 
                        $('#mainSheet').append('<div class="equipments drags solarsAll" style="display: none;" id="'+rel+'" @mouseover="removeClass" ><span><img class="ek" src="/expImages/physics/exp1/solar_cell3.jpeg" width="80px"></span><div class="cbtn"><button class="detach" rel="'+rel+'">detach</button><button class="deleteCell" rel="'+rel+'"><span><span>mdi-close</span></span></button></div></div>');
                       /*
                        $('#mainSheet').append('<div class="equipments drags solarsAll" style="display: none;" id="'+rel+'" @mouseover="removeClass" ><span><img class="ek" src="/expImages/physics/exp1/solar_cell3.jpeg" width="80px"></span><div class="cbtn"><button class="detach" rel="'+rel+'">detach</button><button class="deleteCell" rel="'+rel+'"><span ></span></button></div></div>');*/
                       

                        }else{
                        $('#'+this.getAttribute("rel")).hide();                        
                        //reset sunlight value
                          $vm.sun_light = 0;
                          $('sunL')
                         // alert( $vm.sun_light);    

                        }


                    });


                   /* instance.on(document.getElementById("doAsIdo"), "click", function (e) {
                            instance.selectEndpoints({ source: dot }).each(function (endpoint) {
                                endpoint.connectorStyle.dashstyle = "2 4";
                                instance.repaint(element);
                            });
                    });
*/
                    instance.on(document.getElementById("resetall"), "click", function (e) {
                      $('.solarsAll').hide();                    
                      $('.voltmeterRead').hide();                    
                      $('.ameterRead').hide();                    
                        $vm.amp_num=0;
                        $vm.volt_num=0;
                        $vm.solar_num=0;
                        $vm.solar_num1=0;
                        $vm.sun_light = 0;                      
                         instance.deleteEveryEndpoint();
                       /* showConnectionInfo("");
                        jsPlumbUtil.consume(e);*/
                    });
                    
                });

                instance.draggable($(".drags"),{                        
                    containment:'parent',
                     filter: ".ui-resizable-handle"

                });
                           
                jsPlumb.fire("jsPlumbDemoLoaded", instance);

            });
       
        })();
       

     })
  }

}
</script>
<style scoped>
  :root {

      --color:  rgb(38, 95, 9);
      --colorbtn: #6b3;
    
      --color-t:  #fff;
      --color-t1:  rgba(255, 255, 255);
      --color-primary: rgb(255, 255, 255) ;
      --color-secondary: rgb(255, 255, 255);
      --bg: rgb(0, 16, 65);
      --bg-secondary: rgb(0, 25, 165);
      --border-color: rgb(153, 214, 255);
    }
    .tableRow{
    background:rgba(200,0,0,.1) !important;
    border:5px solid red !important;
    border-radius:5px !important;
}
    .button{
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
        margin: 0px;
        color:var(--color-t);
        background: var(--colorbtn);
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
        background: var(--color-t) !important;        
        /*box-shadow: 0px 2px 10px inset var(--color-t) !important;*/
        color: var(--colorbtn) !important;
        border: 1px solid var(--colorbtn);
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
.show{
    display: block !important;
}
    .picker{
        width: 140px;
        height: 140px;
        padding: 5px;
        border-radius: 3px;
        border: 1px solid #ccc;
        cursor: pointer;
        }
    .picker:hover{
        box-shadow: 1px 2px 2px #ccc;
    }

    .equipments{
        display: flex;
        padding:3px;
        margin:5px;
        width: 200px;
        z-index: 1;
        position: absolute;
        top: 0px ;
        left: 0px;
        height: 120px;
    }
    .main{
        position: relative;
        user-select: none;
    }
    .mainJ{
        position: relative;        
        width: 100%;
        margin: 0px auto;
        height: 470px;
        padding: 10px;
        border-radius: 0px 0px 5px 5px;
       /* border: 1px solid #ccc; */       
    }
    img.ek{
        border-right: 1px dashed #ddd;
    }
  
    .needConnection{
        background: rgba(180,0,0,.3 );
    }
    .noticeboard{
        position: absolute;
        top: 20px;
        left: 60px;
        border-radius: 5px;
        width: 300px;
        padding: 15px;
        font-size: 0.7em !important;
        
    }
    .noteb{
        display: inline-block;
        background: rgba(180,0,0,.1);
        width: 30px;
        height: 20px;
        margin-right: 2px;
        margin-top: 5px; 
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
        color: var(--color-t) !important;
        background: var(--colorbtn) !important;
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
        display: block;
        text-transform: capitalize;
        margin:5px;
        letter-spacing: 0.6px;
        font-size: 0.8em;
        padding: 4px;
        text-decoration: none;
        border-radius: 4px;
        width: 90px !important;
        background: rgba(25,35,65,.8); 
        box-shadow: inset 1px 3px 6px rgb(25,35,65);

        color:#fff;
        border: 1px solid transparent;
        text-align: center;        
    }
    .cbtn button:active{
        box-shadow: inset 1px -3px 6px rgb(25,35,65);
    }
/*    .cbtn button:hover{
        background: rgba(10,10,10,.5);
        color:white;
    }*/
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

.img-pos{
  position: absolute;
  top: 62px; 
  right: 90px; 
  z-index: 2;
}
.dp-none{
  display: none;
}
.forsunligt{
  pointer-events:none;
  z-index: 0;
  display: none;
  width: 97% ;
  box-shadow: none;
  height: 110%;
}
.sunlightDelBtn{
  position: relative; right: 50%;pointer-events: auto !important; 
}
.shadowCover{
  width: 100px;
  height: 0px;
  background: rgba(170,170,170,.5);
  position: relative;
  top: -175.5%; 
  border: 3px dashed #8f9 ;
  transition: height 1s;
}
.shadowMain1{
  height: 50px !important;
}
.shadowMain2{
  height: 100px !important;
}
.shadowMain3{
  height: 150px !important;
}
.shadowMain4{
  height: 200px !important;
}
#list{
      display: none !important;
      border: 1px solid #ccc; 
      box-shadow: 2px 3px 10px #fafafa;
}
.pointer-auto{
  pointer-events:auto;
}
</style>
