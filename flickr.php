<!DOCTYPE html>
<html>
	<head>
		<title>Flickr Search</title>
		<link href = "site/css/bootstrap.css" rel = "stylesheet">
		<link href = "site/css/bootstrap-responsive.css" rel = "stylesheet">
		<link href = "site/css/style.css" rel = "stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="site/js/bootstrap.js"></script>
		
		<script>
			function buildURL(photo)
			{
				var size='m';
				url = "http://farm"+photo['farm']+".static.flickr.com/"+photo['server']+"/"+photo['id']+"_"+photo['secret']+"_"+size+".jpg";
				return url
			}
			function jq(obj)
			{
				
					var container = document.getElementById("photos");
					//json="http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20flickr.photos.search%2810%29%20where%20tags%3D%22dog%22%20and%20sort%3D%22interestingness-desc%22%20and%20api_key%3D%22fa506cef10772542a871ec26351defbd%22&format=json&diagnostics=true&callback="
					for (var i=0;i<10;i++)
					{
						var img = new Image();
     					img.src = buildURL(obj.query.results.photo[i]);
						container.appendChild(img);
					}
			}
		</script>
		</title>
	</head>
	<body>
		<div class="form-group centered" style="margin-top:70px" action="" method="POST">
				<input name="query" type="text" class="form-control" placeholder="query">
				<button>Search</button>
		</div>
		<div class="centered" style="margin-top:30px" id="search">
			<button onclick="jq()">Try it</button>
		</div>
		<div id="photos">
		</div>
	<div id="carousel-example-generic" class="carousel slide">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
		<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		<li data-target="#carousel-example-generic" data-slide-to="1"></li>
		<li data-target="#carousel-example-generic" data-slide-to="2"></li>
	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner">
		<div class="item active">
		  <div class='inner-item'>
		  <img src="a.jpg" alt="">
		  </div>
		  <div class="carousel-caption">
		    slide 1
		  </div>
		</div>
	   <div class="item">
		<div class='inner-item'>
		  <img src="b.jpg"alt="">
		</div>
		  <div class="carousel-caption">
		    slide 2
		  </div>
		</div>
	   <div class="item">
		<div class='inner-item'>
		  <img src="c.jpg" alt="">
		 </div>
		  <div class="carousel-caption">
		    slide 3
		  </div>
		</div>
	  </div>

	  <!-- Controls -->
	  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		<span class="icon-prev"></span>
	  </a>
	  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		<span class="icon-next"></span>
	  </a>
	</div>

<!--		<script src="http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20flickr.photos.search%2810%29%20where%20tags%3D%22dog%22%20and%20sort%3D%22interestingness-desc%22%20and%20api_key%3D%22fa506cef10772542a871ec26351defbd%22&format=json&diagnostics=true&callback=jq"></script>
	--></body>
</html>
