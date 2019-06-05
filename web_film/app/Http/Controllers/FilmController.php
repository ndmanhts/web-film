<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use App\Category;
use App\FilmAndCategory;
use DB;
class FilmController extends Controller
{
    //
    public function DanhSach(){
        $film=Film::all();
        return view('Admin/Film/DanhSach',['film'=>$film]);
    }
    public function GetThem(){
        return view('Admin/Film/Them');
    }
    public function PostThem(Request $request){
   $film=new Film;
        if($request->hasFile('Video')){
            $file=$request->file('Video');
            $name=$file->getClientOriginalName();
            $file->move('upload/film/',$name);
           $film->source="upload/film/".$name;
        }
         if($request->hasFile('HinhAnh')){
            $file=$request->file('HinhAnh');
            $name=$file->getClientOriginalName();
            $file->move('upload/hinhanh/',$name);
           $film->hinhanh=$name;
        }
        
         $film->content=$request->Content;
          $film->NSX=$request->NSX;
           $film->author=$request->Author;
        $film->nation=$request->Nation;
        $film->NoiBat=$request->NoiBat;
        $film->name=$request->Name;
        $film->year=$request->Year;
        $film->save();
        return redirect('Admin/Film/Them');
    }
    public function GetSua($id){
      $film=Film::find($id);
        return view('Admin/Film/Sua',['film'=>$film]);
    }
    public function PostSua($id,Request $request){
          $film=Film::find($id);
         if($request->hasFile('Video')){
            $file=$request->file('Video');
            $name=$file->getClientOriginalName();
            $file->move('upload/film/',$name);
           $film->source="upload/film/".$name;
        }
         if($request->hasFile('HinhAnh')){
            $file=$request->file('HinhAnh');
            $name=$file->getClientOriginalName();
            $file->move('upload/hinhanh/',$name);
           $film->hinhanh=$name;
        }
      
         $film->content=$request->Content;
          $film->NSX=$request->NSX;
           $film->author=$request->Author;
        $film->nation=$request->Nation;
        $film->NoiBat=$request->NoiBat;
        $film->name=$request->Name;
        $film->year=$request->Year;
        $film->save();
        return redirect('Admin/Film/DanhSach');
    }
    public function Xoa($id){
        $film=Film::find($id);
        $film->delete();
        return redirect('Admin/Film/DanhSach');
    }
    public function SearchFilm($TextSearch){
         return view("Watch/DisplayComment",["TextSearch"=>$TextSearch]);
    }
   public function RightFilm($id){
  return view("Watch/AjaxSearchFilm",["idFilm"=>$id]);
   }
   public function XemThemFilm($TrangFilm,$TextSearch){
       $count=Film::where('name','like','%'.$TextSearch."%")->get();
        $RightFilm=Film::where('name','like','%'.$TextSearch."%")->get();
        $RightFilm1=$RightFilm->splice($TrangFilm*4,4);
        if(count($count)>$TrangFilm*4)
        return view('Watch/XemThemFilm',['RightFilm'=>$RightFilm1]);
   }
   public function XemThemFilmAjax($TrangFilm,$idFilm){
    $film=Film::find($idFilm);

       $count=Film::where('NSX',$film->NSX)->orWhere('author',$film->author)->get();
        $RightFilm=Film::where('NSX',$film->NSX)->orWhere('author',$film->author)->get();
        $RightFilm1=$RightFilm->splice($TrangFilm*4,4);
        if(count($count)>$TrangFilm*4)
        return view('Watch/XemThemFilm',['RightFilm'=>$RightFilm1]);
   }
  public function XemThemFilmHome($TrangFilm){
    $count=Film::where('NoiBat',0)->get();
    $RightFilm=Film::where('NoiBat',0)->get();
    $RightFilm1=$RightFilm->splice($TrangFilm*4,4);
    if(count($count)>$TrangFilm*4)
        return view('Watch/XemThemFilm',['RightFilm'=>$RightFilm1]);
  }
  public function author($author){
    $arrayAuthor=Film::where('author',$author)->get()->take(8);
    return view('Author',['author'=>$arrayAuthor,'nameAuthor'=>$author]);
  }
  public function XemThemMovie($Trang,$nameAuthor){
    $count=Film::where('author',$nameAuthor)->get();
    
    if(count($count)>$Trang*8){
           $film=$count->splice($Trang*8,8);
           return view("Author",['author'=>$author]);
    }
  }
  //Vương minh anh
  // viet tim theo ten NSX
   public function NSX($NSX){
    $arrayNSX=Film::where('NSX',$NSX)->get()->take(8);
    return view('NSX',['NSX'=>$arrayNSX,'nameNSX'=>$NSX]);
  }
  public function XemThemMovie2($Trang,$nameNSX){
    $count=Film::where('NSX',$nameNSX)->get();
    
    if(count($count)>$Trang*8){
           $film=$count->splice($Trang*8,8);
           return view("NSX",['NSX'=>$NSX]);
    }

  }

// tim theo category

public function category($category){

      $films= Category::join('filmandcategory', 'filmandcategory.idCategory', 'Category.id')->join('film', 'filmandcategory.idFilm', 'Film.id')  
          ->select('film.*')
        ->where('category.name','=',$category)
         
            ->get()->take(8);
  

 return view('Category',['films'=>$films,'nameCategory'=>$category]);
}
//
public function ViewFilm($idFilm){
  $film=Film::find($idFilm);
  echo $film->views+1;
  $film->views=$film->views+1;
  $film->save();
}
public function SearchFilmUrl($TextSearch){
  return view("Watch/SearchFilm",['TextSearch'=>$TextSearch]);
}
}