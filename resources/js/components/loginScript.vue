<template>
    <div></div>
</template>
<script>	
	export default {
		data:function() {
		   	return{
                username:"",
                password:"",
                error:"",
		    	}
        },
        methods:{
            singleValidate: function(id){
                $('#'+id).css('border','1px solid #e45');
                $('.requiredv').remove();
                $('#'+id).after('<span class="text-danger requiredv">Required !</span>')
            },
            validateI: function(id,sel=0, psw=false){
                if (sel ===0) {                        
                    let index =-1;                    
                    let $vm = this;
                    
                        if($('#'+id).val() == ""){                            
                            $('#'+id).css('border','1px solid #e45');
                            $('.requiredv').remove();
                            $('#'+id).after('<span class="text-danger requiredv">Required !</span>');
                            return false;
                        }else{
                            return $('#'+id).val();
                        }                                                           
                }
                if (sel=== 1) {
                    if($('#'+id+ 'option:selected').text()==""){
                        $('#'+id).css('border','1px solid #e45');
                        $('.requiredv').remove();
                        $('#'+id).after('<span class="text-danger requiredv">Required !</span>');                       
                        return false                    
                    }else{                      
                        return true;
                    }
                }
            },
            submitNow(){
                let $vm  = this;
                $vm.username = $vm.validateI('username');
                        $vm.password = $vm.validateI('password');                    

                        if ($vm.username != "" && $vm.password != "") {
                            
                           /* var formContents = jQuery("#login-form").serialize();
                            */           
                        
                            $('#login-msg-loader').show();
                            $('#login-err2').hide();
                            $('#login-err').hide();                               
                            try{                                
                                $vm.axios.post('api/login', {username:$vm.username, password:$vm.password}).then(function(response, status, request) {                        
                                        $('#login-msg-loader').hide();
                                        $('#login-msg-success').show();                                            
                                        $('#login-msg-success.checkmark').show();                                            
                                        if (response.status === 200) {                                        
                                           localStorage.setItem('LoggedUser',JSON.stringify(response.data));
                                            
                                            /*update store*/                            
                                           $vm.$store.dispatch('updateUser',response);

                                            $('#response-data').val(JSON.stringify(response));
                                            $('#auto-redirect').submit();
                                            $('#login-msg').css('display','none');                                    
                                                
                                        }else{
                                        $('#login-msg').css('display','none');                                    
                                            $('#login-err').show();                                        
                                        }
                                    }, function(e) {        
                                         if(e.response.status === 401 ){
                                            $('#login-msg').css('display','none');  
                                            $('#login-msg-loader').hide();                                            


                                            $('#login-err').show();  
                                         }else{
                                            $('#login-msg-loader').hide();
                                            $('#login-err2').show();                                                
                                         }                                                                   
                                    })                             
                            }catch(err){
                                $('#login-msg-loader').hide();                                            
                                $('#login-err2').show();
                            }                 
                        }
            }
        },


        created:function(){		  
        
        	
        },
        mounted(){
            let $vm = this;
            this.$nextTick(function(){
                    $('#username, #password').keyup(function(){
                        $(this).css('border','1px solid #bbb');
                        $(this).next('.requiredv').remove();
                    });
                try{

                }catch(err){
                    
                }


                $('#togglePwDisplay').click(function(){
                    var contX = $(this).text();
                    if (contX==='show') {
                        $(this).prev().attr('type','text');
                        $(this).text('hide')
                    }else if(contX === 'hide'){
                        $(this).prev().attr('type','password');                        
                        $(this).text('show');                        
                    }
                });
                
                $('#password').keyup(function(e){                    
                    if(e.key === 'Enter' || e.keyCode === 13){
                        $vm.submitNow();
                    }                    
                })
                $('#login-btn').click(function(){     
                    $vm.submitNow()
                })

            })
        }
        
	
};
</script>