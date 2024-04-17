
$(document).ready( () => {
    //process each img tag
    $("#project_Details").each( (index, img) => {
        
           //display color image (when mouse is on image)
           $(img).mouseover ( function() {
            const src= $(this).attr('src');
            const new_src= src.replace("-blurry.jpg", "-color.jpg");
            $(this).attr('src', new_src);

        });
        //display blurry image (when mouse is off image)
        $(img).mouseout( function() {
            const src= $(this).attr('src');
            const new_src= src.replace("-color.jpg", "-blurry.jpg");
            $(this).attr('src', new_src);
        });
    });

});