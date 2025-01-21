$(document).ready(function(){
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
  
    $('#loadingOverlay, .data-sukses').hide()

    function getInvoices() {
        $('#loadingOverlay').show()
        $.ajax({
            url: '/api/get-invoices',
            type: 'GET',
            dataType: 'json',
            success: function (response) {
            $('#loadingOverlay').hide()
            if (Array.isArray(response.item)) {
                const itemInvoice = $('.itemInvoice');
                itemInvoice.empty(); 
                if(response.item.length < 1) {
                  itemInvoice.append('<h4 class="text-center">No Invoice Found</h4>')
                } else {
                response.item.forEach(function (item) {
                    var imageSrc = item.invoice_pict ? '/img/invoices/' + item.invoice_pict : 'https://www.shutterstock.com/image-vector/image-icon-600nw-211642900.jpg';
                    var htmlContent = `
                    <div class="span4">
                    <div>
                        <img src="${imageSrc}" class="img-rounded" style="width: 250px; height:200px; margin-bottom: 15px;">
                        <h4>${item.store_name}</h4>
                        <div class="btn-group">
                            <button class="btn btn-edit-inv btn-info" id="index_${item.id}" data-id="${item.id}">
                                <i class="fa-regular fa-pen-to-square"></i> Edit
                            </button>
                            <button id="index_${item.id}" class="btn btn-delete-inv btn-danger" data-id="${item.id}">
                                <i class="fa fa-trash" aria-hidden="true"></i> Delete
                            </button>
                        </div>
                    </div>
                    </div>
                `;
                  itemInvoice.append(htmlContent)
                    })
                }
            }
        }
        })
    }
    getInvoices()

    $('.btn-on-edit').on('click', '.btn-edit', function(){
        $('.email-input').attr('readonly', false)
        $(this).removeClass('btn-edit')
        $(this).html('<i class="fas fa-save"></i> Save');
        $(this).addClass('btn-save')
    })

    $('.btn-on-edit').on('click', '.btn-save', function(){
        let $Button = $(this)
        let val = $('.email').val()
        if(val !== ''){
        $('#loadingOverlay').show()
        $.ajax({
            url: '/api/save-email', 
            type: 'POST',
            dataType: 'json',
            data: {
                email: val,
                _token: '{{ csrf_token() }}', 
            },
            success: function(response) {
                $('#loadingOverlay').hide()
                $('.email-input').attr('readonly', true)
                $('.data-sukses').append('<div class="alert alert-block alert-success data-sukses" style="margin-top: 10px;">'+
                '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                '<p><i class="fa-solid fa-check"></i> Data berhasil diinput</p>'+
                '</div>')
                $('.data-sukses').show()
                $Button.removeClass('btn-save')
                .addClass('btn-edit')
                .html('<i class="fa-regular fa-pen-to-square"></i> Edit');
            },
            error: function(xhr, status, error) {
                console.error('Error:', xhr);
            }
          });
        } else {
            $Button.removeClass('btn-save')
                .addClass('btn-edit')
                .html('<i class="fa-regular fa-pen-to-square"></i> Edit');
            $('.email-input').attr('readonly', true)
        }
    });

    $('input[name="logo"]').on('change', function(){
        var file = $('#fileInput').prop('files')[0];
        if (file) {
            var fileSize = file.size;
            var maxSize = 500 * 1024;
            if (fileSize > maxSize) {
                alert("Ukuran file tidak boleh lebih dari 500KB!");
                $('#fileInput').val('');
            } else {
                console.log("File yang dipilih:", file);
            }
        }
    });

    $('#store-invoice').click(function(){
        var store_name = $('#store').val()
        var formData = new FormData();
        var file = $('#fileInput').prop('files')[0];

        if(store_name == ''){
         alert('Nama store tidak boleh kosong!')
        } else {
        formData.append('logo', file);
        formData.append('store_name', store_name)
        $('#loadingOverlay').show()
        $.ajax({
            url: '/api/save-invoices',
            method: 'post',
            data: formData,
            contentType : false,
            processData : false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
                $('#loadingOverlay').hide()
                $('#closeModal').trigger('click')
                $('#fileInput').val('')
                $('#store').val('')
                getInvoices()
                $('.data-sukses').append('<div class="alert alert-block alert-success data-sukses" style="margin-top: 10px;">'+
                '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                '<p><i class="fa-solid fa-check"></i> '+ response.message +'</p>'+
                '</div>')
                $('.data-sukses').show()
            }
        });
    }
    })

    
    $('.itemInvoice').on('click', '.btn-edit-inv', function(){
        let index = $(this).attr('id');
        index = parseInt(index.split('_')[1]);
        var Id = $(this).data('id');
        $('#modalOverlayEdit').fadeIn();
        $("#store-edit").val(Id)
    })

    $('.itemInvoice').on('click', '.btn-delete-inv', function(){
        let index = $(this).attr('id');
        index = parseInt(index.split('_')[1]);
        var Id = $(this).data('id');
        $('#store-delete').val(Id)
        $('#modalOverlayDelete').fadeIn();
    })

    $('#delete-invoice').on('click', function(){
        var Id = $('#store-delete').val()
        $('#loadingOverlay').show()
        $.ajax({
            url: '/api/destroy-invoices/'+Id,
            method: 'DELETE',
            contentType : false,
            processData : false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
                console.log(response)
                $('#loadingOverlay').hide()
                $('#closeModalDelete').trigger('click')
                $("#store-delete").val()
                getInvoices()
                $('.data-sukses').append('<div class="alert alert-block alert-success data-sukses" style="margin-top: 10px;">'+
                    '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                    '<p><i class="fa-solid fa-check"></i> '+ response.message +'</p>'+
                    '</div>')
                    $('.data-sukses').show()
            }
        });
    })

    $('#closeModalDelete').on('click', function () {
        $('#modalOverlayDelete').fadeOut();
        $("#store-delete").val()
      });
  
      $('#modalOverlayDelete').on('click', function (e) {
        if ($(e.target).is('#modalOverlayEdit')) {
          $('#modalOverlayDelete').fadeOut();
          $("#store-delete").val()
        }
      });
      

      $('#closeModalEdit').on('click', function () {
        $('#modalOverlayEdit').fadeOut();
        $("#store-edit").val()
        $("#fileInput-edit").val('')
      });
  
      $('#modalOverlayEdit').on('click', function (e) {
        if ($(e.target).is('#modalOverlayEdit')) {
          $('#modalOverlayEdit').fadeOut();
          $("#store-edit").val()
          $("#fileInput-edit").val('')
        }
      });
})