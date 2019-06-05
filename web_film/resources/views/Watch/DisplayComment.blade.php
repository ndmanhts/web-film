<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Bootstrap Core CSS -->
    <link href="font/css/bootstrap.min.css" rel="stylesheet">

   
    
        <style type="text/css">
          table {
  border:none;
}
        </style>
         
  
        <body>
  <?php 
  use App\Comment;
  use App\Film;
  use App\DanhGia;
  use App\DanhGiaComment;
  $idUser=0;
  if(Auth::User())  {
    $nguoidung=Auth::user();
    $idUser=$nguoidung->id;
    
  }
else $idUser=0;


                $RightFilm=Film::where('name','like','%'.$TextSearch."%")->take(4)->get();
               
               $film=Film::where('name','like','%'.$TextSearch."%")->get()->shift();
               $idFilm=$film->id;
                $comment=Comment::where('idFilm',$idFilm)->get();
                $danhgiaOld=new DanhGia;

                 $Liked=-1;
              if($idUser!=0){
                $danhgia=DanhGia::where('idUser',$idUser)->where('idFilm',$idFilm)->get();
                if(count($danhgia)>0) $danhgiaOld=$danhgia->shift();
                else {
                  $danhgiaOld->idUser=$idUser;
                  $danhgiaOld->idFilm=$idFilm;
                  $danhgiaOld->Liked=-1;
                }
                $Liked=$danhgiaOld->Liked;
                
              }
             
           $comment=$comment->splice(0,4);
           //Like Comment
           
                ?>
    
    

    <div id="site-content">
     

         

          <div class="mobile-navigation"></div>
        </div>
      </header>
       <main class="main-content">
        <div class="container">
          <div class="page">
            <div class="row">
              <div class="col-md-9">
                <div class="slider">
                  <div class="slides" >
                    <a id="View">
                    <video controls="" width="800px" >
                      <source src="{{$film->source}}" type="video/mp4">
                    </video>
                  </a>
                  </div>
                  <div><h3>Tên Phim: {{$film->name}}</h3>
                    
                   Luợt xem: <a id="ViewFilm"> {{$film->views}}</a>
                    
                <a style="float: right">
                  @if($idUser!=0)
<button  
@if($Liked==1)
style='font-size:24px;border:none;background-color: blue' ;
@else style='font-size:24px;border:none;background-color: white' ;
@endif()
name="like" id="Like" ><i class="fa fa-thumbs-up fa-1.5x"></i></button>
<b id="CountLiked">{{$film->liked}}</b> 
  <button  
  @if($Liked==-0)
style='font-size:24px;border:none;background-color: blue' ;
@else style='font-size:24px;border:none;background-color: white' ;
@endif()
   name="Dislike" id="Dislike" ><i class="fa fa-thumbs-down fa-1.5x"></i> </button> 
   <b id="CountUnliked">{{$film->unliked}} </b>
   @else
   <button   style='font-size:24px;border:none;background-color: white' ;
name="like"  ><i class="fa fa-thumbs-up fa-1.5x"></i></button>
<b >{{$film->liked}}</b> 
  <button  
 style='font-size:24px;border:none;background-color: white' ;
   name="Dislike" ><i class="fa fa-thumbs-down fa-1.5x"></i> </button> 
   <b >{{$film->unliked}} </b>
  @endif
 
  <br>
</div>

                  <hr>
                  
                  <a style="float: left;"><img  src="upload/hinhanh/ndmanh.jpg" style="width:40px;"> </a>
                  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                    <a>Năm Sản Xuất: {{$film->year}}
                      <br>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; <a>Tác giả: {{$film->author}}</a>
                      <br>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;
                    <a>-------------------------------------</a>
                      <br>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
                   <a>Nội dung: {{$film->content}}</a>
                    
                   
                      
                   
                    
                   
                  
                  <hr>
                  @if($idUser!=0)
                       <div class="well">
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                  
                       
                        <div class="form-group">
                            <textarea id="Content" class="form-control" rows="1" name="Content" ></textarea>
                        </div>
                        <button  type="button" class="btn btn-primary" id="ButtonInsertComment">Gửi</button>

                    </form>
                </div>
                @endif
               <!-- Hiển thị tất cả comment-->
            
            <table id="InsertCommentTable"></table>
               @foreach($comment as $comment)
                    <table class="table table-striped  table-hover" id="dataTables-example" style="background-color: white;">
             
                  
                       
                        <tbody id="Change{{$comment->id}}">
                          
                           
                            <tr class="odd gradeX" align="center" style="background-color: grey;" >
                                <td class="Comment" IdComment="11" style="text-align: left;"><b>{{$comment->User->name}}</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp{{$comment->time}}</td>

                                <td></td>
                               
                                <?php 
                                $LikeUnlikeComment=5;
                                if($idUser!=0){
                                  $LikeUnlikeComment=5;
                               $danhgiaComment=DanhGiaComment::where('idUser',$idUser)->where('idComment',$comment->id)->get();
                               if(count($danhgiaComment)>0) {
                                $danhgiaComment=$danhgiaComment->shift();
                                $LikeUnlikeComment=$danhgiaComment->liked;
                               }
                               
                             }
                            
                                ?>
                               
                               
                                <td class="center"></td>
                              @if($idUser==$comment->iduser)
                                <td style="text-align: right"> <button  style="border:none;" name="EditComment" class="DeleteComment" DeleteComment="{{$comment->id}}" ><i class="fa fa-trash-o  fa-fw"></i></button>
                                   
                                <button  style="border:none;" name="EditComment" class="ButtonEditComment" EditComment="{{$comment->id}}" ><i class="fa fa-pencil fa-1.5x" ></i></button></td>
                              @else
                              @if($idUser!=0)
                               <td style="text-align: right" id="LikeComment{{$comment->id}}" > <button  
                                @if($LikeUnlikeComment==1)
                                 style="border:none;background-color: blue;"
                                 @elseif($LikeUnlikeComment==0)
                                 style="border:none;background-color: white;"
                                 @else style="border:none;background-color:white;"
                                 @endif
                                name="LikeComment" class="LikeComment"  LikeComment="{{$comment->id}}" ><i class="fa fa-thumbs-up  fa-fw"></i></button>
                                   <b>{{$comment->liked}}</b>
                                <button 
                                  @if($LikeUnlikeComment==0)
                                 style="border:none;background-color: blue;"
                                 @else
                                 style="border:none;background-color: white;"
                                 
                                 @endif
                                  name="EditComment" class="DislikeComment" id="DislikeComment{{$comment->id}}" DislikeComment="{{$comment->id}}" ><i class="fa fa-thumbs-down " ></i></button>
                                <b>{{$comment->unliked}}</b>
                                </td>
                              @endif
                               @endif
                            </tr>
                            <tr >
                              <td colspan="5" id="{{$comment->id}}" >{{$comment->content}}</td>
                            </tr>
                           
                          

                           
     
                        </tbody>
                        
                    </table>
                    <br>
                    @endforeach
               <div id="HienThiComment"></div>
    <div style="padding-left: 400px;"> <button id="XemThemComment" >Xem Thêm</button></div>
 
               
              
               <!-- Hiển thị tất cả comment-->

                </div>
              </div>
              <div class="col-md-3">
                <div class="row">
                  
              

                  <div class="col-sm-6 col-md-12">
                    <div class="latest-movie">
                      <a >
                     @foreach($RightFilm as $RF)
                     <a style="text-align: center;"><b>{{$RF->name}}</b></a>
                                      
                                        <a class="RightFilm" RightFilm="{{$RF->id}}"><img src="upload/hinhanh/{{$RF->hinhanh}}" alt="Slide 1"></a>
                                        @endforeach
                  </a>
                    </div>
                  </div>
                
                  <div id="HienThiFilm"></div>
           <div style="padding-left: 80px;"> <button id="XemThemFilm"  >Xem Thêm</button></div>
                </div>
              </div>
            </div> 

           
          </div>
        </div> <!-- .container -->
      </main>
     
      
    </div>
    <!-- Default snippet for navigation -->
   <!-- Đếm lượt liked unliked của film--> 
<?php
$countDanhGia=Film::find($idFilm);
$countLiked=$countDanhGia->liked;
$countUnliked=$countDanhGia->unliked;
?>
 
     <script type="text/javascript">
   
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

//Lke and Dislike Comment
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
      </script>
      
   
   
   
    
    


 





  
        </body>
   