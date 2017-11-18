window.onload=function(){
    
    let button=document.getElementById('lookup');
    let check = document.getElementById('optbox');
    check.checked=false;
    let start=1;
    check.addEventListener('click',function(){
       check.checked=true;
    });
    
    button.addEventListener('click',function(){
        let name=document.getElementById('country').value;
        let opt=document.getElementById('optbox').checked;
        let xhttp=new XMLHttpRequest();
        xhttp.onreadystatechange=function(){
            if(xhttp.readyState===XMLHttpRequest.DONE && xhttp.status===200){
                let newinfo=document.getElementById('result');
                let response = xhttp.response;
                newinfo.innerHTML=response;
                document.getElementById('optbox').checked=false;
            }
        };
        xhttp.open('GET','world.php?country='+name+'&checkbox='+opt,true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send();
    });

}