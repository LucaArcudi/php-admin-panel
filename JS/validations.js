const form = document.getElementById('myForm');

form.addEventListener('submit', function (event) {
    event.preventDefault();
    clearValidationErrors();

    const brandInput = document.getElementById('brand');
    const modelInput = document.getElementById('model');
    const descriptionInput = document.getElementById('description');
    const priceInput = document.getElementById('price');
    const discountInput = document.getElementById('discount');
    const typeInput = document.getElementById('type');
    const strapInput = document.getElementById('strap');

    if (brandInput.value.trim() === '') {
        showError(brandInput, 'Please enter the brand.');
        return;
    }
    if (modelInput.value.trim() === '') {
        showError(modelInput, 'Please enter the model.');
        return;
    }
    if (descriptionInput.value.trim() === '') {
        showError(descriptionInput, 'Please enter the description.');
        return;
    }
    if (priceInput.value.trim() === '' || !/^\d+(\.\d{1,2})?$/.test(priceInput.value)) {
        showError(priceInput, 'Please enter a valid price with up to two decimal places.');
        return;
    }    
    if (discountInput.value.trim() !== '' && (isNaN(parseInt(discountInput.value)) || parseInt(discountInput.value) < 0 || parseInt(discountInput.value) > 100)) {
        showError(discountInput, 'Please enter a valid discount between 0 and 100.');
        return;
    }
    if (typeInput.value.trim() === '') {
        showError(typeInput, 'Please enter the type.');
        return;
    }
    if (strapInput.value.trim() === '') {
        showError(strapInput, 'Please enter the strap.');
        return;
    }

    form.submit();
});

function showError(inputElement, errorMessage) {
    inputElement.classList.add('is-invalid');
    const errorElement = document.getElementById(`${inputElement.id}Error`);
    errorElement.textContent = errorMessage;
}

function clearValidationErrors() {
    const errorElements = form.getElementsByClassName('invalid-feedback');
    for (let i = 0; i < errorElements.length; i++) {
        errorElements[i].textContent = '';
    }

    const formControls = form.getElementsByClassName('form-control');
    for (let i = 0; i < formControls.length; i++) {
        formControls[i].classList.remove('is-invalid');
    }
}


  
  

