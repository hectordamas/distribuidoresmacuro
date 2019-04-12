//Desaparecer Modal
setTimeout(function(){
    $('.modalMessage').fadeOut();
}, 1500);


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
            $('#input-qty' + id).val('');
            $('.spinner-container').css('display', 'none');
        }
    });
});