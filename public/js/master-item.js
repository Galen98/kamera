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
            response.category.forEach(function (category) {
              categoryList.append('<option value="' + category.id + '">' + category.nama_category + '</option>');
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

//halaman list
$.ajax({
    
})
  });