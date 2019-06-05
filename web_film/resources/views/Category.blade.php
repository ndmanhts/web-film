@foreach($films as $film)
<div class="movie">
	<?php 


	 ?>
					<figure class="movie-poster"><a class="RightFilm" href="{{$film->source}}"><img src="upload/hinhanh/{{$film->hinhanh}}" alt="#"></a></figure>
						<div class="movie-title"><a href="infor/1">{{$film->name}}</a></div>
					<p>{{$film->content}}</p>
				</div>
				@endforeach
				<div id="Display"></div>
				<!-- <div style="text-align: center;"><button style="background-color: none;border:none;" id="XemThem">Xem Thêm</button> </div> -->

<!-- 	<script type="text/javascript">
		$Trang=0;
		$(document).ready(function(){
			$("#XemThem").click(function(){
				$Trang++;
				
				 $name=<?php echo $nameCategory; ?>;
				alert($name);
				
			})
		})
	</script> -->