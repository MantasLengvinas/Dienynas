var counter = 0;
var timeLeft = 3599;

function convertSeconds(s){
    var min = floor(s /60);
    var sec = s % 60;

    return nf(min, 2) + ":" + nf(sec, 2);
}

function setup(){
    noCanvas();

    var timer = select('#timer');
    timer.html(convertSeconds(timeLeft - counter));

    var interval = setInterval(timeIt, 1000);

    function timeIt(){
        counter++;
        timer.html(convertSeconds(timeLeft - counter));
        if(counter == timeLeft){
            clearInterval(interval);
            window.location.href = "../config/logout";
        }

    }

    
}

