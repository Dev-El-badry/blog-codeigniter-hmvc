    $(document).ready(function() {
    $('.select2-multi').select2();
    //$('.select2-multi').select2().val().trigger('change');
    
    });

    /*
    * function to check video link is valid or not valid
    * param: video url
    */

    function validateYouTubeUrl() {    
    var url = $('#youTubeUrl').val();
    if (url != undefined || url != '') {        
        var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
        var match = url.match(regExp);
        if (match && match[2].length == 11) {
            // Do anything for being valid
            // if need to change the url to embed url then use below line            
            $('#videoObject').attr('src', 'https://www.youtube.com/embed/' + match[2] );
            var ss = $('#videoObject').attr('src');
            $('#validUrl').val(ss);
        } else {
            alert('هذه اللينك غر صحيح ضع اللينك الصحيح');
            // Do anything for not being valid
        }
    }
}