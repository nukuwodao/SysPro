$(function(){
    $('.bt-samp').on('click',function(){
        const this_id = "#" + $(this).attr('id');
        const a = this_id + " + .balloon1";
        const b = "textarea" + this_id;
        const c = document.querySelector(b);
        console.log(c);
        c.select();
        document.execCommand("copy");
        $(a).fadeIn("slow", function(){
            $(a).delay(1000).fadeOut("slow");
        });
    });
});
