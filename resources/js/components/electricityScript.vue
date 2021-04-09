<template>
  <div>
       <button id="buttons">click me</button>
  </div>
</template>

<script>
export default {
    


	 data:function() {
		   	return{		    	
            	
		    }
        },
        method(){

        },
    mounted(){

	    let $vm = this;
	    this.$nextTick(function(){
	        $(document).ready(function(){   
           
		          var ndata = 5;
		            
		         var obj = new Resistor('experimentSheet',{width:90,height:30});
		          //resistant
		         /*  
		            obj.resistor();
		            obj.connectify();
		            obj.elRemover();

		            $("button").click(function(){
		                obj.resistor();
		                //obj.turnhandler();
		                obj.connectify();
		                obj.elRemover();            
		            });
		           
		      */

		         var jsp = new initJsplumb('remover');

		          //console.log(digitalComponentsData);
		         

		         watch(jsInitArray,'data',function(){
		            jsp.batchjsplumb(jsInitArray.data);
		         });    
		         
		         //digital multimeter
		         var dm = new digitalMultimeter('experimentSheet');
		             dm.reader();      
		             dm.tyepSwitch();
		             dm.watchOut();      
		             dm.setValue(ndata);    
		            jsInitArray.data.push(dm.getId());
		            jsp.initdraggable();                        
		            $("#buttons").click(function(){
		                console.log(obj.resistor());
		                obj.assignRel();
		                jsp.initdraggable();                        
		                jsInitArray.data.push(obj.getId());

		            });


		           /* window.chn = function(){
		              ndata +=30;
		              dm.setValue(ndata);  
		            }        */
		            //$('.dragme').draggable();
		          })
	  	})
	}
}
</script>

<style scoped>

</style>