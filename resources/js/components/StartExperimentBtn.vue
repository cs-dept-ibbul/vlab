<template>
	<div>
    
    <div  class="position-to-center alert-danger py-5" :style="'height:'+accessCodeheight+'px;'" v-if="accessCode == false">
      <div class="position-left">
        <label  class="ml-2 pl-2"><i >Access Code</i></label><br>
        <input type="text" name="enrollment_code" @keyup="compare($event.target.value, $event)" class="formControl ">
      </div>
    </div>   
		<div style="position: absolute;top: 87px; right: 40px; z-index: 15;" class="timer bg-dark">
			  <div class="countdown">
			    <!-- <div class="block">
			      <p class="digit">{{ days}}:</p>
			      <p class="text">Days</p>
			    </div> -->
			    <div class="block">
			      <p class="digit">{{hours}}:</p>
			      <!-- <p class="text">Hours</p> -->
			    </div>
			    <div class="block">
			      <p class="digit">{{minutes}}:</p>
			      <!-- <p class="text">Minutes</p> -->
			    </div>
			    <div class="block">
			      <p class="digit">{{seconds}}</p>
			      <!-- <p class="text">Seconds</p> -->
			    </div>
			  </div>
		</div>
		<span v-if="timeexpires==true" class="start" style="position: absolute;top:45%; left: 45%;  cursor: pointer;background: #a23;color: #fff;padding: 15px 20px;border-radius: 8px;">
			<span class="fa fa-lock mr-1" ></span>Time Up
		</span>
		<span class="start" style="position: absolute;top:78%; left: 45%;  cursor: pointer;background: #7d9;color: #fff;padding: 15px 20px;border-radius: 8px;" @click="startT" v-if="start==false && accessCode == true">
			<span class="fa fa-caret-right mr-1" ></span>Start Experiment
		</span>
		
	</div>	
</template>
<script>
	export default{
mounted() {
		this.$nextTick(function(){
      this.accessCodeheight = $('#mainExp').height()-70;
    })
	//alert(parseInt(this.hourdata)+10);
  	//alert( Math.trunc( ( this.now + (parseInt(this.hourdata)*36000000) + (parseInt(this.munitedata)*60000) ) +'+' +this.now)
  },
  data() {
    return {
      now: Math.trunc((new Date()).getTime() / 1000),
      startTime:Math.trunc((new Date()).getTime() / 1000),
      start: false,
      timeexpires:false,
      timeleft:0,
      accessCode:false,
      accessCodeheight: 400
    }
  },
  methods:{
    validateResultInput:function(){
          let regExp = /^[0-9]+\.?[0-9]*$/,
                value;
        $('.resultReading').on('keyup',function(){
                value = $(this).val();
                alert(value);
                $(this).css('border','1px solid #ccc');
                if (regExp.test(value)== false){
                  $(this).css('border','1px solid red');              
                  return 0;
                }
              })
      },
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
      this.$eventBus.$emit('startExperiment', function () {
        return true; //listen in expRightNav.vue
      } )
  		this.start = true;
      this.startTime=Math.trunc((new Date()).getTime() / 1000);
      document.getElementById('experimentSheet').style.display = 'block';
      this.tickT();      
      let $this = this;   
  	},
    sendTimeLeft:function(){
      let $this = this
      let interval;      
      interval = setInterval(function(){
      
        if(!$this.timeexpires){
          $this.timeleft = $this.hours+':'+$this.minutes+':'+$this.seconds;
          $this.$eventBus.$emit('listeningToTimeLeft',$this.timeleft);
        }        
        else{
          clearInterval(interval);
        }
      },1100);
    },
  	valueFilter(value){
  		 if (value < 0) {		  	
		    return '00';
		  }
		  if (value.toString().length <= 1) {
		    return '0'+value;
		  }
		  return value;
  	},
    compare:function(value, event){                  
      let e = event.target.parentNode.children;
   
      this.removeError(event.target);
        let $this = this;        
        if (event.keyCode === 13) {
            if(value == this.access_code){    
              this.accessCode = true;                      
            }else{              
              this.addError(event.target);
              //pass.style.display= 'none';              
            }
        }
    },
    
  },
  props:{
      hourdata:String,
      munitedata:String,
      user_type:String,      
      starteddata:{
        type:String,
        default:function(){
          return '0'
        }
      },
      access_code:String
  }
          ,
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
  },
  created(){
      this.sendTimeLeft();    
      if (this.user_type == 'instructor') {
        this.accessCode = true;
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
    margin: 5px 0px;
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
    color:#4c5;

    font-size: 1em;
    font-weight: 500;
    font-family: 'Roboto', serif;
    margin: 0px;
    text-align: center;
}
.position-to-center{
  width:100%;    
  position: relative;
}
.position-left{
  display:inline-block;
  position:absolute;
  left:40%;
  top:25%;
}
input.formControl{
  transition: 0.5s all;
  width: 130px;
  height: 26px;
  padding: 7px;
  border-radius: 0px;
  border: none;
  border-bottom:1px solid #888;
  top: 10px;
  margin-bottom: 5px;
}
.formControl:focus{
  border-bottom:1px solid #00b96b;  
  border-radius: 0px;
  outline: 0;
}

</style>