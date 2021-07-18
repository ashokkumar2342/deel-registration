<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>Property UID</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($deed_list as $deedlist)
			<tr>
				<td>{{$deedlist->property_id}}</td>
				<td>
					<a href="{{ route('admin.deed.registration.deed.download.pdf', $deedlist->id) }}" class="btn btn-success" target="blank">Download</a>
				</td>
			
			</tr> 
		@endforeach
	</tbody>
</table>