
   
    $(document).ready(function(){
      $countLiked=<?php echo $countLiked; ?>;
$countUnliked=<?php echo $countUnliked; ?> ;
      $click=<?php echo $Liked?>;
       $idFilm=<?php echo $idFilm; ?>;
       $idUser=<?php echo $idUser; ?>;

        $("#Like").click(function(){
         if($click==1){
          // aler($click);
          $click=-1;
            $(this).css('background-color', 'white');
              alert("Bạn đã bỏ thích");
              $countLiked--;

              $.get("Ajax/DestroyLike/"+$idUser+"/"+$idFilm,function(data){
                       $('#CountLiked').html(data);
          })
         }
         else{
           //aler($click);
           if($click==0){
            $countUnliked--;
            $("#CountUnliked").html($countUnliked);
           }
           $countLiked++;
           $("#CountLiked").html($countLiked);
          $click=1;
          
            $(this).css('background-color', 'blue');
                alert("Bạn đã  video này nhé"); 
                $("#Dislike").css('background-color', 'white');
                 $.get("Ajax/Like/"+$idUser+"/"+$idFilm,function(data){
                       
          })
         }
        })

         $("#Dislike").click(function(){
         if($click==0){
          // aler($click);
         $countUnliked--;
          $click=-1;
            $(this).css('background-color', 'white');
              alert("Bạn đã bỏ không thích");
           
              $.get("Ajax/DestroyLike/"+$idUser+"/"+$idFilm,function(data){
                        $("#CountUnliked").html(data);
          })
         }
         else{
          if($click==1){
            $countLiked--;
            $("#CountLiked").html($countLiked);
          }
          $countUnliked++;
          $("#CountUnliked").html($countUnliked);
          // aler($click);
          $click=0;
          
            $(this).css('background-color', 'blue');
               alert("Bạn không thích video này nhé"); 
                $("#Like").css('background-color', 'white');
                 $.get("Ajax/Dislike/"+$idUser+"/"+$idFilm,function(data){
                       
          })
         }
        })

      })

//Like and Dislike Comment
 $(document).ready(function(){
   $idUser=<?php echo $idUser; ?>;
  $(".LikeComment").click(function(){
    $idComment=$(this).attr('LikeComment');
   // aler($idComment);
    $.get("Ajax/LikeComment/"+$idUser+"/"+$idComment,function(data){
                      $("#LikeComment"+$idComment).html(data); 
         })
  })
  $(".DislikeComment").click(function(){
    $idComment=$(this).attr('DislikeComment');
    //aler($idComment);
    $.get("Ajax/DislikeComment/"+$idUser+"/"+$idComment,function(data){
                      $("#LikeComment"+$idComment).html(data); 
         })
  })
 })



     //insertComment
        $(document).ready(function(){
      $("#ButtonInsertComment" ).click(function() {
       $idFilm=<?php echo $idFilm; ?>;
       $idUser=<?php echo $idUser; ?>;
     

              $content=$("#Content").val();
             
           
              $.get("Comment/Insert/"+$idFilm+"/"+$idUser+"/"+$content,function(data){
               // aler("InsertComment");
               $("#InsertCommentTable").append(data);
             })
            
           })
})
       
      
          $(document).ready(function(){
             var s=new Date();
  var s1=Date.now();
  var s2=Date.now();
  var click=0;
  var view=<?php echo $film->views; ?>;
  var idFilm=<?php echo $film->id; ?>;
  $("#View").click(function(){
    if(click==0) s1=Date.now();

        if(0.5<click && click<2){
        s2=new Date();
        var s3=(s2-s1)/1000;
        
        
        if(click==1){

    if(s3>5) {view++;

        
        click=2;
        $.get("ViewFilm/"+idFilm,function(data){
            $("#ViewFilm").html(data);
        })
}
}
        }
   if(click<1){
            click++;
        }
  })
            //Clikc vào để xem Film
          $(".RightFilm").click(function(){
            if(click==1){
              s2=new Date();
        var s3=(s2-s1)/1000;
        alert(s3);
        if(s3>5) $.get("ViewFilm/"+idFilm,function(data){
            
        })
            }
            $Film=$(this).attr("RightFilm");
            //aler($Film);
            $.get("RightFilm/"+$Film,function(data){
              $("#InsertComment").html(data);
            })
          })
  $("#ButtonSearch").click(function(){
    
               if(click==1){
              s2=new Date();
        var s3=(s2-s1)/1000;
        alert(s3);
        if(s3>5) $.get("ViewFilm/"+idFilm,function(data){
            
        }) 
      }
                 $TextSearch=$("#TextSearch").val();
                 //aler("DisPlayComment");
                 $.get("SearchFilm/"+$TextSearch,function(data){
                      $("#InsertComment").html(data);
                 })
               
              

            })

        })
//xóa comment
      $(document).ready(function(){
        $(".DeleteComment").click(function(){
          $id=$(this).attr("DeleteComment");
           $("#Change"+$id).html("");
          $.get("DeleteComment/"+$id,function(data){
           
          })
          
        })
      })
      //EditComment
       $(document).ready(function(){
      $(".ButtonEditComment" ).click(function() {
     $IdComment=$(this).attr("EditComment");
    // aler($IdComment);
     $.get("EditComment/"+$IdComment,function(data){
         $("#"+$IdComment).html(data);
     })
            
           })
})
       //Xem Thêm Comment
       $Trang=0;
    $(document).ready(function(){
   $idFilm=<?php echo $idFilm; ?>;
        $("#XemThemComment").click(function(){
            $Trang++;
     // aler($Trang);
      $.get("XemThemComment/"+$Trang+"/"+$idFilm,function(data){
           $("#HienThiComment").append(data);
      })
        })

       })
    $TrangFilm=0;
    $(document).ready(function(){
      $("#XemThemFilm").click(function(){
        $TrangFilm++;
        //aler($TrangFilm);
        $.get("XemThemFilm/"+$TrangFilm+"/"+$TextSearch,function(data){
           $("#HienThiFilm").append(data);
      })
      })
    })
