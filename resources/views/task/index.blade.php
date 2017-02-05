<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Basic Task List</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
	<div class="container"> 
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8"> 
				<div class="panel panel-default"> 
					<div class="panel-heading"> 
						Basic Task List
					</div>
					<div class="panel-body"> 
						@if(Session::has('info'))
						<div class="alert alert-info"> 
							{{ Session::get('info') }}
						</div>
						@endif
						<form action="{{url('task')}}" method="post"> 
							<div class="form-group"> 
								<label for="name" class="control-label"></label>
								<input type="text" name="name" class="form-control"/>
								<span class="help-block text-danger"> 
									{{ $errors->first('name') }}
								</span>
							</div>
							<div class="form-group"> 
								<input type="submit" class="btn btn-danger" value="Add Task"/>
							</div>
							{{ csrf_field() }}
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
	
	@if($tasks->count())
	<div class="container"> 
		<div class="row">  
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"> 
						Task List
					</div>
					
					<div class="panel-body"> 
						<table class="table table-striped"> 
							<thead> 
								<tr> 
									
									<th>Task Name</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody> 
							
								@foreach($tasks as $task)
								
								<tr> 
									<td>{{ $task->name }}</td>
									<td>
										<form action="{{ url('task/'.$task->id) }}" method="post"> 
											<input type="submit" class="btn btn-danger" value="Delete"/>
											{{ method_field('DELETE') }}
											{{ csrf_field() }}
										</form>
									</td>
								</tr>
						
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
	@endif
</body>
</html>