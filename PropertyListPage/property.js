var propertyModal = document.getElementById('propertyModal');
    propertyModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; 
        var title = button.getAttribute('data-bs-title');
        var location = button.getAttribute('data-bs-location');
        var price = button.getAttribute('data-bs-price');
        var description = button.getAttribute('data-bs-description');

        var modalTitle = propertyModal.querySelector('#modalTitle');
        var modalLocation = propertyModal.querySelector('#modalLocation');
        var modalPrice = propertyModal.querySelector('#modalPrice');
        var modalDescription = propertyModal.querySelector('#modalDescription');

        modalTitle.textContent = title;
        modalLocation.textContent = location;
        modalPrice.textContent = price;
        modalDescription.textContent = description;
    });