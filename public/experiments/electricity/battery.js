'use strict';
const batteryDefaultConfig = {
	volt:12,	
};

class batteryJs{
		
		constructor(containerID,bConfig = {}){
			//if (!containerID) throw new Error("invalid container id");      
			this.config = {...batteryDefaultConfig, ...bConfig};
			this.container_id = containerID;
			this.volt = this.config.volt;	
			this.valueholder_id = ""			
		}

		battery(volts=-1){			
			if (volts != -1) {
				this.volt = volts;
			}
			this.valueholder_id ='battery_';
			this.valueholder_id += Math.floor((Math.random() * 1000) + 2);
			var batteryComponent =`				  
		    <div  data-value="${this.volt}" id="${this.valueholder_id}" class="dragme" style="width: 90px;user-select:none; height: 50px;border-radius: 5px;border: 3px solid black;position: absolute;background:white;cursor:pointer">
		        <div style="width: 10%;height: 18%; background: #ccc;border:3px solid black; border-radius: 5px 5px 0px 0px;position: absolute;top: -30%; left: 10%"></div>
		        <div style="width: 10%;height: 18%; background: #ccc;border:3px solid black; border-radius:5px 5px 0px 0px; position: absolute;top: -30%; right:  10%"></div>
		        <div style="width:120%;border:3px solid black;height: 15%; border-radius: 5px; position: absolute;top: 10%;left: -13.5%;background:white;display: flex;flex-wrap: wrap;align-items: center; justify-content: center; font-weight: bolder;font-size: 1.5em;line-height: 0;padding: 0px;">
		          <span style="color: #555;">&#183 &#183 &#183 &#183 &#183 &#183 &#183 &#183</span>
		        </div>
		        <div style="position: absolute;top: 45%;width: 100%; display: flex;justify-content: space-between;">
		          <span style="margin-left: 5px;font-weight: bold;">&minus;</span>
		          <span style="color:#296;font-family: arial;font-weight: bolder;">${this.volt}V</span>
		          <span style="margin-right: 5px; color: red;">&plus;</span>
		        </div>
		        <div style="width:120%;border:3px solid black;height: 10%; border-radius: 5px; position: absolute;bottom: -12%;left: -13.5%;background: white;display: flex;flex-wrap: wrap;align-items: center; justify-content: center; font-weight: bolder;font-size: 1.5em;line-height: 0;padding: 0px;"></div>				       <div class="remover"   style="cursor:pointer;background:red;color:white;display:none;position:absolute;top:-35px;left:20%;border-radius:50%;flex-wrap:wrap;justify-content:center;align-items:center; width:25px;height:25px;font-size:1.3em;z-index:2;">&times</div>'
  				<div class="remover2" rel="${this.valueholder_id}"   style="cursor:pointer;background:red;color:white;display:none;position:absolute;top:-35px;left:50%;border-radius:50%;flex-wrap:wrap;justify-content:center;align-items:center; width:25px;height:25px;font-size:1em;z-index:2;">&#x2702;</div>
		    </div>`;		   
		  $('#'+this.container_id).append(batteryComponent);//renderer
		  // $( ".dragme" ).draggable();
		}

		getId(){
			return this.valueholder_id;
		}
	}