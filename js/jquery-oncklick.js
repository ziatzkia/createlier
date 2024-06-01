function updateQuantity(inputElement, productId) {
    var quantity = inputElement.value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update-cart.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            document.getElementById('subtotal-' + productId).innerText = response.subtotal;
            document.getElementById('total').innerText = response.total;
        }
    };
    xhr.send("product_id=" + productId + "&product_quantity=" + quantity);
}
