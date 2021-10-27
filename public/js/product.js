function populateProduct(item) {
    let productRow = document.querySelector('.product-row');
    let productColumn = document.createElement('div');
    let productCard = document.createElement('div');
    let productImage = document.createElement('img');
    let productCardBody = document.createElement('div');
    let productCardTitle = document.createElement('h5');
    let productCardPrice = document.createElement('h5');
    let productCardDescription = document.createElement('p');
    let productBadge = document.createElement('span');
    let productDivider = document.createElement('div');
    let buttonWrapper = document.createElement('div');
    let button = document.createElement('button');

    productImage.className = 'card-img-top';
    productImage.src = item.image !== null ? item.image.source : "images/placeholder-image.jpg";
    productColumn.className = 'col-12 col-sm-6 col-md-6 col-lg-4 mb-4';
    productCard.className = 'card';
    productCardBody.className = 'card-body';
    productCardTitle.className = 'card-title';
    productCardTitle.innerHTML = item.name;
    productCardPrice.className = 'card-title';
    productCardPrice.innerHTML = new Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" }).format(item.price);
    productCardDescription.className = 'card-text';
    productCardDescription.innerHTML = item.description;
    productBadge.className = 'badge badge-secondary font-weight-normal p-2';
    productBadge.innerHTML = item.category.name;
    productDivider.className = 'dropdown-divider';
    buttonWrapper.className = 'text-center';
    button.className = 'btn btn-primary btn-block';
    button.innerHTML = 'Beli';

    productCard.appendChild(productImage);
    productCard.appendChild(productCardBody);
    productCardBody.appendChild(productCardTitle);
    productCardBody.appendChild(productCardPrice);
    productCardBody.appendChild(productCardDescription);
    productCardBody.appendChild(productBadge);
    productCardBody.appendChild(productDivider);
    buttonWrapper.appendChild(button);
    productCardBody.appendChild(buttonWrapper);
    productColumn.appendChild(productCard);
    productRow.appendChild(productColumn);
}

function productsEmpty() {
    let productRow = document.querySelector('.product-row');
    let productPagination = document.querySelector('#product-pagination');
    productRow.innerHTML = null;
    productPagination.innerHTML = null;

    let productColumn = document.createElement('div');
    let productCard = document.createElement('div');
    let productCardBody = document.createElement('div');
    let productCardTitle = document.createElement('h5');

    productCard.className = 'card';
    productCardBody.className = 'card-body';
    productColumn.className = 'col-12';
    productCardTitle.className = 'card-title text-center';
    productCardTitle.innerHTML = 'Produk tidak ditemukan atau belum ditambahkan.';

    productCard.appendChild(productCardBody);
    productCardBody.appendChild(productCardTitle);
    productColumn.appendChild(productCard);
    productRow.appendChild(productColumn);
}

