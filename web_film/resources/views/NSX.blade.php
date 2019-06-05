@foreach($NSX as $NSX)
<div class="movie">
					<figure class="movie-poster"><a class="RightFilm" href="{{$NSX->source}}"><img src="upload/hinhanh/{{$NSX->hinhanh}}" alt="#"></a></figure>
					<div class="movie-title"><a href="infor/1">{{$NSX->name}}</a></div>
					<p>{{$NSX->content}}</p>
				</div>
				@endforeach
				<div id="Display"></div>
			<!-- 	<div style="text-align: center;"><button style="background-color: none;border:none;" id="XemThem">Xem Thêm</button> </div> -->
<!-- <?php echo $nameNSX; ?> -->
	<script type="text/javascript">
		$Trang=0;
		$(document).ready(function(){
			$("#XemThem").click(function(){
				$Trang++;
				
				 $name=<?php echo $nameNSX; ?>;
				alert($name);
				
			})
		})
	</script>