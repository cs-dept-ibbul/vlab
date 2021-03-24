 <template>
  <div data-demo-id="draggableConnectors"class="w-100">

        <div class="main row">            
            
            <div class="noticeboard" v-if='guidings'>
                <p><span class='noteb'></span> <i>Invalid/Required Connection</i></p>
            </div>
           
           

    
          <div class='w-100'>
            
            <!-- Start sheet header -->
        <!--   <no-ssr> -->
       <!--      <div class="d-flex align-center" style="padding: 9px;   box-shadow: 0px 2px 10px  #ccc;  background: var(--color-t);color:var(--color);" >
              <span><span color="var(--color)">mdi-chevron-left</span></span>
              <a href="/experiment/" style="color:var(--color); font-size: 1em;">Experiments</a>              
              
                <button id="resetall" class="mx-2 bg-dark text-white" style="font-size: 0.75em;" >Clear</button><a href="" style="text-decoration: none;" >
                <button color="red" class="mr-2" style="color: #fff;font-size: 0.75em;" >Reset</button></a>
                <button class="read">Run</button>   
              <v-spacer></v-spacer>
              
              <saveTab :dataTosave1 ='resulInHtmlF' :exp_num = '$route.params.id' type='photovolatic' ></saveTab>                                  
              <v-spacer></v-spacer>
                <h3 style="text-transform: capitalize;font-weight: normal; font-size: 1em;">{{$route.params.id}}.{{expType}} </h3>
            </div> 
          -->
     
            <!-- end sheet header -->

             <img  src="/expImages/physics/exp1/1-0.png" class="img-pos" width="200px">
            <div class="mainJ drag-drop scrollbar w-100"  id="mainSheet" >
                <div v-for="id in solarCell_id" v-bind:key="id.id" class="equipments drags solarsAll dp-none" :id="'solar_cell'+id.id" @mouseover="removeClass" >
                    <span>                       
                        <img class="ek" src="/expImages/physics/exp1/solar_cell3.jpeg" width="80px">
                    </span>
                  <div class="cbtn">
                    <button class="detach" :rel="'solar_cell'+id.id">detach</button>                    
                    <button class="deleteCell" :rel="'solar_cell'+id.id" @click='solar_num1--'><span><span class="fa fa-remove"></span></span></button>                    
                  </div>
                </div>
                    <div class="equipments drags dp-none" id="ameterRead" @mouseover="removeClass">
                    <span>
                        <canvas id="ameter-gauage">
                        <center><h2>{{ ampValue }}A</h2></center>
                            <img class="ek" src="/expImages/physics/exp1/ameter.png" width="110px">
                        </canvas>
                      Ameter
                    </span>
                  <div class="cbtn">
                    <button class="detach" rel='ameterRead'>detach</button>        
                      <button class="read switchbtn" rel='voltmeterRead'>Read</button>            
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

                  <div class="picker equipments drags forsunligt dp-none" style="" id="sunLight" >
                    <span style='font-size:6em;color:orange;'>&#9728;</span>
                  <!-- <img   src="/expImages/physics/exp1/lightModul.jpg" v-bind="attrs" v-on="on" @click='' width="80%" height="80%"> -->
                  <div class="cbtn">
                    <button class="deleteCell sunlightDelBtn" rel="sunLight" style="" ><span style="color: #ba6;" class="fa fa-remove"></span></button>                    
                  </div>
                  </div>
               </div>
          </div>
           <!--    <rightNav :passResult='resulInHtmlF' has='1'></rightNav> -->
            
                <!-- <rightNav :passResult='resulInHtmlF'  style=" " ></rightNav>                                                  -->
         
         </div>
         

                <div id="list" style="border: 1px solid #ccc; box-shadow: 2px 3px 10px #fafafa;"></div>
        </div>            
</template>
<script>
var ArrConn;
var experimentOne, resulInHtml;

export default {

computed: {
/*      instructions() {
        let b = this.$exp2vicelab.state.instructions.all.findIndex(x => x.experiment === this.$route.params.type)         
        return  this.$exp2vicelab.state.instructions.all[b];
      },
*/
      
      experimentOne() {               
        return  this.$store.state.exp1;
      },
    
    },

  data () {
    return{
      menuName1: "mdi-chevron-right",
      menuState1: false,
      menuName2: "mdi-chevron-left",
      menuState2: false,
      navdType:'none',
        experimentOneResult:[
         { series:{one:'-', two:'-', three:'-'},parallel:{one:'-', two:'-', three:'-'}},
         { series:{one:'-', two:'-', three:'-'},parallel:{one:'-', two:'-', three:'-'}}
        ],    
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
    //console.log(this.$store.state);
    let subExp = [2,'photovolatic'];
      this.expNum = Number(subExp[0]);
      this.expType = Number(subExp[1])

  
  },
  mounted(){

    let $vm = this;
     this.$nextTick(function(){
  
 /*   function resultTable(){
        
      for(var ih in $vm.experimentOneResult){
    
        if (ih==0){
          $vm.resulInHtml =" <h6>Series Connection</h6><table class='table table-bordered'><thead><th></th><th>One Solar Cell</th><th>Two Solar Cell</th><th>Three Solar Cell</th></thead><tbody>";
          $vm.resulInHtml +="<tr><td>Vsc</td>";
          $vm.resulInHtml +="<td  id='vsigna' class='Bsign'>"+$vm.experimentOneResult[0].series.one+"</td>";
          $vm.resulInHtml +="<td id='vsignb' class='Bsign'>"+$vm.experimentOneResult[0].series.two+"</td>";
          $vm.resulInHtml +="<td id='vsignc' class='Bsign'>"+$vm.experimentOneResult[0].series.three+"</td></tr>";
          $vm.resulInHtml +="<tr><td>Isc</td>";
          $vm.resulInHtml +="<td id='csigna' class='Bsign'>"+$vm.experimentOneResult[1].series.one+"</td>";
          $vm.resulInHtml +="<td id='csignb' class='Bsign'>"+$vm.experimentOneResult[1].series.two+"</td>";
          $vm.resulInHtml +="<td id='csignc' class='Bsign'>"+$vm.experimentOneResult[1].series.three+"</td></tr></tbody></table>";
        }else{
          $vm.resulInHtml +=" <h6>parallel Connection</h6><table class='table table-bordered'><thead><th></th><th>One Solar Cell</th><th>Two Solar Cell</th><th>Three Solar Cell</th></thead><tbody>";
          $vm.resulInHtml +="<tr><td>Vsc</td>";
          $vm.resulInHtml +="<td id='vsignc' class='Bsign'>"+$vm.experimentOneResult[0].parallel.one+"</td>";
          $vm.resulInHtml +="<td id='vsignd' class='Bsign'>"+$vm.experimentOneResult[0].parallel.two+"</td>";
          $vm.resulInHtml +="<td id='vsigne' class='Bsign'>"+$vm.experimentOneResult[0].parallel.three+"</td></tr>";
          $vm.resulInHtml +="<tr><td>Isc</td>";
          $vm.resulInHtml +="<td id='csignc' class='Bsign'>"+$vm.experimentOneResult[1].parallel.one+"</td>";
          $vm.resulInHtml +="<td id='csignd' class='Bsign'>"+$vm.experimentOneResult[1].parallel.two+"</td>";
          $vm.resulInHtml +="<td id='csigne' class='Bsign'>"+$vm.experimentOneResult[1].parallel.three+"</td></tr></tbody></table>";
        }
      }
      return $vm.resulInHtml;
      }*/

      function checkConnectionfunc(exp2vicelabdA, connA, guide=false ){
            let count = 0;
            let sobj = [];
           // let exp2vicelabdA2 = JSON.parse(JSON.stringify(exp2vicelabdA));
            for (var i = 0; i < exp2vicelabdA.length; i++) {
                for (var j = 0; j < connA.length; j++) {                    
                      if(exp2vicelabdA[i].source == connA[j].source && exp2vicelabdA[i].target == connA[j].target || exp2vicelabdA[i].source == connA[j].target && exp2vicelabdA[i].target == connA[j].source){
                            count++;
                            j = connA.length;
                            //remove from original correct connection
                            sobj.push(i);
                           // exp2vicelabdA2.splice(i, 1);
                        }                    
                }
            }
            
            if(count == exp2vicelabdA.length){
                return true;
            }else{
              // console.log(exp2vicelabdA2);
             
                if (guide == true) {                        
                    for (var i = 0; i < exp2vicelabdA.length; i++) {
                            if (JSON.stringify(sobj).includes(i)) {}else{                        
                              document.getElementById(exp2vicelabdA[i].sid).classList.add('needConnection');
                              document.getElementById(exp2vicelabdA[i].tid).classList.add('needConnection');
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
                //check connection typ
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

                if(count==1){
                  confirm = checkConnectionfunc($vm.experimentOne['arr1'+readerT+1], Array1, guid ) ;
                  if(confirm){
                    if ($vm.sun_light == 1) {                  
                      result.push(rType, $vm.experimentOne['arr1'+readerT]);
                     
                      if (rType=='voltage') {
                        $vm.experimentOneResult[0]['series'].one = $vm.experimentOne['arr1'+readerT]
                        $vm.experimentOneResult[0]['parallel'].one= $vm.experimentOne['arr1'+readerT]
                      }else{
                        $vm.experimentOneResult[1]['series'].one = $vm.experimentOne['arr1'+readerT]
                        $vm.experimentOneResult[1]['parallel'].one = $vm.experimentOne['arr1'+readerT]
                      }

                      return result;                
                    }else{
                      return 0;//no sun light 
                    }
                  }else{ result = null; return result;/* connection not valid */}
                }
                //two solar sell
                else if(count == 2){
                  
                  //series connection
                  if (seriesCount != 0 && parallelCount == 0){
                    //confirm = checkConnectionfunc($vm.experimentOne.arr2s, Array1, guid)  

                    confirm = checkConnectionfunc($vm.experimentOne['arr2s'+readerT+1], Array1, guid )  
                    if(confirm){
                      if ($vm.sun_light == 1) {                  
                        //result.push({'voltage': $vm.experimentOne.arr2sv, 'current':$vm.experimentOne.arr2sc});
                        result.push(rType, $vm.experimentOne['arr2s'+readerT]);
                        //push result
                        if (rType=='voltage') {
                          $vm.experimentOneResult[0]['series'].two = $vm.experimentOne['arr2s'+readerT]
                        }else{
                          $vm.experimentOneResult[1]['series'].two = $vm.experimentOne['arr2s'+readerT]                        
                        }
                        return result;                
                      }else{
                        return 0;//no sun light 
                      }
                    }else{ result = null; return result;/* connection not valid */}
                  }//parallel connection
                  else if(seriesCount == 0 && parallelCount != 0){     
                     /*alert(2)             */
                    confirm = checkConnectionfunc($vm.experimentOne['arr2p'+readerT+1], Array1, guid )  
                    if(confirm){
                      if ($vm.sun_light == 1) {                  
                        //result.push({'voltage': $vm.experimentOne.arr2pv, 'current':$vm.experimentOne.arr2pc});
                        result.push(rType, $vm.experimentOne['arr2p'+readerT]); 
                        //push result
                        if (rType=='voltage') {
                          $vm.experimentOneResult[0]['parallel'].two = $vm.experimentOne['arr2p'+readerT]
                        }else{
                          $vm.experimentOneResult[1]['parallel'].two = $vm.experimentOne['arr2p'+readerT]
                        }                     
                        return result;                
                      }else{
                        return 0;//no sun light 
                      }
                    }else{ result = null; return result;/* connection not valid */}
                  }
                }
                //three solar cell
                else if(count == 3){

                  //series connection
                  if (seriesCount != 0 && parallelCount == 0){
                    //confirm = checkConnectionfunc($vm.experimentOne.arr3s, Array1, guid)
                    confirm = checkConnectionfunc($vm.experimentOne['arr3s'+readerT+1], Array1, guid )  
                    if(confirm){
                      if ($vm.sun_light == 1) {                  
                       // result.push({'voltage': $vm.experimentOne.arr3sv, 'current':$vm.experimentOne.arr3sc});
                        result.push(rType, $vm.experimentOne['arr3s'+readerT]);  
                        //push result
                        if (rType=='voltage') {
                          $vm.experimentOneResult[0]['series'].three = $vm.experimentOne['arr3s'+readerT]
                        }else{
                          $vm.experimentOneResult[1]['series'].three = $vm.experimentOne['arr3s'+readerT]
                        }                                         
                        return result;                
                      }else{
                        return 0;//no sun light 
                      }
                    }else{ result = null; return result;/* connection not valid */}
                  }//parallel connection
                  else if(seriesCount == 0 && parallelCount != 0){
                     //  alert(3)
                    //confirm = checkConnectionfunc($vm.experimentOne.arr3p, Array1, guid)  
                    confirm = checkConnectionfunc($vm.experimentOne['arr3p'+readerT+1], Array1, guid )  
                    if(confirm){
                      if ($vm.sun_light == 1) {                  
                        //result.push({'voltage': $vm.experimentOne.arr3pv, 'current':$vm.experimentOne.arr3pc});
                        result.push(rType, $vm.experimentOne['arr3p'+readerT]);
                        //push result
                        if (rType=='voltage') {
                          $vm.experimentOneResult[0]['parallel'].three = $vm.experimentOne['arr3p'+readerT]
                        }else{
                          $vm.experimentOneResult[1]['parallel'].three =$vm.experimentOne['arr3p'+readerT]
                        }                                         
                        return result;                
                      }else{
                        return 0;//no sun light 
                      }
                    }else{ result = null; return result;/* connection not valid */}
                  }
                }else{
                  return -3 // maximum cell to use is 3 in experiment 1
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
            borders: false,
            animateOnInit: true,
            animatedValue: true
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
                    listDiv.style.left = "65%";
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
                      /* var connState = checkConnectionfunc(use_exp2vicelabArrConn,ArrConn, guidings);
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
                            if ($vm.solar_num < 10) {
                                $vm.solar_num++;
                                $vm.solar_num1++;
                                $('#solar_cell'+$vm.solar_num).css('display','flex');
                      instance.addEndpoint('solar_cell'+$vm.solar_num, { anchor:  [0.09, 1.5, 0, 1]}, exampleEndpoint21);
                        instance.addEndpoint('solar_cell'+$vm.solar_num, { anchor:  [0.3, 1.5, 0, 1] }, exampleEndpoint2);
                            }else{
                              document.location.reload(true);
                            }
                        }else if(type =='voltmeter'){
                              
                            if ($vm.volt_num<1) {
                                
                                $vm.volt_num++;
                                $('#voltmeterRead').css('display','flex');;
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
                            $('#sunLight').show();
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
///////////////////////////////main junction
                    //take reading
                    var readMeter = jsPlumb.getSelector('.read');
                    instance.on(readMeter, "click", function (e) {
                     // alert($vm.solar_num)
                      var connState = solveExpression(ArrConn, $vm.solar_num1, true);
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
                          //$vm.resulInHtmlF = resultTable()
                          
                          
                          if (connState[0] =='current'){
                            DrawGauge('',1, 0,0);
                            setTimeout(function(){
                              DrawGauge('',1, 0, connState[1]+5)
                              setTimeout(function(){
                                DrawGauge('',1, 0, connState[1])
                              },200)  
                            },200)                            

                          }else{
                           //  alert($vm.experimentOneResult[0].series.one)
                             DrawGauge(1,1, 0,0);
                            setTimeout(function(){
                              DrawGauge(1,'', connState[1]+5,0);
                                setTimeout(function(){
                                DrawGauge(1,'', connState[1],0);                              
                              },200)                                   
                            },200)     
                            
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
#list{
      display: none !important;
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
</style>
