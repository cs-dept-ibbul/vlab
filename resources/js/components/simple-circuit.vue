 <template>
  <div data-demo-id="draggableConnectors"> 
     <div class="main row">
          <div  class='w-100'>    
                <img class="img-pos" src="/expImages/physics/exp1/diagram.png" width="200px">
                <div class="mainJ drag-drop scrollbar w-100"  id="mainSheet"  d="canvas">

                    <div class="equipments drags" id="switch" @mouseover="removeClass">
                        <span>                                            
                          <img class="ek" :src="switchSrc" width="" height="70px">
                          <br>
                          Switch 
                          <label></label>                
                        </span>
                      <div class="cbtn">
                        <button class="detach" rel='switch'>detach</button>
                        <button @click="switchStatefunc" id="switchID">{{ switchStatebtn }}</button>
                        <button class="detach" rel='standard_resistor'>detach</button>                
                        <input type="number" value="switchState" id="switchState" style="display: none;">
                      </div>
                    </div>
                    
                    <div class="equipments drags" id="standard_resistor" @mouseover="removeClass">
                        <span>                        
                          <div id="standard_resistor1"></div>
                          <div id="standard_resistor2"></div>
                          <img class="ek" src="/expImages/physics/exp1/standard_resistor.jpg" width="60px">
                          <br>
                          standard resistor 
                          <label></label>                
                        </span>
                      <div class="cbtn">
                        <button class="detach" rel='standard_resistor'>detach</button>
                      </div>
                    </div>

                    <div class="equipments drags" id="varible_resistor" @mouseover="removeClass" >
                        <span>
                          <center><h4 style="margin-bottom:-40px; ">{{ vResistor }}&#8486</h4></center>
                          <img class="ek" src="/expImages/physics/exp1/rethostate.png" width="100px">
                          Resistant Box
                        </span>
                      <div class="cbtn">                        
                        <button class="detach" rel='varible_resistor'>detach</button>
                        <button @click="vResistor+=0.5">add</button>
                        <button @click="vResistor-=0.5">reduce</button>                        
                      </div>
                    </div>                    

                    <div class="equipments drags" id="voltmeter" @mouseover="removeClass" >
                        <span>                         
                         <canvas id="another-gauge">
                            <center><h4>{{ voltValue }}V</h4></center>
                            <img class="ek" src="/expImages/physics/exp1/voltmeter1.png" width="900px">
                         </canvas>
                          Voltmeter
                        </span>
                      <div class="cbtn">
                        <button class="detach" rel='voltmeter'>detach</button>                        
                      </div>
                    </div>

                    <div class="equipments drags" id="ameter" @mouseover="removeClass" >
                        <span>
                            <canvas id="ameter-gauage">
                            <center><h4>{{ ampValue }}A</h4></center>
                                <img class="ek" src="/expImages/physics/exp1/ameter.png" width="60px">
                            </canvas>
                          Ameter
                        </span>
                      <div class="cbtn">
                        <button class="detach" rel='ameter'>detach</button>                    
                      </div>
                    </div>
                    <div class="equipments drags " id="Bcell" @mouseover="removeClass" >
                    <span style="border-right: 1px dashed #ddd;"  class="mr-3 pr-2">
                        <center><h4>{{ bcellvalue }}v</h4></center>
                        <span v-html="cellToAdd">
                        </span>
                        <br>
                        Cell
                    </span>
                      <div class="cbtn">
                        <button class="detach" rel='Bcell'>detach</button>
                        <button  @click="addCellfunc" style="cursor: pointer !important;">add</button>
                        <button  @click="removeCellfunc" style="cursor: pointer !important;" >remove</button>
                      </div>
                </div>
                    <div id="list" style="border: 1px solid #eee; box-shadow: 2px 3px 10px #fafafa;"></div>
                </div>
          </div>          

        </div>
        
    </div>
</template>

<script>
var singleCell= " <img  src='/expImages/physics/exp1/cell.png' width='40px'>";
var ArrConn = [];
var StoreArrConn = [];
var noticeb = '';
var voltValue, ampValue, intactCon = false, maxCell;
var guidings = true;

export default {
   
computed: {
  instructions() {
        let b = this.$store.state.instructions.all.findIndex(x => x.experiment === '0-0')         
        return  this.$store.state.instructions.all[b];
      },

      experimentOne() {       
        return  this.$store.state.exp1;
      }
  
    },
  created(){

    let subExp = [2,'Simple Circuit'];
      this.expNum = Number(subExp[0]);
      this.expType = Number(subExp[1])

    ///async
  },
  data () {
    return{  
        switchState: false,
        switchSrc :"/expImages/physics/exp1/switch.png",
        switchStatebtn: 'close switch',
        cellToAdd: singleCell,
        cellCount: 1,
        vResistor: 2,
        bcellvalue:1.5,
        noticeb:'',
        resistor: 13,
        voltValue:0,
        ampValue:0,
        maxCell: 5,
        intactCon: false,
         resulInHtml : '',
        resulInHtmlF: '',
        naviconRight: 'mdi-reorder-horizontal',
        navClickRightState: false,
        StoreArrConn: [
            {scope: "red", source: "standard_resistor", target: "varible_resistor"},
            {scope: "blue", source: "standard_resistor", target: "varible_resistor"},
            {scope: "red", source: "voltmeter", target: "varible_resistor"},
            {scope: "blue", source: "voltmeter", target: "varible_resistor"},
            {scope: "red", source: "switch", target: "varible_resistor"},
            {scope: "blue", source: "ameter", target: "varible_resistor"},
            {scope: "red", source: "ameter", target: "Bcell"},
            {scope: "blue", source: "Bcell", target: "switch"}
        ],
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
        },
        
        toShowNavfunc(e){
            let x = e.currentTarget;
            let r = x.getAttribute('rel')
            //let parent = x.parentElement
           
            let allc = document.getElementsByClassName('rightnav');
            document.getElementsByClassName('right-panel')[0].classList.remove('paneliWidth');
            for (var i = 0; i < allc.length; i++) {
                allc[i].classList.add('hideC');
            }
            setTimeout(function() {
                document.getElementsByClassName('right-panel')[0].classList.add('paneliWidth');
                document.getElementById(r).classList.remove('hideC');
            }, 200);

        },
        navRightfunc(){
            this.navClickRightState = !this.navClickRightState;
            if(this.navClickRightState){
                this.naviconRight = 'mdi-window-close';
            }else{
                this.naviconRight = 'mdi-reorder-horizontal';
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
  mounted(){
    let $vm = this;
     this.$nextTick(function(){
       var use_StoreArrConn =  this.StoreArrConn;
      
     function DrawGauge(volt, ame ){

       new RadialGauge({
        renderTo: 'another-gauge',
        width: 120,
        height: 120,
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

       new RadialGauge({
        renderTo: 'ameter-gauage',
        width: 120,
        height: 120,
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
        colorPlate: "#ffffff",
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
    DrawGauge(0,0);


     
        
    

       function checkConnectionfunc(connA, guide=false ){

        
       }
       function checkConnectionfunc(storedA, connA, guide=false ){
            let count = 0;
            let sobj = [];
           // let storedA2 = JSON.parse(JSON.stringify(storedA));
            for (var i = 0; i < storedA.length; i++) {
                for (var j = 0; j < connA.length; j++) {
                    if (storedA[i].scope == connA[j].scope ) {
                        if(storedA[i].source == connA[j].source && storedA[i].target == connA[j].target || storedA[i].source == connA[j].target && storedA[i].target == connA[j].source){
                           
                            count++;
                            j = connA.length;
                            //remove from original correct connection
                            sobj.push(i);
                           // storedA2.splice(i, 1);
                        }
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
                              document.getElementById(storedA[i].source).classList.add('needConnection');
                              document.getElementById(storedA[i].target).classList.add('needConnection');
                        }
                    }
                }
                return false;
            }
                    
        }

        var R = document.getElementById('standard_resistor');

        (function () {

            var listDiv = document.getElementById("list"),

                showConnectionInfo = function (s) {
                    listDiv.innerHTML = s;
                    listDiv.style.display = "block";
                    listDiv.style.position = "fixed";
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
                        if (idx != -1) connections.splice(idx, 1);
                    }
                    if (connections.length > 0) {
                        var s = "<span id='connNav1' style='font-size:2em; color:#d53; float:right;cursor:pointer' onclick='$(document).ready(function(){$(\"#connTable\").fadeOut(50); $(\"#connNav1\").fadeOut(50); $(\"#connNav2\").show(80);})' >-</span><span style='font-size:2em; color:#d53; float:right;cursor:pointer;display:none;' id='connNav2' onclick='$(document).ready(function(){$(\"#connTable\").fadeIn(50); $(\"#connNav1\").fadeIn(80); $(\"#connNav2\").fadeOut(50);})' >+</span><span style='clear:right;'><strong>Connections</strong></span><br/><br/><table id='connTable'><tr><th>Scope</th><th>Source</th><th>Target</th></tr>";
                        ArrConn = [];
                        for (var j = 0; j < connections.length; j++) {
                            ArrConn.push({'scope':connections[j].scope, 'source': connections[j].sourceId, 'target':connections[j].targetId});
                            s = s + "<tr><td>" + connections[j].scope + "</td>" + "<td>" + connections[j].sourceId + "</td><td>" + connections[j].targetId + "</td></tr>";
                        }
                      
                            
                              
                      
/////////////////////////evaluation if connnection //////////////////////////////
                       var connState = checkConnectionfunc(use_StoreArrConn,ArrConn, guidings);
                       //console.log($vm.switchState);
                        if (connState) {
                            //check if key is close
                            if ($vm.switchState){
                                //alert(1)
                                let TOTAL_R =  (1/$vm.resistor) + (1/$vm.vResistor);
                                 $vm.ampValue = $vm.bcellvalue/TOTAL_R;
                                 
                                  $vm.voltValue = $vm.ampValue * TOTAL_R;
                                 intactCon = true;
                                DrawGauge( $vm.voltValue, $vm.ampValue);                              
                                $vm.resulInHtmlF ='<b>volt</b> = '+$vm.voltValue + '<br><b>Amp</b> = '+$vm.ampValue;                                
                                 //animateGauges();
                            }else{
                                if(guidings){
                                    alert('Switch is open');
                                }
                            }
                        }
/////////////////////////End evaluation if connnection //////////////////////////////
                        //console.log(ArrConn);
                        showConnectionInfo(s);
                    } else
                        hideConnectionInfo();
                };
                $('#switchID').click(function(){
                    /////////////////////////evaluation if connnection //////////////////////////////
                       var connState = checkConnectionfunc(use_StoreArrConn,ArrConn, guidings);
                       //console.log($vm.switchState);
                        if (connState) {
                            //check if key is close
                            if ($vm.switchState){                                
                                let TOTAL_R =  (1/$vm.resistor) + (1/$vm.vResistor);
                                 $vm.ampValue = $vm.bcellvalue/TOTAL_R;
                                  $vm.voltValue = $vm.ampValue * TOTAL_R;
                                 intactCon = true;
                                DrawGauge( $vm.voltValue, $vm.ampValue);
                                $vm.resulInHtmlF ='<b>volt</b> = '+$vm.voltValue + '<br><b>Amp</b> = '+$vm.ampValue;                                

                                 //animateGauges();
                            }else{
                                if(guidings){
                                    alert('Switch is open');
                                }
                            }
                        }
/////////////////////////End evaluation if connnection //////////////////////////////
                })
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
                        paintStyle: { width: 25, height: 21, fill: exampleColor },
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
                    var color2 = "#c34";
                    var exampleEndpoint2 = {
                        endpoint: ["Dot", { radius: 6 }],
                        paintStyle: { fill: color2 },
                        isSource: true,
                        scope: "red",
                        connectorStyle: { stroke: color2, strokeWidth: 2 },
                        connector: ["Bezier", { curviness: 63 } ],
                        maxConnections: 3,
                        isTarget: true,
                         beforeDrop: function (params) {
                            //console.log(params);
                            return true ;//confirm("Connect " + params.sourceId + " to " + params.targetId + "?");
                        },
                        dropOptions: exampleDropOptions
                    };
                    var color21 = "#3c4";
                    var exampleEndpoint21 = {
                        endpoint: ["Dot", { radius: 6 }],
                        paintStyle: { fill: color21 },
                        isSource: true,
                        scope: "blue",
                        connectorStyle: { stroke: color21, strokeWidth: 2 },
                        connector: ["Bezier", { curviness: 63 } ],
                        maxConnections: 3,
                        isTarget: true,
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
                        scope: 'yellow',
                        connectorStyle: {
                            stroke: example3Color,
                            strokeWidth: 4
                        },
                        connector: "Straight",
                        isTarget: true,
                        dropOptions: exampleDropOptions,
                        beforeDetach: function (conn) {
                            return confirm("Detach connection?");
                        },
                        onMaxConnections: function (info) {
                            //alert("Cannot drop connection " + info.connection.id + " : maxConnections has been reached on Endpoint " + info.endpoint.id);
                        }
                    };

                    // setup some empty endpoints.  again note the use of the three-arg method to reuse all the parameters except the location
                    // of the anchor (purely because we want to move the anchor around here; you could set it one time and forget about it though.)
                    var R_1 = instance.addEndpoint('standard_resistor', { anchor:  [0.15, 0.14, 0, 1]}, exampleEndpoint2);

                   
                    var R_2 = instance.addEndpoint('standard_resistor', { anchor:  [0.23, 0.14, 0, 1] }, exampleEndpoint21);

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

                    
                    // you can bind for a maxConnections callback using a standard bind call, but you can also supply 'onMaxConnections' in an Endpoint definition - see exampleEndpoint3 above.
                    /*e1.bind("maxConnections", maxConnectionsCallback);*/

                    var VR_1 = instance.addEndpoint('varible_resistor', { anchor:  [0.26,1.2, 0, 1] }, exampleEndpoint2);
                    var VR_2 = instance.addEndpoint('varible_resistor', { anchor:  [0.67, 1, 0, 1] }, exampleEndpoint21);


                    var volt1 = instance.addEndpoint('voltmeter', { anchor: [0.3, 1.3, 0, 1] }, exampleEndpoint2);
                    var volt2 = instance.addEndpoint('voltmeter', { anchor:  [0.4, 1.3, 0, 1]  }, exampleEndpoint21);
                    

                    var _switch = instance.addEndpoint('switch', { anchor:  [0.2, 0.37, 0, 1] }, exampleEndpoint2);
                    var _switch = instance.addEndpoint('switch', { anchor:  [0.35, 0.37, 0, 1] }, exampleEndpoint21);

                    var _ameter = instance.addEndpoint('ameter', { anchor: [0.3, 1.3, 0, 1]}, exampleEndpoint2);
                    var _ameter = instance.addEndpoint('ameter', { anchor: [0.4, 1.3, 0, 1] }, exampleEndpoint21);

                    var _Bcell = instance.addEndpoint('Bcell', { anchor:  [0, 0.9, 0, 1] }, exampleEndpoint2);
                    var _Bcell = instance.addEndpoint('Bcell', { anchor:  [0.1, 0.9, 0, 1] }, exampleEndpoint21);

                    function upmouse(){
                       // alert(1);
                    }
   

                    var detachLinks = jsPlumb.getSelector('.detach');
                    instance.on(detachLinks, "click", function (e) {
                        console.log();
                        var rel = this.getAttribute("rel").split('-')
                        instance.deleteConnectionsForElement(this.getAttribute("rel"));
                        jsPlumbUtil.consume(e);
                    });

                    instance.on(document.getElementById("doAsIdo"), "click", function (e) {
                            instance.selectEndpoints({ source: dot }).each(function (endpoint) {
                                endpoint.connectorStyle.dashstyle = "2 4";
                                instance.repaint(element);
                            });
                    });

                    instance.on(document.getElementById("clear"), "click", function (e) {
                        instance.detachEveryConnection();
                        showConnectionInfo("");
                        jsPlumbUtil.consume(e);
                    });
                    
                });

                instance.draggable($(".drags"),{                        
                    containment:'parent',
                     filter: ".ui-resizable-handle"

                });
                $("#spillAll").click(function(e){
                        let x = e.target.checked;

                        if (x == true) {               
                           $("#varible_resistor").animate({left: 299,top: 358,opacity:1}, 500);
                                          
                           $("#standard_resistor").animate({left: 64,top: 451,opacity:1}, 500);
                           $("#voltmeter").animate({left: 614,top: 424,opacity:1}, 500);
                           $("#ameter").animate({left: 649,top: 164,opacity:1}, 500);
                           $("#switch").animate({left: 0,top: 267,opacity:1}, 500);
                           $("#Bcell").animate({left: 10,top: 80,opacity:1}, 500);
                           //jsPlumb.repaint(ui.helper)
                        }else{
                            $("#varible_resistor").animate({left: 0,top: 0,opacity:1}, 500);
                            $("#standard_resistor").animate({left: 0,top: 0,opacity:1}, 500);
                            $("#voltmeter").animate({left: 0,top: 0,opacity:1}, 500);
                            $("#ameter").animate({left: 0,top: 0,opacity:1}, 500);
                            $("#switch").animate({left: 0,top: 0,opacity:1}, 500);
                            $("#Bcell").animate({left: 0,top: 0,opacity:1}, 500);
                            //jsplumb.repaint()
                        }
                        setTimeout(function(){
                           instance.repaintEverything();                        
                        }, 500)
                        

                });
                $("#spillAll1").click(function(e){                               
                           $("#varible_resistor").animate({left: 340,top: 370,opacity:1}, 500);
                                          
                           $("#standard_resistor").animate({left: 90,top: 450,opacity:1}, 500);
                           $("#voltmeter").animate({left: 690,top: 440,opacity:1}, 500);
                           $("#ameter").animate({left: 690,top: 170,opacity:1}, 500);
                           $("#switch").animate({left: 60,top: 270,opacity:1}, 500);
                           $("#Bcell").animate({left: 60,top: 90,opacity:1}, 500);
                           //jsPlumb.repaint(ui.helper)
                    
                        setTimeout(function(){
                           instance.repaintEverything();                        
                        }, 500)
                        

                })
    
                jsPlumb.fire("jsPlumbDemoLoaded", instance);

            });
       
        })();
       

     })
  }

}
</script>
<style scoped>
    .button{
        padding: 1px !important;
        width: 5px !important;
    }
    .equipments{
        display: flex;
        padding:3px;
        margin:5px;
        width: 150px;
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
        height: 77vh;    
        padding: 10px;
        border-radius: 0px 0px 5px 5px;
       /* border: 1px solid #ccc; */       
    }
    img.ek{
        border-right: 1px dashed #ddd;
    }
    #standard_resistor{
        
        top: 328px;
        left:  252px;
    }
    #varible_resistor{
        
        left: 488px; 
        top: 206px;
    }
    #voltmeter{
        
        left: 719px;
        top:309px;
        border-radius: 5px;

    }
     #ameter{
        
        padding: 0px;
        border-radius: 5px;
        left: 68px;
        top: 201px;    
    }
    #switch{
   
        top: 30px;
        left:361px;
        padding: 10px;
        border-radius: 5px;
    }
    #Bcell{
        
        top: 13px;
        left:96px;
        
        width: 300px;
        padding: 10px;
    }
    .needConnection{
        background: rgba(180,0,0,.1);
    }
    .noticeboard{
        position: absolute;
        top: 20px;
        left: 180px;
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
    .config-label{
        font-size: 0.8em;
        color:#555;
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
    #list{
      display: none !important;
    }
    .img-pos{
  position: absolute;
  top: 62px; 
  right: 90px; 
  z-index: 0;
}

</style>
