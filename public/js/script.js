        $(document).ready(function () {
       
            $("img").addClass("img-responsive");
            $('#summernote').summernote({
              height: 100,                 // set editor height
              minHeight: null,             // set minimum height of editor
              maxHeight: null,             // set maximum height of editor
              focus: true                  // set focus to editable area after initializing summernote
            });   
         
            window.setTimeout(function() {
                $(".alert").fadeTo(1500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
            }, 2000);
         
        });

        $(".delete").on("submit", function(){
            return confirm("是否要删除此项目？");
        }); 
        
        $(".deleteuser").on("submit", function(){
            return confirm("警告：如果删除此用户，则将删除此用户的所有信息。你确定吗？ ");
        });         

        $(".deletetickets").on("submit", function(){
            return confirm("警告：如果删除此信息，则将删除与之相关的所有信息。你确定吗？ ");
        });         