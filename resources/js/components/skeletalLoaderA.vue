<template>
	<div class="w-100">      
        <div class="w-100 m-0 p-0" v-if="type=='table'">            
            <span v-for="i in Number(count)" class="w-100">
                <div class="ssc-head-line mb" style="height: 100px;"></div>
                <div class="ssc-line mt-2 w-100"></div>
                <div class="ssc-line mb w-75"></div>
                <div class="ssc-line mb w-50"></div>
                <div class="ssc-line mb w-25"></div>
                <br v-if='i != count'>       
            </span>      
        </div>

        <div class="w-100 m-0 p-0" v-if="type=='line'">
            <div class="ssc-line mb w-75"></div>
            <div class="ssc-line mb w-50"></div>
        </div>
    </div>
</template>
<script>
	export default{
        props:{
            type:{
                type:String,
                default:function(){
                    return 'table';
                }
            },
            count: {
                type:String,
                default: function(){
                    return '3';
                }
            }
        },
        created(){
            this.count
        }

	}
</script>