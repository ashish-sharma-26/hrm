<option value="">Please Any ..</option>
@foreach($visaStageList as $_visastage)
<option value="{{$_visastage->id}}">{{$_visastage->stage_name}}</option>
@endforeach