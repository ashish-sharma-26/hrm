@if($eId == 'A')
	
<div class="day absent">{{$edays}} <p>Absent</p></div>
@elseif($eId == 'P')
	 <div class="day present">{{$edays}}<p>Present</p></div>
@elseif($eId == 'L')
	 <div class="day leave">{{$edays}}<p>Leave</p></div>
@elseif($eId == 'H')
	 <div class="day holiday">{{$edays}}<p>Holiday</p></div>
@else 
	<div class="day blank">{{$edays}}</div>

@endif
   
