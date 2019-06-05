<?php
use App\Comment;
$comment=Comment::find($idComment);
 ?>
<td style="float:right;" > <button  
                                @if($LikeUnlikeComment==1)
                                 style="border:none;background-color: blue;"
                                 @elseif($LikeUnlikeComment==0)
                                 style="border:none;background-color: white;"
                                 @else style="border:none;background-color:white;"
                                 @endif
                                name="LikeComment" class="LikeComment"  LikeComment="{{$idComment}}" ><i class="fa fa-thumbs-up  fa-fw"></i></button>
                                 <b>{{$comment->liked}}</b>

                                <button 
                                  @if($LikeUnlikeComment==0)
                                 style="border:none;background-color: blue;"
                                 @else
                                 style="border:none;background-color: white;"
                                 
                                 @endif
                                  name="EditComment" class="DislikeComment"  DislikeComment="{{$idComment}}" ><i class="fa fa-thumbs-down " ></i></button>
                                  <b>{{$comment->unliked}}</b>
                                </td>
<script type="text/javascript">
    $(document).ready(function(){
   $idUser=<?php echo $idUser; ?>;
  $(".LikeComment").click(function(){
    $idComment=$(this).attr('LikeComment');
    //aler($idComment);
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
</script>