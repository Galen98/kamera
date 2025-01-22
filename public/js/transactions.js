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
                ? `<a href="#" class="btn btn-primary" data-id="${item.id}"><i class="fa-solid fa-cart-shopping"></i> Add to Cart</a>`
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
                            <p>Tersedia: ${item.availability.count}</p>
                            <p>${buttonCart}</p>
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

})