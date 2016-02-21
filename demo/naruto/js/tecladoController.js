function cancelEvent(e) {
    if (e && e.preventDefault) {
        e.preventDefault();
    } else if (window.event) {
        window.event.returnValue = false;
    }
}
function checkBorder(posx,posy){
    var screen = document.getElementById('gameLocation');
    if((screen.clientWidth - 43) > posx && (screen.clientHeight - 65) > posy){
        if((posy+16) > 0 && (posx) > 0){
            return true;   
        }
    }
}
function replay(){
    location.reload();
}

var battle = new Audio('audio/battle.mp3');

function sound(valor){
    if (valor == "On"){
        document.getElementsByClassName('sound')[0].src = "images/soundOff.png";
        document.getElementsByClassName('sound')[0].name = "Off";
        battle.pause();
    }else if(valor == "Off"){
        document.getElementsByClassName('sound')[0].src = "images/soundOn.png";
        document.getElementsByClassName('sound')[0].name = "On";
        battle.play();
    }
}
window.onload = function () {
    battle.play();
    
    document.getElementsByTagName("html")[0].style.overflow = "hidden";
    var speed = 5;
    var vidas = 10;
    var kills = 0;
    document.getElementById('kills').innerHTML = kills;
    
    var casillas = document.getElementsByClassName('ramen');
    for(var x = 0; x < casillas.length; x++){
        casillas[x].style.backgroundImage = "url('images/bol.jpg')";
        casillas[x].style.backgroundRepeat = "no-repeat";
        casillas[x].style.backgroundSize = "cover";
        casillas[x].style.backgroundPosition = "center";
    }
    function increaseSpeed(){
        speed += 3;
    }
    
    var screen = document.getElementById('gameLocation');
    var newEnemy = function(spec){
        var enemy = document.createElement('div');
        var screenx = screen.clientWidth;
        var screeny = screen.clientHeight;
        enemy.style.width = 43 + 'px';
        enemy.style.height = 65 + 'px';
        enemy.x = screenx - 43;
        enemy.y = screeny;
        enemy.style.backgroundPosition = "0px 0px";
        enemy.style.position = 'absolute';
        enemy.style.backgroundImage = 'url(' + spec.img + '.gif)';
        enemy.setPos = function (pos) {
            enemy.x = pos.x || enemy.x;
            enemy.y = pos.y || enemy.y;
            enemy.style.top = enemy.y + 'px';
            enemy.style.left =  enemy.x + 'px';
            return enemy;
        };
        enemy.move = function () {
            this.setPos({
                x: enemy.x - speed,
                y: enemy.y
            });
            
            return enemy;
        };
        enemy.setPos({
            y: Math.random() * ((screeny-65) - 0) + 0,
            x: (screenx - 43)
        });
        enemy.setAttribute('name', 'enemy');
        enemy.ataca = function(){
            enemy.move();
        }
        return screen.appendChild(enemy);
    }
    
    var newHiro = function (spec) {
        var exp = 0;
        var expRequired = 100;
        var nivel = 1;
        document.getElementById('lvl').innerHTML = nivel;
        document.getElementById('exp').innerHTML = exp;
        document.getElementById('expRequired').innerHTML = expRequired;
        var hiro = document.createElement('div');
        var screenx = screen.clientWidth;
        var screeny = screen.clientHeight;
        hiro.speed = 5;
        function increaseSpeedHero(){
            hiro.speed += 2;
        }
        hiro.style.width = 43 + 'px';
        hiro.style.height = 65 + 'px';
        hiro.style.backgroundPosition = "0px 0px";
        hiro.style.position = 'absolute';
        hiro.style.backgroundImage = 'url(' + spec.img + '.png)';
        hiro.setAttribute('id', 'myHero');
        hiro.setPos = function (pos) {
            hiro.x = pos.x || hiro.x;
            hiro.y = pos.y || hiro.y;
            hiro.style.top = hiro.y + 'px';
            hiro.style.left =  hiro.x + 'px';
            return hiro;
        };
        hiro.move = function (offset) {
            if(checkBorder((hiro.x + offset.x), (hiro.y + offset.y)) == true){
                this.setPos({
                    x: hiro.x + offset.x,
                    y: hiro.y + offset.y
                });
                return hiro;
            }
        };
        hiro.setPos({
            y: (screeny / 2),
            x: (screenx / screenx)
        });
        hiro.lvlUp = function(){
            if(nivel > 1){
                expRequired = 100 * nivel + ((100 * nivel)/2);
                document.getElementById('expRequired').innerHTML = expRequired;
            }
            
            if (exp > expRequired || exp == expRequired){
                increaseSpeed();
                increaseSpeedHero();
                nivel++;
                document.getElementById('lvl').innerHTML = nivel;
            }
        }
        var enemigos = document.getElementsByName('enemy');
        
        var hasPerdido = setInterval(function(){
            for(var y = 0; y < enemigos.length; y++){
                if(enemigos[y].x <= 5){
                    vidas--;
                    if(vidas > 0){
                        screen.removeChild(enemigos[y]);
                        casillas[vidas].style.backgroundImage = null;
                    }else if(vidas == 0){
                        document.getElementById('end').click();
                        clearInterval(hasPerdido);
                        hasPerdido = undefined;
                        setTimeout(function(){
                            location.reload();
                        }, 10000);
                    }
                } 
            }
        }, 1);
        
        hiro.teReviento = function () {
            var disparo = document.createElement('div');
            disparo.x = (hiro.x)+32;
            disparo.y = (hiro.y)+33;
            disparo.style.width = 32 + 'px';
            disparo.style.height = 32 + 'px';
            disparo.backgroundPosition = "0px 0px";
            disparo.style.position = 'absolute';
            disparo.style.backgroundImage = 'url(images/rasengan.png)';
            disparo.style.top = (hiro.y + 33) + 'px';
            disparo.style.left = (hiro.x + 32) + 'px';
            disparo.setAttribute('name', 'rasengan');
            var audio = new Audio('audio/rasen.wav');
            audio.play();
            
            disparo.moverDisparoDerecha = function(){
                disparo.x += 1;
                disparo.style.left = disparo.x + 'px';
                if (screenx < disparo.x){
                    clearInterval(disparo.disparoDerecha);
                    disparo.disparoDerecha = undefined;
                    screen.removeChild(disparo);
                }
                for(var y = 0; y < enemigos.length; y++){
                    var x = disparo.hitTest(disparo.x, (disparo.x + 32), disparo.y, (disparo.y + 32), enemigos[y].x, (enemigos[y].x + 43), enemigos[y].y, (enemigos[y].y + 65), y);   
                    if(x == true){
                        screen.removeChild(enemigos[y]);
                        exp += 5;
                        kills ++;
                        if(kills == 100){
                            if (vidas < 10){
                                casillas[vidas].style.backgroundImage = "url('images/bol.jpg')";
                                vidas ++;
                            }
                            kills = 0;
                        }
                        document.getElementById('kills').innerHTML = kills;
                        document.getElementById('exp').innerHTML = exp;
                        hiro.lvlUp();
                        clearInterval(disparo.disparoDerecha);
                        disparo.disparoDerecha = undefined;
                        screen.removeChild(disparo);
                    }
                }
            }
            disparo.hitTest = function (bolax1, bolax2, bolay1, bolay2, x1, x2, y1, y2, pos){
                if (bolax1 >= x1 && bolax2 <= x2){
                    if (bolay2 >= y1 && bolay1 <= y2){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            } 
            if (!disparo.disparoDerecha){
                disparo.disparoDerecha = setInterval(disparo.moverDisparoDerecha, 1);
            }
            screen.appendChild(disparo);
            return disparo;
        }
        return hiro;
    }
    
    var direcciones = [];
    direcciones['ARRIBA'] = false;
    direcciones['ABAJO'] = false;
    direcciones['DERECHA'] = false;
    direcciones['IZQUIERDA'] = false;
    direcciones['NE'] = false;
    direcciones['SE'] = false;
    direcciones['NW'] = false;
    direcciones['SW'] = false;
    
    
    var pixels = [];
    pixels['ARRIBA'] = " -130px";
    pixels['ABAJO'] = " 0px";
    pixels['DERECHA'] = " -195px";
    pixels['IZQUIERDA'] = " -65px";
    pixels['NE'] = " -260px";
    pixels['SE'] = " -390px";
    pixels['NW'] = " -325px";
    pixels['SW'] = " -455px";
    
    var theHero = newHiro({img: 'images/naruto'});
    screen.appendChild(theHero);
    var enemigos = new Array();
    var i = 0;
    var ntrvl;
    
    var enemies = document.getElementsByName('enemy');
    
    setInterval(function(){
        enemigos[i] = newEnemy({img: 'images/enemy'});
        screen.appendChild(enemigos[i]);
        setInterval(enemigos[i].ataca, 50);
        
        i++;
    }, 1500);
    
    var ntrvl;
    
    var px = '';
    
    document.onkeydown = function (e) {
        cancelEvent(e);
        e = e || event;
        var code = e.keyCode || e.which;
        switch (code) {
            case 38:
            case 87: /*ARRIBA - W*/
                var masPos = 0;
                if (!direcciones['ARRIBA']){
                    theHero.movingArriba = setInterval (function(){
                        var pos = masPos + 'px';
                        if(direcciones['DERECHA']){
                            clearInterval(theHero.movingDerecha);
                            theHero.movingDerecha = undefined;
                            theHero.move({x: theHero.speed, y: -(theHero.speed)});
                            theHero.style.backgroundPosition = pos + pixels['NE'];
                            direcciones['NE'] = true;
                        }else if(direcciones['IZQUIERDA']){
                            clearInterval(theHero.movingIzquierda);
                            theHero.movingIzquierda = undefined;
                            theHero.move({x: -(theHero.speed), y: -(theHero.speed)});
                            theHero.style.backgroundPosition = pos + pixels['NW'];
                            direcciones['NW'] = true;
                        }else{
                            theHero.move({x: 0, y: -(theHero.speed)});
                            theHero.style.backgroundPosition = pos + pixels['ARRIBA'];
                            px = pixels['ARRIBA'];
                            
                        }
                        masPos += 50;
                        if(masPos == 200){masPos = 0;}
                    }, 50);
                    direcciones['ARRIBA'] = true;
                }
                break; 
            case 40: 
            case 83: /*ABAJO - S*/
                var masPos = 0;
                if (!direcciones['ABAJO']){
                    theHero.movingAbajo = setInterval (function(){
                        var pos = masPos + 'px';
                        if(direcciones['DERECHA']){
                            clearInterval(theHero.movingDerecha);
                            theHero.movingDerecha = undefined;
                            theHero.move({x: theHero.speed, y: theHero.speed});
                            theHero.style.backgroundPosition = pos + pixels['SE'];
                            direcciones['SE'] = true;
                        }else if(direcciones['IZQUIERDA']){
                            clearInterval(theHero.movingIzquierda);
                            theHero.movingIzquierda = undefined;
                            theHero.move({x: -(theHero.speed), y: theHero.speed});
                            theHero.style.backgroundPosition = pos + pixels['SW'];
                            direcciones['SW'] = true;
                        }else{
                            theHero.move({x: 0, y: theHero.speed});
                            theHero.style.backgroundPosition = pos + pixels['ABAJO'];
                            px = pixels['ABAJO'];
                        }
                        
                        masPos += 50;
                        if(masPos == 200){masPos = 0;}
                    }, 50);
                    direcciones['ABAJO'] = true;
                }
                break; 
            case 39: 
            case 68: /*DERECHA - D*/
                var masPos = 0;
                if (!direcciones['DERECHA']){
                    theHero.movingDerecha = setInterval (function(){
                        var pos = masPos + 'px';
                        if(direcciones['ARRIBA']){
                            clearInterval(theHero.movingArriba);
                            theHero.movingArriba = undefined;
                            theHero.move({x: theHero.speed, y: -(theHero.speed)});
                            theHero.style.backgroundPosition = pos + pixels['NE'];
                            direcciones['NE'] = true;
                        }else if(direcciones['ABAJO']){
                            clearInterval(theHero.movingAbajo);
                            theHero.movingAbajo = undefined;
                            theHero.move({x: theHero.speed, y: theHero.speed});
                            theHero.style.backgroundPosition = pos + pixels['SE'];
                            direcciones['SE'] = true;
                        }else{
                            theHero.move({x: theHero.speed, y: 0});
                            theHero.style.backgroundPosition = pos + pixels['DERECHA'];
                            px = pixels['DERECHA'];
                        }
                        masPos += 50;
                        if(masPos == 200){masPos = 0;}
                    }, 50);
                    direcciones['DERECHA'] = true;
                }
                break; 
            case 37: 
            case 65: /*IZQUIERDA - A*/
                var masPos = 0;
                if (!direcciones['IZQUIERDA']){
                    theHero.movingIzquierda = setInterval (function(){
                        var pos = masPos + 'px';
                        if(direcciones['ARRIBA']){
                            clearInterval(theHero.movingArriba);
                            theHero.movingArriba = undefined;
                            theHero.move({x: -(theHero.speed), y: -(theHero.speed)});
                            theHero.style.backgroundPosition = pos + pixels['NW'];
                            direcciones['NW'] = true;
                        }else if(direcciones['ABAJO']){
                            clearInterval(theHero.movingAbajo);
                            theHero.movingAbajo = undefined;
                            theHero.move({x: -(theHero.speed), y: theHero.speed});
                            theHero.style.backgroundPosition = pos + pixels['SW'];
                            direcciones['SW'] = true;
                        }else{
                            theHero.move({x: -(theHero.speed), y: 0});
                            theHero.style.backgroundPosition = pos + pixels['IZQUIERDA'];
                            px = pixels['IZQUIERDA'];
                        }
                        masPos += 50;
                        if(masPos == 200){masPos = 0;}
                    }, 50);
                    direcciones['IZQUIERDA'] = true;
                }
                break;
            case 32: /*ESPACIO*/
                if(!theHero.disparar){
                    theHero.disparar = setInterval(theHero.teReviento(), 1000);
                }
                
                break;
        }
        
    };
    document.onkeyup = function(e){
        cancelEvent(e); 
        e=e || event; 
        var code=e.keyCode || e.which; 
        switch (code) { 
            case 38:
            case 87: /*ARRIBA - W*/
                clearInterval(theHero.movingArriba);
                theHero.movingArriba = undefined;
                direcciones['ARRIBA'] = false;
                if(direcciones['NE']){
                    var masPos = 0;
                    direcciones['NE'] = false;
                }
                if(direcciones['NW']){
                    var masPos = 0;
                    direcciones['NW'] = false;
                }
                break; 
            case 40:
            case 83: /*ABAJO - S*/
                clearInterval(theHero.movingAbajo);
                theHero.movingAbajo = undefined;
                direcciones['ABAJO'] = false;
                if(direcciones['SE']){
                    var masPos = 0;
                    direcciones['SE'] = false;
                }
                if(direcciones['SW']){
                    var masPos = 0;
                    direcciones['SW'] = false;
                }
                break; 
            case 39:
            case 68: /*DERECHA - D*/
                clearInterval(theHero.movingDerecha);
                theHero.movingDerecha = undefined;
                direcciones['DERECHA'] = false;
                if(direcciones['NE']){
                    var masPos = 0;
                    direcciones['NE'] = false;
                }
                if(direcciones['SE']){
                    var masPos = 0;
                    direcciones['SE'] = false;
                }
                
                break;
            case 37:
            case 65: /*IZQUIERDA - A*/
                clearInterval(theHero.movingIzquierda);
                theHero.movingIzquierda = undefined;
                direcciones['IZQUIERDA'] = false;
                if(direcciones['NW']){
                    var masPos = 0;
                    direcciones['MW'] = false;
                }
                if (direcciones['SW']){
                    var masPos = 0;
                    direcciones['SW'] = false;
                }
                break; 
            case 32: /*ESPACIO*/
                clearInterval(theHero.disparar);
                theHero.disparar = undefined;
                


        }
    }
};