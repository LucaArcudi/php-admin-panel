// Function to handle sort by discounted price
function sortWatchesByDiscountedPrice() {
let tableBody = document.querySelector('tbody');
let rows = Array.from(tableBody.querySelectorAll('tr'));

rows.sort(function (a, b) {
let priceA = parseFloat(a.cells[6].innerText.replace('€', ''));
let priceB = parseFloat(b.cells[6].innerText.replace('€', ''));

return priceA - priceB;
});

if (sortOrder === 'desc') {
rows.reverse();
}

tableBody.innerHTML = '';
rows.forEach(function (row) {
tableBody.appendChild(row);
});
}

// Variables to track the current sort order
let sortOrder = 'asc';
let sortDiscountedPrice = document.getElementById('sortDiscountedPrice');

// Function to handle sort order toggle
function toggleSortOrder() {
sortOrder = sortOrder === 'asc' ? 'desc' : 'asc';
sortWatchesByDiscountedPrice();

// Update the sort order indicator
sortDiscountedPrice.classList.toggle('asc', sortOrder === 'asc');
sortDiscountedPrice.classList.toggle('desc', sortOrder === 'desc');
}

// Event listener for sort by discounted price
sortDiscountedPrice.addEventListener('click', toggleSortOrder);
  
  

