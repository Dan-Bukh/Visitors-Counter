if(!document.cookie.includes('counter=1')) {
    document.cookie = "counter=1; max-age=43200";
    fetch("http://api.sypexgeo.net/json/")
      .then((response) => {
        if(response.ok) {
          return response.text();
        } else {
          console.log("Ошибка HTTP: " + response.status);
        }
      }).then((data) => {
      window.location.href = "http://public/process_get_info?data="+data;
      })
}