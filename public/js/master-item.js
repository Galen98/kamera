$(document).ready(function () {
    $('#openModal').on('click', function () {
      $('#modalOverlay').fadeIn();
    });

    $('#closeModal').on('click', function () {
      $('#modalOverlay').fadeOut();
    });

    $('#modalOverlay').on('click', function (e) {
      if ($(e.target).is('#modalOverlay')) {
        $('#modalOverlay').fadeOut();
      }
    });

function getCategory(){
    $('#loadingOverlay').show()
    $.ajax({
        url: '/api/categories',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
        $('#loadingOverlay').hide()
            console.log(response)
        if (Array.isArray(response.category)) {
            const categoryList = $('#categoryList');
            categoryList.empty(); 
            categoryList.append('<option class="text-capitalize">Silahkan pilih kategori</option>');
            response.category.forEach(function (category) {
              categoryList.append('<option class="text-capitalize" value="' + category.id + '">' + category.nama_category + '</option>');
            });
        }  
        }
    })
}
getCategory();

$('#store-category').on('click', function() {
let val = $('#kategori').val()
$.ajax({
    url: '/api/categories', 
    type: 'POST',
    dataType: 'json',
    data: {
        nama_category: val,
        _token: '{{ csrf_token() }}', 
    },
    success: function(response) {
        console.log(response);
    },
    error: function(xhr, status, error) {
        console.error('Error:', xhr);
    }
  });
  $('#closeModal').trigger('click');
  getCategory()
  })

function getCode(){
  let lastshortName = ''
  let resultNama = ''
  let resultSeri = ''
  let resultMerk = ''
  $('#categoryList').change(function() {
      var selectedOption = $(this).find('option:selected');
      var categoryName = selectedOption.text();
      var shortName = categoryName.substring(0, 3).toUpperCase();
      
      if(shortName == 'SIL'){
        lastshortName = ''
      } else{
        lastshortName = shortName
      }
      updateKode()
  });

  $('#nama').on('keyup', function() {
    var inputText = $(this).val().toUpperCase();
    let res = inputText.split(" ").join("");
    resultNama = res.substring(0, 3);
    updateKode()
  });

  $('#seri').on('keyup', function() {
    var inputText = $(this).val().toUpperCase();
    let res = inputText.split(" ").join("");
    resultSeri = res.substring(0, 3);
    updateKode()
  });

  $('#merk').on('keyup', function() {
    var inputText = $(this).val().toUpperCase();
    let res = inputText.split(" ").join("");
    resultMerk = res.substring(0, 3);
    updateKode()
  });
  function updateKode() {
    $('#kode').val(lastshortName + '/' + resultMerk + '/' + resultNama + '/' + resultSeri);
  }
}

  
  getCode()
  //halaman list
const rupiah = (number)=>{
    return new Intl.NumberFormat("id-ID", {
      style: "currency",
      currency: "IDR"
    }).format(number);
}

function getAllItems() {
  $('#loadingOverlay').show()
  $.ajax({
    url: '/api/all-master-items',
    type: 'GET',
    dataType: 'json',
    success: function (response) {
    $('#loadingOverlay').hide()
      console.log(response)
    if (Array.isArray(response.item)) {
        const itemMaster = $('.itemMaster');
        itemMaster.empty(); 
        if(response.item.length < 1) {
          itemMaster.append('<h4 class="text-center">No Item Found</h4>')
        } else {
        response.item.forEach(function (item) {
          itemMaster.append('<div class="span4">' +
            '<div class="card">' +
                '<img src="https://framerusercontent.com/images/yY0ZQLYDzpEQkrUF6fFYOlBM6M.png?scale-down-to=1024" alt="Card Image 1">' +
                '<div class="card-header text-capitalize">'+item.nama_item+'</div>'+
                '<div class="card-body">'+
                    '<p>Sisa stok: <b>'+ item.availability.count +'</b></p>'+
                    '<p class="text-capitalize">Merk: '+ item.merk+'</p>'+
                    '<p class="text-capitalize">Seri: '+ item.seri+'</p>'+
                    '<h5>Harga Sewa Per Jam: '+ rupiah(item.harga_per_jam) +'</h5>'+
                    '<h5>Harga Sewa Per Hari: '+ rupiah(item.harga_per_hari) +'</h5>'+
                    '<p><a class="btn" href="/master-item/view/'+item.id+'">View details &raquo;</a></p>'+
                '</div>'+
            '</div>'+
        '</div>');
        });
      }       
      }  
    }
  })
  
}

getAllItems();

$('#allItems').click(function(){
    getAllItems()
    $("a[data-field='filter-cat']").parent().siblings().removeClass('active');
})

$("a[data-field='filter-cat']").click(function(){
  $('#loadingOverlay').show()
  let index = $(this).attr('id');
  index = parseInt(index.split('_')[1]);
  var categoryId = $(this).data('id');
  
  $('#filter-cat_'+index).parent().addClass('active');
  $('#filter-cat_'+index).parent().siblings().removeClass('active');
  
  $.ajax({
    url: '/api/all-master-items/categories='+categoryId,
    type: 'GET',
    dataType: 'json',
    success: function (response) {
    $('#loadingOverlay').hide()
    if (Array.isArray(response.item)) {
      const itemMaster = $('.itemMaster');
      itemMaster.empty(); 
      if(response.item.length < 1) {
        itemMaster.append('<h4 class="text-center">No Item Found</h4>')
      } else {
        response.item.forEach(function (item) {
          itemMaster.append('<div class="span4">' +
            '<div class="card">' +
                '<img src="https://framerusercontent.com/images/yY0ZQLYDzpEQkrUF6fFYOlBM6M.png?scale-down-to=1024" alt="Card Image 1">' +
                '<div class="card-header text-capitalize">'+item.nama_item+'</div>'+
                '<div class="card-body">'+
                    '<p>Sisa stok: <b>'+ item.availability.count +'</b></p>'+
                    '<p class="text-capitalize">Merk: '+ item.merk+'</p>'+
                    '<p class="text-capitalize">Seri: '+ item.seri+'</p>'+
                    '<h5>Harga Sewa Per Jam: '+ rupiah(item.harga_per_jam) +'</h5>'+
                    '<h5>Harga Sewa Per Hari: '+ rupiah(item.harga_per_hari) +'</h5>'+
                    '<p><a class="btn" href="/master-item/view/'+item.id+'">View details &raquo;</a></p>'+
                '</div>'+
            '</div>'+
        '</div>');
        });
      }   
    }
    }
  })
})
  });