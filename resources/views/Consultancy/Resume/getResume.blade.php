@extends($layoutName)
@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    $j1 = $.noConflict();
</script>
<style>
.resume {


  overflow: hidden;
  display: flex;
  flex-direction: column;
  position: relative;
  opacity: 0;
  transition: opacity 0.1s ease-in-out;
}

.loaded.resume {
  opacity: 1;
}

.resume--status {
  position: absolute;
  top: 50%;
  margin-top: -30px;
  z-index: 2;
  width: 100%;
  text-align: center;
  pointer-events: none;
}

.resume--status i {
  font-size: 100px;
  opacity: 0;
  transform: scale(0.3);
  transition: all 0.2s ease-in-out;
  position: absolute;
  width: 100px;
  margin-left: -50px;
}

.resume_love .fa-heart {
  opacity: 0.7;
  transform: scale(1);
}

.resume_nope .fa-remove {
  opacity: 0.7;
  transform: scale(1);
}

.resume--cards {
flex-grow: 1;
    padding-top: 40px;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: flex-end;
    z-index: 1;
    height: 444px;
}

.resume--card {display: inline-block;
    width: 90vw;
    max-width: 90%;
    height: auto;
    background: #FFFFFF;
    border-radius: 8px;
        overflow-y: scroll;
    position: absolute;
    will-change: transform;
    transition: all 0.3s ease-in-out;
    cursor: -webkit-grab;
    cursor: -moz-grab;
    cursor: grab;
    text-align: left;
    height: 446px;
}

.moving.resume--card {
  transition: none;
  cursor: -webkit-grabbing;
  cursor: -moz-grabbing;
  cursor: grabbing;
}

.resume--card img {
  max-width: 100%;
  pointer-events: none;
}

.resume--card h3 {
  margin-top: 10px;
  font-size: 32px;
  padding: 0 16px;
  pointer-events: none;
}

.resume--card p {
  margin-top: 5px;
  font-size: 20px;
  padding: 0 16px;
  pointer-events: none;
}

.resume--buttons {

  text-align: center;
  padding-top: 20px;
}

.resume--buttons button:focus {
  outline: 0;
}

.resume--buttons i {
  font-size: 32px;
  vertical-align: middle;
}

.fa-heart {
  color: #FFACE4;
}

.fa-remove {
  color: #CDD6DD;
}
.last-div{text-align: center;
    padding: 112px;}
			.resume--card .last-div h3{    margin-bottom: 40px;font-weight: bold;}
			.dowdiv{width: 100%;
    display: inline-block;}
.downloadbtn{    padding: 10px;
    background: #059ec7;
    text-align: center;
    color: #fff;
    border-radius: 5px;
    margin: 10px 15px;
    font-size: 14px;
    text-transform: uppercase;
    float: right;}
.downloadbtn:hover, .downloadbtn:focus{ text-decoration: none; color: #fff;outline: none;}
        </style>
		<script src="https://hammerjs.github.io/dist/hammer.min.js"></script>
<div class="container panel panel-default">
  <div class="panel-heading">
         Shortlist or Reject Resume Panel 
	  <a href="{{url('resumeConsultancy')}}" class="btn btn-danger" style="float: right;">Back</a>
  </div>
   <div class="panel-body">
 
    <div class="row">
<div class="resume">
  <div class="resume--status">
    <i class="fa fa-remove"></i>
    <i class="fa fa-heart"></i>
  </div>

  <div class="resume--cards">
  @foreach($resumeLists as $_resume)
    <div class="resume--card" id="resume_{{$_resume->id}}">
	<div class="dowdiv">
		<a href="https://www.hr-suranigroup.com/uploads/consultancyResume/{{$_resume->resume_name}}" class="downloadbtn" download>Download Resume</a>
	</div>
	<?php echo html_entity_decode($_resume->resume_content); ?>
    </div>
	@endforeach
	<div class="resume--card">
		  <div class="last-div">
		  <h3>You have seen all the resume . If you want to see more resume please click below button</h3>
		   <button class="btn btn-primary" onclick="review_again();">Review Again</button>
    <button class="btn btn-success" onclick="done();">Done</button>
			  </div>
    </div>
  </div>

  <div class="resume--buttons" id="resume_btn" @if($resumeCount ==0) style="display:none" @endif> 
	  <button class="btn btn-warning" id="skip">Skip</button>
   <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Reject</button>
    <button id="love" class="btn btn-primary">Shortlist</button>
  </div>
</div>
    </div>
	
	
	

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-body">
         <div class="form-group">
    <label for="exampleFormControlTextarea1">Please Give your Feedback</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
      </div>
      <div class="modal-footer">
		  		  <button type="button" class="btn btn-secondary" data-dismiss="modal" id="nope" >Done Without Feedback</button>
		  		  <button type="button" class="btn btn-success" data-dismiss="modal" id="nope1" >Done</button>


      </div>
    </div>
  </div>
</div>

</div> 




</div> 
<script>
		'use strict';

var resumeContainer = document.querySelector('.resume');
var allCards = document.querySelectorAll('.resume--card');
var nope = document.getElementById('nope');
var nope1 = document.getElementById('nope1');

var love = document.getElementById('love');
var skip = document.getElementById('skip');

function initCards(card, index) {
  var newCards = document.querySelectorAll('.resume--card:not(.removed)');

  newCards.forEach(function (card, index) {
    card.style.zIndex = allCards.length - index;
    card.style.transform = 'scale(' + (20 - index) / 20 + ') translateY(-' + 30 * index + 'px)';
    card.style.opacity = (10 - index) / 10;
  });
  
  resumeContainer.classList.add('loaded');
}

initCards();

allCards.forEach(function (el) {
  var hammertime = new Hammer(el);

  hammertime.on('pan', function (event) {
    el.classList.add('moving');
  });

  hammertime.on('pan', function (event) {
    if (event.deltaX === 0) return;
    if (event.center.x === 0 && event.center.y === 0) return;

    resumeContainer.classList.toggle('resume_love', event.deltaX > 0);
    resumeContainer.classList.toggle('resume_nope', event.deltaX < 0);

    var xMulti = event.deltaX * 0.03;
    var yMulti = event.deltaY / 80;
    var rotate = xMulti * yMulti;

    event.target.style.transform = 'translate(' + event.deltaX + 'px, ' + event.deltaY + 'px) rotate(' + rotate + 'deg)';
  });

  hammertime.on('panend', function (event) {
    el.classList.remove('moving');
    resumeContainer.classList.remove('resume_love');
    resumeContainer.classList.remove('resume_nope');

    var moveOutWidth = document.body.clientWidth;
    var keep = Math.abs(event.deltaX) < 80 || Math.abs(event.velocityX) < 0.5;

    event.target.classList.toggle('removed', !keep);

    if (keep) {
      event.target.style.transform = '';
    } else {
      var endX = Math.max(Math.abs(event.velocityX) * moveOutWidth, moveOutWidth);
      var toX = event.deltaX > 0 ? endX : -endX;
      var endY = Math.abs(event.velocityY) * moveOutWidth;
      var toY = event.deltaY > 0 ? endY : -endY;
      var xMulti = event.deltaX * 0.03;
      var yMulti = event.deltaY / 80;
      var rotate = xMulti * yMulti;

      event.target.style.transform = 'translate(' + toX + 'px, ' + (toY + event.deltaY) + 'px) rotate(' + rotate + 'deg)';
      initCards();
    }
  });
});

function createButtonListener(love,skip,feedbackCheck) {
  return function (event) {
	  
	  /*
	  *check feedbackCheck
	  */
	  if(feedbackCheck)
	  {
		 if( $j1("#exampleFormControlTextarea1").val() == '')
		 {
			 alert('Kindly enter any feedback');
			 return false;
		 }
		
	  }
	   /*
	  *check feedbackCheck
	  */
	  var selectOldVal = document.getElementById('selectClick').value;
	  var newselectOldVal = parseInt(1)+parseInt(selectOldVal);
	  document.getElementById('selectClick').value = newselectOldVal;
	  
	  if(parseInt(newselectOldVal) > {{$resumeCount}})
	  {
		$j1("#resume_btn").hide();
			
	  }
	  else
	  {
		if(parseInt(newselectOldVal) > {{$resumeCount-1}})
	  {
		$j1("#resume_btn").hide();
			
	  }  
    var cards = document.querySelectorAll('.resume--card:not(.removed)');
    var moveOutWidth = document.body.clientWidth * 1.5;

    if (!cards.length) return false;

    var card = cards[0];

    card.classList.add('removed');

    if (love) {
		
      card.style.transform = 'translate(' + moveOutWidth + 'px, -100px) rotate(-30deg)';
    updateResumeStatus(card.id,'shortlisted',feedbackCheck);
	} else {
		
	  card.style.transform = 'translate(-' + moveOutWidth + 'px, -100px) rotate(30deg)';
		if(!skip)
		{
		updateResumeStatus(card.id,'rejected',feedbackCheck);
		}
	}
	
    
	
	initCards();

    event.preventDefault();
  };
  }
}

var nopeListener = createButtonListener(false,false,false);
var nopeListener1 = createButtonListener(false,false,true);

var loveListener = createButtonListener(true,false,false);
var skipListener = createButtonListener(false,true,false);

nope.addEventListener('click', nopeListener);
nope1.addEventListener('click', nopeListener1);

love.addEventListener('click', loveListener);
skip.addEventListener('click', skipListener);


function updateResumeStatus(idtxt,statusResume,feedbackCheck)
{
	if(feedbackCheck)
	{
		$j1.ajax({
		  type: 'POST',
		  url: "{{url('setResumeFeedback')}}",
		  data:  { 'feedback' : $j1("#exampleFormControlTextarea1").val(),'_token':'{{ csrf_token() }}','idtext':idtxt,'statusResume':statusResume },
		  dataType: "text",
		  success: function(resultData) {  }
		});
		
	}
	else
	{
	$j1.ajax({
							type: "GET",
							url: "{{url('setResumeStatus')}}/"+idtxt+'/'+statusResume,
							
							success: function(response){
								//alert(response);
							}
						});
	}
}
function review_again()
{
	document.getElementById('selectClick').value = 0;
	document.getElementById('exampleFormControlTextarea1').value = '';
	window.location.reload();
}
function done()
{
	window.location.href = "{{url('resumeConsultancy')}}";
}
		</script>
		
<input type="hidden" id="selectClick" value="0"/>		
@stop