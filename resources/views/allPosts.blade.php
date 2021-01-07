<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>All Posts</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>

	<section style="padding-top: 60px">
		<div class="container">
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<h4 >&nbsp;All Posts</h4>
					<div class="card">

						<div class="card-header">
						    <a href="/addPost" class="btn btn-dark">Add new Post</a>
							<a href="/dashboard" class="btn btn-dark">Back to Dashboard</a>
						</div>
						<div class="card-body">
							@if(Session::has('post_deleted'))
								<div class="alert alert-info" role="alert">
								  {{Session::get('post_deleted')}}
								</div>
							@endif
							<table class="table table-hover">
								<thead>
									<tr>
										
										<th>Post</th>
										<th>Caption</th>
										<th>Action</th>
										<th>Comments</th>
									</tr>
								</thead>
								<tbody>
									@foreach($posts as $post)
										<tr>
											
											<td><img src="{{asset('images')}}/{{$post->postImage}}" style="max-width: 100px; max-height: 200px" /></td>
											<td>{{$post->caption}}</td>
											
											<td>
												<a href="/editPost/{{$post->post_id}}" class="btn btn-warning">Edit</a>
												<a href="/deletePost/{{$post->post_id}}" class="btn btn-danger">Delete</a>
											</td>
											<td><input type="text" name="comment" class="form-control"></td>

										</tr>

									@endforeach	
								</tbody>
							</table>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
	
</body>
</html>