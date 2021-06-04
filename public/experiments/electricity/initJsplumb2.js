
class initJsplumb{
	_instance;
	constructor(endpointRemoverClassName){
		this.ercn = endpointRemoverClassName;
		this.objArray = [];
		window.digitalMode='off';
		window.jsInitArray = {
			data:[],
		};
		window.digitalComponentsData = {
			components:{
				series:[],
				parallel:[]
			},
			resistors: {
				parallel:[],
				series:[]
			},
			battery: {
				parallel:[],
				series:[]
			},
			load:{
				ac:0,
				dc:0
			},
			multireader:{
				main:[],
				fake:[],
			},
			reader:{
				ac:0,
				dc:0,
				ohms:0
			}
		};
		/*window.connectionBank ={
			ri
		};*/
		this.initConnection = 1;
		this.ArrConn =  [];
		this.instance = jsPlumb.getInstance({
            DragOptions: { cursor: 'pointer', zIndex: 20000 },
            PaintStyle: { stroke: '#000' },
            EndpointHoverStyle: { fill: "orange" },
            HoverPaintStyle: { stroke: "orange" },
            EndpointStyle: { width: 15, height: 15, stroke: '#666' },
            Endpoint: "Rectangle",
            Anchors: ["bottomLeft", "bottomRight"],
            Container: "canvas"
        });
        jsPlumb.fire("jsPlumbDemoLoaded", this.instance);     
	}

  	confirm_parallel_connection(connections=null,equip_id1=null,equip_id2=null,expected_terminal_type=null ){
  		
  		if(connections=null || equip_id1==null || equip_id2==null ||expected_terminal_type== null ){
    		throw "connections,equip_id1,equip_id2,expected_terminal_type parameters cannot be null: confirm_parallel_connection";
    	}
  		
  		let connection;
         for (let i = 0; i < connections.length; i++) {
         	connection = connections[i];
         	if (connection.sourceId == equip_id1 && connection.sourceType == expected_terminal_type && connection.targetId == equip_id2 && connection.targetType== expected_terminal_type || connection.sourceId == equip_id2 && connection.sourceType == expected_terminal_type && connection.targetId == equip_id1 && connection.targetType== expected_terminal_type) 
         	{
         		return true;
         	}
     	}
        return false;

    }

    confirm_series_connection(connections= null,equip_id,expected_terminal_type=null){
    	
    	if(connections=null || equip_id==null || expected_terminal_type== null){
    		throw "connections,equip_id and expected_terminal_type parameters cannot be null: confirm_series_connection";
    	}

  		let connection;
        for (let i = 0; i < connections.length; i++) {
         	connection = connections[i];         	
         	if (connection.sourceId == equip_id && connection.sourceType == expected_terminal_type || connection.targetId == equip_id && connection.targetType== expected_terminal_type) 
         	{
         		return true;
         	}         
     	}
        return false;

    }

    check_reader_connection(connections){    	
  		let connection,state=0, terminals = "";
  		let junctions = {terminal1:{targetId:'',sourceType:''}, terminal2:{targetId:'',sourceType:''}, fullConnect:false};    	

    	for (let i = 0; i < connections.length; i++) {
    		connection = connections[i];     
    		if (state<3){
			
	    		if (connection.sourceId.split("_")[0] == "reader"){
	    			if (state == 1) {		    			
		    			//if reader is on the source side		    			
		    			junctions.terminal2.targetId = connection.targetId;
		    			junctions.terminal2.sourceType = connection.sourceType;
		    			state++;

		    			if (junctions.terminal1.targetId == junctions.terminal2.targetId) {
		    				junctions.fullConnect = true;
		    			}
	    			}else if(state == 0){

		    			junctions.terminal1.targetId = connection.targetId;
		    			junctions.terminal1.sourceType = connection.sourceType;
		    			state++;

	    			}

	    		}

	    		if(connection.targetId.split("_")[0] == "reader"){    			
		    		if (state == 1) {		    
		    			
	    				//if reader is on the source side
			    		junctions.terminal2.targetId = connection.sourceId;
		    			junctions.terminal2.sourceType = connection.targetType;		    			
			    		state++;    				    		
		    			if (junctions.terminal1.targetId == junctions.terminal2.targetId) {
		    				junctions.fullConnect = true;
		    			}
		    		}else if(state == 0){		    			
		    			//if reader is on the target side
		    			junctions.terminal1.targetId = connection.sourceId;
		    			junctions.terminal1.sourceType = connection.targetType;
		    			state++;    			
		    		}
	    			
	    		}


    		}
    		if (state == 2) {
    			break;
    		}
		}
    	return junctions;
    }
    getIndex(main, elt) {

	  var index1=-1, index2=-1;	  
	  for(var n =0; n<main.length; n++){
	  	for(var m =0; m<main[n].length; m++){
	    	if(main[n][m] == elt){
	         index2 = m;
	         m = main[n].length;
	        }    	
	    }
	    if(index2 != -1){
	    	index1 = n;
	        n = main.length
	    }    
	  }
	  return [index1, index2];
	}
    check_connection(connectionsData, $nn){


    	let datachecking;

    	
    		datachecking = this.check_reader_connection(connectionsData);
    	//console.log({named:datachecking});  
    		var multireader_x = digitalComponentsData.multireader.main;
    		var parallel = window.digitalComponentsData.components.parallel,indexes=-1,rstype,rst,
    		    series   = window.digitalComponentsData.components.series;    		        		
    		if(multireader_x.length == 2){    			
    			if(multireader_x[0] != multireader_x[1]){
    				//series     				
    			}else{      				
    				//parallel
    				 try{

    					indexes = this.getIndex(parallel, multireader_x[0]);
    				if (indexes[1] == -1) {
    						rstype = multireader_x[0].split('_')[0];
    					rst = JSON.parse($('#'+multireader_x[0]).attr('data-value'));
		    			
    					if (rstype == 'resistor'){
			    			dataObject.stateType = "ohms";    				
			    			dataObject.value = rst.value;    				 			    		
    					}else if(rstype == 'battery'){
    						dataObject.stateType = "dc";    				
			    			dataObject.value = rst.value;    				 			    		
    					}

    				}
    				 }catch(err){
    				 	console.log(err)
    				 }
    			
    				//digitalMultimerupdate();
    			}

    		}
    		/*if(datachecking.fullConnect){    			
    		}    	*/
    }

	batchjsplumb(objArray){
		var $vm = this;
	    //if (objArray.length >0) {
	    	this.objArray = objArray;
			// remove element and endpoint
	        $('.'+this.ercn).dblclick(function(){	        	
	            $(this).parent().remove();
	            let idp = $(this).parent().attr('id');         
	          
	            setTimeout(function(){                             
	               $vm.instance.removeAllEndpoints(idp);
	            }, 50)

	            //reframe objArray for next use
	            let index = window.jsInitArray.data.indexOf(idp);
			    if (index >= 0) {
	  				window.jsInitArray.data.splice( index, 1 );
				}
					console.log(window.jsInitArray.data);
	        });         
	        if (this.initConnection==1){
        		var connections = [];
        		this.initConnection++;
        		console.log({'initConnection':this.initConnection});
	        }
  			var showConnectionInfo = function (s) {
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
                checkReaderconnections = function(connection){
                	var multireaderx = window.digitalComponentsData.multireader;
                	if (multireaderx.main.length >0){
                		if (multireaderx.main[0]) {}
                	}
                	return true;
                },
                confirmParallel= function(connectionsx, currenctConnection, x){
                	var c = 0;   
                	try{

            		if (connectionsx.sourceId == currenctConnection.sourceId && connectionsx.sourceType != currenctConnection.sourceType && connectionsx.sourceType != currenctConnection.targetType) {                
            			if (connectionsx.targetId == currenctConnection.targetId && connectionsx.sourceType != currenctConnection.sourceType && connectionsx.sourceType != currenctConnection.targetType) {                		                		
            				c = 1
            				return true;
            			}
            		}

            		if (connectionsx.targetId == currenctConnection.sourceId && connectionsx.sourceType != currenctConnection.sourceType && connectionsx.sourceType != currenctConnection.targetType) {                
            			if (connectionsx.sourceId == currenctConnection.targetId && connectionsx.sourceType != currenctConnection.sourceType && connectionsx.sourceType != currenctConnection.targetType) {                		                		
            				c = 1
            				return true;
            			}
            		}	                
            		if (connectionsx.sourceId == currenctConnection.targetId && connectionsx.sourceType != currenctConnection.sourceType && connectionsx.sourceType != currenctConnection.targetType) {                
            			if (connectionsx.targetId == currenctConnection.sourceId && connectionsx.sourceType != currenctConnection.sourceType && connectionsx.sourceType != currenctConnection.targetType) {                		                		
            				c = 1
            				return true;
            			}
            		}	  
            		if (connectionsx.targetId == currenctConnection.targetId && connectionsx.sourceType != currenctConnection.sourceType && connectionsx.sourceType != currenctConnection.targetType) {                
            			if (connectionsx.sourceId == currenctConnection.sourceId && connectionsx.sourceType != currenctConnection.sourceType && connectionsx.sourceType != currenctConnection.targetType) {                		                		
            				c = 1
            				return true;
            			}
            		}	      
                	}catch(err){
                		console.log(err)
                	}            	                	
            		return false;           	                			                		                	                   		                	               
                },
                objectType = function(elementConnections){      
	                console.log(elementConnections);                     

                	var elementSourceType ='',elementTargetType='', elementSourceName='',
                	elementTargetName='', sourceId='', targetId='',series,parallel,sr=-1,sr2=-1,pr=-1,pr2=-1,pr3=-1, lsourceId='',ltargetId='',
                	ltargetType='',lsourceType='',
                	lastIndex = elementConnections.length-1, multireader, typeTrack=-1;
                		
                		lsourceId = elementConnections[lastIndex].sourceId;
                		ltargetId = elementConnections[lastIndex].targetId; 
                		ltargetType = elementConnections[lastIndex].targetType;
                		lsourceType = elementConnections[lastIndex].sourceType;
                		var truechecker = true;
                		if (lsourceId.split('_')[0] == 'reader' || ltargetId.split('_')[0] == 'reader') {    
                			truechecker =  false;
                		}          			
                		if(truechecker) {                	

                			for (var e = 0; e < elementConnections.length; e++) {                				                				
	                			sourceId = elementConnections[e].sourceId;
	                			targetId = elementConnections[e].targetId;
	                			elementSourceName = sourceId.split('_')[0];
	                			elementSourceType = elementConnections[e].sourceType
	                			elementTargetType = elementConnections[e].targetType
                				//elementConnections[i]
                				truechecker = true;
                				if (sourceId.split('_')[0] == 'reader' || targetId.split('_')[0] == 'reader'){
                					truechecker = false;
                				}
	                			if (truechecker){	                				
	                				if (elementTargetType != elementSourceType) {	                				

	                					//push to series bank
	                					series = window.digitalComponentsData.components.series
	                					if (series.length >0) {	                				
	                						sr =-1;	                						
		                					for (var s = 0; s < series.length; s++) {	   
		                						if (series[s].includes(targetId) || series[s].includes(sourceId)) {
		                							if(sr == -1) {
			                							sr = s;		    
		                							}else{
		                								sr2 = s;	
		                								break;
		                							}
		                						}		                						
		                					}
		                					if (sr != -1 && sr2 != -1) {		                					              					
		                						series.push([...series[sr],...series[sr2]]);		                						
		                						series.splice(sr2,1);
		                						series.splice(sr,1);
		                					}else{

			                					if (sr != -1 && sr2 == -1) { 		                						
			                						//series connection already started
			                						if (!series[sr].includes(targetId)){
			                							series[sr].push(targetId); //add to series bank
			                						}
			                						if (!series[sr].includes(sourceId)){
			                							series[sr].push(sourceId); //add to series bank
			                						}
			                					}else{
			                						//new series connection 
		                							series.push([sourceId, targetId]) //add new series connection to bank
			                					}
		                					}

	                					}else{
	                						//new series connection 
	                							series.push([sourceId, targetId]) //add new series connection to bank
	                					}
	                				}else{
	                					//push to parallel bank
	                					parallel = window.digitalComponentsData.components.parallel	   
	                					if (confirmParallel(elementConnections[e],elementConnections[lastIndex], lastIndex)){
		                						alert(1)
	                									                					
		                					if (parallel.length >0) {
		                						alert(4)
		                						pr =-1; pr2 =-1;pr3=-1;		                				
			                					for (var p = 0; p < parallel.length; p++) {
			                						if (parallel[p].includes(targetId) || parallel[p].includes(sourceId)) {		                									                						
			                							pr3 = -1;   						                											
			                							if(pr == -1) {
				                							pr = p;		    
			                							}else{
			                								pr2 = p;	
			                								break;
			                							}     
			                						}
			                						pr3 = 1;
			                					}		                								                					
			                					if (pr != -1 && pr2 != -1) {		                					              					
			                						parallel.push([...parallel[pr],...parallel[pr2]]);		                						
			                						parallel.splice(pr2,1);
			                						parallel.splice(pr,1);
			                					}else if(pr == -1 && pr2 == -1){	
			                						parallel.push([sourceId, targetId]) //add new parallel connection to bank				                				
			                						alert(33)
			                					}else if(pr != -1){
			                						//parallel connection already started
			                						if (!parallel[pr].includes(targetId)){
			                							parallel[pr].push(targetId); //add to parallel bank
			                						}
			                						if (!parallel[pr].includes(sourceId)){
			                							parallel[pr].push(sourceId); //add to parallel bank
			                						}		
			                					}
		                					}else{
		                						//new parallel connection 
		                						parallel.push([sourceId,targetId]) //add new parallel connection to bank
		                						break;		                						
		                					}
	                					}
	                				}
	                			}
                			}
                		}else{                			  
                			multireader = window.digitalComponentsData.multireader;                			
                			if (lsourceId.split('_')[0] == 'reader' && ltargetId.split('_')[0] == 'reader'){
                					$vm.instance.deleteConnectionsForElement(lsourceId);
                			}else{                				
                				if (lsourceId.split('_')[0] != 'reader') {                				
                					if(multireader.main.length < 3){  
                						if (lsourceType == ltargetType){                							
                							multireader.main.push(lsourceId);
                						}else{
                							alert('Invalid connection on Multimeter')
	            							$vm.instance.deleteConnectionsForElement(ltargetId);                							                							
                						}              						
                					}
                				}
                				if (ltargetId.split('_')[0] != 'reader') {

                					if(multireader.main.length < 3){                  						
                						if (lsourceType == ltargetType){                							
                							multireader.main.push(ltargetId);
                						}else{
                							alert('Invalid connection on Multimeter')
                							$vm.instance.deleteConnectionsForElement(lsourceId);                           							
                						}              						
                					}
                				}
                			}
                		}
                			

                		//}
                	///}
                },
                reorganizer = function (type,index1, index2){

					var mult = digitalComponentsData.components[type], lastIn = mult[index1].length-1;

					if (index2 != 0 && index2 != lastIn ) {
						for (var i = 0; i < mult[index1].length; i++) {
							
				            $vm.instance.deleteConnectionsForElement(mult[index1][i]);							
						}
						mult.splice(index1,1);
						/*try{			
							var arr1  = mult[index1].filter((item,i)=>{
								if (i < index2) {return item}
							})

							var arr2  = mult[index1].filter((item,i)=>{
								if (i > index2) {return item}
							})							

							mult.splice(index1,1);
							if(arr1.length>1){
								mult.push(arr1);
							}
							if (arr2.length >1) {
								mult.push(arr2);
							}
						}catch(err){
							console.log(err)
						}*/
					}else{
						mult[index1].splice(index2,1);
					}
				},
                updateConnections = function (conn, remove) {

                   try{	
                   	 		 var idx = -1;
	                    if (!remove) {
	                       	connections.push(conn);
	                    }
	                    else {
	                        var idx = -1;
	                        for (var i = 0; i < connections.length; i++) {
	                            if (connections[i].connection == conn.connection) {
	                            	//console.log('connection removed');
	                                idx = i;
	                                break;
	                            }
	                        }
	                        if (idx != -1) connections.splice(idx, 1);	                        	                        
	                    }

	                    if (connections.length > 0) {	                    	
	                    	//console.log({name: connections[j]});
	                    	let endpointType,endpointType2,type,type2;
	                        var s = "<span id='connNav1' style='font-size:2em; color:#d53; float:right;cursor:pointer' onclick='$(document).ready(function(){$(\"#connTable\").fadeOut(50); $(\"#connNav1\").fadeOut(50); $(\"#connNav2\").show(80);})' >-</span><span style='font-size:2em; color:#d53; float:right;cursor:pointer;display:none;' id='connNav2' onclick='$(document).ready(function(){$(\"#connTable\").fadeIn(50); $(\"#connNav1\").fadeIn(80); $(\"#connNav2\").fadeOut(50);})' >+</span><span style='clear:right;'><strong>Connections</strong></span><br/><br/><table id='connTable'><tr><th>Scope</th><th>Source</th><th>Target</th></tr>";                        
	                        $vm.ArrConn = [];
	                        for (var j = 0; j < connections.length; j++) {
	                    	type  = "negative"; type2 = 'negative';                  	
	                        	//console.log({name:connections[j]});
	                        	endpointType = connections[j].sourceEndpoint.type;
	                        	endpointType2 = connections[j].targetEndpoint.type;
		                        if ( endpointType == "Rectangle"){
		                        	type = "positive";
		                        }
		                        if ( endpointType2 == "Rectangle"){
		                        	type2 = "positive";
		                        }
		                       		                        	                        

	                            $vm.ArrConn.push({'sourceType':type,'targetType':type2, 'sourceId': connections[j].sourceId, 'targetId':connections[j].targetId});
	                            s = s + "<tr><td>" + connections[j].scope + "</td>" + "<td>" + connections[j].sourceId + "</td><td>" + connections[j].targetId + "</td></tr>";
	                        } 
	                        objectType($vm.ArrConn)
	                        //showConnectionInfo(s);
	                        //$vm.check_connection($vm.ArrConn, $vm);
	                    }else{
	                    	$vm.ArrConn = [];
	                        objectType($vm.ArrConn)	                    	
	                       // hideConnectionInfo();
	                    }
                    }catch(err){
                   	 	// avoid this error it has no effect: this code run just like a constructor 
                   	 	// because of this.initconnection condition in the batchjsplumb() method
                   	 }
                };

		
		    jsPlumb.ready(function () {		   	
         
            $vm.instance.batch(function () {
  					
  				
  					$vm.instance.bind("connection", function (info, originalEvent) {  						
                        updateConnections(info);
                    });
                    $vm.instance.bind("connectionDetached", function (info, originalEvent) {
                        updateConnections(info, true);
                    });

                    $vm.instance.bind("connectionMoved", function (info, originalEvent) {
                        //  only remove here, because a 'connection' event is also fired.
                        // in a future release of jsplumb this extra connection event will not
                        // be fired.
                        updateConnections(info, true);
                    });

                    $vm.instance.bind("dblclick", function (info, originalEvent) {
				        $vm.instance.deleteConnection(info);
                       // updateConnections(info, true);                                               
                    });

                    $vm.instance.bind("click", function (info, originalEvent) {
				     });

                    var exampleDropOptions = {
                        tolerance: "touch",
                        hoverClass: "dropHover",
                        activeClass: "dragActive"
                    };

                    var exampleColor = "#000";                   
                    var  exampleEndpoint = {
                         //endpoint: "Rectangle",
                        endpoint: ["Dot", { radius: 6 }],

                        paintStyle: { width: 10, height: 10, fill: exampleColor},
                        isSource: true,
                        scope: "scope",
                        connectorStyle: { stroke: exampleColor, strokeWidth: 2 },
                        connector: ["Straight", {stub: 10,cornerRadius:5 } ],
                        maxConnections: 3,
                        isTarget: true,
                        //uuid:'negative',
                         beforeDrop: function (params) {
                            //console.log(params.dropEndpoint.type);
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
                      //  endpoint: ["Dot", { radius: 6 }],
                        paintStyle: { width: 10, height: 10, fill: color2},
                        isSource: true,                        
                        scope: "scope",
                        connectorStyle: { stroke: color2, strokeWidth: 2 },
                        connector: ["Straight", {stub: 10,cornerRadius:5 } ],
                        maxConnections: 3,
                        //cssClass: 'myClass',                       
                        isTarget: true,
//                        target:"scope",
                        //uuid:'positive',                                                
                         beforeDrop: function (params) {
                            //console.log(params);                            
                            return true ;//confirm("Connect " + params.sourceId + " to " + params.targetId + "?");
                        },
                        dropOptions: exampleDropOptions
                    };
                    let endpoint1,endpoint2;
                    
                    for (var i = 0; i < objArray.length; i++) {
                    	if (objArray[i].split('_')[0] =="reader") {

	                    /*endpoint1 = $vm.instance.addEndpoint(objArray[i], { anchor:  [[0, 0.5, 0, 1],[0.3, 1, -1, 1],[0.3, 0, -1, 1]]}, exampleEndpoint);
	                    endpoint2 = $vm.instance.addEndpoint(objArray[i], { anchor:  [[1, 0.5, 0, 1],[0.6, 1, -1, 1],[0.6, 0, -1, 1]] }, exampleEndpoint2)*/
	                    endpoint1 = $vm.instance.addEndpoint(objArray[i], { anchor:  ["LeftMiddle"]}, exampleEndpoint);
	                    endpoint2 = $vm.instance.addEndpoint(objArray[i], { anchor:  ["RightMiddle"] }, exampleEndpoint2)
	                    
                    	}else if(objArray[i].split('_')[0] =="resistor"){
	                   		endpoint1 = $vm.instance.addEndpoint(objArray[i], { anchor:  [0, 0.5, 0, 1]}, exampleEndpoint);
	                    	endpoint2 = $vm.instance.addEndpoint(objArray[i], { anchor:  [1, 0.5, 0, 1] }, exampleEndpoint2);
                    	}else{
                    		endpoint1 = $vm.instance.addEndpoint(objArray[i], { anchor:  [0.2, -0.2, 0, 1]}, exampleEndpoint);
	                    	endpoint2 = $vm.instance.addEndpoint(objArray[i], { anchor:  [0.8, -0.2, 0, 1] }, exampleEndpoint2);
                    	}
	                    //console.log(endpoint2);
	                    $(endpoint2.canvas).attr('rel', objArray[i]);
	                    $(endpoint1.canvas).attr('rel', objArray[i]);
	                    $(endpoint1.canvas).attr('data-name', objArray[i].split('_')[0]);
	                    $(endpoint2.canvas).attr('data-name', objArray[i].split('_')[0]);
	                    //endpoint2 = objArray[i];
	                    $('#'+objArray[i]).dblclick(function(){
	                    	//alert();
	                    	//console.log($(this).find('.'+this.ercn));
							$(this).find('.'+$vm.ercn+', .remover2').css('display','flex');							
							let $vnn = $(this);
							 setTimeout(function(){
							 	$vnn.find('.'+$vm.ercn).hide(10);
							 	$vnn.find('.remover2').hide(10);							 	
							 }, 8000);
						})                    	
                    }
                   

	                    	//alert(conso)
	                    var detachLinks = jsPlumb.getSelector('.remover2');
	                    $vm.instance.on(detachLinks, "dblclick", function (e){
							dataObject.value=0;//modify this to target wen detaching reader 
							try{
								var mmx = digitalComponentsData.multireader.main;
	                    		$vm.instance.deleteConnectionsForElement(this.getAttribute("rel"));
								if (this.getAttribute("rel").split('_')[0] == 'resistor' || this.getAttribute("rel").split('_')[0] == 'battery' ) {									
									for (var i = 0; i < 5; i++) {
										var ind = digitalComponentsData.multireader.main.indexOf(this.getAttribute("rel"));										
										if (ind != -1){											
											digitalComponentsData.multireader.main.splice(ind,1);
										}
									}
									for (var i = 0; i < digitalComponentsData.components.parallel.length; i++){										
										var ind = $vm.getIndex(digitalComponentsData.components.parallel, this.getAttribute("rel"));
										if (ind[0] != -1) {
											if (ind[1] !=-1) {
												if(digitalComponentsData.components.parallel[ind[0]].length == 2){												
													digitalComponentsData.components.parallel[ind[0]].splice(ind[0],1);	
													//digitalComponentsData.components.series.splice(ind[0],1)
												}else{
													if (ind[1] !=-1) {												
														reorganizer('parallel',ind[0],ind[1])
													}												
												}											
											}
										}
									}
									for (var i = 0; i < digitalComponentsData.components.series.length; i++) {		
										var ind = $vm.getIndex(digitalComponentsData.components.series, this.getAttribute("rel"));
										if (ind[0] != -1) {											
											if (digitalComponentsData.components.series[ind[0]].length == 2){												
												digitalComponentsData.components.series.splice(ind[0],1)
											}else{
												if (ind[1] !=-1) {												
													reorganizer('series',ind[0],ind[1])
												}												
											}
										}
									}
								}else{
									for (var i = 0; i < 5; i++) {
										digitalComponentsData.multireader.main = [];
									}
								}
								
							}catch(err){console.log(err)}
                    	});	   

                  
            });
            jsPlumb.fire("jsPlumbDemoLoaded", $vm.instance);
        });
		/*}else{
			console.log(false);
		}*/
	}

	initdraggable(){
		 this.instance.draggable($(".dragme"),{
	   		containment:true,

		});
	}
}