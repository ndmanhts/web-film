<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DanhGia;
use App\DanhGiaComment;
use App\Film;
use App\Comment;
class AjaxController extends Controller
{
    //
    public function GetLike($idUser,$idFilm){
      $data=DanhGia::where('idUser',$idUser)->where('idFilm',$idFilm)->get();
      if(count($data)>0) {
        $datashift=DanhGia::where('idUser',$idUser)->where('idFilm',$idFilm)->get()->shift();
        $liked=$datashift->Liked;
        if($liked==-1) $liked=0;
        else $liked=1;
        
        DanhGia::where('idUser',$idUser)->where('idFilm',$idFilm)->delete();
      }
      else $liked=0;
   $danhgia=new DanhGia;
   $danhgia->idUser=$idUser;
   $danhgia->idFilm=$idFilm;
   $danhgia->Liked=1;
   $danhgia->save();
   $film=Film::find($idFilm);
   $film->liked=$film->liked+1;
   
   $film->unliked=$film->unliked-$liked;
   $film->save();

    }
      public function GetDislike($idUser,$idFilm){

        $data=DanhGia::where('idUser',$idUser)->where('idFilm',$idFilm)->get();
      if(count($data)>0) {
        $datashift=DanhGia::where('idUser',$idUser)->where('idFilm',$idFilm)->get()->shift();
        $liked=$datashift->Liked;
        if($liked==-1)  $liked=0;
        DanhGia::where('idUser',$idUser)->where('idFilm',$idFilm)->delete();}
        else $liked=1;
   $danhgia=new DanhGia;
   $danhgia->idUser=$idUser;
   $danhgia->idFilm=$idFilm;
   $danhgia->Liked=0;
   $danhgia->save();
    $film=Film::find($idFilm);
   $film->unliked=$film->unliked+1;
   $film->liked=$film->liked-$liked;
   $film->save();
    }
      public function DestroyLike($idUser,$idFilm){
        $like=0;
        $unlike=0;
        $data=DanhGia::where('idUser',$idUser)->where('idFilm',$idFilm)->get();
      if(count($data)>0) {
        $datashift=DanhGia::where('idUser',$idUser)->where('idFilm',$idFilm)->get()->shift();
        $liked=$datashift->Liked;
        if($liked==0) $unlike=1;
        if($liked==1) $like=1;
        DanhGia::where('idUser',$idUser)->where('idFilm',$idFilm)->delete();}

   $danhgia=new DanhGia;
   $danhgia->idUser=$idUser;
   $danhgia->idFilm=$idFilm;
   $danhgia->Liked=-1;
   $danhgia->save();
   $film=Film::find($idFilm);
   if($like==1) echo $film->liked-1;
   else echo $film->unliked-1;
   $film->unliked=$film->unliked-$unlike;
   $film->liked=$film->liked-$like;
   $film->save();
    }
   
    public function LikeComment($idUser,$idComment){
      $comment=Comment::find($idComment);
     $data=DanhGiaComment::where('idUser',$idUser)->where('idComment',$idComment)->get();
     if(count($data)>0){
      $data=$data->shift();
      $liked=$data->liked;
      if($liked==1) {
        $data->liked=-1;
        $data->save();
        $liked=-1;
        $comment->liked=$comment->liked-1;
        $comment->save();
        return view('Watch/DanhGiaComment',['LikeUnlikeComment'=>$liked,'idComment'=>$idComment,'idUser'=>$idUser]);
      }
      else {
        if($data->liked==0){
          $comment->unliked=$comment->unliked-1;
          $comment->save();
        }
        $data->liked=1;
        $data->save();
        $liked=1;
        $comment->liked=$comment->liked+1;
        $comment->save();
        return view('Watch/DanhGiaComment',['LikeUnlikeComment'=>$liked,'idComment'=>$idComment,'idUser'=>$idUser]);
      }
     }
     else {
      $data=new DanhGiaComment;
      $data->liked=1;
      $data->idUser=$idUser;
      $data->idComment=$idComment;
      $data->save();
      $comment->liked=$comment->liked+1;
      $comment->save();
      $liked=1;
        return view('Watch/DanhGiaComment',['LikeUnlikeComment'=>$liked,'idComment'=>$idComment,'idUser'=>$idUser]);
     }
  
    }
     public function DislikeComment($idUser,$idComment){
      $comment=Comment::find($idComment);
       $data=DanhGiaComment::where('idUser',$idUser)->where('idComment',$idComment)->get();
     if(count($data)>0){
      $data=$data->shift();
      $liked=$data->liked;
      if($liked==0) {
        $comment->unliked=$comment->unliked-1;
        $comment->save();
        $data->liked=-1;
        $data->save();
        $liked=-1;
        return view('Watch/DanhGiaComment',['LikeUnlikeComment'=>$liked,'idComment'=>$idComment,'idUser'=>$idUser]);
      }
      else {
        if($data->liked==1){
          $comment->liked=$comment->liked-1;
          $comment->save();
        }
        $comment->unliked=$comment->unliked+1;
        $comment->save();
        $data->liked=0;
        $data->save();
        $liked=0;
        return view('Watch/DanhGiaComment',['LikeUnlikeComment'=>$liked,'idComment'=>$idComment,'idUser'=>$idUser]);
      }
     }
   else {
    $comment->unliked=$comment->unliked+1;
        $comment->save();
      $data=new DanhGiaComment;
      $data->liked=0;
      $data->idUser=$idUser;
      $data->idComment=$idComment;
      $data->save();
      $liked=0;
        return view('Watch/DanhGiaComment',['LikeUnlikeComment'=>$liked,'idComment'=>$idComment,'idUser'=>$idUser]);
     }
    }
}
