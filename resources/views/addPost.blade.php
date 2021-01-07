<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Post</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>

	<section style="padding-top: 60px">
		<div class="container">
			<div class="row">
				<div class="col-md-6 offset-md-3">
					<div class="card">
						<div class="card-header">
							Add new Post
						</div>
						<div class="card-body">
							@if(Session::has('post_added'))
								<div class="alert alert-info" role="alert">
								  {{Session::get('post_added')}}
								</div>
							@endif
							<form method="POST" action="{{ route('post_store') }}" enctype="multipart/form-data">
								@csrf
								<div class="form-group">
									<label for="caption">Caption</label>
									<input type="text" name="text" class="form-control"/>
								</div>
								<div class="form-group">
									<label for="file">Choose Picture</label>
									<input type="file" name="file" class="form-control" onchange="previewFile(this)"/>
									<img id="previewImg" alt="Post" style="max-width: 130px;margin-top: 20px;"/>
								</div>
								<button type="submit" class="btn btn-primary">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	<script>
		function previewFile(input) {
			var file=$("input[type=file]").get(0).files[0];
			if(file){
				var reader = new FileReader();
				reader.onload = function(){
					$(#previewImg).attr("src",reader.result);
				}
				reader.readAsDataURL(file);
			}
		}
	</script>
</body>
</html>