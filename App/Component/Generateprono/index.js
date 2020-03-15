(function(){
    
    let prono = document.querySelector("#form")

    prono.addEventListener("submit", function(e){
            e.preventDefault();   
            //let pronodata = document.querySelector("#get-prono") 
            const pronodata = new FormData(prono);
            _('.generateContent').innerHTML = " ";
            //pronodata.append('cote', _('[name="cote"]').value)
            //pronodata.append('cote', "test")
            //pronodata.append('sport',_('[name="sport"]').value)
            //pronodata.append('nb_prono', _('[name="nb_prono"]').value)
            const entries = [...pronodata]
            let data = {method: "POST", body: pronodata};
             ajax("home/getprono", {method: "POST", body: pronodata}, (data) => {
                 console.log('le petit json que je galère',data);
                 const [item] = data;
                 _('.generateContent').innerHTML = item.img
             });
    });
})();


