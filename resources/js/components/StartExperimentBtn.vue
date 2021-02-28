<template>
	<div>
		<div style="position: absolute;top: 20px; right: 160px; z-index: 15;" class="timer">
			  <div class="countdown">
			    <div class="block">
			      <p class="digit">{{ days}}</p>
			      <p class="text">Days</p>
			    </div>
			    <div class="block">
			      <p class="digit">{{ hours }}</p>
			      <p class="text">Hours</p>
			    </div>
			    <div class="block">
			      <p class="digit">{{ minutes }}</p>
			      <p class="text">Minutes</p>
			    </div>
			    <div class="block">
			      <p class="digit">{{ seconds }}</p>
			      <p class="text">Seconds</p>
			    </div>
			  </div>
		</div>
		<span v-if="timeexpires==true" class="start" style="position: absolute;top:45%; left: 45%;  cursor: pointer;background: #a23;color: #fff;padding: 15px 20px;border-radius: 8px;">
			<span class="fa fa-lock mr-1" ></span>Time Up
		</span>
		<span class="start" style="position: absolute;top:78%; left: 45%;  cursor: pointer;background: #7d9;color: #fff;padding: 15px 20px;border-radius: 8px;" @click="startT" v-if="start==false">
			<span class="fa fa-caret-right mr-1" ></span>Start Experiment
		</span>
		
	</div>	
</template>
<script>
	export default{
mounted() {
		this.tickT()
	//alert(parseInt(this.hourdata)+10);
  	//alert( Math.trunc( ( this.now + (parseInt(this.hourdata)*36000000) + (parseInt(this.munitedata)*60000) ) +'+' +this.now)
  },
  data() {
    return {
      now: Math.trunc((new Date()).getTime() / 1000),
      startTime:Math.trunc((new Date()).getTime() / 1000),
      start: false,
      timeexpires:false
    }
  },
  methods:{
  	tickT(){
  		let experimentSheet = document.getElementById('experimentSheet');
  		
  		 window.setInterval(() => {
  		 	if (this.start === true || experimentSheet.style.display != 'none') {  		 		
		        this.now = Math.trunc((new Date()).getTime() / 1000);
		        if (this.seconds == '00' && this.minutes == '00' && this.hours == '00' ) {
		        	/*&& this.minutes == '00' && this.hours == '00'*/
		        	if (this.timeexpires == false) {
		        		experimentSheet.remove();
		        		this.timeexpires = true;
		        	}
		        }
			}
    	},1000);
  	},
  	startT(){

  		this.start = true;
      this.startTime=Math.trunc((new Date()).getTime() / 1000);
      document.getElementById('experimentSheet').style.display = 'block'

  	},
  	valueFilter(value){
  		 if (value < 0) {		  	
		    return '00';
		  }
		  if (value.toString().length <= 1) {
		    return '0'+value;
		  }
		  return value;
  	}
  },
  props:[    
        'hourdata',
            'munitedata',
            'starteddata'
          ],
  computed: {
    dateInMilliseconds() {
      if (parseInt(this.starteddata) == 0 || parseInt(this.starteddata)==null) {      	
      	return Math.trunc( ( this.startTime + (parseInt(this.hourdata)*3600) + (parseInt(this.munitedata)*60) ) );
      }else{
      	return Math.trunc((parseInt(this.starteddata)+parseInt(this.hourdata)*36000000 + parseInt(this.munitedata)*60000) )      	
      }
    },
    seconds() {
    	
     return this.valueFilter((this.dateInMilliseconds - this.now) % 60);
		      
      
    },
    minutes() {
      let value = Math.trunc((this.dateInMilliseconds - this.now) / 60) % 60;
       if (value < 0) {
		  	value = 0;
		    return '00';
		  }
		  if (value.toString().length <= 1) {
		    return `0${value}`;
		  }
		  return value;
      
    },
    hours() {
      let value = Math.trunc((this.dateInMilliseconds - this.now) / 60 / 60) % 24;
       if (value < 0) {
		  	value = 0;
		    return '00';
		  }
		  if (value.toString().length <= 1) {
		    return `0${value}`;
		  }
		  return value;
    },
    days() {    	
      let value = Math.trunc((this.dateInMilliseconds - this.now) / 60 / 60 / 24);
       if (value < 0) {
		  	value = 0;
		    return '00';
		  }
		  if (value.toString().length <= 1) {
		    return `0${value}`;
		  }
		  return value;

    }
  }
}


</script>
<style scoped  lang="scss">
@import url(https://fonts.googleapis.com/css?family=Roboto+Condensed:400|Roboto:100);
.countdown {
  display: flex;
}

.block {
    display: flex;
    flex-direction: column;
    margin: 5px;
}

.text {
    color: #191236;
    font-size: 0.8em;
    font-family: 'Roboto Condensed', serif;
    font-weight: 40;
    margin-top:10px;
    margin-bottom: 2px;
    text-align: center;
}

.digit {
    color:#191236;
    font-size: 1em;
    font-weight: 400;
    font-family: 'Roboto', serif;
    margin: 0px;
    text-align: center;
}
</style>