//Desaparecer Modal
setTimeout(function(){
    $('.modalMessage').fadeOut();
}, 2500);

setTimeout(function(){
    $('.alert-success').fadeOut();
}, 2500);


$('.stock-container, .alert-success, .modalMessage').on('click', function(){
    $('.alert-success').fadeOut();
    $('.modalMessage').fadeOut();
    $('.stock-container').fadeOut();
});

$('.DataTable').DataTable();

$('.añadir').on('click', function(){
    var id = $(this).data('id');
    var qty = $('#input-qty' + id).val();
    $('.spinner-container').css('display', 'flex');
    var stock = parseInt($('#stock' + id).html());
    if(qty > stock){
        $('.stock-container').css('display', 'flex');
        $('.spinner-container').css('display', 'none');
    }else{
        $.ajax({
            headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
              },
            url:'/cart',
            type:'POST',
            dataType:'json',
            data:{
                id:id,
                qty:qty
            },
            success:function(data){
                $('#count-bar').html(data.count);
                $('.truck-count').html(data.countImport);
                $('.stock-count').html(data.countStock);
                $('#totalStock').html(data.totalStock + ' $');
                $('#totalImport').html(data.totalImport + ' $');
                $('#bar').css('width', data.fillPercent + '%');
                $('.span-fillPercent').html(data.fillPercent + ' %');
                $('#listCart').append('<div class="col-md-12 list-item"><strong>'+data.product.name+'</strong> - '+ data.price +' $ - '+ data.quantity +' </div>');
                $('#input-qty' + id).val('');
                $('.spinner-container').css('display', 'none');
                if(data.fillPercent >= 50){
                    $('.percent-container').css('display', 'flex');
                }
                if(data.fillPercent >= 97){
                    $('.complete2-container').css('display', 'flex');
                    $('.percent-container').css('display', 'none');
                }
            }
        });
    }
});
$('#continue').on('click', function(){
    $('.percent-container').css('display', 'none');
});

$('#cancel').on('click', function(){
    $('.edit-container').css('display', 'none');
});

$('.edit').on('click', function(){
    var id = $(this).data('id');
    $('.spinner-container').css('display', 'flex');
    $.ajax({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        },
        url:'/cart/' + id + '/edit',
        type: 'GET',
        dataType:'json',
        data:{
            id:id,
        },
        success: function(data){
            $('.spinner-container').css('display', 'none');
            $('.edit-container').css('display', 'flex');
            $('#edit-title').html(data.item.name);
            $('#quantity-edit').val(data.item.quantity);
            $('#edit-cart').attr('action', '/cart/' + id);
        }
    });
});