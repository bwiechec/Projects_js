var score = 0;
function setup() {
    createCanvas(700,700);
}
var ball = {
    size:75,
    speed:5,
    speedX:0,
    ballPosX:700/2,
    ballPosY:700/2
};
function draw() {
    background(0,127,0);
    ellipse(ball.ballPosX,ball.ballPosY,ball.size,ball.size);
    ballMove();
}
function ballMove(){
    if(ball.ballPosY < 35){
        ball.speed = -ball.speed;
    }
    if(ball.ballPosX < 35){
        ball.speedX = -ball.speedX;
    }
    if(ball.ballPosX > 700-35){
       ball.speedX = -ball.speedX;
    }
    if(ball.ballPosY>width-35){
        ball.ballPosX= width/2;
        ball.ballPosY= height/2;
        ball.speed=0;
        ball.speedX=0;
        document.getElementById("gameOvr").style="visibility: visible";
        document.getElementById("gameOvr").innerHTML="Koniec gry <span id='ng' onclick='reset();' onMouseOver='moOvr();' onMouseLeave='moLv();' style='font-size:25px; color: White; background-color:Blue; border: 5px outset SkyBlue; padding: 2px;'>Nowa gra</span>";
    }
    ball.ballPosY -=ball.speed;
    ball.ballPosX -=ball.speedX;
}
function reset(){
    ball.size=75;
    ball.speed=5;
    ball.speedX=0;
    score=0; 
    document.getElementById("wynik").innerHTML=score;
    ball.ballPosX=700/2;
    ball.ballPosY=700/2;
    document.getElementById("gameOvr").style="visibility: hidden";
}
function moOvr(){
    document.getElementById("ng").style="border: 5px solid SkyBlue; background-color:MidnightBlue; font-size:25px; onMouseLeave='moLv();' padding: 2px; color: white;";
}
function moLv(){
    document.getElementById("ng").style='font-size:25px; color: White; background-color:Blue; border: 5px outset SkyBlue; padding: 2px;'
}
function mousePressed(){
    if(ball.speed<0){
    if(mouseX>=ball.ballPosX-35 && mouseX<=ball.ballPosX+35) {
        if(mouseY>=ball.ballPosY && mouseY<=ball.ballPosY+55)
        {
            score++;
            ball.speedX = map(mouseX,ball.ballPosX-35,ball.ballPosX+35,-10,10);
            ball.speed= -ball.speed;
            if(ball.speed>0) ball.speed++;
            else  ball.speed--;
            document.getElementById("wynik").innerHTML=score;
            
        }
    }
        }
}