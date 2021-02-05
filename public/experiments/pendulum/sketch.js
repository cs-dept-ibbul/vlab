// The Nature of Code
// Daniel Shiffman
// http://natureofcode.com

// Pendulum

// A simple pendulum simulation
// Given a pendulum with an angle theta (0 being the pendulum at rest) and a radius r
// we can use sine to calculate the angular component of the gravitational force.

// Gravity Force = Mass * Gravitational Constant;
// Pendulum Force = Gravity Force * sine(theta)
// Angular Acceleration = Pendulum Force / Mass = gravitational acceleration * sine(theta);

// Note this is an ideal world scenario with no tension in the
// pendulum arm, a more realistic formula might be:
// Angular Acceleration = (g / R) * sine(theta)

// For a more substantial explanation, visit:

let p;
let btnstate = false;
let ballSize = 30;
let ropeLenght = 2;
var mode = 1;
let myFontNormal;
let elapseT;
function setup() {
  createCanvas(940, 360);
  // Make a new Pendulum with an origin position and armlength
 resetPendulum();
  
  p.timer();//set timer;
  
 button = createButton('START');
  button.position(19, 19);
  button.mousePressed(btnControl);
  button.id('btnC');

  input = createInput(ballSize);
  input.size(85,20);
  input.attribute('type','number');
  input.position(19, 95);
  input.changed(resizeBall);
  input.input(resizeBall);
  input2 = createInput(ropeLenght);
  input2.size(85,20);
  input2.attribute('type','number');
  input2.position(19, 155);
  input2.changed(resizeRope);
  input2.input(resizeRope);
  
  elapseT = createP('--:--');
  elapseT.position(40,245);
  elapseT.style('font-size', '25px');
  elapseT.style('font-family', 'Oswald');
  elapseT.style('color','#fD0');
  elapseT.style('letter-spacing','2px');
  elapseT.id('elapseT');
  elapseT.style('font-weight','bold');

  showdegree = createP('-- degree');
  showdegree.position(465,-23);
  showdegree.style('font-size', '25px');
  showdegree.style('font-family', 'Oswald');
  showdegree.style('color','#357');
  showdegree.style('letter-spacing','2px');
  showdegree.id('showdegree');
  showdegree.style('font-weight','bold');
}

function draw() {
  background(255); 
  fill('#357');

  rect(8,65,123,260,10,0,10,0);
  fill('#fff');

 
  p.go();
  noStroke()
  textSize(22);
  fill('#fff');
  
  textFont('Oswald');
  textStyle('bold')
  text('TIME',45,210);
  text('ELAPSE TIME',15,270);
  fill('#fD0');
  
  fill('#fff');
  textSize(15);
  text('Object Size',19,90);
  text('Rope Lenght',19,150);
  //console.log(p.period);
  textFont('Oswald');
  textStyle('bolder');
  textSize(22);
  p.showTimer();
  
}
function resizeBall(){ 
  ballSize = this.value()
  p = new Pendulum(createVector(width / 2, 0), ropeLenght,ballSize);    
}
function resizeRope(){
  ropeLenght = this.value();
  p = new Pendulum(createVector(width / 2, 0), ropeLenght,ballSize);    
}
function btnControl(){  
  if(!btnstate){    
    
       btnstate = true;
    this.elt.innerText= 'STOP';
    resetPendulum();
     p.timer();
  }else{
    btnstate = false;   
   this.elt.innerText= 'START';
    
    p.stop();
    
    select('#elapseT').html(select('#timec').html());
  }

}
function resetPendulum() {
   p = new Pendulum(createVector(width / 2, 0), ropeLenght,ballSize);     
}
function mousePressed() {
  p.clicked(mouseX, mouseY);
}

function mouseReleased() {
  p.stopDragging();
}
