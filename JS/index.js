const tdDescriptionsElements = document.querySelectorAll('td[data-attribute="description"]');
tdDescriptionsElements.forEach(function(element) {
    let descriptionText = element.querySelector('p').textContent;
    const maxLength = 20;

    if (descriptionText.length > maxLength) {
        let truncatedText = descriptionText.substring(0, maxLength) + ' ...';
        element.querySelector('p').textContent = truncatedText;

        const showMoreLink = document.createElement('a');
        showMoreLink.href = '#';
        showMoreLink.textContent = 'show more';

        showMoreLink.addEventListener('click', function() {
            element.querySelector('p').textContent = descriptionText;

            // Remove the "show more" link
            showMoreLink.remove();

            // Append the "show less" link
            const showLessLink = document.createElement('a');
            showLessLink.href = '#';
            showLessLink.textContent = 'show less';
            element.appendChild(showLessLink);

            showLessLink.addEventListener('click', function() {
                element.querySelector('p').textContent = truncatedText;

                // Remove the "show less" link
                showLessLink.remove();

                // Append the "show more" link
                element.appendChild(showMoreLink);
            });
        });

        element.appendChild(showMoreLink);
    }
});

const tdDiscountsElements = document.querySelectorAll('td[data-attribute="discount"]');
tdDiscountsElements.forEach(function(element) {
    if (parseInt(element.innerText, 10) !== 0) {
        element.innerText +='%';
    }
});

