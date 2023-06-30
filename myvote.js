// window.onload=function(){
    // idtansfer
        let email=localStorage.getItem("id");
        document.getElementById("id").innerHTML=email;
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
            intag.innerHTML="<p id='label'> Pool - "+(i+1)+"</p><input name='pool"+(i+1)+"'id='poolin' type='text' required>"
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
// }
function idtransfer(){
    let idemail=document.getElementById("id").innerHTML;
    document.getElementById("idtrans").value=idemail;
    console.log(idemail);
    document.getElementById("submit").removeAttribute("disabled");
}
