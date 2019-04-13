//Desaparecer Modal
setTimeout(function(){
    $('.modalMessage').fadeOut();
}, 500);

setTimeout(function(){
    $('.alert').fadeOut();
}, 1200);

$('.añadir').on('click', function(){
    var id = $(this).data('id');
    var qty = $('#input-qty' + id).val();
    $('.spinner-container').css('display', 'flex');
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
        }
    });
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