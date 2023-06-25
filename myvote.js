window.onload=function(){
    // idtansfer
    if (typeof(Storage) !== "undefined"){
        document.getElementById("id").innerHTML=localStorage.getItem("id");
        }
    // create 
    let inn=document.getElementById("create");
    inn.addEventListener("click",create);
    function create(){
        try{
            resetall();
            let in1=document.getElementById("input3");
            let len=Number(in1.value);
            for(let i=0;i<len;i++){
            let intag=document.createElement("li");
            intag.id="liitem";
            let list=document.getElementById("list");
            intag.innerHTML="<p id='label'> Pool - "+(i+1)+"</p><input name='pool"+(i+1)+"'id='poolin' type='text'>"
            list.appendChild(intag);
            }
        }
        catch(error){
            let in1=document.getElementById("input3");
            let len=Number(in1.value);
            for(let i=0;i<len;i++){
            let intag=document.createElement("li");
            intag.id="liitem";
            let list=document.getElementById("list");
            intag.innerHTML="<p id='label'> Pool - "+(i+1)+"</p><input name='pool"+(i+1)+"'id='poolin' type='text'>"
            list.appendChild(intag);
            }
        }
}
    // -------------------------------------------- 
    // Delet 
    let del=document.getElementById("delete");
    del.addEventListener("click",delet);
    function delet(){
        try{
            let del=document.querySelector("#list li:last-child");
            del.remove();
        }
        catch(error){
            alert("All pools was deleted");
        }
    }
    // ---------------------- 
    // reset all 
    let reset=document.getElementById("reset");
    reset.addEventListener("click",resetall);
    function resetall(){
        let in1=document.getElementById("input3");
        let len=Number(in1.value);
            let delet=document.querySelectorAll("#liitem");
            for(let i=0;i<delet.length;i++){
                delet[i].remove();
            }
    }
    // --------------------
    let resultpage1=document.getElementById("result");
    resultpage1.addEventListener("click",resultpage);
    function resultpage(){
        window.location.href="result.html"
    }
   
}
