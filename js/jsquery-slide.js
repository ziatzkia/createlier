
document.addEventListener("DOMContentLoaded", function () {
    var dropdownItems = document.querySelectorAll(".dropdown-item");

    dropdownItems.forEach(function (item) {
        item.addEventListener("click", function () {
            var selectedCategory = this.getAttribute("data-value");
            document.getElementById("product-category-input").value = selectedCategory;
            document.getElementById("category-form").submit();
        });
    });
});

s