(function(){
    let data = {method: "POST"};
    ajax("ajax", data, (data) => {
        Debug(data);
    });


})();


//https://api.the-odds-api.com/v3/odds/?apiKey=YOUR_API_KEY&sport=soccer_epl&region=uk&mkt=h2h 

//https://api.the-odds-api.com/v3/sports/?apiKey=YOUR_API_KEY