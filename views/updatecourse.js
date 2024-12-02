
    // Added validation function
    function validateForm() {
        let isValid = true;

        // Title validation
        const title = document.getElementById('titre').value.trim();
        const titleError = document.getElementById('erreurtitre');
        if (title === '') {
            titleError.textContent = "Title cannot be empty.";
            isValid = false;
        } else if (title.length < 3) {
            titleError.textContent = "Title must be at least 3 characters long.";
            isValid = false;
        } else {
            titleError.textContent = "";
        }

        // Description validation
        const description = document.getElementById('description').value.trim();
        const descriptionError = document.getElementById('erreurdescription');
        if (description === '') {
            descriptionError.textContent = "Description cannot be empty.";
            isValid = false;
        } else {
            descriptionError.textContent = "";
        }

        // Price validation
        const price = document.getElementById('price').value.trim();
        const priceError = document.getElementById('erreurprice');
        if (price === '') {
            priceError.textContent = "Price cannot be empty.";
            isValid = false;
        } else if (isNaN(price) || parseFloat(price) <= 0) {
            priceError.textContent = "Price must be a positive number.";
            isValid = false;
        } else {
            priceError.textContent = "";
        }

        return isValid;
    }
