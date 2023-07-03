// Function to filter watches by brand, discount, and price range
function filterWatches() {
    let brandSelect = document.getElementById('brandSelect');
    let selectedBrand = brandSelect.value.toLowerCase();
  
    let withDiscountCheckbox = document.getElementById('withDiscountCheckbox');
    let withoutDiscountCheckbox = document.getElementById('withoutDiscountCheckbox');
  
    let priceRangeSelect = document.getElementById('priceRangeSelect');
    let selectedRange = priceRangeSelect.value;
  
    let tableBody = document.querySelector('tbody');
    let rows = Array.from(tableBody.querySelectorAll('tr'));
  
    rows.forEach(function (row) {
      let brand = row.cells[0].innerText.toLowerCase();
      let discountCell = row.cells[5];
      let hasDiscount = discountCell.innerText !== '0';
      let price = parseFloat(row.cells[6].innerText.replace('€', ''));
  
      let showRow = true;
  
      // Apply brand filter
      if (selectedBrand !== '' && brand !== selectedBrand) {
        showRow = false;
      }
  
      // Apply discount filter
      if ((withDiscountCheckbox.checked && !hasDiscount) || (withoutDiscountCheckbox.checked && hasDiscount)) {
        showRow = false;
      }
  
      // Apply price range filter
      if (selectedRange === '40-80' && (price < 40 || price > 80)) {
        showRow = false;
      } else if (selectedRange === '80-120' && (price < 80 || price > 120)) {
        showRow = false;
      } else if (selectedRange === '120-160' && (price < 120 || price > 160)) {
        showRow = false;
      } else if (selectedRange === 'others' && (price < 40 || price > 160)) {
        showRow = false;
      }
  
      row.style.display = showRow ? '' : 'none';
    });
  }
  
  // Variables to track the current sort order
  let sortOrder = 'asc';
  let sortDiscountedPrice = document.getElementById('sortDiscountedPrice');
  
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
  
  // Event listener for brand selection change
  let brandSelect = document.getElementById('brandSelect');
  brandSelect.addEventListener('change', filterWatches);
  
  // Event listeners for checkbox change
  let withDiscountCheckbox = document.getElementById('withDiscountCheckbox');
  let withoutDiscountCheckbox = document.getElementById('withoutDiscountCheckbox');
  withDiscountCheckbox.addEventListener('change', filterWatches);
  withoutDiscountCheckbox.addEventListener('change', filterWatches);
  
  // Event listener for price range selection change
  let priceRangeSelect = document.getElementById('priceRangeSelect');
  priceRangeSelect.addEventListener('change', filterWatches);
  
  ///////////////////////////////////////////////////////////////////////////////////////////////
  
  // Function to populate options in the brand select
  function populateBrandOptions() {
    let uniqueBrands = Array.from(document.querySelectorAll('tbody td:nth-child(1)'))
      .map(function (td) {
        return td.innerText.trim();
      })
      .filter(function (value, index, self) {
        return self.indexOf(value) === index;
      });
  
    brandSelect.innerHTML = '';
  
    let defaultOption = document.createElement('option');
    defaultOption.value = '';
    defaultOption.textContent = 'All Brands';
    brandSelect.appendChild(defaultOption);
  
    uniqueBrands.forEach(function (brand) {
      let option = document.createElement('option');
      option.value = brand.toLowerCase();
      option.textContent = brand;
      brandSelect.appendChild(option);
    });
  }
  
  // Function to populate options in the price range select
  function populatePriceRangeOptions() {
    let priceRangeSelect = document.getElementById('priceRangeSelect');
    priceRangeSelect.innerHTML = '';
  
    let priceRanges = {
      '40-80': '€40 - €80',
      '80-120': '€80 - €120',
      '120-160': '€120 - €160',
      others: 'Others',
    };
  
    for (const key in priceRanges) {
      let option = document.createElement('option');
      option.value = key;
      option.textContent = priceRanges[key];
      priceRangeSelect.appendChild(option);
    }
  }
  
  // Populate options in the brand select and price range select
  populateBrandOptions();
  populatePriceRangeOptions();
  
  // Initial filtering of watches
  filterWatches();
  
  
  

  
