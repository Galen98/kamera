$(document).ready(function(){
    $('#loadingOverlay').hide()

    const rupiah = (number)=>{
        return new Intl.NumberFormat("id-ID", {
          style: "currency",
          currency: "IDR"
        }).format(number);
    }
    
let allItems = []; 

function dataItem(search = '') {
    const itemData = $('.itemData');
    itemData.empty();
    const filteredItems = allItems.filter(item => 
        item.nama_item.toLowerCase().includes(search.toLowerCase()) || 
        item.kode_item.toLowerCase().includes(search.toLowerCase())
    );

    if (filteredItems.length < 1) {
        itemData.append('<h4 class="text-center">No Item Found</h4>');
    } else {
        filteredItems.forEach(function (item) {
            const buttonCart = item.availability.count > 0
                ? `<a href="#" class="btn btn-primary btn-cart" data-id="${item.id}"><i class="fa-solid fa-cart-shopping"></i> Add to Cart</a>`
                : 'Out of stock';
            const Items = `
                <div class="span3" style="margin-top:10px;">
                    <div class="thumbnail">
                        <div class="caption">
                            <h5 class="text-capitalize">${item.nama_item}</h5>
                            ${item.kode_item}
                            <p>Merk: ${item.merk}</p>
                            <p>Seri: ${item.seri}</p>
                            <p>Harga: ${rupiah(item.harga_per_hari)}</p>
                            <p>Tersedia: ${item.availability.count} item</p>
                            ${buttonCart}
                        </div>
                    </div>
                </div>`;
            itemData.append(Items);
        });
    }
}

function fetchData() {
    $('#loadingOverlay').show();
    $.ajax({
        url: '/api/item-transaction',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            $('#loadingOverlay').hide();
            allItems = response.item;
            dataItem();
        }
    });
}

$('.item-search').on('input', function () {
    const searchValue = $(this).val().trim();
    dataItem(searchValue); 
});

fetchData();


//add to cart
$(document).on('click', '.btn-cart', function (e) {
    e.preventDefault();
    const itemId = $(this).data('id');
    const selectedItem = allItems.find(item => item.id === itemId);

    if (selectedItem) {
        const itemData = {
            nama_item: selectedItem.nama_item,
            harga_per_hari: selectedItem.harga_per_hari,
            id: selectedItem.id
        };
        let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

        if (!cartItems.some(item => item.id === itemData.id)) {
            cartItems.push(itemData);
            localStorage.setItem('cartItems', JSON.stringify(cartItems));
            alert(`${selectedItem.nama_item} telah ditambahkan ke keranjang`);
        } else {
            alert(`${selectedItem.nama_item} sudah ada di keranjang`);
        }
    }
});


})