function confirmDelete(event) {
    event.preventDefault(); // Prevent form submission
    
    if (confirm('Are you sure you want to delete this watch?')) {
      // If user confirms, submit the form
      event.target.closest('form').submit();
    }
}