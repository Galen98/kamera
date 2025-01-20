$(document).ready(function(){
    $('.btn-edit').click(function(){
        $('.email-input').attr('readonly', false)
        $(this).html('<i class="fas fa-save"></i> Save');
    })
})