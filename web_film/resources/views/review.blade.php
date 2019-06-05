
@extends('mainframe')
@section('title')
<title>Movie Review | Review</title>
@endsection
@section('webMain')
<?php
use App\Category;
$category=Category::all();
use App\Film;
$NSX=Film::all()->unique('NSX');
$Author=Film::all()->unique('author');
?>
<main class="main-content">
	<div class="container">
		<div class="page">
			<div class="breadcrumbs">
				<span>Movie Review</span>
			</div>
			<div class="filters">
				<select name="#" id="Category" placeholder="Choose Category">
					<option>Thể Loại</option>
					@foreach($category as $category)
					<option value="{{$category->name}}">{{$category->name}}</option>
					@endforeach
					
				</select>
				<select name="#" id="NSX">
					<option>Nhà sản Xuất</option>
					@foreach($NSX as $NSX)
					<option value="{{$NSX->NSX}}">{{$NSX->NSX}}</option>
					@endforeach
				</select>
				<select name="#" id="Author">
					<option value="">Tác giả</option>
					@foreach($Author as $Author)
					<option value="{{$Author->author}}">{{$Author->author}}</option>
					@endforeach
				</select>
			</div>
			<div class="movie-list" id="ListFilm">
				<div class="movie">
					<figure class="movie-poster"><img src="dummy/thumb-3.jpg" alt="#"></figure>
					<div class="movie-title"><a href="infor/1">Maleficient</a></div>
					<p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>
				</div>
				<div class="movie">
					<figure class="movie-poster"><img src="dummy/thumb-4.jpg" alt="#"></figure>
					<div class="movie-title"><a href="infor/2">The adventure of Tintin</a></div>
					<p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>
				</div>
				<div class="movie">
					<figure class="movie-poster"><img src="dummy/thumb-5.jpg" alt="#"></figure>
					<div class="movie-title"><a href="infor/2">Hobbit</a></div>
					<p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>
				</div>
				<div class="movie">
					<figure class="movie-poster"><img src="dummy/thumb-6.jpg" alt="#"></figure>
					<div class="movie-title"><a href="infor/4">Exists</a></div>
					<p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>
				</div>
				<div class="movie">
					<figure class="movie-poster"><img src="dummy/thumb-1.jpg" alt="#"></figure>
					<div class="movie-title"><a href="infor/5">Drive hard</a></div>
					<p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>
				</div>
				<div class="movie">
					<figure class="movie-poster"><img src="dummy/thumb-2.jpg" alt="#"></figure>
					<div class="movie-title"><a href="infor/6">Robocop</a></div>
					<p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>
				</div>
				<div class="movie">
					<figure class="movie-poster"><img src="dummy/thumb-7.jpg" alt="#"></figure>
					<div class="movie-title"><a href="infor/7">Life of Pi</a></div>
					<p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>
				</div>
				<div class="movie">
					<figure class="movie-poster"><img src="dummy/thumb-8.jpg" alt="#"></figure>
					<div class="movie-title"><a href="infor/8">The Colony</a></div>
					<p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>
				</div>
			</div> 

			
		</div>
	</div>
</main>
<script type="text/javascript">
	$(document).ready(function(){
		$("#Author").change(function(){
			$author=$(this).val();
			//alert(1);
			$.get("Author/"+$author,function(data){
				$(".movie-list").html(data);
			})
		})
	})
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#Category").change(function(){
			$category=$(this).val();
			// alert(1);
			$.get("Category/"+$category,function(data){
				$(".movie-list").html(data);
			})
		})
	})
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#NSX").change(function(){
			$NSX=$(this).val();
			// alert(1);
			$.get("NSX/"+$NSX,function(data){
				$(".movie-list").html(data);
				// alert(2);
			})
		})
	})
</script>
@endsection
