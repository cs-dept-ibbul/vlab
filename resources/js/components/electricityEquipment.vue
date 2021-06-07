<template>  
   <div  class="" id="leftNav">                                  
      
      <h4 class="text-center text-white">Equipments</h4>              
      <span style="font-size: 0.9em;">click to select an equipment</span>                          
        
      <br>
      <div class="m-0 p-2" id="toolPane">                        
          <div id="tooldm" class="picker">
                <img width="100%" src="/expImages/physics/exp1/ameter.png" >
          </div>
          <div id="toolresistor1" style="cursor: pointer;height: 50px;position: relative;"> </div>
          <div id="toolresistor2" style="cursor: pointer;height: 50px;position: relative;"> </div>
          <div id="toolresistor3" style="cursor: pointer;height: 50px;position: relative;"> </div>
          <div id="toolresistor4" style="cursor: pointer;height: 50px;position: relative;"> </div>
          <div id="toolresistor5" style="cursor: pointer;height: 50px;position: relative;"> </div>
          <div id="toolresistor6" style="cursor: pointer;height: 50px;position: relative;"> </div>
          <div id="toolresistor7" style="cursor: pointer;height: 50px;position: relative;"> </div>          
        
      </div>                        
 </div>
</template>
<script>
export default {
    

 
   data:function() {
        return{         
            addedreaderCounter:0,
        }
      },
      method:{
       
        },
    mounted(){

      let $baseObjet = this;
      this.$nextTick(function(){       
          $(document).ready(function(){                           

            var dm = new digitalMultimeter('experimentSheet');
            var num = 0;

             var jsp = new initJsplumb('remover');
            watch(jsInitArray,'data',function(){
              jsp.batchjsplumb(jsInitArray.data);
            });  
            var ndata = 5;  
            for (var i = 0; i < $baseObjet.resistorConfig.length; i++)
            {
                num +=1;
                var resitorIcon = new Resistor("toolresistor"+num,$baseObjet.resistorConfig[i]);             
                resitorIcon.resistor()
            }                

            if($baseObjet.resistorConfig.length>0) {
                var num = i +1;
                var resitorObj1 = new Resistor("experimentSheet",$baseObjet.resistorConfig[0]);                             
                $("#toolresistor1").click(function(){                  
                  resitorObj1.resistor();
                  resitorObj1.assignRel();
                  jsp.initdraggable();                        
                  jsInitArray.data.push(resitorObj1.getId());
                });                        

            }
            if($baseObjet.resistorConfig.length>1) {                
                var resitorObj2 = new Resistor("experimentSheet",$baseObjet.resistorConfig[1]);                             
                $("#toolresistor2").click(function(){                  
                  resitorObj2.resistor();
                  resitorObj2.assignRel();
                  jsp.initdraggable();                        
                  jsInitArray.data.push(resitorObj2.getId());
                });                        

            }

            if($baseObjet.resistorConfig.length>2) {                
                var resitorObj3 = new Resistor("experimentSheet",$baseObjet.resistorConfig[2]);                             
                $("#toolresistor3").click(function(){                  
                  resitorObj3.resistor();
                  resitorObj3.assignRel();
                  jsp.initdraggable();                        
                  jsInitArray.data.push(resitorObj3.getId());
                });                        

            }
            if($baseObjet.resistorConfig.length>3) {                
                var resitorObj4 = new Resistor("experimentSheet",$baseObjet.resistorConfig[3]);                             
                $("#toolresistor4").click(function(){                  
                  resitorObj4.resistor();
                  resitorObj4.assignRel();
                  jsp.initdraggable();                        
                  jsInitArray.data.push(resitorObj4.getId());
                });                        
            }
            if($baseObjet.resistorConfig.length>4) {                
                var resitorObj5 = new Resistor("experimentSheet",$baseObjet.resistorConfig[4]);                             
                $("#toolresistor5").click(function(){                  
                  resitorObj5.resistor();
                  resitorObj5.assignRel();
                  jsp.initdraggable();                        
                  jsInitArray.data.push(resitorObj5.getId());
                });                        
            }
            if($baseObjet.resistorConfig.length>5) {                
                var resitorObj6 = new Resistor("experimentSheet",$baseObjet.resistorConfig[5]);                             
                $("#toolresistor6").click(function(){                  
                  resitorObj6.resistor();
                  resitorObj6.assignRel();
                  jsp.initdraggable();                        
                  jsInitArray.data.push(resitorObj6.getId());
                });                        
            }
            if($baseObjet.resistorConfig.length>6) {                
                var resitorObj7 = new Resistor("experimentSheet",$baseObjet.resistorConfig[6]);                             
                $("#toolresistor7").click(function(){                  
                  resitorObj7.resistor();
                  resitorObj7.assignRel();
                  jsp.initdraggable();                        
                  jsInitArray.data.push(resitorObj7.getId());
                });                        

            }

            
                        
                 

             $("#tooldm").click(function(){
              if ($baseObjet.addedreaderCounter <1) {
                  $baseObjet.addedreaderCounter=1;
                  dm.reader();      
                  dm.tyepSwitch();
                  dm.watchOut();                                   
                  jsInitArray.data.push(dm.getId());
                  jsp.initdraggable();                        
              }else{
                alert('two reader cannot be added');
              }
            }); 
      })
  })
},
  props:{
    resistorConfig:{
      type:Array,
      default(){
        return [
          {
            totalBand: 4,
            tolerance: "violet",
            multiplier: "brown",
            width:90,
            height:30,
            band: ["brown","blue"],
          },
           {
            totalBand: 3,
            tolerance: "violet",
            multiplier: "brown",
            width:90,
            height:30,
            band: ["brown"],
          },
           {
            totalBand: 5,
            tolerance: "green",
            multiplier: "silver",
            width:90,
            height:30,
            band: ["white","blue","violet"],
          },
           {
            totalBand: 4,
            tolerance: "violet",
            multiplier: "red",
            width:90,
            height:30,
            band: ["brown","blue"],
          },
           {
            totalBand: 5,
            tolerance: "violet",
            multiplier: "brown",
            width:90,
            height:30,
            band: ["brown","blue",'red'],
          },
           {
            totalBand: 4,
            tolerance: "violet",
            multiplier: "brown",
            width:90,
            height:30,
            band: ["brown","blue"],
          },
           {
            totalBand: 6,
            tolerance: "violet",
            multiplier: "brown",
            temperature: "red",
            width:90,
            height:30,
            band: ["yellow","blue"],
          }
        ]
      }
    }
  }
}
</script>
<style scoped>
 .picker{
        width: 80px;
        height: 80px;        
        margin: 15px auto; 
        border-radius: 3px;        
        cursor: pointer !important;        
        }
    .picker:hover{
        box-shadow: 1px 2px 2px #ccc;
    }  
    #toolPane{
      position: absolute;
      left: 39px;
    }
</style>
