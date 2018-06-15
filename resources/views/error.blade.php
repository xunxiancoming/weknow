<style>
	ul{
		list-style: none;
	}
	li{
		background: red;
		color: white;
		padding: 2px;
	}
</style>
@if(count($errors)>0)
	<ul class="alert alert-danger">
		@foreach($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
	</ul>
@endif