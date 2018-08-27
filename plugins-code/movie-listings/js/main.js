(function ($)
{
    $(document).ready(function(e) {
        var movieSortList   = $('ul.movie-sort-list');
        var loading         = $('.loading');
        var orderSaveMsg    = $('.order-save-msg');
        var orderSaveErr    = $('.order-save-err');
        

        movieSortList.sortable({
            update: function( e, ui ) {
                loading.show();    
                $.ajax({
                    url: ajaxurl,
                    type: 'post',
                    dataType: 'json',
                    data:{
                        action: 'save_order',
                        order: movieSortList.sortable('toArray'),
                        token: ML_MOVIE_LISTING.token
                    },
                    success: function(res) {
                        loading.hide();
                        if(true === res.success) {
                            orderSaveMsg.show();
                            setTimeout(function() {
                                orderSaveMsg.hide();
                            }, 2000);
                        } else {
                            orderSaveErr.show();
                            setTimeout(function() {
                                orderSaveErr.hide();
                            }, 2000);
                        }
                    },
                    error: function(err) {
                        console.log(err);
                        loading.hide();
                        orderSaveErr.show();
                        setTimeout(function(){
                                orderSaveErr.hide();
                            }, 2000);
                    }
                });
            }
        });
    });
})(jQuery);