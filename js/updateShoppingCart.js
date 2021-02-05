function updateQuantity(bookId, cartType) {
    let quantity = document.getElementById(bookId + 'quantity').value;
    let price = document.getElementById(bookId + 'price').innerHTML;
    let totalHtml = document.getElementById(bookId + 'total');
    let total = document.getElementById(bookId + 'total').innerHTML;
    let orderTotalHtml = document.getElementById('orderTotal');
    let orderTotal = orderTotalHtml.innerHTML;

    orderTotal = orderTotal - total + quantity * price;
    orderTotalHtml.innerHTML = orderTotal;
    totalHtml.innerHTML = quantity * price;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
      }
    };
    xmlhttp.open("GET","ajax/" + cartType + "UpdateShoppingCart.php?q="+bookId+"&quantity="+quantity,true);
    xmlhttp.send();
} 
