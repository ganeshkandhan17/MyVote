window.onload=function(){
    let inn=document.getElementById("create");
    inn.addEventListener("click",create)
    function create(){
        let in1=document.getElementById("input3");
        let len=Number(in1.value);
        for(let i=0;i<len;i++){
        let intag=document.createElement("li");
        let list=document.getElementById("list");
        intag.innerHTML="<p id='label'> Pool - "+(i+1)+"</p><input id='poolin' type='text'>"
        list.appendChild(intag);
    }
}
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
    // let reset=document.getElementById("reset");
    // reset.addEventListener("click",resetall);
    // function resetall(){
    //     let delet=document.querySelector("#list");
    //     delet.remove()
    // }
    let resultpage1=document.getElementById("result");
    resultpage1.addEventListener("click",resultpage);
    function resultpage(){
        window.location.href="result.html"
    }
    
}