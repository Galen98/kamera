document.addEventListener("DOMContentLoaded", function () {
    const today = new Date().toISOString().split("T")[0];
    document.getElementById("tgl_sewa").setAttribute("min", today);
});

$(document).ready(function(){
    $('#loadingOverlay').hide()

    const rupiah = (number)=>{
        return new Intl.NumberFormat("id-ID", {
          style: "currency",
          currency: "IDR"
        }).format(number);
    }

localStorage.removeItem('cartItems');
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


function cart() {
    let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
    const cartContainer = $('.item-in-cart');
    cartContainer.empty();

    if (cartItems.length === 0) {
        cartContainer.append('<li class="text-center">Cart is empty</li>');
    } else {
        cartItems.forEach(item => {
            const listItem = `
                <li class="clearfix" data-id="${item.id}">
                    <span>${item.nama_item}</span>
                    <input type="number" class="input-mini pull-right cart-qty" value="${item.jumlah}" min="1" max="${item.availability}" style="margin-left: 5px; width: 40px;">
                    <button class="btn btn-danger btn-sm pull-right btn-remove-cart" style="margin-left: 5px;">
                        <i class="fa fa-trash"></i>
                    </button>
                    <span class="pull-right">${rupiah(item.harga_per_hari * item.jumlah)}</span>
                </li>
                <hr>`;
            cartContainer.append(listItem);
        });
    }
    grandTotal()
}

$(document).on('click', '.btn-remove-cart', function () {
    const itemId = $(this).closest('li').data('id');
    let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
    const removedItem = cartItems.find(item => item.id === itemId);

    cartItems = cartItems.filter(item => item.id !== itemId);
    localStorage.setItem('cartItems', JSON.stringify(cartItems));

    if (removedItem) {
        let existingItem = allItems.find(item => item.id === removedItem.id);
        if (existingItem) {
            existingItem.availability.count += 1;
        } else {
            allItems.push({
                id: removedItem.id,
                nama_item: removedItem.nama_item,
                kode_item: removedItem.kode_item,
                merk: removedItem.merk,
                seri: removedItem.seri,
                harga_per_hari: removedItem.harga_per_hari,
                availability: { count: removedItem.availability }
            });
        }
    }

    cart();
    dataItem();
    grandTotal()
});


$(document).on('input', '.cart-qty', function () {
    const itemId = $(this).closest('li').data('id');
    let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

    cartItems = cartItems.map(item => {
        if (item.id === itemId) {
            item.jumlah = parseInt($(this).val()) || 1;
        }
        return item;
    });

    localStorage.setItem('cartItems', JSON.stringify(cartItems));
    cart(); 
    grandTotal()
});

//add to cart
$(document).on('click', '.btn-cart', function (e) {
    e.preventDefault();
    const itemId = $(this).data('id');
    const selectedItem = allItems.find(item => item.id === itemId);

    if (selectedItem) {
        let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

        if (!cartItems.some(item => item.id === selectedItem.id)) {
            cartItems.push({
                id: selectedItem.id,
                nama_item: selectedItem.nama_item,
                kode_item: selectedItem.kode_item,
                merk: selectedItem.merk,
                seri: selectedItem.seri,
                harga_per_hari: selectedItem.harga_per_hari,
                availability: selectedItem.availability.count,
                jumlah: 1
            });

            localStorage.setItem('cartItems', JSON.stringify(cartItems));

            allItems = allItems.filter(item => item.id !== itemId);
            dataItem();
            cart();
            grandTotal()
        }
    }
});


cart();

function grandTotal() {
    let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
    let total = cartItems.reduce((sum, item) => sum + (item.harga_per_hari * item.jumlah), 0);
    $('.grand-total').text(rupiah(total));
    $('#total_amount').val(total);
}
grandTotal()

let dataIdNav = 1

function updateNavigation() {
    if(dataIdNav == 1){
        $('#item-list').show()
        $('#detail-info').hide()
    } else {
        $('#item-list').hide()
        $('#detail-info').show()
    }
}
$("a[data-field='nav-transaction']").click(function(){
        let index = $(this).attr('id');
        index = parseInt(index.split('_')[1]);
        
        $('#nav-transaction_'+index).parent().addClass('active');
        $('#nav-transaction_'+index).parent().siblings().removeClass('active');
        dataIdNav = index
        updateNavigation()
})


updateNavigation()

function hitungTanggalKembali() {
    const tglSewa = $('#tgl_sewa').val();
    const hariSewa = $('#hari_sewa').val();

    if (tglSewa && hariSewa) {
        const tglSewaObj = new Date(tglSewa);
        tglSewaObj.setDate(tglSewaObj.getDate() + parseInt(hariSewa));
        const tglKembali = tglSewaObj.toISOString().split("T")[0];
        $('#tgl_kembali').val(tglKembali);
    }
}

$('#tgl_sewa, #hari_sewa').on('change', function () {
    hitungTanggalKembali();
});
})