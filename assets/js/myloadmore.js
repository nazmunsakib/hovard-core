jQuery(function($){
    $('.loade_more_btn').click(function(){

        var button = $(this),
            data = {
                'action': 'loadmore',
            };

        $.ajax({ // you can also use $.post here
            url : hovard_loadmore_params.ajaxurl,
            data : data,
            type : 'POST',
            beforeSend : function ( xhr ) {
                button.text('Loading...');
            },
            success : function( data ){
                console.log('success'+ data)
                if( data ) {
                    let ctn = document.querySelector('.article_wrapper')
                    ctn.innerHTML = data

                    button.text( 'More posts' ).prev().before(data);
                    hovard_loadmore_params.current_page++;

                    if ( hovard_loadmore_params.current_page == hovard_loadmore_params.max_page )
                        button.remove(); // if last page, remove the button

                    // you can also fire the "post-load" event here if you use a plugin that requires it
                    // $( document.body ).trigger( 'post-load' );
                } else {
                    button.remove(); // if no data, remove the button as well
                }
            }
        });
    });
});