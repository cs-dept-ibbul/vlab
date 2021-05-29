   const defaultConfig = {
        totalBand: 5,
        tolerance: "gold",
        multiplier: "red",
        temperature: "red",
        width: 200,
        height: 50,
        band: ["grey","green","yellow"],
        noramalBandColor: {
                  "black": 0,
                  "brown": 1,
                  "red"  : 2,
                  "orange":3,
                  "yellow":4,
                  "green": 5,
                  "blue" : 6,
                  "violet":7,
                  "grey": 8,
                  "white":9,
                  "gold": null,
                  "silver":null
                },
        multimeterColor: {
                  "black": 1,
                  "brown": 10,
                  "red"  : 100,
                  "orange":1000,
                  "yellow":10000,
                  "green": 100000,
                  "blue" : 1000000,
                  "violet":10000000,
                  "grey": null,
                  "white":null,
                  "gold": 0.1,
                  "silver":0.01}
        ,
        toleranceColor:{
                  "black": null,
                  "brown": 1,
                  "red"  : 2,
                  "orange":null,
                  "yellow":null,
                  "green": 0.5,
                  "blue" : 0.25,
                  "violet":0.1,
                  "grey": 0.05,
                  "white":null,
                  "gold": 5,
                  "silver":10},
        temperatureColor:{                  
                  "brown": '100ppm',
                  "red"  : '50ppm',
                  "orange":'15ppm',
                  "yellow":'25ppm'
                }
        
    }
    class Resistor{
      #container_id	 ="";      
      #dynamic_id = "";
      constructor(containerID2,configi = {}){
        window.digitalResistorId = -1;
        if (!containerID2) throw new Error("invalid container id");            
        this.#container_id	 = containerID2;
        this.config = {...defaultConfig, ...configi}

        if (configi.totalBand>7 || defaultConfig.totalBand>7){
          throw new Error('totalBand cannot be more than 7')
          return false;
        }

        if (configi.totalBand==7){
          throw new Error('totalBand cannot be more than 7')
          return false;
        }

        if (configi.totalBand<3 || defaultConfig.totalBand<3){
           throw new Error('totalBand cannot be less than 3')
           return false;
        }
        this.#dynamic_id = "resistor_";
          var $vm = this;
         //console.log(this.instance);
      }

     /* elRemover(){
          let $vm = this;
        $('.remover').dblclick(function(){
          $(this).parent().remove();
          let idp = $(this).parent().attr('id');
          setTimeout(function(){                             
             $vm.instance.remove(idp);
          }, 50)
        });         
      }*/
      assignRel(){
        digitalResistorId++;
        $('#'+this.#dynamic_id).attr('rel',digitalResistorId);
      }
      resistor(){
        //console.log(this.#container_id	);
        let h = this.config.height;
        let wt = this.config.width;
        let resistorMiddle = $('#'+this.#container_id	);
        this.#dynamic_id += Math.floor((Math.random() * 1000) + 1);
        var $vm = this,checkmate=0;

        //resistor capacity calculator
         let rValue='', result=[],colorValue;
         checkmate = 0;
         for (var i = 0; i < this.config.totalBand; i++) {
            if (this.config.band.length == 6) {
              if (i<4){ 
                colorValue = this.searchObject(this.config.noramalBandColor, this.config.band[i]);
                if (colorValue != null) {
                  rValue += colorValue;
                }
              }else{
                checkmate++;
                rValue = Number(rValue);
                 if (checkmate===1) {
                    colorValue = this.searchObject(this.config.multimeterColor, this.config.multiplier);
                    if (colorValue != null) {
                      rValue *= colorValue;
                    }
                    result['value']= rValue;
                    //result.push({value:rValue});
                 }
                 if(checkmate===2){
                  //tolerance
                    colorValue = this.searchObject(this.config.toleranceColor, this.config.tolerance);
                    result['html_code'] = 177;
                    result['tolerance']= tolerance:colorValue;
                    /*result.push({html_code:177});
                    result.push({tolerance:colorValue});*/
                 }
                 if (checkmate===3){
                    colorValue = this.searchObject(this.config.temperatureColor, this.config.temperature);                    
                    result['temperature']= colorValue;
                    //result.push({temperature:colorValue});
                 }
              }
            }else{        
              if (i<this.config.band.length){ 
                colorValue = this.searchObject(this.config.noramalBandColor, this.config.band[i]);
                if (colorValue != null) {
                  rValue += colorValue;
                }
              }else{
                checkmate++;
                rValue = Number(rValue);
                 if (checkmate===1) {
                    colorValue = this.searchObject(this.config.multimeterColor, this.config.multiplier);
                    if (colorValue != null) {
                      rValue *= colorValue;
                    }
                    result.push({value:rValue});
                    result['value']= rValue;

                 }else{
                  //tolerance
                    colorValue = this.searchObject(this.config.toleranceColor, this.config.tolerance);
                    result['html_code'] = 177;
                    result['tolerance']= tolerance:colorValue;
                    /*result.push({html_code:177});
                    result.push({tolerance:colorValue});*/
                 }
              }
            }
         }


        let resistorComponent = '<div id="'+this.#dynamic_id+'" data-value=\''+JSON.stringify(result)+'\' class="dragme" style="display: flex;flex-wrap: wrap;position: absolute;height: '+h+'px;width: '+wt+'px;align-items: center;"><div class="turnhandle" style="width: 100%; height: 10px;background: #efefef; box-shadow: -2.3px 0.5px 0.2px 1.2px #555;border-radius: 2px;"></div>';
          resistorComponent += '<div style="border-radius: 10px;height: '+h+'px;width: 70%;background: #edd;position: absolute;left: 12%;"></div>';
          resistorComponent += '<div class="remover"   style="cursor:pointer;background:red;color:white;display:none;position:absolute;top:-35px;left:20%;border-radius:50%;flex-wrap:wrap;justify-content:center;align-items:center; width:25px;height:25px;font-size:1.3em;z-index:2;">&times</div>';
          resistorComponent += '<div class="remover2" rel="'+this.#dynamic_id+'"   style="cursor:pointer;background:red;color:white;display:none;position:absolute;top:-35px;left:50%;border-radius:50%;flex-wrap:wrap;justify-content:center;align-items:center; width:25px;height:25px;font-size:1em;z-index:2;">&#x2702;</div>';
         
          let space = 5, mSpace =0;
          checkmate=0;
          let startSpace = 24;
          if (wt>190) {
            startSpace = 30;
            space = 15;
          }
          if (wt<90) {
            startSpace = 25;
            space = 10;
          }
          

          if (this.config.totalBand != this.config.band.length+2) {
            console.log("invalid number of band (number of band mismatch): totalBand must be === number of color band provided in band array ");
            return false;
          }
          let w = 4;
          if (wt<40) {
            let w = 2.5;
          }

          for (var i = 0; i < this.config.totalBand; i++) {
            if (i<this.config.band.length){              
              if (i==0) {
                resistorComponent  +='<span title="'+this.config.band[i]+'" style="width: '+w+'%;height: '+h+'px;background: '+this.config.band[i]+';position: absolute;z-index: 1;left: '+startSpace+'%;"></span>';
                mSpace += space+startSpace;
              }else{
                resistorComponent  +='<span title="'+this.config.band[i]+'" style="width: '+w+'%;height: '+h+'px;background: '+this.config.band[i]+';position: absolute;z-index: 1;left: '+mSpace+'%;"></span>';              
                mSpace += space;                
              }
            }else{
              checkmate++;
              if (checkmate===1) {
                //multiplier
                resistorComponent  +='<span title="'+this.config.multiplier+'" style="width: '+w+'%;height: '+h+'px;background: '+this.config.multiplier+';position: absolute;z-index: 1;right: '+mSpace+'%;"></span>';       
                mSpace = space+mSpace;
              }else if(checkmate===2){
                //tolerance
                resistorComponent  +='<span title="'+this.config.tolerance+'" style="width: '+w+'%;height: '+h+'px;background: '+this.config.tolerance+';position: absolute;z-index: 1;right: '+mSpace+'%;"></span>';       
                //mSpace = startSpace+ mSpace;
              }
            }
          }
          let nh = h +10;
          resistorComponent +=' <div style="height: '+nh+'px;width: 15%;background: #edd;position: absolute;left: 12%;border-top-right-radius: 100px;border-bottom-right-radius: 100px; border-top-left-radius: 30px; border-bottom-left-radius: 30px;"></div><div style="height: '+nh+'px;width: 15%;background: #edd;position: absolute;right: 12%;border-top-right-radius: 30px;border-bottom-right-radius: 30px; border-top-left-radius: 100px; border-bottom-left-radius: 100px;"></div> </div>';
          //let div = document.createElement('div');
          resistorMiddle.append(resistorComponent);


        
         return result;

      }

     searchObject(object, key) {
           for(var j in object){
            if (j === key) {              
                return object[j];              
            }
           }
         }
      dragging(){
         $( ".dragme" ).draggable();
      }
  
      //rotator the resistor
      turnhandler(){
         var dragging = false,
        target_wp,
        o_x, o_y, h_x, h_y, last_angle;
        $('.turnhandle').mousedown(function (e) {
            h_x = e.pageX;
            h_y = e.pageY; // clicked point
            e.preventDefault();
            e.stopPropagation();
            dragging = true;
            target_wp = $(e.target).closest('.dragme');
            if (!target_wp.data("origin")) target_wp.data("origin", {
                left: target_wp.offset().left,
                top: target_wp.offset().top
            });
            o_x = target_wp.data("origin").left;
            o_y = target_wp.data("origin").top; // origin point
            
            last_angle = target_wp.data("last_angle") || 0;
        })

        $(document).mousemove(function (e) {
            if (dragging) {
                var s_x = e.pageX,
                    s_y = e.pageY; // start rotate point
                if (s_x !== o_x && s_y !== o_y) { //start rotate
                    var s_rad = Math.atan2(s_y - o_y, s_x - o_x); // current to origin
                    s_rad -= Math.atan2(h_y - o_y, h_x - o_x); // handle to origin
                    s_rad += last_angle; // relative to the last one
                    var degree = (s_rad * (360 / (2 * Math.PI)))+10;
                    target_wp.css('-moz-transform', 'rotate(' + degree + 'deg)');
                    target_wp.css('-moz-transform-origin', '50% 50%');
                    target_wp.css('-webkit-transform', 'rotate(' + degree + 'deg)');
                    target_wp.css('-webkit-transform-origin', '50% 50%');
                    target_wp.css('-o-transform', 'rotate(' + degree + 'deg)');
                    target_wp.css('-o-transform-origin', '50% 50%');
                    target_wp.css('-ms-transform', 'rotate(' + degree + 'deg)');
                    target_wp.css('-ms-transform-origin', '50% 50%');
                }
            }
        }) // end mousemove
        
        $(document).mouseup(function (e) {
            dragging = false
            var s_x = e.pageX,
                s_y = e.pageY;
            
            // Saves the last angle for future iterations
            var s_rad = Math.atan2(s_y - o_y, s_x - o_x); // current to origin
            s_rad -= Math.atan2(h_y - o_y, h_x - o_x); // handle to origin
            s_rad += last_angle;
          //  target_wp.data("last_angle", s_rad);
        })
      }
    getId(){
      return this.#dynamic_id;
    }
      //jsplumb
  /*    connectify(){
        var $vm = this;
        //console.log($vm.#dynamic_id);
        jsPlumb.ready(function () {

         
            $vm.instance.batch(function () {
  
                    var exampleDropOptions = {
                        tolerance: "touch",
                        hoverClass: "dropHover",
                        activeClass: "dragActive"
                    };

                    var exampleColor = "#000";                   
                    var exampleEndpoint = {
                         endpoint: "Rectangle",
                        paintStyle: { width: 10, height: 10, fill: exampleColor},
                        isSource: true,
                        scope: "scope",
                        connectorStyle: { stroke: exampleColor, strokeWidth: 2 },
                        connector: ["Bezier", { curviness: 63 } ],
                        maxConnections: 3,
                        isTarget: true,
                        uuid:'negative'+$vm.#dynamic_id,
                         beforeDrop: function (params) {
                            //console.log(params);
                            return true ; //return confirm("Connect " + params.sourceId + " to " + params.targetId + "?");
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
                        paintStyle: { width: 10, height: 10, fill: color2},
                        isSource: true,                        
                        scope: "scope",
                        connectorStyle: { stroke: color2, strokeWidth: 2 },
                        connector: ["Bezier", { curviness: 63 } ],
                        maxConnections: 3,
                        isTarget: true,
                        target:"scope",
                        uuid:'positive'+$vm.#dynamic_id,                                                
                         beforeDrop: function (params) {
                            //console.log(params);
                            return true ;//confirm("Connect " + params.sourceId + " to " + params.targetId + "?");
                        },
                        dropOptions: exampleDropOptions
                    };
                    $vm.instance.addEndpoint($vm.#dynamic_id, { anchor:  [0, 0.5, 0, 1]}, exampleEndpoint);
                    $vm.instance.addEndpoint($vm.#dynamic_id, { anchor:  [1, 0.5, 0, 1] }, exampleEndpoint2);
                   
                   $vm.instance.draggable($(".dragme"),{});
            });
            jsPlumb.fire("jsPlumbDemoLoaded", $vm.instance);
      });
    }*/

  }