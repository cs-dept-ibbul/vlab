// Click and Drag an object
// Daniel Shiffman <http://www.shiffman.net>

class Pivot {
  constructor() {

    this.dragging = false; // Is the object being dragged?
    this.rollover = false; // Is the mouse over the ellipse?


    this.x = 186;
    this.y = 100;
    // Dimensions
    this.w = 75;
    this.h = 50;
    
    
    this.posConstant = 180
    this.pivotx1 = this.posConstant+320;//this determine pivot position
    this.pivoty1= height/1.87;
    this.pivotx2 = this.posConstant+300;//60 < from x1    
    this.pivoty2= height/1.5;
    this.pivotx3=this.posConstant+340;//60 > from x1
    this.pivoty3= height/1.5;
  }

  over() {
  
    // Is mouse over object
    if (mouseX > this.pivotx2 && mouseX < this.pivotx3 && mouseY > this.pivoty1 && mouseY < this.pivoty3) {
      this.rollover = true;      
    } else {   
      this.rollover = false;
    }

  }

  update() {
   
    // Adjust location if being dragged
    if (this.dragging) {
      
      this.x = mouseX + this.offsetX;
      this.pivotx1 = this.posConstant + this.x;
      
      
      this.pivotx2 = this.posConstant + this.x - 60;
      this.pivotx3 = this.posConstant + this.x + 60;
    }

  }

  pivot() {

    triangle(this.pivotx1, this.pivoty1, this.pivotx2, this.pivoty2, this.pivotx3, this.pivoty3);

    //  pivot.pressed();
    if (this.dragging) {
      this.x = mouseX + this.offsetX;
      this.pivotx1 = this.posConstant + this.x;
      this.pivotx2 = this.posConstant + this.x - 60;
      this.pivotx3 = this.posConstant + this.x + 60;
    }


    //   rect(, this.y, this.w, this.h);
  }

  pressed() {
    // Did I click on the rectangle?
    if  (mouseX > this.pivotx2 && mouseX < this.pivotx3 && mouseY > this.pivoty1 && mouseY < this.pivoty3)  {
      this.dragging = true;
      // If so, keep track of relative location of click to corner of rectangle
      this.offsetX = this.x - mouseX;
     // this.offsetY = this.y - mouseY;
    }
  }

  released() {
    // Quit dragging
    this.dragging = false;
  }
  pivotPosition(){
    let value;
    value = ((this.pivotx1 - 180)/30)*5;
    return this.pivotx1;
  }
}