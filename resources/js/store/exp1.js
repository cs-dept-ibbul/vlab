export default {



  state: {
    exp1:{
        //###################################One###########################################################  
        arr1v1:[
              {source: "v_Dot", target: "s_Dot", tid: "solar_cell1", sid: "voltmeterRead"},
              {source: "v_Rectangle", target: "s_Rectangle", tid: "solar_cell1", sid: "voltmeterRead"}
        ],

        arr1c1:[
         {source: "a_Dot", target: "s_Dot", tid: "solar_cell1", sid: "ameterRead"},
         {source: "a_Rectangle", target: "s_Rectangle", tid: "solar_cell1", sid: "ameterRead"}
         ],
        arr1v: 11.5,
        arr1c: 2.65,
      //###################################Two###########################################################  
        
        //two solar cell
        //parallele
        arr2pv1:[          
            {source: "s_Dot", target: "s_Dot", tid: "solar_cell2", sid: "solar_cell1"},
            {source: "s_Rectangle", target: "s_Rectangle", tid: "solar_cell2", sid: "solar_cell1"},
            {source: "s_Dot", target: "v_Dot", tid: "voltmeterRead", sid: "solar_cell1"},
            {source: "s_Rectangle", target: "v_Rectangle", tid: "voltmeterRead", sid: "solar_cell1"}
        ],

        arr2pc1:[          
            {source: "s_Dot", target: "s_Dot", tid: "solar_cell2", sid: "solar_cell1"},
            {source: "s_Rectangle", target: "s_Rectangle", tid: "solar_cell2", sid: "solar_cell1"},
            {source: "s_Dot", target: "a_Dot", tid: "ameterRead", sid: "solar_cell1"},
            {source: "s_Rectangle", target: "a_Rectangle", tid: "ameterRead", sid: "solar_cell1"}
        ],
        arr2pv: 11.5,
        arr2pc: 2.65*2,
        //series
        arr2sv1:[
          {source: "s_Rectangle", target: "v_Rectangle", tid: "voltmeterRead", sid: "solar_cell1"},
          {source: "s_Rectangle", target: "s_Dot", tid: "solar_cell1", sid: "solar_cell2"},
          {source: "s_Dot", target: "v_Dot", tid: "voltmeterRead", sid: "solar_cell2"}
        ],
        arr2sc1:[
          {source: "s_Rectangle", target: "a_Rectangle", tid: "ameterRead", sid: "solar_cell1"},
          {source: "s_Rectangle", target: "s_Dot", tid: "solar_cell1", sid: "solar_cell2"},
          {source: "s_Dot", target: "a_Dot", tid: "ameterRead", sid: "solar_cell2"}
        ],
        arr2sv: 6*2,
        arr2sc: 2.65,
  //###################################Three###########################################################        
        //three solar cell
        //parallel
        arr3pv1:[
          {source: "s_Dot", target: "v_Dot", tid: "voltmeterRead", sid: "solar_cell1"},
          {source: "s_Rectangle", target: "v_Rectangle", tid: "voltmeterRead", sid: "solar_cell1"},
          {source: "s_Dot", target: "s_Dot", tid: "solar_cell1", sid: "solar_cell2"},
          {source: "s_Rectangle", target: "s_Rectangle", tid: "solar_cell1", sid: "solar_cell2"},
          {source: "s_Dot", target: "s_Dot", tid: "solar_cell2", sid: "solar_cell3"},
          {source: "s_Rectangle", target: "s_Rectangle", tid: "solar_cell2", sid: "solar_cell3"}
        ],
        arr3pc1:[
          {source: "s_Dot", target: "a_Dot", tid: "ameterRead", sid: "solar_cell1"},
          {source: "s_Rectangle", target: "a_Rectangle", tid: "ameterRead", sid: "solar_cell1"},
          {source: "s_Dot", target: "s_Dot", tid: "solar_cell1", sid: "solar_cell2"},
          {source: "s_Rectangle", target: "s_Rectangle", tid: "solar_cell1", sid: "solar_cell2"},
          {source: "s_Dot", target: "s_Dot", tid: "solar_cell2", sid: "solar_cell3"},
          {source: "s_Rectangle", target: "s_Rectangle", tid: "solar_cell2", sid: "solar_cell3"}
        ],
        arr3pv: 11.5,
        arr3pc: 2.65*3,      
        //series
        arr3sv1:[
          {source: "s_Rectangle", target: "v_Rectangle", tid: "voltmeterRead", sid: "solar_cell1"},
          {source: "s_Rectangle", target: "s_Dot", tid: "solar_cell4", sid: "solar_cell3"},
          {source: "s_Dot", target: "v_Dot", tid: "voltmeterRead", sid: "solar_cell3"},
          {source: "s_Rectangle", target: "s_Dot", tid: "solar_cell1", sid: "solar_cell4"}
        ],
         arr3sc1:[
          {source: "s_Rectangle", target: "a_Rectangle", tid: "ameterRead", sid: "solar_cell1"},
          {source: "s_Rectangle", target: "s_Dot", tid: "solar_cell4", sid: "solar_cell3"},
          {source: "s_Dot", target: "a_Dot", tid: "ameterRead", sid: "solar_cell3"},
          {source: "s_Rectangle", target: "s_Dot", tid: "solar_cell1", sid: "solar_cell4"}
        ],
        arr3sv: 6*3,
        arr3sc: 2.65

    },
  exp2:{
    //###################################zero covered###########################################################  
      arr1v1:[
            {source: "v_Dot", target: "s_Dot", tid: "solar_cell1", sid: "voltmeterRead"},
            {source: "v_Rectangle", target: "s_Rectangle", tid: "solar_cell1", sid: "voltmeterRead"}

      ],

      arr1c1:[
       {source: "a_Dot", target: "s_Dot", tid: "solar_cell1", sid: "ameterRead"},
       {source: "a_Rectangle", target: "s_Rectangle", tid: "solar_cell1", sid: "ameterRead"}
       ],
      arr1v: 12,
      arr1c: 4.65,
    //###################################one quater###########################################################  
      arr2v1:[
            {source: "v_Dot", target: "s_Dot", tid: "solar_cell1", sid: "voltmeterRead"},
            {source: "v_Rectangle", target: "s_Rectangle", tid: "solar_cell1", sid: "voltmeterRead"}

      ],

      arr2c1:[
       {source: "a_Dot", target: "s_Dot", tid: "solar_cell1", sid: "ameterRead"},
       {source: "a_Rectangle", target: "s_Rectangle", tid: "solar_cell1", sid: "ameterRead"}
       ],
      arr2v: 9.5,
      arr2c: 3.44,      
      //###################################half###########################################################    
      arr3v1:[
            {source: "v_Dot", target: "s_Dot", tid: "solar_cell1", sid: "voltmeterRead"},
            {source: "v_Rectangle", target: "s_Rectangle", tid: "solar_cell1", sid: "voltmeterRead"}

      ],

      arr3c1:[
       {source: "a_Dot", target: "s_Dot", tid: "solar_cell1", sid: "ameterRead"},
       {source: "a_Rectangle", target: "s_Rectangle", tid: "solar_cell1", sid: "ameterRead"}
       ],
      arr3v: 7.5,
      arr3c: 2.32,      
      //###################################three Quater###########################################################    
      arr4v1:[
            {source: "v_Dot", target: "s_Dot", tid: "solar_cell1", sid: "voltmeterRead"},
            {source: "v_Rectangle", target: "s_Rectangle", tid: "solar_cell1", sid: "voltmeterRead"}

      ],

      arr4c1:[
       {source: "a_Dot", target: "s_Dot", tid: "solar_cell1", sid: "ameterRead"},
       {source: "a_Rectangle", target: "s_Rectangle", tid: "solar_cell1", sid: "ameterRead"}
       ],
      arr4v: 5.5,
      arr4c: 1.16,     
      //###################################full coverered###########################################################    
      arr5v1:[
            {source: "v_Dot", target: "s_Dot", tid: "solar_cell1", sid: "voltmeterRead"},
            {source: "v_Rectangle", target: "s_Rectangle", tid: "solar_cell1", sid: "voltmeterRead"}

      ],

      arr5c1:[
       {source: "a_Dot", target: "s_Dot", tid: "solar_cell1", sid: "ameterRead"},
       {source: "a_Rectangle", target: "s_Rectangle", tid: "solar_cell1", sid: "ameterRead"}
       ],
      arr5v: 0,
      arr5c: 0,              
  
    },
    experiment_data_format:{   
        'vernier-caliper':`<table class="table-stripped" style="width:80%; min-width:300px;">
                <thead class="bg-dark text-white fs01">
                    <th >#</th>
                    <th>Object 1</th>                    
                    <th>Object 2</th>                    
                    <th>Object 3</th>                    
                    <th>Object 4</th>                    
                    <th>Object 5</th>                    
                </thead>
               <tr>
                <td class="v-template p-1 text-center fs01 fw5" width="25%">External size</td>
                <td class="v-template" width="15%"><input type="number" class="valueReading form-control h-100 bg-white"></td>
                <td class="v-template" width="15%"><input type="number" class="valueReading form-control h-100 bg-white"></td>
                <td class="v-template" width="15%"><input type="number" class="valueReading form-control h-100 bg-white"></td>
                <td class="v-template" width="15%"><input type="number" class="valueReading form-control h-100 bg-white"></td>                    
                <td class="v-template" width="15%"><input type="number" class="valueReading form-control h-100 bg-white"></td>                    
              </tr>
              <tr>
                <td class="v-template p-1 text-center fs01 fw5" width="25%">Internal size</td>
                <td class="v-template" width="15%"><input type="number" class="valueReading form-control h-100 bg-white"></td>
                <td class="v-template" width="15%"><input type="number" class="valueReading form-control h-100 bg-white"></td>
                <td class="v-template" width="15%"><input type="number" class="valueReading form-control h-100 bg-white"></td>
                <td class="v-template" width="16%"><input type="number" class="valueReading form-control h-100 bg-white"></td>                    
                <td class="v-template" width="15%"><input type="number" class="valueReading form-control h-100 bg-white"></td>                    
              </tr>
              <tr>
                <td class="v-template p-1 text-center fs01 fw5" width="25%">Depth size</td>
                <td class="v-template" width="15%"><input type="number" class="valueReading form-control h-100 bg-white"></td>
                <td class="v-template" width="15%"><input type="number" class="valueReading form-control h-100 bg-white"></td>
                <td class="v-template" width="15%"><input type="number" class="valueReading form-control h-100 bg-white"></td>
                <td class="v-template" width="15%"><input type="number" class="valueReading form-control h-100 bg-white"></td>                    
                <td class="v-template" width="15%"><input type="number" class="valueReading form-control h-100 bg-white"></td>                    
              </tr>
              <tr>
            </table>`,
            'micrometer':`<table class="table-stripped" style="width:80%; min-width:300px;">
                 <thead class="bg-dark text-white fs01">
                    <th >#</th>
                    <th>Object 1</th>                    
                    <th>Object 2</th>                    
                    <th>Object 3</th>                    
                    <th>Object 4</th>                    
                    <th>Object 5</th>                    
                  </thead>
                 <tr>
                  <td class="v-template p-1 text-center fs01 fw5" width="25%">sizes</td>
                  <td class="v-template" width="15%"><input type="number" class="valueReading form-control h-100 bg-white"></td>
                  <td class="v-template" width="15%"><input type="number" class="valueReading form-control h-100 bg-white"></td>
                  <td class="v-template" width="15%"><input type="number" class="valueReading form-control h-100 bg-white"></td>
                  <td class="v-template" width="15%"><input type="number" class="valueReading form-control h-100 bg-white"></td>                    
                  <td class="v-template" width="15%"><input type="number" class="valueReading form-control h-100 bg-white"></td>                    
                </tr>
              </table>
            `,
            'resistor-color-code':`
              <div class="row mx-auto" style="width:96%;">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 pl-3 pr-1">
                  <div class="fs01">Normal Bands</div>
                  <select class="form-control w-100 py-2 chosen-select" id="normalBand_r" multiple>               
                    <option value="black"> black</option><option value="brown"> brown</option><option value="red"> red</option>
                    <option value="orange"> orange</option><option value="yellow"> yellow</option><option value="green"> green</option><option value="blue"> blue</option>
                    <option value="violet"> violet</option><option value="grey"> grey</option><option value="white"> white</option><option value="gold"> gold</option><option value="silver"> silver</option>
                  </select>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 px-1">
                  <div class="fs01">Tolerance</div>
                  <select class="form-control w-100 py-2" id="tolerance_r">
                    <option value="1">select tolerance</option>
                    <option value="black"> black</option><option value="brown"> brown</option><option value="red"> red</option>
                    <option value="orange"> orange</option><option value="yellow"> yellow</option><option value="green"> green</option><option value="blue"> blue</option>
                    <option value="violet"> violet</option><option value="grey"> grey</option><option value="white"> white</option><option value="gold"> gold</option><option value="silver"> silver</option>
                  </select>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 px-1">
                  <div class="fs01 w-100">Multiplier</div>
                  <select class="form-control w-100 py-2" id="multiplier_r">
                    <option value="1">select multiplier</option>
                    <option value="black"> black</option><option value="brown"> brown</option><option value="red"> red</option>
                    <option value="orange"> orange</option><option value="yellow"> yellow</option><option value="green"> green</option><option value="blue"> blue</option>
                    <option value="violet"> violet</option><option value="grey"> grey</option><option value="white"> white</option><option value="gold"> gold</option><option value="silver"> silver</option>
                  </select>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 px-1">
                  <div class="fs01">Temperature</div>
                  <div style="display:flex; width:100%">
                    <select class="form-control py-2" id="temperature_r" style="width:70%;">
                      <option value="1">select temperature</option>
                      <option value="brown">brown</option><option value="red">red</option><option value="orange">orange</option><option value="yellow">yellow</option>
                    </select>
                    <button id="addResistor" style="width:30%;" class="button py-1 px-1 fs01">Add</button>
                  </div>
                </div>
              </div>              
              <table class="table-stripped resistor mt-2" style="width:100%; min-width:300px;">
                  <thead class="bg-dark text-white fs01">
                    <th >Bands</th>
                    <th>Tolerance</th>
                    <th>Multiplier</th>
                    <th>Temperature</th>
                    <th>#</th>
                  </thead>
                  <tbody></tbody>
              </table>
            `      
    },
    
  loggedIn:null,
  },
   mutations: {
      updateUser(state, user) {    
        state.loggedIn = user; 
      }
  },
  actions:{
    setUser({commit}, user){
        commit('updateUser', user)
    }
  },
  getters:{
    //currentUser: state.loggedIn
  }
}


