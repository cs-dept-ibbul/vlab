// The Nature of Code
// Daniel Shiffman
// http://natureofcode.com

// Pendulum

// A Simple Pendulum Class
// Includes functionality for user can click and drag the pendulum

// This constructor could be improved to allow a greater variety of pendulums
class Pendulum {


  constructor(origin_, r_,ballr,angle=40 ) {
    // Fill all variables
    this.origin = origin_.copy();
    this.position = createVector();
    this.r = r_*50;
    this.angle = PI / 4;

    this.aVelocity = 0.0;
    this.aAcceleration = 0.0;
    this.damping = 0.995; // Arbitrary damping
    this.ballr = ballr*2; //48.0; // Arbitrary ball radius

    this.dragging = false;
    this.period = 0;
    this.activateP =0;
    this.pin = 1;
    this.aprev =0;
    this.timerValue = 0;
    this.munitesK = 0;
    this.affect = 0;
    var $bigVm = this;
    this.angle = angle;
    var angleDet=angle;
    var myTimer;
    var ballTarget = 0;
 
  }


  go() {
    this.update();
    this.drag(); // for user interaction
    this.display();
  }
  timer(stage){
    let $vm = this;
    
    
      $vm.myTimer = setInterval(function(){ 
       $vm.timerValue = $vm.timerValue+1;         
    }, 1000);    
      $vm.timeholder('--:--');
     // print(true)
  }

  stopTimer(){
      // print(false)
      let $vm = this;
      clearInterval($vm.myTimer);         
  }


  showTimer(){  
    let $vm = this;
    let timec = select('#timec');
    //print(this.timerValue++)
    if(this.timerValue > 59){
      $vm.munitesK++;
      this.timerValue =0;
    }
    
    if(this.timerValue < 10){
      timec.html($vm.munitesK + ":0" + this.timerValue);
      //text($vm.munitesK + ":0" + this.timerValue,45, height/1.5);            
    }else{
      timec.html($vm.munitesK + ":" + this.timerValue);
    //text($vm.munitesK + ":" + this.timerValue, 45,height/1.5);     
    }
  }

  restarttimer(){
   this.timerValue = 0;
   this.munitesK = 0; 
 /*  clearInterval(myTimer);
    myTimer = setInterval(myFn, 4000);*/

  }
  timeIt(){    
      this.timerValue++;    
  }
  
  timeholder(t){
    if(select('#timec')){
      select('#timec').html('--:--');
    }else{
      let timec;//html object for time
      timec = createP(t);
      timec.position(40,185);
      timec.style('font-size', '25px');
      timec.style('font-family', 'Oswald');
      timec.style('color','#fff');
      timec.style('letter-spacing','2px');
      timec.id('timec');
      timec.style('font-weight','bold');
    }
   
  }
  // Function to update position
  update() {

    // As long as we aren't dragging the pendulum, let it swing!
    if (!this.dragging) {

      /*speed determinant */
      this.affect = abs((this.r - this.ballr + this.angle)/30);
      //print(this.affect);

      //this.affect = abs((this.r - this.ballr + this.angle)/30);
      //print(this.angleDet) ;
      /*end speed determinant*/
      let gravity = this.affect; // Arbitrary constant
      let k = (this.r/50)*20;
      this.aAcceleration = (-1  * sin(this.angle)/ k); 
      //print(this.aAcceleration);
      if(this.aprev == 0){
        this.aprev = this.angle;        
      }else{
        if(Math.sign(this.aprev) != Math.sign(this.angle)){ 
          this.activateP++;
          this.aprev = this.angle;
        }else{
          this.aprev =this.angle;
        }
      }
      if(this.activateP==2){
          this.period++;
          this.activateP = 0;
        }   
      
       // print(this.period);   
  /*    if(this.angle>0 ){
        if(this.pin == 1){
          this.activateP++;
          this.pin = -1;
        }     
        
        if(this.activateP==4){
          this.period++;
          this.activateP = 0;
        }                 
      }else if(this.angle>0 ){
        if(this.activateP != 0){
          this.pin = 1;
        }
        
        if(this.pin == 1){
          this.activateP++;
          this.pin = -1;
        }     
        
        if(this.activateP==4){
          this.period++;
          this.activateP = 0;
        }   
        
      }*/
           
      
        
      this.aVelocity += this.aAcceleration; // Increment velocity
      this.aVelocity *= this.damping; // Arbitrary damping
      //print('velocity: '+this.aVelocity);
      this.angle += this.aVelocity; // Increment angle
        angleMode(DEGREES);
    let a = atan2(mouseY - height / 2, mouseX - width / 2);
    //print(a);
     angleMode(RADIANS);
    
    }
  }

  display() {
    this.position.set(this.r * sin(this.angle), this.r * cos(this.angle), 0); // Polar to cartesian conversion
    this.position.add(this.origin); // Make sure the position is relative to the pendulum's origin

    stroke(255, 204, 0);
    strokeWeight(4);
    // Draw the arm
    line(this.origin.x, this.origin.y, this.position.x, this.position.y);
    ellipseMode(CENTER);
    fill('#357');
    if (this.dragging) fill(200);
    // Draw the ball
    
    ellipse(this.position.x, this.position.y, this.ballr, this.ballr);
      fill(20,60,80);
    noStroke();
    ellipse(this.position.x, this.position.y, this.ballr/5, this.ballr/5);
    
    
  }
  distance(){
    return dist(mouseX,mouseY, this.position.x, this.position.y);    
  }
  getCX(){
    return this.position.x;
  }
  getCY(){
    return this.position.y;
  }
  getCR(){
    return this.ballr
  }
  // The methods below are for mouse interaction

  // This checks to see if we clicked on the pendulum ball
  clicked(mx, my) {
    let d = dist(mx, my, this.position.x, this.position.y);
    if (d < this.ballr) {
      this.dragging = true;
      this.ballTarget = 1;
    }
  }
  clickTarget(){
    let theTarget = this.ballTarget;
    this.ballTarget = 0;
    return theTarget;
  }
  // This tells us we are not longer clicking on the ball
  stopDragging(){
   //$vm.timeholder('--:--');   
    this.aVelocity = 0; // No velocity once you let go
    this.dragging = false;
  }
  //this stop the swinging
  stop(){
    this.angle = 0;    
    this.aVelocity = 0; 
  }

  drag() {
    // If we are draging the ball, we calculate the angle between the
    // pendulum origin and mouse position
    // we assign that angle to the pendulum
    if (this.dragging) {
      let diff = p5.Vector.sub(this.origin, createVector(mouseX, mouseY)); // Difference between 2 points
      this.angle = atan2(-1 * diff.y, diff.x) - radians(90); // Angle relative to vertical axis
    angleMode(DEGREES);
    let determin = atan2(mouseY, mouseX - width / 2);
 //   print(abs(abs(a)-90));
    this.angleDet = abs(abs(determin)-90);
    //print(this.angleDet);
    select('#showdegree').html(Math.round(this.angleDet)+'<deg>&deg</deg>');
     angleMode(RADIANS);
  }
    }
}