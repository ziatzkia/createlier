 document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', event => {
            event.preventDefault();
            document.getElementById('product-category-input').value = event.target.getAttribute('data-value');
            document.getElementById('category-form').submit();
        });
    });
