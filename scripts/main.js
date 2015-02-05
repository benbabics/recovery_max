;(function($) {

    function init() {
        assignListeners();
    }

    function assignListeners() {
        $( document ).on('click', '.btn-top-page', handleTopOfPageClick );
    }

    // Handlers
    function handleTopOfPageClick(evt) {
        evt.preventDefault();
        $( 'html, body' ).animate({ scrollTop:0 }, '500', 'swing' );
    }

    // dom loaded
    $( init );

})( jQuery );
