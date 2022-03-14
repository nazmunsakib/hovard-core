jQuery(function($){
    $('.loade_more_btn').click(function(){

        var button = $(this),
            data = {
                'action': 'loadmore',
                'page' : hovard_loadmore_params.current_page
            };

        $.ajax({
            url : hovard_loadmore_params.ajaxurl,
            data : data,
            type : 'POST',
            beforeSend : function ( ) {
                button.text('Loading...');
            },
            success : function( data ){
                if( data ) {
                    let ctn = document.querySelector('.article_wrapper')
                    ctn.innerHTML = data

                    button.text( 'More posts' ).prev().before(data);
                    hovard_loadmore_params.current_page++;

                    if ( hovard_loadmore_params.current_page == hovard_loadmore_params.max_page ){
                        button.remove();
                    }

                } else {
                    button.remove();
                }
            }
        });
    });
});