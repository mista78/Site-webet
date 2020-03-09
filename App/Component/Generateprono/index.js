(function(){
    
    let prono = document.querySelector("#get-prono")
    prono.addEventListener("submit", function(e){
            e.preventDefault();   
            let pronodata = document.querySelector("#get-prono") 
            let data = {method: "POST"};
            console.log(prono);
            pronodata = new FormData(pronodata);
            console.log(pronodata);

             ajax("cockpit/home/getprono", pronodata, (data) => {
                 Debug(data);
             });
    });
})();


