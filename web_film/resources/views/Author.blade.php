@foreach($author as $auth)
<div class="movie">
					<figure class="movie-poster"><img src="upload/hinhanh/{{$auth->hinhanh}}" alt="#"></figure>
					<div class="movie-title"><a href="infor/1">Maleficient</a></div>
					<p>Sed ut perspiciatis unde omnis iste natus error voluptatem doloremque.</p>
				</div>
				@endforeach
				<div id="Display"></div>
				<div style="text-align: center;"><button style="background-color: none;border:none;" id="XemThem">Xem Thêm</button> </div>
<?php echo $nameAuthor; ?>
	<script type="text/javascript">
		$Trang=0;
		$(document).ready(function(){
			$("#XemThem").click(function(){
				$Trang++;
				
				 $name=<?php echo $nameAuthor; ?>;
				alert($name);
				
			})
		})
	</script>