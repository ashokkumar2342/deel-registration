<div class="row"> 
	<div class="col-lg-6">
		<table style="padding:-2px">
			<tbody>
				<tr>
					@foreach ($RegPhotoDetails as $RegPhotoDetail)
					<td> 
						<table style="border:1px solid black; font-size:11px;padding:-2px;width: 220;height: 120px">
						<tbody>
							<tr>
								<td style="font-size: 12px"><b>
									@if ($RegPhotoDetail->party_type == 1)
										First Party
									@elseif($RegPhotoDetail->party_type == 2)
										Second Party
									@elseif($RegPhotoDetail->party_type == 3)
										Witness
									@endif
								</b></td>
							</tr>
							<tr>
								<td><img src="{{ route('admin.property.photo.capture.display',Crypt::encrypt($RegPhotoDetail->photo_path)) }}" width="240px" height="165px"  alt="" title="" /></td>
							</tr> 
						</tbody>
						</table> 
					</td>
					@endforeach
				</tr> 
			</tbody> 
		</table> 
	</div>
	<div class="col-lg-6" style="padding-left: 200px">
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
	</div>
</div>


