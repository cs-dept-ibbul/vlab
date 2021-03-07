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
  
    }
  }
}


