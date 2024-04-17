$(document).ready(()=> { 
    $('#projectAdd_product_form').submit(event =>{
        alert("Test");
        // Validate code field
        var gourmetCode = $('#gourmetCode').val();
        if (gourmetCode === '' || gourmetCode.length < 4 || gourmetCode.length > 10) {
            alert('Error: Code field should not be blank and should have between 4 to 10 characters.');
            event.preventDefault();
            return;
        }

        // Validate name field
        var gourmetName = $('#gourmetName').val();
        if (gourmetName === '' || gourmetName.length < 10 || gourmetName.length > 100) {
            alert('Error: Name field should not be blank and should have between 10 to 100 characters.');
            event.preventDefault();
            return;
        }

        // Validate description field
        var description = $('#description').val();
        if (description === '' || description.length < 10 || description.length > 255) {
            alert('Error: Description field should not be blank and should have between 10 to 255 characters.');
            event.preventDefault();
            return;
        }

        // Validate price field
        var price = $('#price').val();
        if (price === '' || price <= 0 || price > 100000) {
            alert('Error: Price field should not be blank, should be between 0 to $100,000.');
            event.preventDefault();
            return;
        }
    });
});

