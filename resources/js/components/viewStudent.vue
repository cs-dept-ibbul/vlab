<template>
	<div  class="px-5 mt-5 card-cont">
            
            <div class="row mt-4 w-100">

                <div class="col-lg-4 col-md-6 col-sm-12 p-3" v-for="n in 10">
                    <div class="shadow-sm r2 bg-white d-flex flex-wrap justify-content-between w-100 pl-0 py-4 pr-4">                
                        <div class="p-0 image-bg-1"></div>
                        <div class="my-2">
                            <p class="fs2 fw7 mb-2 mt-4 fs10 font2 p-text-dark line-height-none show-student-detail cursor-1" @click='studentDetail(students)'>109</p>
                            <p class="mt-0 pt-0 p-text-dark font2 fw4 fs2 pl-2 ">Students</p>
                            <div class="font fs2 mt-4 p-text-warning cursor-1 show-course-detail r1" @click="couseDetail(departments)">
                                <span class="fa fa-cube" ></span>
                                <span class="" >PHY 107</span>
                            </div>
                        </div>
                        <div>
                            <span class="fa fa-plus p-2 r2 mr-3 p-text-warning p-transparent-warning fs9"></span>
                        </div>                    
                    </div>
    
                </div>        
               
            </div>
            <template id="swal-modalV">
			  <swal-title></swal-title>
			  <swal-html>...</swal-html>
			  <swal-icon type="warning" color="red"></swal-icon>
			  <swal-button type="confirm"></swal-button>
			  <swal-button type="cancel"></swal-button>
			  <swal-button type="deny"></swal-button>
			  <swal-param name="allowEscapeKey" value="false" />
			  <swal-param name="customClass" value='{ "popup": "my-popup" }' />
			</template>
        </div>
</template>


<script>
	export default{
		data(){
			return {
				courseData:null,
				departments:[
					{departments: 'physics', total:60},
					{departments: 'computer science', total:50},
					{departments: 'physics education', total:50},
					{departments: 'physics education', total:50},
					{departments: 'physics education', total:50},
					{departments: 'physics education', total:50},
					{departments: 'physics education', total:50},
					{departments: 'physics education', total:50},
					{departments: 'physics education', total:50},				
				],
				students:[
					{fname: 'ibrahim', lname:'amisu', matric:'u15/fns/csc/1030'},
					{fname: 'ibrahim', lname:'amisu', matric:'u15/fns/csc/1030'},
					{fname: 'ibrahim', lname:'amisu', matric:'u15/fns/csc/1030'},
					{fname: 'ibrahim', lname:'amisu', matric:'u15/fns/csc/1030'},
					{fname: 'ibrahim', lname:'amisu', matric:'u15/fns/csc/1030'},
					{fname: 'ibrahim', lname:'amisu', matric:'u15/fns/csc/1030'},
					{fname: 'ibrahim', lname:'amisu', matric:'u15/fns/csc/1030'},
					{fname: 'ibrahim', lname:'amisu', matric:'u15/fns/csc/1030'},
					{fname: 'ibrahim', lname:'amisu', matric:'u15/fns/csc/1030'},
					{fname: 'ibrahim', lname:'amisu', matric:'u15/fns/csc/1030'},
					{fname: 'ibrahim', lname:'amisu', matric:'u15/fns/csc/1030'},
					{fname: 'ibrahim', lname:'amisu', matric:'u15/fns/csc/1030'},
					
				],
			}
		},
		methods: {
			couseDetail:function(d){
				let table = "<table class='table r2 shadow-sm table-hover'><thead><tr>	<th >Department</th>	<th >No of Student</th> </tr></thead><tbody>";
					for (var i = 0; i < d.length; i++) {
						table += "<tr>";
						table += "<td >"+d[i]['departments'] + "</td>";
						table += "<td >"+d[i]['total'] + "</td>";
						table += "</tr>";
					}
					table += "</tbody></table>";
				Swal.fire({					
					html: table,
					width:'90%',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#3085d6',
					confirmButtonText: 'Print',
					cancelButtonText: 'exit'
				}).then((result) => {
				  if (result.isConfirmed) {
				  	let printWin = window.open();
					   printWin.document.write(table);
					   printWin.document.close();
					   printWin.focus();
					   printWin.print();
					   printWin.close();				    
				  }
				})
			},
			studentDetail:function(d){
				let table = "<table class='table r2 shadow-sm table-hover'><thead><tr><th class='text-left'>matric</th>	<th  class='text-left'>first name</th ><th class='text-left'>last name</th> </tr></thead><tbody>";
					for (var i = 0; i < d.length; i++) {
						table += "<tr>";
						table += "<td class='text-left' >"+d[i]['matric'] + "</td>";
						table += "<td  class='text-left'>"+d[i]['fname'] + "</td>";
						table += "<td class='text-left' >"+d[i]['lname'] + "</td>";
						table += "</tr>";
					}
					table += "</tbody></table>";
				Swal.fire({					
					html: table,
					width:'90%',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#3085d6',
					confirmButtonText: 'Print',
					cancelButtonText: 'exit'
				}).then((result) => {
				  if (result.isConfirmed) {
				  	let printWin = window.open();
					   printWin.document.write(table);
					   printWin.document.close();
					   printWin.focus();
					   printWin.print();
					   printWin.close();				    
				  }
				})
			}
		},
		async created(){

		    /*this.courseData  = await this.axiosGet('....');
		    //console.log(this.createdCourses)
		    this.tableLoaded = true;
		    initialize datatable 
             setTimeout(function() {
             	 $('#coursetable').DataTable({
			    	pageLength : 5,
			    });
             }, 200);*/
		},
	}
</script>
<style scoped="">
	.card-cont::-webkit-scrollbar-thumb {
  background: #20154f;
  border-radius: 10px;
  cursor: pointer;
}

/* Handle on hover */
.card-cont::-webkit-scrollbar-thumb:hover {
  background: #20154e;
  cursor: pointer;
}
.show-course-detail:hover{	
	color: #dd8200;
	text-decoration: underline;

}
.show-student-detail,.show-course-detail{
	transition: all 0.2s;
}
.show-student-detail:hover{	
	color: white;	
	text-shadow: #20154e 0px 1px 3px;
}

</style>