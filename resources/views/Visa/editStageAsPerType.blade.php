<option value="">Please Any ..</option>
@foreach($visaStageList as $_visastage)
<option value="{{$_visastage->id}}" @if($selectedValue == $_visastage->id) selected="selected" @endif>{{$_visastage->stage_name}}</option>
@endforeach