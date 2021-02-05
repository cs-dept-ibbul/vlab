var wp1=100,wp2=0,wp3=50,wpm1=100,wpm2=1, wpm3=50,count=2,wps1=50,wps2=50, wps3=50, f1,f2,f3;//count is for number of object, wp1: object one position
var m,p,pivotPosController,pivotPos=50,pShowValue,x,y,z, angle,w1controll=wp1,w1pShowValue,w2controll=wp2,w2pShowValue,w3controll=wp3,w2pShowValue,balanceState;

function setup() {
  createCanvas(1000, 700);
  m = new Ruler();
  p = new Pivot();

  /*
  pivotPosController = createInput(pivotPos,'range');
  pivotPosController.position(20,50);
 
  let pivotPosLabel = createP('Adjust Pivot position');
  pivotPosLabel.position(20, 10);
  pShowValue = createP(pivotPos+'m');
  pShowValue.position(155,30);
  pShowValue.style('background','#359');
  pShowValue.style('color','#fff');
  pShowValue.style('padding','5px');
  pShowValue.id('pShowValue');
  //
  pivotPosController.input(pivotController);*/
  objectControllPivot('pShowValue','Adjust Pivot position',50,20,50,20,10,155,30,'255,0,0');
  //(id,label,range, mx,my, lx,ly, rx,ry)
 objectControll1('w1showValue','Adjust Object A',100, 20,95, 20,60, 155,75,'10,200,230');  
 objectControll2('w2showValue','Adjust Object B',0, 20,140, 20,105, 155,115,'255,200,10');  
  if(count ==3){
   objectControll3('w3showValue','Adjust Object C',0, 20,182, 20,148, 155,157);
  }
 
  objectSizeControll1('w1showSizeValue','Object Size A',50, 20,185, 20,155, 155,160,'10,200,230');  
   objectSizeControll2('w2showSizeValue','Object Size B',50, 20,230, 20,200, 155,205,'255,200,10');  
  if(count ==3){ 
    objectSizeControll2('w3showSizeValue','Object Size C',50, 20,275, 20,245, 155,250);  
  } 
  //get real value for pivot position on ruler
  pivotPos = MC(pivotPos);
  wp1 = MC(wp1);
  wp2 = MC(wp2);
  wp3 = MC(wp3);
}

function draw() {
       //print(w1controll);
   //print(w1controll);
  background(255);
  p.pivot();
  p.update();
  p.over();
  evaluate();
  //swinger();
 
}
function mainObjects(){
  m.show(pivotPos,wp1,wp2,wp3,count,wps1,wps2,wps3);
}
function swinger(){
   if(balanceState==0){
  //m.show(pivotPos,wp1,wp2,wp3,count,wps1,wps2,wps3);//
     mainObjects();
     m.swing(-1);//balance the ruller
  }else if(balanceState==1){
    // print(wpm1);  
    mainObjects();
      m.swing(1);//balance the ruller
  //m.show(pivotPos,wp1,wp2,wp3,count,wps1,wps2,wps3);//
    m.swing(1);
  }else if(balanceState==2){
  mainObjects();//right end -250
  m.swing(0);
  }
}
function evaluate(){
    print('pivot:'+MCR(wp2));
  f1 = wps1 ;//* 9.8;
  f2 = wps2 ;//* 9.8;
  f3 = wps3 ;//* 9.8;
  let solve1,solve2,normalization;

    solve1 =Math.trunc(f1 * Math.abs(MCR(wp1)-MCR(pivotPos)));    
    solve2 = Math.trunc(f2 * Math.abs(MCR(wp2)-MCR(pivotPos)));    
    normalization = normalizeResult(solve1,solve2);
  if(solve1==solve2){
    balanceState = 0;
   swinger();
  }
  
  print(solve1);
    print(solve2);
  if(wpm1 > 50){  
   
    if(solve1 > solve2){
      balanceState = 1;
    }else if(solve1<solve2){            
      balanceState = 2;
    }

    if(normalization){
      balanceState = 0;      
    }
     
  }else{
  
    if(solve1 >solve2){
      balanceState = 2;
    }else if(solve1<solve2){      
      balanceState = 2;print(12);
      if(wpm2 > 50){
        balanceState = 1;
      }
    }
    if(normalization){
      balanceState = 0;      
    }
     
     
  }
 
  //check if they are on the same side
  if(wpm1 > 50 && wpm2 > 50){
    balanceState = 1;
  }else if(wpm1 < 50 && wpm2 <50){
    balanceState =2;
  }

  swinger();

}
//measurment converter
function MC(value){
  if(value === 50){
    return 0;
  }else{
    let perC;
    if (value==0){
        perC =0;
    }else{
      perC = (value/100)* 500;
    }
    
    if(perC == 0){
      return -250;
    }else if(perC < 250){
      //from begging of ruler to center
      return -Math.abs(perC-250)
    }else{
      //from center of ruler  to end
      let nPerC;
      nPerC = perC - 250;      
      return nPerC;
    }
  }
}
function MCR(value){
if(value == 0){
      return 50;
  }else{
    let perC;
    perC = (value/250)*50;
    if(value>0){
        return perC+50;
    }else{
        return Math.abs(perC+50);
      
    }    
  }
}
function pivotController(){
  //print(this.value());
  pivotPos =-MC(this.value());
  select('#pShowValue').html(this.value()+'m');
}

function mousePressed() {
  //dragObj1.pressed()
}

function mouseReleased() {
  //dragObj1.released();    
}
function objectControllPivot(id,label,range, mx,my, lx,ly, rx,ry,colorCode){
   let controll = createInput(range,'range');
  controll.position(mx,my);
  controll.attribute('step','1');
 // controll.attribute('min','1');
  controll.attribute('max','100');
  let Label = createP(label);
  Label.position(lx, ly);
  let ShowValue = createP(range+'m');
  ShowValue.position(rx,ry-25);
  ShowValue.style('background','rgb('+colorCode+')');
  ShowValue.style('color','#000');
  ShowValue.style('padding','5px');
  ShowValue.style('border-radius','5px');
  ShowValue.id(id);
  controll.input(function(){
       select('#'+id).html(this.value()+'m');
       select('#'+id).attribute('class','range-value');
       pivotPos = MC(this.value());
      let newPosition = 10 - (this.value() * 0.2);
    select('#'+id).html(`<span>${this.value()}</span>`);
    ShowValue.position(mouseX,ry-25);    
       evaluate()
     });
}

function objectControll1(id,label,range, mx,my, lx,ly, rx,ry,colorCode){
   let controll = createInput(range,'range');
  controll.position(mx,my);
  controll.attribute('step','0.1');
 // controll.attribute('min','1');
  controll.attribute('max','100');
  let Label = createP(label);
  Label.position(lx, ly);
  let ShowValue = createP(range+'m');
  ShowValue.position(rx,ry-25);
  ShowValue.style('background','rgb('+colorCode+')');
  ShowValue.style('color','#000');
  ShowValue.style('padding','5px');
  ShowValue.style('border-radius','5px');
  ShowValue.id(id);
  controll.input(function(){
       select('#'+id).html(this.value()+'m');
       select('#'+id).attribute('class','range-value');
       wp1 = MC(this.value());
       wpm1 = this.value();//distance real        
      let newPosition = 10 - (this.value() * 0.2);
    select('#'+id).html(`<span>${this.value()}</span>`);
    ShowValue.position(mouseX,ry-25);    
       evaluate()
     });
}

function objectControll2(id,label,range, mx,my, lx,ly, rx,ry,colorCode){
     let controll = createInput(range,'range');
  controll.position(mx,my);
  controll.attribute('step','0.1');
 // controll.attribute('min','1');
  controll.attribute('max','100');
  let Label = createP(label);
  Label.position(lx, ly);
  let ShowValue = createP(range+'m');
  ShowValue.position(rx,ry-25);
  ShowValue.style('background','rgb('+colorCode+')');
  ShowValue.style('color','#000');
  ShowValue.style('padding','5px');
  ShowValue.style('border-radius','5px');
  ShowValue.id(id);
  controll.input(function(){
       select('#'+id).html(this.value()+'m');
       select('#'+id).attribute('class','range-value');
       wp2 = MC(this.value());
       wpm2 = this.value();//distance real        
      let newPosition = 10 - (this.value() * 0.2);
    select('#'+id).html(`<span>${this.value()}</span>`);
    ShowValue.position(mouseX,ry-25);    
       evaluate()
     });
}

//
function normalizeResult(k1,k2){
  let abk = Math.abs(k1-k2);
  if (abk<=5){
    return true;
  }else{
    return false;
  }
}

function objectControll3(id,label,range, mx,my, lx,ly, rx,ry,colorCode){
     let controll = createInput(range,'range');
  controll.position(mx,my);
  controll.attribute('step','0.0001');
 // controll.attribute('min','1');
  controll.attribute('max','100');
  let Label = createP(label);
  Label.position(lx, ly);
  let ShowValue = createP(range+'m');
  ShowValue.position(rx,ry-20);
  ShowValue.style('background','rgb('+colorCode+')');
  ShowValue.style('color','#000');
  ShowValue.style('padding','5px');
  ShowValue.style('border-radius','5px');
  ShowValue.id(id);
  controll.input(function(){
       select('#'+id).html(this.value()+'m');
       select('#'+id).attribute('class','range-value');
       wp3 = MC(this.value());
       wpm3 = this.value();//distance real        
      let newPosition = 10 - (this.value() * 0.2);
    select('#'+id).html(`<span>${this.value()}</span>`);
    ShowValue.position(mouseX,ry-20);    
       evaluate()
     });
}

/*object size control*/
function objectSizeControll1(id,label,range, mx,my, lx,ly, rx,ry,colorCode){
   let controll = createInput(range,'range');
  controll.position(mx,my);
  controll.attribute('step','0.0001');
 // controll.attribute('min','1');
  controll.attribute('max','100');
  let Label = createP(label);
  Label.position(lx, ly);
  let ShowValue = createP(range+'g');
  ShowValue.position(rx,ry-20);
  ShowValue.style('background','rgb('+colorCode+')');
  ShowValue.style('color','#000');
  ShowValue.style('padding','5px');
  ShowValue.style('border-radius','5px');
  ShowValue.id(id);
  controll.input(function(){
       select('#'+id).html(this.value()+'g');
       select('#'+id).attribute('class','range-value');       
       wps1 = this.value();//distance real        
      let newPosition = 10 - (this.value() * 0.2);
    select('#'+id).html(`<span>${this.value()}g</span>`);
    ShowValue.position(mouseX,ry-20);    
       evaluate()
     });
}

function objectSizeControll2(id,label,range, mx,my, lx,ly, rx,ry,colorCode){
    let controll = createInput(range,'range');
  controll.position(mx,my);
  controll.attribute('step','0.1');
 // controll.attribute('min','1');
  controll.attribute('max','100');
  let Label = createP(label);
  Label.position(lx, ly);
  let ShowValue = createP(range+'g');
  ShowValue.position(rx,ry-20);
  ShowValue.style('background','rgb('+colorCode+')');
  ShowValue.style('color','#000');
  ShowValue.style('padding','5px');
  ShowValue.style('border-radius','5px');
  ShowValue.id(id);
  controll.input(function(){
       select('#'+id).html(this.value()+'g');
       select('#'+id).attribute('class','range-value');       
       wps2 = this.value();//distance real        
      let newPosition = 10 - (this.value() * 0.2);
    select('#'+id).html(`<span>${this.value()}g</span>`);
    ShowValue.position(mouseX,ry-20);    
       evaluate()
     });
}

function objectSizeControll3(id,label,range, mx,my, lx,ly, rx,ry,colorCode){
   let controll = createInput(range,'range');
  controll.position(mx,my);
  controll.attribute('step','0.1');
 // controll.attribute('min','1');
  controll.attribute('max','100');
  let Label = createP(label);
  Label.position(lx, ly);
  let ShowValue = createP(range+'m');
  ShowValue.position(rx,ry-20);
  ShowValue.style('background','rgb('+colorCode+')');
  ShowValue.style('color','#000');
  ShowValue.style('padding','5px');
  ShowValue.style('border-radius','5px');
  ShowValue.id(id);
  controll.input(function(){
       select('#'+id).html(this.value()+'g');
       select('#'+id).attribute('class','range-value');       
       wps3 = this.value();//distance real        
      let newPosition = 10 - (this.value() * 0.2);
    select('#'+id).html(`<span>${this.value()}g</span>`);
    ShowValue.position(mouseX,ry-20);    
       evaluate()
     });
}