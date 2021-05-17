@extends('layouts/main-login')
@section('content-body')
    <div class="content row m-0 p-0">
	<!-- <v-userauth></v-userauth> -->
    	
    	<div class="col-lg-12 m-0 p-0">
    		<div class="pull-right p-3">
    			<a href="/" class="font fs2 fw3 text-white mx-1">Home</a>
    			<a href="/login" class="font fs2 fw3 text-white mx-1">Login</a>
    		</div>
    	</div>
    	<div class="col-lg-6 col-md-6 mt-5" id="login-box-119">
    		<h1 class="text-center text-white font2 fw6">Welcome to Vlab</h1>
    		<div class="login-left"></div>
    	</div>
    	<div class="col-lg-6 col-md-6 mt-5 pt-5 " id="login-box-120">       	 	
    		<div class="p-5 login-right">
    		
    		<div class="d-flex">
    			
	    		<p class="font2 fs8 fw6 p-text-dark">Login</p>
	    		<div  id="login-msg" class="p-0 m-0 d-flex flex-wrap position-relative" >    			
	    			<span id="login-msg-loader" class="p-display-none">
			    		<span>Hi, this will only take a minute</span>
				        <span class="dot-flashing  ml-4"></span>	    				
	    			</span>
	    			<span id="login-msg-success" class="p-display-none">
	    				<span class='p-text-success  tenor-text forLoginMsg' >you have sucessfully logged in</span><span class=' ml-4'><img width="10%" class="tenor" src="{{asset('images/tenor.gif')}}"></span>
	    			</span>
	    		</div>
	    		<div id="login-err" class="mt-3 ml-2 p-display-none">
	    			<span class="alert alert-danger forLoginMsg">Invalid username or password</span>
	    		</div>
	    		<div id="login-err2" class="mt-3 ml-4 p-display-none ">
	    			<span class="alert alert-warning forLoginMsg" >No internet connection...</span>
	    		</div>
    		</div>
    		<form id="login-form">
    			<input type="text" placeholder="Username" id="username" class="form-control my-3 h2 login-input"  name="username">
                <div class="position-relative">                    
    			<input type="password" placeholder="Password"  id="password" class="form-control my-3 h2 login-input" name="password">
                <span id="togglePwDisplay" style="user-select: none;cursor: pointer;position:absolute; top: 28%;right: 6%;" class="p-text-dark">show</span>
                </div>
    			<button class="p-dark sys-submit-btn text-white font fs8 fw2 w-100 h2" type="button" id="login-btn">Login</button>
    			<p class="p-text-dark text-center fs2 fw3"><a href="">Forgot Password?</a></p>
    		</form>
    		<form id="auto-redirect" action="/proccess-login" method="post">
    			{{csrf_field()}}
    			<input type="text" class="p-display-none" name="data" id="response-data">
    		</form>
    		<v-loginscript></v-loginscript>

    		</div>
    	</div>
    </div>
@endsection