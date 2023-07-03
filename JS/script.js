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
  
  /////////////////////////////////////////////////////////////////////////////////////////
  
  // Event listener for sort by discounted price
  sortDiscountedPrice.addEventListener('click', toggleSortOrder);
  
  // Function to filter watches by brand
  function filterWatchesByBrand() {
    let brandSelect = document.getElementById('brandSelect');
    let selectedBrand = brandSelect.value.toLowerCase();
  
    let tableBody = document.querySelector('tbody');
    let rows = Array.from(tableBody.querySelectorAll('tr'));
  
    rows.forEach(function (row) {
      let brand = row.cells[0].innerText.toLowerCase();
      if (selectedBrand === '' || brand === selectedBrand) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    });
  }
  
  // Get unique brands from the table data
  let uniqueBrands = Array.from(document.querySelectorAll('tbody td:nth-child(1)'))
    .map(function (td) {
      return td.innerText.trim();
    })
    .filter(function (value, index, self) {
      return self.indexOf(value) === index;
    });
  
  // Populate options in the brand select
  let brandSelect = document.getElementById('brandSelect');
  uniqueBrands.forEach(function (brand) {
    let option = document.createElement('option');
    option.value = brand.toLowerCase();
    option.textContent = brand;
    brandSelect.appendChild(option);
  });
  
  // Event listener for brand selection change
  brandSelect.addEventListener('change', function () {
    filterWatchesByBrand();
    filterWatchesByDiscount();
  });
  
  ///////////////////////////////////////////////////////////////////////////////////////////////
  
  // Function to filter watches by discount
  function filterWatchesByDiscount() {
    let withDiscountCheckbox = document.getElementById('withDiscountCheckbox');
    let withoutDiscountCheckbox = document.getElementById('withoutDiscountCheckbox');
  
    let tableBody = document.querySelector('tbody');
    let rows = Array.from(tableBody.querySelectorAll('tr'));
  
    rows.forEach(function (row) {
      let discountCell = row.cells[5];
      let hasDiscount = discountCell.innerText !== '0';
  
      let showRow = true;
  
      if (withDiscountCheckbox.checked && withoutDiscountCheckbox.checked) {
        // Entrambe le checkbox sono selezionate, impostiamo entrambe a false
        withDiscountCheckbox.checked = false;
        withoutDiscountCheckbox.checked = false;
      } else if (withDiscountCheckbox.checked && !hasDiscount) {
        showRow = false;
      } else if (withoutDiscountCheckbox.checked && hasDiscount) {
        showRow = false;
      }
  
      let brandSelect = document.getElementById('brandSelect');
      let selectedBrand = brandSelect.value.toLowerCase();
      let brand = row.cells[0].innerText.toLowerCase();
      if (selectedBrand !== '' && brand !== selectedBrand) {
        showRow = false;
      }
  
      row.style.display = showRow ? '' : 'none';
    });
  }
  
  // Event listeners for checkbox change
  let withDiscountCheckbox = document.getElementById('withDiscountCheckbox');
  withDiscountCheckbox.addEventListener('change', filterWatchesByDiscount);
  
  let withoutDiscountCheckbox = document.getElementById('withoutDiscountCheckbox');
  withoutDiscountCheckbox.addEventListener('change', filterWatchesByDiscount);
  
  // Mostra tutti gli orologi all'avvio
  filterWatchesByDiscount();
  
  
  

