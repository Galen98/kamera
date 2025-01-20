$(document).ready(function(){
    $('#loadingOverlay, .data-sukses').hide()
    $('.btn-on-edit').on('click', '.btn-edit', function(){
        $('.email-input').attr('readonly', false)
        $(this).removeClass('btn-edit')
        $(this).html('<i class="fas fa-save"></i> Save');
        $(this).addClass('btn-save')
    })

    $('.btn-on-edit').on('click', '.btn-save', function(){
        let val = $('.email').val()
        let $Button = $(this)
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
    });
})