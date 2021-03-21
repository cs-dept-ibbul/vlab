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
           var rconfig1 = {                      
                totalBand: 4,
                tolerance: "violet",
                multiplier: "brown",
                width:90,
                height:30,
                band: ["brown","blue"],

           };
          var rconfig2 = {                      
                totalBand: 5,
                tolerance: "green",
                multiplier: "silver",
                width:90,
                height:30,
                band: ["white","blue","violet"],

           };
          $(document).ready(function(){   
           
              var ndata = 5;
                
             var resitorObj1 = new Resistor('toolresistor1',{width:90,height:30});             
                resitorObj1.resistor()
                
                var resitorObj2 = new Resistor('toolresistor2',rconfig1);             
                resitorObj2.resistor()
                
                var resitorObj3 = new Resistor('toolresistor3',rconfig2);             
                resitorObj3.resistor()
              })
              /*real experiment tools*/
             var resitorObject1 = new Resistor('experimentSheet',{width:90,height:30});      
             var resitorObject2 = new Resistor('experimentSheet',rconfig1);      
             var resitorObject3 = new Resistor('experimentSheet',rconfig2);      
            
             var jsp = new initJsplumb('remover');
             watch(jsInitArray,'data',function(){
                jsp.batchjsplumb(jsInitArray.data);
             });           


               var dm = new digitalMultimeter('experimentSheet');

             $("#toolresistor1").click(function(){
                resitorObject1.resistor();
                resitorObject1.assignRel();
                jsp.initdraggable();                        
                jsInitArray.data.push(resitorObject1.getId());
            });

             $("#toolresistor2").click(function(){
                resitorObject2.resistor();
                resitorObject2.assignRel();
                jsp.initdraggable();                        
                jsInitArray.data.push(resitorObject2.getId());
            });

             $("#toolresistor3").click(function(){                
                resitorObject3.resistor();
                resitorObject3.assignRel();
                jsp.initdraggable();                        
                jsInitArray.data.push(resitorObject3.getId());
            });

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
