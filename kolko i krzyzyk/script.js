var elPole1 = document.getElementById('p1');
var elPole2 = document.getElementById('p2');
var elPole3 = document.getElementById('p3');
var elPole4 = document.getElementById('p4');
var elPole5 = document.getElementById('p5');
var elPole6 = document.getElementById('p6');
var elPole7 = document.getElementById('p7');
var elPole8 = document.getElementById('p8');
var elPole9 = document.getElementById('p9');
var elKto = document.getElementById('who');
var firstOne;
var playerX;
var graPlayerX = 'Gra gracz X';
var playerO;
var graPlayerO = 'Gra gracz O';
var runda = 0;
//do{
    
firstOne = prompt('Który gracz pierwszy?','Np. X lub O (literki)');
if(firstOne == 'X' || firstOne =='O') console.log(firstOne);

switch(firstOne){
    case 'X':
        playerX=true;
        playerO=false;
        elKto.textContent = graPlayerX;
        break;
    case 'O':
        playerO=true;
        playerX=false;
        elKto.textContent = graPlayerO;
        break;
    default:
        alert('Zły wybor odświerze teraz strone.');
        location.reload();
    break;
}
//}while(firstOne != 'X' || firstOne !='O')

function textRefresh(){
    if(playerX){
        elKto.textContent = graPlayerX;
    }else{
        elKto.textContent = graPlayerY;
    }
}

function playerMove(elem){
    runda++;
    if(playerX){
        elem.textContent = 'X';
        elem.value = 'X';
        changePlayer();
        
    }else{
        elem.textContent = 'O';
        elem.value = 'O';
        changePlayer();
    }
    elem.onclick = function(){
        alert('Pole było juz uzyte');
    }
    elem.style.backgroundColor = 'rgba(173, 173, 173, 0.22)';

}

function changePlayer(){
    if(playerX){
        playerO=true;
        playerX=false;
        elKto.textContent = graPlayerO;
    }else{
        elKto.textContent = graPlayerX;
        playerX=true;
        playerO=false;
    }
}

elPole1.onclick = function(){
    playerMove(elPole1);
    if(elPole5.value == elPole1.value && elPole9.value == elPole1.value){
        if(playerX){
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS; text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz O<br>Kliknij by odświeżyć</div></a>')
        }else{
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS; text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz X<br>Kliknij by odświeżyć</div></a>')
        }
    }
    else if(elPole4.value == elPole1.value && elPole7.value == elPole1.value){
        if(playerX){
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS; text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz O<br>Kliknij by odświeżyć</div></a>')
        }else{
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS; text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz X<br>Kliknij by odświeżyć</div></a>')
        }
    }
    else if(elPole2.value == elPole1.value && elPole3.value == elPole1.value){
        if(playerX){
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS;text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz O<br>Kliknij by odświeżyć</div></a>')
        }else{
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS;text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz X<br>Kliknij by odświeżyć</div></a>')
        }
    }
    else if(runda==9){
       document.write('<a href="index.html" style="text-decoration: none; color: red;"><div style="font-size: 72px;">Koniec gry</div></a>') 
    }
}
elPole2.onclick = function(){
    playerMove(elPole2);
    if(elPole1.value == elPole2.value && elPole3.value == elPole2.value){
        if(playerX){
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS; text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz O<br>Kliknij by odświeżyć</div></a>')
        }else{
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS; text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz X<br>Kliknij by odświeżyć</div></a>')
        }
    }
    else if(elPole5.value == elPole2.value && elPole8.value == elPole2.value){
        if(playerX){
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS; text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz O<br>Kliknij by odświeżyć</div></a>')
        }else{
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS; text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz X<br>Kliknij by odświeżyć</div></a>')
        }
    }
    else if(runda==9){
       document.write('<a href="index.html" style="text-decoration: none; color: red;"><div style="font-size: 72px;">Koniec gry</div></a>') 
    }
}
elPole3.onclick = function(){
    playerMove(elPole3);
    if(elPole5.value == elPole3.value && elPole7.value == elPole3.value){
        if(playerX){
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS; text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz O<br>Kliknij by odświeżyć</div></a>')
        }else{
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS; text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz X<br>Kliknij by odświeżyć</div></a>')
        }
    }
    else if(elPole2.value == elPole3.value && elPole1.value == elPole3.value){
        if(playerX){
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS; text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz O<br>Kliknij by odświeżyć</div></a>')
        }else{
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS; text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz X<br>Kliknij by odświeżyć</div></a>')
        }
    }
    else if(elPole6.value == elPole3.value && elPole9.value == elPole3.value){
        if(playerX){
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS;text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz O<br>Kliknij by odświeżyć</div></a>')
        }else{
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS;text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz X<br>Kliknij by odświeżyć</div></a>')
        }
    }
    else if(runda==9){
       document.write('<a href="index.html" style="text-decoration: none; color: red;"><div style="font-size: 72px;">Koniec gry</div></a>') 
    }
}
elPole4.onclick = function(){
    playerMove(elPole4);
    if(elPole5.value == elPole4.value && elPole6.value == elPole4.value){
        if(playerX){
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS; text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz O<br>Kliknij by odświeżyć</div></a>')
        }else{
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS; text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz X<br>Kliknij by odświeżyć</div></a>')
        }
    }
    else if(elPole1.value == elPole4.value && elPole7.value == elPole4.value){
        if(playerX){
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS; text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz O<br>Kliknij by odświeżyć</div></a>')
        }else{
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS; text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz X<br>Kliknij by odświeżyć</div></a>')
        }
    }
    else if(runda==9){
       document.write('<a href="index.html" style="text-decoration: none; color: red;"><div style="font-size: 72px;">Koniec gry</div></a>') 
    }
}
elPole5.onclick = function(){
    playerMove(elPole5);
    if(elPole1.value == elPole5.value && elPole9.value == elPole5.value){
        if(playerX){
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS; text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz O<br>Kliknij by odświeżyć</div></a>')
        }else{
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS; text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz X<br>Kliknij by odświeżyć</div></a>')
        }
    }
    else if(elPole4.value == elPole5.value && elPole6.value == elPole5.value){
        if(playerX){
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS; text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz O<br>Kliknij by odświeżyć</div></a>')
        }else{
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS; text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz X<br>Kliknij by odświeżyć</div></a>')
        }
    }
    else if(elPole2.value == elPole5.value && elPole8.value == elPole5.value){
        if(playerX){
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS;text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz O<br>Kliknij by odświeżyć</div></a>')
        }else{
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS;text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz X<br>Kliknij by odświeżyć</div></a>')
        }
    }
    else if(elPole7.value == elPole5.value && elPole3.value == elPole5.value){
        if(playerX){
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS;text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz O<br>Kliknij by odświeżyć</div></a>')
        }else{
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS;text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz X<br>Kliknij by odświeżyć</div></a>')
        }
    }
    
    else if(runda==9){
       document.write('<a href="index.html" style="text-decoration: none; color: red;"><div style="font-size: 72px;">Koniec gry</div></a>') 
    }
}
elPole6.onclick = function(){
    playerMove(elPole6);
    if(elPole3.value == elPole6.value && elPole9.value == elPole6.value){
        if(playerX){
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS; text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz O<br>Kliknij by odświeżyć</div></a>')
        }else{
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS; text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz X<br>Kliknij by odświeżyć</div></a>')
        }
    }
    else if(elPole4.value == elPole6.value && elPole5.value == elPole6.value){
        if(playerX){
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS; text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz O<br>Kliknij by odświeżyć</div></a>')
        }else{
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS; text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz X<br>Kliknij by odświeżyć</div></a>')
        }
    }
    else if(runda==9){
       document.write('<a href="index.html" style="text-decoration: none; color: red;"><div style="font-size: 72px;">Koniec gry</div></a>') 
    }
}
elPole7.onclick = function(){
    playerMove(elPole7);
    if(elPole4.value == elPole7.value && elPole1.value == elPole7.value){
        if(playerX){
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS"><div style="font-size: 72px;">Koniec gry. Wygrał gracz O<br>Kliknij by odświeżyć</div></a>')
        }else{
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS"><div style="font-size: 72px;">Koniec gry. Wygrał gracz X<br>Kliknij by odświeżyć</div></a>')
        }
    }
    if(elPole8.value == elPole7.value && elPole9.value == elPole7.value){
        if(playerX){
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS"><div style="font-size: 72px;">Koniec gry. Wygrał gracz O<br>Kliknij by odświeżyć</div></a>')
        }else{
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS"><div style="font-size: 72px;">Koniec gry. Wygrał gracz X<br>Kliknij by odświeżyć</div></a>')
        }
    }
    if(elPole5.value == elPole7.value && elPole3.value == elPole7.value){
        if(playerX){
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS;text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz O<br>Kliknij by odświeżyć</div></a>')
        }else{
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS;text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz X<br>Kliknij by odświeżyć</div></a>')
        }
    }
    else if(runda==9){
       document.write('<a href="index.html" style="text-decoration: none; color: red;"><div style="font-size: 72px;">Koniec gry</div></a>') 
    }
}
elPole8.onclick = function(){
    playerMove(elPole8);
    if(elPole5.value == elPole8.value && elPole2.value == elPole8.value){
        if(playerX){
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS; text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz O<br>Kliknij by odświeżyć</div></a>')
        }else{
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS; text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz X<br>Kliknij by odświeżyć</div></a>')
        }
    }
    else if(elPole7.value == elPole8.value && elPole9.value == elPole8.value){
        if(playerX){
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS; text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz O<br>Kliknij by odświeżyć</div></a>')
        }else{
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS; text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz X<br>Kliknij by odświeżyć</div></a>')
        }
    }
    else if(runda==9){
       document.write('<a href="index.html" style="text-decoration: none; color: red;"><div style="font-size: 72px;">Koniec gry</div></a>') 
    }
}
elPole9.onclick = function(){
    playerMove(elPole9);
    if(elPole6.value == elPole9.value && elPole3.value == elPole9.value){
        if(playerX){
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS"><div style="font-size: 72px;">Koniec gry. Wygrał gracz O<br>Kliknij by odświeżyć</div></a>')
        }else{
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS"><div style="font-size: 72px;">Koniec gry. Wygrał gracz X<br>Kliknij by odświeżyć</div></a>')
        }
    }
    else if(elPole7.value == elPole9.value && elPole8.value == elPole9.value){
        if(playerX){
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS"><div style="font-size: 72px;">Koniec gry. Wygrał gracz O<br>Kliknij by odświeżyć</div></a>')
        }else{
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS"><div style="font-size: 72px;">Koniec gry. Wygrał gracz X<br>Kliknij by odświeżyć</div></a>')
        }
    }
    else if(elPole1.value == elPole9.value && elPole5.value == elPole9.value){
        if(playerX){
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS;text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz O<br>Kliknij by odświeżyć</div></a>')
        }else{
            document.write('<a href="index.html" style="text-decoration: none; color: red; font-family: Comic Sans MS;text-align:center;"><div style="font-size: 72px;">Koniec gry. Wygrał gracz X<br>Kliknij by odświeżyć</div></a>')
        }
    }
    else if(runda==9){
       document.write('<a href="index.html" style="text-decoration: none; color: red;"><div style="font-size: 72px;">Koniec gry</div></a>') 
    }
}