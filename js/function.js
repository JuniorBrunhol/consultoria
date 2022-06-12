  $(document).ready(function(){
    var size;
    $('#cropbox').Jcrop({
      aspectRatio: 1,
      onSelect: function(c){
       size = {x:c.x,y:c.y,w:c.w,h:c.h};   
       $("#crop").css("visibility", "visible");  
      }
    });
 
    $("#crop").click(function(){
        var img = $("#cropbox").attr('src');
        $("#cropped_img").show();
        $("#cropped_img").attr('src','image-crop.php?x='+size.x+'&y='+size.y+'&w='+size.w+'&h='+size.h+'&img='+img);
    });
});
