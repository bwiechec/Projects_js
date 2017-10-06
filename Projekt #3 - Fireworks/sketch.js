var rects = new Array();
var balls = new Array();

function setup() {
    createCanvas(800,600);
}

function draw() {
	background(125);
	fill(255);
	for(var i = rects.length-1; i>0;i--){
		rects[i].draw();
		if(rects[i].dead){
			rects.splice(i,1);	  
		}
		  
	}
	for(var i = balls.length-1; i>0;i--){
		balls[i].draw();
		if(balls[i].dead){
			balls.splice(i,1);	  
		}
		  
	}
	
}

const widthFw = 7.5; 
const heigthFw = 45; 

function mousePressed(){
	rects.push(new Fw(mouseX,mouseY));
}

function Fw(x,y){
	this.x=x;
	this.y=y;
	this.vy = random(3,5);
	this.dead = false;
	this.color = {
		r: random(20,235),
		g: random(20,235),
		b: random(20,235),
	}
}

Fw.prototype.width = widthFw;
Fw.prototype.height = heigthFw;
Fw.prototype.speed = 0.99;

Fw.prototype.draw = function(){
	rect(this.x,this.y,this.width,this.height);
	this.move();
}

Fw.prototype.move = function(){
	this.y -= this.vy;
	this.vy *= this.speed;
	if(this.vy<0.5) {
		this.dead = true;
		for(var i =0; i<20;i++)
		balls.push(new Ball(this.x,this.y,this.color));
	}
}

function Ball(x,y,color){
	this.x=x;
	this.y=y;
	this.size=7;
	this.vx = random(-1, 1);
    this.vy = random(-2, 1);
	this.speed = 0.992;
	this.dead = false;
	this.r = color.r - random(0,20);
	this.g = color.g - random(0,20);
	this.b = color.b - random(0,20);
}

Ball.prototype.draw = function(){
	fill(this.r,this.g,this.b);
	ellipse(this.x,this.y,this.size,this.size);
	this.move();
}

Ball.prototype.move = function(){
	this.x += this.vx;
	this.y += this.vy;
	this.vx *= this.speed; 
	//this.vy *= this.speed;
	if(this.vy<0.1)
	this.dead = true;
}