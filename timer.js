let min=Number(document.getElementById("minute").value);
let time=min*60;
setInterval(timer,1000);
function timer(){
    let minutes=Math.floor(time/60);
    let seconds=time%60;
    document.getElementById("min").innerHTML=minutes;
    document.getElementById("sec").innerHTML=seconds;
    if(minutes!=0||seconds!=0){
        time--;
    }
   if(document.getElementById("min").innerHTML==0&&document.getElementById("sec").innerHTML==0){
    document.getElementById("result").removeAttribute("disabled");
   }
}

