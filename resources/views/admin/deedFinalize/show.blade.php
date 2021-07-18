<table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>Name</th>
			<th>Father Name</th>
			<th>Aadhaar No.</th>
			<th>Mobile No.</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($RegPartyDetails as $RegPartyDetail)
		<tr>
			<td>{{$RegPartyDetail->name_e}}</td>
			<td>{{$RegPartyDetail->fname_e}}</td>
			<td>{{$RegPartyDetail->aadhar}}</td>
			<td>{{$RegPartyDetail->mobile}}</td>
			
		</tr> 
		@endforeach
	</tbody>
</table>