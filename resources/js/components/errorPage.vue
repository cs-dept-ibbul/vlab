<template>
<div v-bind:class="bgolor(type)" style="width: 100%; height: 100vh; overflow:hidden;">
	<div class="box">
            <div class="danger">
            	<img src="\vlab.png" width="35px" height="20px" style="position: absolute;top:5px;right: 5px;">
                {{title}} !
            </div>
            <p>
            	<span>{{code}}</span>
            	<span> {{message}} </span>
            	<br><br>
            	<a class="button btn-lg" v-bind:class="btncolor(type)" href="/">Home</a>
            	<a v-show="page!='empty'" id="reattempt" class="button btn-lg bg-warning text-white" :href="'/'+page+'/'+weekly_work_id" >Reattempt</a>
            </p>
        </div>
</div>

</template>
<script>
	export default{

		props:{
			title:String,
			code:String,
			message:String,
			weekly_work_id:String,
			page:{
				type:String,
				default:function(){
					return 'empty';
				}
			},
			type:{
				type:String,
				default:function(){
					return 'danger';
				}
			}
		},
		methods:{
			bgolor:function(type){
				if(type=='danger'){
					return 'danger-light';
				}
			},
			btncolor:function(type){
				if (type=='danger') {
					return 'danger';
				}
			}
		},
		mounted(){
			var $this = this;
			$(document).ready(function(){
				$('#reattempt').attr('href','/'+$this.page+'/'+$this.weekly_work_id);
			});
		},
		created(){			
			if (this.page=='empty' || this.page == ''){
				window.location.href = '/';
			}
		}

	}
</script>
<style>
 .danger-light{
 	background:rgb(170,10,30,.5) !important;
 	color:rgb(170,10,30) !important;
 	}
 	.danger{
 	background-color:rgb(230,40,100) !important;	
 	color:white;
 	}
 	a:hover{
 		color:white !important;
 	}
.info{
  position: absolute;
  top:0;
  left:0;
  padding: 10px 0;
  font-size: 110%;
  text-transform: capitalize;
  color:#FFC900;
  font-weight: 700;
  background-color:#fff;
  width:100%;
  text-align:center
}

.info a{
  text-decoration: none;
  color:#333
}
.info a:after{
  content:" | ";
  color:#FFC900
}

.info a:last-of-type:after{content:""}

.box{
    text-align: center;
    position: relative;
}

.box div{
    width: 250px;
    height: 80px;
    line-height: 80px;
    color:#fff;    
    padding: 10px;
    font-size: 280%;
    position: absolute;
    top:110px;
    left:40%;
    text-transform: capitalize;
    animation: moving 5s linear infinite;
  -webkit-animation: moving 5s linear infinite;
  -moz-animation: moving 5s linear infinite;
  -o-animation: moving 5s linear infinite;
  
    transform-origin: 50% -400%;
  -webkittransform-origin: 50% -400%;
  -moz-transform-origin: 50% -400%;
  -o-transform-origin: 50% -400%;
}

.box div:before{
    content: "";
    width: 25px;
    height: 25px;
    background-color:#fff;
    border-radius: 50%;
    display: block;
    position: absolute;
    left:45%;
    top:5%;
}

.box div:after{
    content: "";
    width: 3px;
    height: 140px;
    background-color: #fff;
    display: block;
    position: absolute;
    left: 50%;
    top: -140px;
}

.box p{    
  	color:#fff;
  	text-align: center;
  	position: absolute;
  	top: 230px;
  	width: 100%;
}

.box p span:first-child{
    font-weight: 700;
   text-transform: uppercase;
  display: block;
  font-size:200%
}

@keyframes moving{
    0%,100%{
        transform: rotate(0)
    }
    25%{
        transform: rotate(3deg);
    }
    50%{
        transform: rotate(-3deg)
    }
}

@-webkit-keyframes moving{
    0%,100%{
        transform: rotate(0)
    }
    25%{
        transform: rotate(3deg);
    }
    50%{
        transform: rotate(-3deg)
    }
}

@-moz-keyframes moving{
    0%,100%{
        transform: rotate(0)
    }
    25%{
        transform: rotate(3deg);
    }
    50%{
        transform: rotate(-3deg)
    }
}

@-o-keyframes moving{
    0%,100%{
        transform: rotate(0)
    }
    25%{
        transform: rotate(3deg);
    }
    50%{
        transform: rotate(-3deg)
    }
}
</style>