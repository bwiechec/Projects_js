var i = -1;
var speed = [-10];
var mn=[50];
var topB = new Array();
var moPoY = new Array();
var moPoX = new Array();
var r = new Array();
var g = new Array();
var b = new Array();

function setup() {
    createCanvas(600,400);
}

function draw() {
    background(111,111,111);
    drawBalls();
    if(i>=0) ballMoving();
}
function rollFill(){
    r[i] = random(255);
    g[i] = random(255);
    b[i] = random(255);
}
function resetXD(){
    i = -1;
    console.log(i);
}

function drawBalls(){
    
    for(var j = 0; j<=i;j++){
    fill(r[j],g[j],b[j])
    ellipse(moPoX[j],moPoY[j],50,50);
    }
}
function mousePressed(){
    /*var chk = true;
    for(var j = i; j>=0;j--){
        if(mouseX+24 && mouseX-24 == moPoX[j]){
            chk=false;
            break;
            }
    }
    if(chk){*/
    i++;
    rollFill();
       speed[i]=-10; 
        mn[i]=50;
     topB[i]=mouseY-50;
    var moPoXS = mouseX;
    var moPoYS = mouseY;
    moPoX[i]=moPoXS;
    moPoY[i]=moPoYS;
       // }
    
}
function ballMoving(){
    for(var j = 0; j<=i;j++){
        if(topB[j]<=399){
        if(moPoY[j]<=topB[j]){
            speed[j] = -speed[j];
        }
        else if(moPoY[j]>=400)
            {
                speed[j] = -speed[j];
                topB[j]+=mn[j];
                mn[j]= mn[j]/1.05;
                console.log(topB[j]);
            }
            moPoY[j]-=speed[j];
    }
        
        }
}