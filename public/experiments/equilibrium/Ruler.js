class Ruler{
  constructor(){
    // (-50, 0) measured form the center of the rectangle
  this.pivot_x = 30;
  this.pivot_y = 15;    

  // Position at which the pivot point should be moved in the world
  this.target_x = 500
  this.target_y = 380; 

  this.angle = 0;
  this.angle_change = 0.01;
  
  this.diff = 5;
  }
  
  show(a=this.pivot_x, b=250,c=-250,d=180,e=2,s1=50,s2=50,s3=50){
    
    push()

    translate(this.target_x, this.target_y);
    rotate(this.angle);
    translate(-a, -this.pivot_y);

    noFill();
    stroke(0)
    rectMode(CENTER)    
    //rect(0,0,100,30);
    
    /*start ruler*/
      fill(0);
      noStroke();
    rect(0,0,500,30); 
    if(e==2){
      fill(10,200,230);           
      this.object(a,b,s1);
      
      fill(255,200,10);
      this.object(a,c,s2);      
    }else{      
      this.object(a,b,s1);      
      this.object(a,c,s2); 
      this.object(a,d,s3); 
    }
    //rect(a,this.pivot_y-80, 100, 100);
    //rect(a,this.pivot_y-80, 100, 100);
    
    /*end ruler*/
    pop();
    
    noStroke();
    fill(255, 0, 0);
    circle(this.target_x, this.target_y, 5);    
  }
  object(x,y,s){
    //if()
    s+=10;
    let bx = 2.25,by=15,rx,ry=s;
    rx = (bx * s)/by
    let start =this.pivot_y+60;
    stroke(4);
    strokeWeight(3);
    noStroke();
    rect(y,start, ry,ry,10);
    
    stroke(0);
    strokeWeight(1);
    fill(0);
    circle(y,start+10,10)
    line(y,start+10,y,start-60)
  }
  swing(a){
    if(a==1){
      //swing to right
      if(this.angle<0.3){
         this.angle += this.angle_change;
      }
    }else if(a==0){
      //sing to left
      if(this.angle> -0.3){
         this.angle -= this.angle_change;
      }
    }else if(a==-1){

      if(this.angle> 0 && this.angle !=0){
         this.angle -= this.angle_change;
      }
      if(this.angle< 0 && this.angle !=0){
         this.angle += this.angle_change;
      }
    }
  }
  getAngle(){
    return this.angle;
  }
}
