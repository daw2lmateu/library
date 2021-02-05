function bookSugestions() {
    let input = document.getElementById("bookTitle").value;
    if(input == "") return;
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        json = JSON.parse(this.response);
        let hints = "<strong>Sugerencias:</strong><br>";
        for (i in json) {
          hints += json[i].title + "<br>";
        };
          document.getElementById("bookSugestions").innerHTML = hints;
        }
    };
    xmlhttp.open("GET","ajax/getSugestions.php?input="+input+"&column=title&table=_31_books",true);
    xmlhttp.send();
} 


function authorSugestions() {
  let input = document.getElementById("bookAuthor").value;
  if(input == "") return;

  
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      json = JSON.parse(this.response);
      let hints = "<strong>Sugerencias:</strong><br>";
      for (i in json) {
        hints += json[i].author + "<br>";
      };
        document.getElementById("authorSugestions").innerHTML = hints;
      }
  };

  xmlhttp.open("GET","ajax/getSugestions.php?input="+input+"&column=author&table=_31_books",true);
  xmlhttp.send();
} 