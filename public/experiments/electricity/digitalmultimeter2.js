const defaultConfiguration = {
	value:0,
	mode: 0,
	range: 2,
	type:'dc'
};

class digitalMultimeter{
		
		constructor(containerID,config = {}){
			//if (!containerID) throw new Error("invalid container id");      
			this.config = {...defaultConfiguration, ...config};
			this.container_id = containerID;
			this.dynamic_mode_id = "";
			this.dynamic_range_id = "";
			this.dynamic_id = "";
			this.dynamic_class_btn = "";
			window.dataObject = { 
				readerStateType:'off',
				stateType: 'off',
				value:0
			};

			/*window.dataObject2 = {
				data: 0,
			}*/
			this.valueholder_id = "";
			var $vm = this;		
			this.exampleEndpoint ="";
			this.exampleEndpoint2 ="";

           

		}


		modeSlider(){
			let $vm = this;
			$('#'+this.dynamic_range_id).change(function(){				
				$('#'+$vm.dynamic_mode_id).html($(this).val());
				$(this).mousemove(function(){
					$('#'+$vm.dynamic_mode_id).html($(this).val());

				})
			});
		}
		tyepSwitch(){
			let $vm = this;
			$('.'+this.dynamic_class_btn).click(function(){
				$('.'+$vm.dynamic_class_btn).removeClass('btnDigitalActivate');
				$(this).addClass('btnDigitalActivate');
			})
		}
		executer(type){
				let main = window.digitalComponentsData.multireader.main;
				let parallel = window.digitalComponentsData.components.parallel;
				let series = window.digitalComponentsData.components.series;
			if (type == 'ohms'){														
					if (main[0] != main[1]) {						
						//series
						let values = [], relvalue=0;
							for (let i = 0; i < series[index].length; i++) {
								 values.push(JSON.parse($('#'+series[index][i]).attr('data-value')).value);	
							}	
							values.forEach((a)=>{		
								relvalue += a
							})
							dataObject.value = relvalue.toFixed(2);

					}else{						
						//parallel						
						let index = -1;
						for(let i = 0; i < parallel.length; i++) {
							if (parallel[i].includes(main[0])){								
								index = i
								break;
							}
						}
						
						if(index == -1){
							dataObject.value = JSON.parse($('#'+main[0]).attr('data-value')).value;							
						}else{
							let values = [], relvalue=0;
							for (let i = 0; i < parallel[index].length; i++) {
								 values.push(JSON.parse($('#'+parallel[index][i]).attr('data-value')).value);	
							}	
							//alert(32)
							values.forEach((a)=>{		
								relvalue +=  1/a
							})							
							relvalue = 1/relvalue;							
							dataObject.value = relvalue.toFixed(2);
						}
					}
			}else if(type =='ac'){

			}else if(type == 'dc'){

				if (main[0] != main[1]) {						
						//series
					let values = [], relvalue=0;
						for (let i = 0; i < series[index].length; i++) {
							 values.push(JSON.parse($('#'+series[index][i]).attr('data-value')).value);	
						}	
						values.forEach((a)=>{		
							relvalue += a
						})
						dataObject.value = relvalue.toFixed(2);

					}else{						
						//parallel			
						if(main[0].split('_')[0] == 'battery'){

							let index = -1;
							for(let i = 0; i < parallel.length; i++){
								if (parallel[i].includes(main[0])){								
									index = i
									break;
								}
							}
							
							if(index == -1){
								dataObject.value = JSON.parse($('#'+main[0]).attr('data-value')).value;							
							}else{
								let values = [], relvalue=0;
								for (let i = 0; i < parallel[index].length; i++) {
									 values.push(JSON.parse($('#'+parallel[index][i]).attr('data-value')).value);	
								}	
								//alert(32)
								values.forEach((a)=>{		
									relvalue +=  1/a
								})							
								relvalue = 1/relvalue;							
								dataObject.value = relvalue.toFixed(2);
							}
						}else{
							alert("Error: connection not on dc");
						}
					}

			}else{
				dataObject.valuev='0:00';
			}
		}
		reader(){
			this.dynamic_mode_id += 'mode_';
			this.dynamic_range_id += 'range_';
			this.dynamic_class_btn += 'btnDigital_';
			this.valueholder_id += 'htc_';
			this.dynamic_id += 'reader_';

			let $vm = this;
			this.valueholder_id += Math.floor((Math.random() * 1000) + 1);
			this.dynamic_mode_id += Math.floor((Math.random() * 1000) + 1);
			this.dynamic_range_id += Math.floor((Math.random() * 1000) + 1);
			this.dynamic_class_btn += Math.floor((Math.random() * 1000) + 1);
			this.dynamic_id += Math.floor((Math.random() * 1000) + 1);
			var cont_holder =  '<div id="'+this.dynamic_id+'" class="dragme" style="background: #fff;box-shadow: 0px 0px 4px #ccc; width: 200px; border-radius: 10px; height: 120px;padding: 12px 8px; position: absolute;display: flex;user-select: none;">';
          		cont_holder += '<div class="remover"   style="cursor:pointer;background:red;color:white;display:none;position:absolute;top:-35px;left:30%;border-radius:50%;flex-wrap:wrap;justify-content:center;align-items:center; width:35px;height:35px;font-size:1.3em;z-index:2;">&times</div>';
          		cont_holder += '<div  class="remover2" rel="'+this.dynamic_id+'"   style="cursor:pointer;background:red;color:white;display:none;position:absolute;top:-35px;left:50%;border-radius:50%;flex-wrap:wrap;justify-content:center;align-items:center; width:35px;height:35px;font-size:1.3em;z-index:2;">&#x2702;</div>';
				cont_holder += '<div style="display: flex;flex-direction: column;width: 100%;">';

				cont_holder += '<div id="'+this.dynamic_mode_id+'" style="font-size: 300%;display: flex;justify-content: center;flex-wrap: wrap;align-items: center; font-stretch: condensed; font-family: \'digital-clock\', sans-serif;background-image: radial-gradient(closest-side at 50%  20%,#fff,#eee); width: 100%;border-radius: 10px;height: 70%;"><span style="font-family:inherit;color:#bbb;">000:00</span></div>';
				/*cont_holder += '<span id="'+this.dynamic_mode_id+'" title="mode" style="position: absolute;font-size: 1em; left: 8%;bottom: 42px;font-family:\'digital-clock\'">0</span>';*/
				/*cont_holder += '<input type="range" orient="vertical" class="digitalSlider" id="'+this.dynamic_range_id+'" value="0" min="0" max="220" style=""></div>';*/
				cont_holder += '<input type="number" value="0"  style="display:none;" id="'+this.valueholder_id+'">'		
				cont_holder += '<div style="display: flex;justify-content:center; flex-wrap: wrap; align-items: center;margin: 0px 2px;">';
				cont_holder += '<button onclick="digitalState(\'off\',this);"  class="btnDigital '+this.dynamic_class_btn+' btnDigitalActivate"><span> Off</span></button>'; //Off;
				cont_holder += '<button onclick="digitalState(\'ac\',this);" class="'+this.dynamic_class_btn+' btnDigital "><span>AC</span><span class="symbolDigital ">&#126;</span>';//ac button
				cont_holder += '</button ><button onclick="digitalState(\'dc\',this);" class="'+this.dynamic_class_btn+' btnDigital"><span>DC</span><span class="symbolDigital ">&#95;</span></button>'; //dc button
				cont_holder += '<button onclick="digitalState(\'ohms\',this);" class="btnDigital '+this.dynamic_class_btn+'"><span> &#x2126;</span></button>'; //ohms button;
				//cont_holder += '<button class="btnDigital '+this.dynamic_class_btn+'"><span> &#x2126;</span></button>'; //ohms button;
				//cont_holder += '<button class="btnDigital '+this.dynamic_class_btn+'"><span> &#x2126;</span></button>'; //ohms button;
				cont_holder += '</div></div>';			
			$('#'+this.container_id).append(cont_holder);//renderer
			
			window.digitalState = (a, e) => {
				//e.setAttribute("draggable",false);
				//this.attr('draggable','false');
				dataObject.readerStateType=a;	
				let value = 0;
				
				this.executer(a)
				//this is where turning off reader take action
				if (a =='off') {
					clearDigitalMultimeter(true);
				}		
			} //make digitalState function global
			window.clearDigitalMultimeter = (c)=>{
				if (c == true) {				
					dataObject.readerStateType ='off';				
					$('#'+this.dynamic_mode_id).html('<span style="font-family:inherit;color:#bbb;">000:00</span>');
				}else{					
					clearInterval(this.digitCounter);
					$('#'+this.dynamic_mode_id).html('000:00');					
				}
				

			}

			window.digitalMultimerupdate = (v,type)=>{					
			/*	let nnew, nnold;
				setInterval(function(){
					nnew = ('#'+this.valueholder_id).val();
				},10);*/	
				var Digitalconter=0;			
				//if (range) {}//range for decimal
				var $vm = this;
				
				if (dataObject.readerStateType != 'off') {						
					//if (type != this.dataObject.stateType) {}		
					let decimalPt = [];
					if (v < 100) {
						decimalPt = [0.2,0.3];
					}else if(v < 200){
						decimalPt = [9.3,5.5, 8.4,7.6];
					}else if(v < 500){
						decimalPt = [15.06,20.4,10.3,100.7];
					}else if(v<1100){
						decimalPt = [50.55,102.82,120.01,140.88,400.77];
					}else if(v<10000){
						decimalPt = [1500.3,500.5, 1000.4,2000.6];
					}else if (v<50000){
						decimalPt = [1000.3,1000.5, 1000.4,2000.6];						
					}else{
						//console.log(323232323);						
						decimalPt = [10000.3,2000.5, 4000.4,2000.6];						
					}

				 	var digitCounter = setInterval(function(inv){					 	
				 		decimalPt = $vm.shuffle(decimalPt);					
				 		/*if (decimalPt.length == 2) {				 			
							Digitalconter += decimalPt[Math.round(Math.random())];
				 		}			 		*/
						Digitalconter += decimalPt[Math.abs(Math.floor(Math.random() * decimalPt.length))];
						//console.log(Math.abs(Math.floor(Math.random()* decimalPt.length)))							
						if (Digitalconter<=v) {
							try{
								if (v < 999){
									$('#'+$vm.dynamic_mode_id).html((Digitalconter.toFixed(2)))
								}else{							

									$('#'+$vm.dynamic_mode_id).html((Digitalconter/1000).toFixed(2)+"<span style='font-size:0.5em;'>k<span>")							
								}

							}catch(err){
								console.log(err);
							}
						}else{
							clearInterval(digitCounter);
						}			
						if (dataObject.readerStateType =="off") {
							clearDigitalMultimeter(true);
						}/*else if(dataObject.readerStateType != dataObject.stateType) {
							clearDigitalMultimeter(false)
						}*/
						if (dataObject.value == 0) {
							clearDigitalMultimeter(false);
						}
					},60);
				}
			}
		}

		//
		setValue(newvalue){
			dataObject.value = newvalue;
		}

		//callback function wen data changes
		watchOut(){
			let $vm = this;
			watch(dataObject,'readerStateType', function(){

				//console.log( dataObject )
				/*if (dataObject.stateType == dataObject.readerStateType) {
					digitalMultimerupdate(dataObject.value);
				}else{						
					if (dataObject.readerStateType == "off") {
						clearDigitalMultimeter(true);
					}else{
						clearDigitalMultimeter(false);
					}
				}*/
				if (dataObject.readerStateType != 'off') {
					$vm.executer(dataObject.readerStateType);
					digitalMultimerupdate(dataObject.value);
				}else{						
					if (dataObject.readerStateType == "off") {
						clearDigitalMultimeter(true);
					}else{
						clearDigitalMultimeter(false);
					}
				}
			})//		
			watch(dataObject,'value', function(){					
				if (dataObject.readerStateType != 'off'){					
				//if (dataObject.readerStateType != 'off' && dataObject.stateType == dataObject.readerStateType){
					digitalMultimerupdate(dataObject.value);				
				}
			})
		}

		shuffle(array) {
		  var currentIndex = array.length, temporaryValue, randomIndex;

		  // While there remain elements to shuffle...
		  while (0 !== currentIndex) {

		    // Pick a remaining element...
		    randomIndex = Math.floor(Math.random() * currentIndex);
		    currentIndex -= 1;

		    // And swap it with the current element.
		    temporaryValue = array[currentIndex];
		    array[currentIndex] = array[randomIndex];
		    array[randomIndex] = temporaryValue;
		  }

		  return array;
		}
		
		getId(){
			return this.dynamic_id;
		}
		//jsplumb
      connectify(){
     //   var $vm = this;
        //console.log($vm.dynamic_id);
      /*  jsPlumb.ready(function () {

         
            $vm.instance.batch(function () {
  
                    var exampleDropOptions = {
                        tolerance: "touch",
                        hoverClass: "dropHover",
                        activeClass: "dragActive"
                    };

                    var exampleColor = "#000";                   
                    $vm.exampleEndpoint = {
                         endpoint: "Rectangle",
                        paintStyle: { width: 10, height: 10, fill: exampleColor},
                        isSource: true,
                        scope: "scope",
                        connectorStyle: { stroke: exampleColor, strokeWidth: 2 },
                        connector: ["Bezier", { curviness: 63 } ],
                        maxConnections: 3,
                        isTarget: true,
                        uuid:'negative'+$vm.dynamic_id,
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
                    $vm.exampleEndpoint2 = {
                        endpoint: "Rectangle",
                        paintStyle: { width: 10, height: 10, fill: color2},
                        isSource: true,                        
                        scope: "scope",
                        connectorStyle: { stroke: color2, strokeWidth: 2 },
                        connector: ["Bezier", { curviness: 63 } ],
                        maxConnections: 3,
                        isTarget: true,
                        target:"scope",
                        uuid:'positive'+$vm.dynamic_id,                                                
                         beforeDrop: function (params) {
                            //console.log(params);
                            return true ;//confirm("Connect " + params.sourceId + " to " + params.targetId + "?");
                        },
                        dropOptions: exampleDropOptions
                    };
                    $vm.instance.addEndpoint($vm.dynamic_id, { anchor:  [0, 0.5, 0, 1]}, $vm.exampleEndpoint);
                    $vm.instance.addEndpoint($vm.dynamic_id, { anchor:  [1, 0.5, 0, 1] }, $vm.exampleEndpoint2);
                   
                   $vm.instance.draggable($(".dragme"),{});
            });
            jsPlumb.fire("jsPlumbDemoLoaded", $vm.instance);
      });*/
    }


}