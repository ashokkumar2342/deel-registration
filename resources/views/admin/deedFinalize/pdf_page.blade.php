

<!DOCTYPE html>
<html>
<head>
	<title>Deed Print</title>
</head>
<style type="text/css">

</style> 
<body>
	<table>
		<tbody>
			<tr>
				<td>
					<table style="padding-left: 90px">
						<tr>
							@foreach ($RegPhotoDetails as $RegPhotoDetail)
								@php	
								$image  =\Storage_path('app/'.$RegPhotoDetail->photo_path);
								@endphp
								
								<td><img src="{{ $image }}" alt="" width="150px" height="120px" style="border: 2px solid black;"> &nbsp;&nbsp;</td>		
							@endforeach
						</tr>
						<tr>
							@foreach ($RegPhotoDetails as $RegPhotoDetail)
							<td style="font-size: 12px;text-align: center;">
								<b>
									@if ($RegPhotoDetail->party_type == 1)
										First Party
									@elseif($RegPhotoDetail->party_type == 2)
										Second Party
									@elseif($RegPhotoDetail->party_type == 3)
										Witness
									@endif
								</b>
							</td>		
							@endforeach
						</tr>
					</table>	
				</td>
			</tr> 
			<tr>
				<td style="text-align: center; padding-top: 20px">
					<h2><b>CERTIFICATE /DEED OF TITLE / OWNERSHIP</b></h2>	
				</td>
			</tr>
			<tr>
				<td style="text-align: justify;padding-top: 20px;font-size: 16px">
					This certificate /Deed of Title/Ownership is executed at <b>{{$tehsil[0]->name_e}}</b>  on <b>{{date('d')}} day of {{date('M - Y')}}</b>.	
				</td>
			</tr>
			<tr>
				<td style="text-align: justify;font-size: 16px">
					@foreach ($fisrtparty as $partyfirst)
						<b>{{$partyfirst->name_e}} {{$partyfirst->designation_e}}</b>,&nbsp; 
					@endforeach
					Village <b>{{$village[0]->name_e}}</b> Tehsil <b>{{$tehsil[0]->name_e}}</b>, District <b>{{$district[0]->name_e}}</b> (hereinafter called the “First party”) acting vide Resolution no <b>{{$resolution[0]->resolution_no}}</b> Dated <b>{{$resolution[0]->reg_date}}</b>(copy of same attached herewith)	
				</td>
			</tr>
			<tr>
				<td style="text-align: center;">
					and	
				</td>
			</tr>
			<tr>
				<td style="text-align: justify;font-size: 16px">
					@foreach ($secondparty as $partysecond)
						<b>{{$partysecond->name_e}} {{$partysecond->code}} {{$partysecond->fname_e}}</b>,&nbsp; 
					@endforeach
					Village <b>{{$village[0]->name_e}}</b> Tehsil <b>{{$tehsil[0]->name_e}}</b>, District <b>{{$district[0]->name_e}}</b> Who is described as the Occupants/ Possessor and Owner of the Land/immovable property by the Gram Panchayat situated in Lal Dora of Village <b>{{$village[0]->name_e}}</b> Tehsil <b>{{$tehsil[0]->name_e}}</b>, District <b>{{$district[0]->name_e}}</b> to residents/ residence of Village <b>{{$village[0]->name_e}}</b>.
				</td>
			</tr>
			<tr>
				<td style="text-align: justify;font-size: 16px">
					That the First Party is duly authorized vide resolution Resolution no <b>{{$resolution[0]->resolution_no}}</b> Dated <b>{{$resolution[0]->reg_date}}</b> to execute this deed of Title / Ownership and Certified that Land/Plot belongs to the second party as detailed here as under:
				</td>
			</tr>
			<tr>
				<td style="text-align: justify;font-size: 16px">
					Whereas the land hereinafter described below is owned and already possessed by the Second Party in full proprietary rights.
				</td>
			</tr>
			<tr>
				<td style="text-align: justify;font-size: 16px">
					Plot/ house as plot/house Property ID No. <b>{{substr($c_property_id,strlen($c_property_id)-5,4)}}</b> LGD ID <b>{{substr($c_property_id,0,5)}}{{substr($c_property_id,strlen($c_property_id)-5,4)}}</b>  and U.I.D. <b>{{$c_property_id}}</b> having of Built up Area of <b>{{$propertyDetail[0]->built_area}}</b> Sq.mtrs., Open Area <b>{{$propertyDetail[0]->open_area}}</b> Sq.mtrs.  Total area <b>{{$propertyDetail[0]->total_area}}</b> Sq.mtrs. as shown in the Map passed by Survey of India bounded as per enclosed map.
				</td>
			</tr>
			<tr>
				<td style="text-align: justify;font-size: 16px">
					And whereas the First Party is agreed to certify that the said immovable property belongs to the second party in pursuance of his application dated <b>{{date('d.m.Y')}}</b> to be used as a site for residential/commercial purposes in the Lal Dora Area of Village <b>{{$village[0]->name_e}}</b> Tehsil <b>{{$tehsil[0]->name_e}}</b>,  District <b>{{$district[0]->name_e}}</b>.
				</td>
			</tr>
			<tr>
				<td style="text-align: justify;font-size: 16px">
					Now therefore this certificate / Deed of Title/ ownership witnessed as under:-
				</td>
			</tr>
			<tr>
				<td style="text-align: justify;font-size: 16px">
					That for the purpose of Panchayat Property or residential or commercial activities First Party hereby certify that the Plot/ House/ Shop having LGD ID <b>{{substr($c_property_id,0,5)}}{{substr($c_property_id,strlen($c_property_id)-5,4)}}</b> and U.I.D <b>{{$c_property_id}}</b>  having area <b>{{$propertyDetail[0]->total_area}}</b> Sq.mtrs. to the second party described in the plan filled in the office of B.D.P.O.Office, <b>{{$block[0]->name_e}}</b>, Tehsil <b>{{$tehsil[0]->name_e}}</b>, District <b>{{$district[0]->name_e}}</b> and the said property is already in the possession of the second party.
				</td>
			</tr>

			<tr>
				<td style="text-align: justify;">
					<table width = "100%">
						<tr>
							<td width = "5%" style="vertical-align: top;">1.</td>
							<td width = "95%" style="text-align: justify;font-size: 16px">
								That Second party shall have a right to confirmed Ownership/ Sale/ Mortgage/ Transfer/ Loan etc.
							</td>
						</tr>
						<tr>
							<td style="vertical-align: top;">2.</td>
							<td style="text-align: justify;font-size: 16px">
								That Second party shall have a right to use and enjoy the premises for residential/commercial purpose. Second party will take water/sewage/electricity connections from concerned Department with his/her own funds and his/her own responsibility and second party shall also follow all the rule/regulations of concerned Department.
							</td>
						</tr>
						
					</table>
				</td>
			</tr>
			<tr>
				<td style="text-align: justify;">
					<table width = "100%">
						<tr>
							<td style="vertical-align: top;">3.</td>
							<td style="text-align: justify;font-size: 16px">
								That Second party shall pay all general and local taxes rates or cesses for the time being imposed or assessed on the said land by the competent authority.
							</td>
						</tr>
						<tr>
							<td style="vertical-align: top;">4.</td>
							<td style="text-align: justify;font-size: 16px">
								The Second party shall not use the said land/property for any other purpose other than for which it has been executed to him/her nor shall be use the building constructed on it for purpose other than that for it has been constructed. Except is due course of law.
							</td>
						</tr>
						<tr>
							<td style="vertical-align: top;">5.</td>
							<td style="text-align: justify;font-size: 16px">
								That Second party shall accept and obey the rules/regulations and orders made or issued/imposed by competent authority/Govt./Department time to time.
							</td>
						</tr>
						<tr>
							<td style="vertical-align: top;">6.</td>
							<td style="text-align: justify;font-size: 16px">
								All the disputes and the differences arising out or any way touching or concerning this deed whatsoever shall be referred to the Deputy Commissioner <b>{{$district[0]->name_e}}</b> or any other officer appointed by him. There will beno objection to appointment of arbitrator and the arbitrator so appointed shall be Government Servant or an Officer appointed by competent authority and he will be competent to deal  with matter to which this deal relates and in discharge of his duties as Government Servant or Officer as may be the views expressed by him all or any of the matters in dispute or in case of differences the objection to such appointment that the arbitrator so appointed as  Government Servant or an Officer of the Authority that he had to deal with the matter to which this deed relates and that in the course of his duties as such Government Servants or Officer as the case may be he has expressed his views on all or any of  the matters in dispute or in differences  the decision of such arbitrator shall be final and bindingon the parties of this deed. If and so long as the second party shall fully performed and comply with and shall continue to so perform and comply with each and all the terms and conditions herein made and provided.
							</td>
						</tr>
						<tr>
							<td style="vertical-align: top;">7.</td>
							<td style="text-align: justify;font-size: 16px">
								That the expense of stamp duty and registration fee of the deed shall be borne by second party. This deed of certificate of title/ownership is executed on the basis of extracts of the fact-finding report/ survey report/ surveyor/details made available prepared by the Gram Panchayat Under section 26 of the Haryana Panchayat Raj Act 1994 on Non- Judicial stamp worth rupees 10/- in view of provision of article 24 of the schedule 1-a of the Indian Stamp act. 1899.
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<tr>
				<td style="text-align: justify;font-size: 16px">
					In witness whereof, the parties hereto have hereunder respectively subscribed their names at place and on the dates hereinafter in each case specified.
				</td>
			</tr>

			<tr>
				<td style="text-align: justify;font-size: 16px">
					Signed by the Parties at <b>{{$tehsil[0]->name_e}}</b> on the <b>{{date('d')}} day of {{date('M - Y')}}</b>. First Party (acting under Resolution no <b>{{$resolution[0]->resolution_no}}</b> Dated <b>{{$resolution[0]->reg_date}}</b> on behalf of state Govt. of Haryana)
				</td>
			</tr>
			<tr>
				<td style="text-align: justify;font-size: 16px">
					@foreach ($fisrtparty as $partyfirst)
						<br><br>
						<b>{{$partyfirst->name_e}} {{$partyfirst->designation_e}}</b>, Gram Panchayat <b>{{$village[0]->panchayat_e}}</b><br>
						Sign of <b>{{$partyfirst->designation_e}}</b> with his/her seal 
					@endforeach
				</td>
			</tr>
			<tr>
				<td style="text-align: justify;font-size: 16px">
					Second Party<br>&nbsp;
				</td>
			</tr>
			<tr>
				<td style="text-align: justify;font-size: 16px">
					@foreach ($secondparty as $partysecond)
						<b>{{$partysecond->name_e}} Aadhar No.({{$partysecond->aadhar}}) {{$partysecond->code}} {{$partysecond->fname_e}}</b>,&nbsp;Village <b>{{$village[0]->name_e}}</b> Tehsil <b>{{$tehsil[0]->name_e}}</b>, District <b>{{$district[0]->name_e}}</b><br><br>&nbsp; 
					@endforeach
					
				</td>
			</tr>
			
			<tr>
				<td style="text-align: justify;font-size: 16px">
					<b>Witnesses:-</b><br>&nbsp;
				</td>
			</tr>
			<tr>
				<td style="text-align: justify;">
					<table width = "100%">
						<tr>
							@foreach ($witness as $witnessdetail)
							<td width = "50%" style="text-align: justify;font-size: 16px;vertical-align: top;">
								<b>{{$witnessdetail->name_e}} {{$witnessdetail->code}} {{$witnessdetail->fname_e}}, {{$witnessdetail->age}}, {{$witnessdetail->designation_e}}, {{$village[0]->name_e}}</b>
							</td>
							@endforeach
						</tr>
					</table>
				</td>
			</tr>
		</tbody>
	</table>

	<pagebreak>

	<table>
		<tbody>
			<tr>
				<td style="text-align: justify;font-size: 16px">
					आज दिनांक {{date('d-m-Y')}} दिन	{{date('h-i')}} बजे
				</td>
			</tr>
			<tr>
				<td style="text-align: justify;font-size: 16px">
					@foreach ($fisrtparty as $partysecond)
						श्री/श्रीमति {{$partysecond->name_l}} ग्राम पंचायत {{$village[0]->panchayat_l}},&nbsp; 
					@endforeach
					ने प्रलेरव/टाईटल डीड रजिस्ट्ररी कराने के लिए कार्यालय सब रजिस्ट्रार {{$tehsil[0]->name_l}} में प्रस्तुत किया। 
				</td>
			</tr>
			<tr>
				<td style="text-align: justify;font-size: 16px">
					प्रस्तुतकर्ता<br>&nbsp;
				</td>
			</tr>
			<tr>
				<td style="text-align: justify;font-size: 16px">
					@foreach ($fisrtparty as $partysecond)
						श्री/श्रीमति {{$partysecond->name_l}} ग्राम पंचायत {{$village[0]->panchayat_l}}<br> 
					@endforeach
				</td>
			</tr>
			<tr>
				<td style="text-align: right;font-size: 16px">
					संयुक्त/सब रजिस्ट्रार,<br>{{$tehsil[0]->name_l}}
				</td>
			</tr>
			<tr>
				<td style="text-align: justify;font-size: 16px">
					@foreach ($secondparty as $partysecond)
						श्री/श्रीमति {{$partysecond->name_l}} {{$partysecond->relation_l}} {{$partysecond->fname_l}}.&nbsp;,&nbsp;
					@endforeach
					द्वितीय पक्ष हाजिर है। हमारे सामने कोई लेन देन ना हुआ। 
				</td>
			</tr>
			<tr>
				<td style="text-align: justify;font-size: 16px">
					उपरोक्त को विषय पत्र पढ़कर सुनाया गया व समझाया गया जिसे उसने सुनकर व समझकर उचित व सत्य मनन प्रमाणित किया और लेख व पूर्तिपत्र को स्वीकार किया।
				</td>
			</tr>
			<tr>
				<td style="text-align: justify;font-size: 16px">
					पक्षों की पहचान साक्षीगण 
					@foreach ($witness as $partysecond)
						श्री/श्रीमति {{$partysecond->name_l}} {{$partysecond->relation_l}} {{$partysecond->fname_l}} उम्र {{$partysecond->age}} ग्राम {{$village[0]->name_l}},&nbsp;
					@endforeach
					तहसील {{$tehsil[0]->name_l}} जिला {{$district[0]->name_l}} करते है।
				</td>
			</tr>
			<tr>
				<td style="text-align: justify;font-size: 16px">
					पहले साक्षी को हम जानते है और पहला साक्षी दूसरे साक्षी को पहचानता है। अतः शिनाखत से संतुष्ट है।
				</td>
			</tr>
			<tr>
				<td style="text-align: right;font-size: 16px">
					संयुक्त/सब रजिस्ट्रार,<br>{{$tehsil[0]->name_l}}
				</td>
			</tr>
			<tr>
				<td style="text-align: justify;font-size: 16px">
					@foreach ($fisrtparty as $partysecond)
						श्री/श्रीमति {{$partysecond->name_l}} ग्राम पंचायत {{$village[0]->panchayat_l}} 
					@endforeach 
					प्रथमपक्ष
				</td>
			</tr>

			<tr>
				<td style="text-align: justify;font-size: 16px">
					हस्ताक्षर द्वितीय पक्ष
					@foreach ($secondparty as $partysecond)
						श्री/श्रीमति {{$partysecond->name_l}} {{$partysecond->relation_l}} {{$partysecond->fname_l}},&nbsp; 
					@endforeach 
					प्रथमपक्ष
				</td>
			</tr>
			
			<tr>
				<td style="text-align: justify;font-size: 16px">
					साक्षी:-<br>&nbsp;
				</td>
			</tr>
			<tr>
				<td style="text-align: justify;">
					<table width = "100%">
						<tr>
							@foreach ($witness as $witnessdetail)
							<td width = "50%" style="text-align: justify;font-size: 16px;vertical-align: top;">
								<b>{{$witnessdetail->name_l}} {{$witnessdetail->relation_l}} {{$witnessdetail->fname_l}}, {{$witnessdetail->age}}, {{$witnessdetail->designation_l}}, {{$village[0]->name_e}}</b>
							</td>
							@endforeach
						</tr>
					</table>
				</td>
			</tr>

			<tr>
				<td style="text-align: justify;font-size: 16px">
					प्रमाणित किया जाता है कि पक्षों व साक्षीगण के हस्ताक्षर व निशान अगूंठा हमारे सामने इबारत जोहरी पर लिए गये।<br>दिनांक:-
				</td>
			</tr>
			<tr>
				<td style="text-align: right;font-size: 16px">
					संयुक्त/सब रजिस्ट्रार,<br>{{$tehsil[0]->name_l}}
				</td>
			</tr>
			
			<tr>
				<td style="text-align: justify;font-size: 16px">
					वसीका हजा ............ बही नं0 ............ जिल्द नं0 ............ के सफा नं0 ........... तिथि .............	को दर्ज किया गया और नकल जायद बही नं	......... जिल्द नं0 ..........के सफा नं0 .............पर चस्पा की गई। 
				</td>
			</tr>
			

			<tr>
				<td style="text-align: right;font-size: 16px">
					संयुक्त/सब रजिस्ट्रार,<br>{{$tehsil[0]->name_l}}
				</td>
			</tr>
		</tbody> 
	</table>
</body>
</html>