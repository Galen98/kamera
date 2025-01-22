$(document).ready(function(){
    let dataIdNav = 1
    $("a[data-field='nav-report']").click(function(){
        $('#loadingOverlay').show()
        let index = $(this).attr('id');
        index = parseInt(index.split('_')[1]);
        
        $('#nav-report_'+index).parent().addClass('active');
        $('#nav-report_'+index).parent().siblings().removeClass('active');
        dataIdNav = index
        updateNavigation()
    })

function updateNavigation() {
    if(dataIdNav == 1){
        $('.nav-penjualan').show()
        $('.nav-barang').hide()
    } else {
        $('.nav-penjualan').hide()
        $('.nav-barang').show()
    }
}

updateNavigation()
})