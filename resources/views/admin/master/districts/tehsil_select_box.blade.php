<option selected disabled>Select Tehsil</option>
@foreach ($Tehsils as $tehsil)
<option value="{{ $tehsil->id }}">{{ $tehsil->code }}--{{ $tehsil->name_e }}</option>  
@endforeach