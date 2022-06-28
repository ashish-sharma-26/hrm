@extends('layouts.hrmLayout')
@section('content')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
  <link href="https://api.spotserve.io/css/bootstrap-select.min.css" rel="stylesheet">
<style>
	.filter-body{
		min-height:100px !important;
	}
	input[type=text], select, textarea {
    width: 100%;
    padding: 8px;
    border: 2px solid #059ec7;
    border-radius: 4px;
    box-sizing: border-box;
    resize: vertical;
		height: auto;
}
	.form-group label {
    background: #fff;
    position: relative;
    top: 13px;
    right: -8px;
    padding: 0px 13px;    z-index: 99;
}
	.btn-dark {
    color: #fff;
    background-color: #343a40;
    border-color: #343a40;
}
	.btn-dark:hover, .btn-dark:focus {
    color: #fff;
    background-color: #23272b;
    border-color: #1d2124;
}
	select:disabled {
    opacity: .5;
    background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAAAECAYAAACp8Z5+AAAAIklEQVQIW2NkQAKrVq36zwjjgzhhYWGMYAEYB8RmROaABADeOQ8CXl/xfgAAAABJRU5ErkJggg==) repeat;border: 2px solid #858585;
}
	table.dataTable thead>tr>th.sorting {
    padding-right: 8px;
    white-space: nowrap;
}
	table.dataTable thead .sorting, table.dataTable thead .sorting_asc, table.dataTable thead .sorting_desc, table.dataTable thead .sorting_asc_disabled, table.dataTable thead .sorting_desc_disabled {
    color: #fff;
    background-color: #212529;
    border-color: #32383e;
}
	table.table-bordered.dataTable th, table.table-bordered.dataTable td {
    padding: 15px 8px;    vertical-align: middle;
}
	.action-tool span{    display: inline-block;
    text-align: center;
 
    height: 35px;
    padding: 7px;
    border-radius: 50px;
       margin-right: 5px;
    width: 45%;}
	.action-tool span:first-child{    background: green;}
	.action-tool span:last-child{    background: red;}
		.action-tool span:first-child a, .action-tool span:last-child a{    color: #FFFFFF;}
	.modal-dialog {
    width: 75%;

}
	.bd-example {
    padding: 1.5rem;

}
	
	
	
	


.input-container {
  position: relative;
}



input[type="text"]:focus {
  outline: none; /* removes the default orange border when focus */
  border: 1px solid #11a8ab;
}
.input-icon {
  font-size: 22px;
  position: absolute;
  left: 31px;
  top: 10px;
}
.input-icon.password-icon {
  left: 35px;
}

.horizontal-list {
  margin: 0;
  padding: 0;
  list-style-type: none;
}
.horizontal-list li {
  float: left;
}

.clear {
  clear: both;
}

.icon {
  font-size: 25px;
}

.titular {
  display: block;
  line-height: 60px;
  margin: 0;
  text-align: center;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
}

.button {
  display: block;
  width: 175px;
  line-height: 50px;
  font-size: 16px;
  font-weight: 700;
  text-align: center;
  margin: 0 auto;
  border-radius: 5px;
  -webkit-transition: background 0.3s;
  transition: background 0.3s;
}
.button:hover {
  text-decoration: none;
}

.arrow-btn-container {
  position: relative;
}
.arrow-btn {
  position: absolute;
  display: block;
  width: 60px;
  height: 60px;
  -webkit-transition: background 0.3s;
  transition: background 0.3s;
}
.arrow-btn:hover {
  text-decoration: none;
}
.arrow-btn.left {
  border-top-left-radius: 5px;
}
.arrow-btn.right {
  border-top-right-radius: 5px;
  right: 0;
  top: 0;
}
.arrow-btn .icon {
  display: block;
  font-size: 18px;
  border: 2px solid #fff;
  border-radius: 100%;
  line-height: 17px;
  width: 21px;
  margin: 20px auto;
  text-align: center;
}
.arrow-btn.left .icon {
  padding-right: 2px;
}

.profile-picture {
  border-radius: 100%;
  overflow: hidden;
  -webkit-box-sizing: content-box;
  -moz-box-sizing: content-box;
  box-sizing: content-box;
}
.big-profile-picture {
  margin: 0 auto;
  border: 5px solid #ffffff;
  width: 150px;
  height: 150px;    position: relative;
    top: 10px;
}
.small-profile-picture {
  border: 2px solid #50597b;
  width: 40px;
  height: 40px;
}

/** MAIN CONTAINER **/

.main-container {
  font-family: "Ubuntu", sans-serif;
  width: 950px;
  height: 1725px;
  margin: 6em auto;
}
/*********************************************** HEADER ***********************************************/
header {
  height: 80px;
}
.header-menu {
  font-size: 17px;
  line-height: 80px;
}
.header-menu li {
  position: relative;
  -webkit-transform: translateZ(0); /** To avoid a flash when hover messages **/
}
.menu-box-menu li {
  padding: 10px 15px;
  display: block;
  font-size: 17px;
  -webkit-transition: background 0.3s;
  transition: background 0.3s; border-bottom: 4px solid #e7e7e7;
}

	.profile.block .menu-box-menu li{    display: inline-block;
    width: 49%;
    border: none;    color: #fff;}
	.profile.block .menu-box-menu li:last-child{text-align: right;}
	.menu-box-menu li p{    font-size: 15px; }

	.menu-box-menu li h2{    font-size: 17px;     font-weight: bold;  margin-top: 6px;color: #14297b;margin-bottom: 0;}
		.menu-box-menu li p{    margin-bottom: 0;}
	.profile.block .menu-box-menu li h2{  color: #fff;    font-size: 18px;}
	.profile.block .menu-box-menu li p{  color: #fff;    font-size: 16px;}
	
	.scnd-font-color{    font-weight: bold;
    color: #fff;
    text-decoration: underline;
    font-size: 18px;
    margin: 5px 5px;
    border-bottom: 2px solid #fff;
    padding-bottom: 7px;}
		.header-menu-tab span{ display: block;}

.header-menu-tab .icon {
  padding-right: 15px;
}
.header-menu-number {
  position: absolute;
  line-height: 22px;
  padding: 0 6px;
  font-weight: 700;
  background: #e64c65;
  border-radius: 100%;
  top: 15px;
  right: 2px;
  -webkit-transition: all 0.3s linear;
  transition: all 0.3s linear;
}
.header-menu li:hover .header-menu-number {
  text-decoration: none;
  -webkit-transform: rotate(360deg);
  transform: rotate(360deg);
}
.profile-menu {
  float: right;
  height: 80px;
  padding-right: 20px;
}
.profile-menu p {
  font-size: 17px;
  display: inline-block;
  line-height: 76px;
  margin: 0;
  padding-right: 10px;
}
.profile-menu a {
  padding-left: 5px;
}
.profile-menu a:hover {
  text-decoration: none;
}
.small-profile-picture {
  display: inline-block;
  vertical-align: middle;
}
/** CONTAINERS **/
.left-container, .middle-container, .right-container{
  float: left;
  width: 33%;
}
.block {
  margin-bottom: 25px;
  background: #f4f4f4;
  border-radius: 5px;
	padding-bottom: 10px;    box-shadow: 1px 4px 5px -2px #888888;       background-image: linear-gradient(#becbff, #f4f4f4);
   
}
	.profile.block{  background-image: linear-gradient(#4562d8, #5474f1);}
	.menu-box-menu{list-style-type: none;
    margin: 0;
    padding-left: 0;}
/******************************************** LEFT CONTAINER *****************************************/
.left-container {
}

.menu-box .titular {
  background: #11a8ab;
}
.menu-box-menu .icon {
  display: inline-block;
  vertical-align: top;
  width: 28px;
  margin-left: 20px;
  margin-right: 15px;
}
.menu-box-number {
  width: 36px;
  line-height: 22px;
  background: #50597b;
  text-align: center;
  border-radius: 15px;
  position: absolute;
  top: 15px;
  right: 15px;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
}

.menu-box-tab {
  line-height: 60px;
  display: block;
  border-bottom: 1px solid #1f253d;
  -webkit-transition: background 0.2s;
  transition: background 0.2s; padding: 0 15px;
}
.menu-box-tab:hover {
  background: #50597b;
  border-top: 1px solid #1f253d;
  text-decoration: none;
}
.menu-box-tab:hover .icon {
  color: #fff;
}
.menu-box-tab:hover .menu-box-number {
  background: #e64c65;
}
.donut-chart-block {
  height: 434px;
}
.donut-chart-block .titular {
  padding: 10px 0;
}
.donut-chart {
  height: 270px;
}
/******************************************
				DONUT-CHART by @kseso https://codepen.io/Kseso/pen/phiyL
				******************************************/
.donut-chart {
  position: relative;
  width: 200px;
  height: 200px;
  margin: 0 auto 2rem;
  border-radius: 100%;
}
p.center-date {
  background: #394264;
  position: absolute;
  text-align: center;
  font-size: 28px;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 130px;
  height: 130px;
  margin: auto;
  border-radius: 50%;
  line-height: 35px;
  padding: 15% 0 0;
}
.center-date span.scnd-font-color {
  line-height: 0;
}
.recorte {
  border-radius: 50%;
  clip: rect(0px, 200px, 200px, 100px);
  height: 100%;
  position: absolute;
  width: 100%;
}
.quesito {
  border-radius: 50%;
  clip: rect(0px, 100px, 200px, 0px);
  height: 100%;
  position: absolute;
  width: 100%;
  font-family: monospace;
  font-size: 1.5rem;
}
#porcion1 {
  -webkit-transform: rotate(0deg);
  transform: rotate(0deg);
}

#porcion1 .quesito {
  background-color: #e64c65;
  -webkit-transform: rotate(76deg);
  transform: rotate(76deg);
}
#porcion2 {
  -webkit-transform: rotate(76deg);
  transform: rotate(76deg);
}
#porcion2 .quesito {
  background-color: #11a8ab;
  -webkit-transform: rotate(140deg);
  transform: rotate(140deg);
}
#porcion3 {
  -webkit-transform: rotate(215deg);
  transform: rotate(215deg);
}
#porcion3 .quesito {
  background-color: #4fc4f6;
  -webkit-transform: rotate(113deg);
  transform: rotate(113deg);
}
#porcionFin {
  -webkit-transform: rotate(-32deg);
  transform: rotate(-32deg);
}
#porcionFin .quesito {
  background-color: #fcb150;
  -webkit-transform: rotate(32deg);
  transform: rotate(32deg);
}
/******************************************
				END DONUT-CHART by @kseso https://codepen.io/Kseso/pen/phiyL
				******************************************/
.os-percentages {
  padding-top: 36px;
}
.os-percentages li {
  width: 75px;
  border-left: 1px solid #394264;
  text-align: center;
  background: #50597b;
}
.os {
  margin: 0;
  padding: 10px 0 5px;
  font-size: 15px;
}
.os.ios {
  border-top: 4px solid #e64c65;
}
.os.mac {
  border-top: 4px solid #11a8ab;
}
.os.linux {
  border-top: 4px solid #fcb150;
}
.os.win {
  border-top: 4px solid #4fc4f6;
}
.os-percentage {
  margin: 0;
  padding: 0 0 15px 10px;
  font-size: 25px;
}
.line-chart-block {
  height: 400px;
}
.line-chart {
  height: 200px;
  background: #11a8ab;
}
/******************************************
				LINE-CHART by @kseso https://codepen.io/Kseso/pen/phiyL
				******************************************/
.grafico {
  padding: 2rem 1rem 1rem;
  width: 100%;
  height: 100%;
  position: relative;
  color: #fff;
  font-size: 80%;
}
.grafico span {
  display: block;
  position: absolute;
  bottom: 3rem;
  left: 2rem;
  height: 0;
  border-top: 2px solid;
  -webkit-transform-origin: left center;
  transform-origin: left center;
}
.grafico span > span {
  left: 100%;
  bottom: 0;
}
[data-valor="25"] {
  width: 75px;
  -webkit-transform: rotate(-45deg);
  transform: rotate(-45deg);
}
[data-valor="8"] {
  width: 24px;
  -webkit-transform: rotate(65deg);
  transform: rotate(65deg);
}
[data-valor="13"] {
  width: 39px;
  -webkit-transform: rotate(-45deg);
  transform: rotate(-45deg);
}
[data-valor="5"] {
  width: 15px;
  -webkit-transform: rotate(50deg);
  transform: rotate(50deg);
}
[data-valor="23"] {
  width: 69px;
  -webkit-transform: rotate(-70deg);
  transform: rotate(-70deg);
}
[data-valor="12"] {
  width: 36px;
  -webkit-transform: rotate(75deg);
  transform: rotate(75deg);
}
[data-valor="15"] {
  width: 45px;
  -webkit-transform: rotate(-45deg);
  transform: rotate(-45deg);
}

[data-valor]:before {
  content: "";
  position: absolute;
  display: block;
  right: -4px;
  bottom: -3px;
  padding: 4px;
  background: #fff;
  border-radius: 50%;
}
[data-valor="23"]:after {
  content: "+" attr(data-valor) "%";
  position: absolute;
  right: -2.7rem;
  top: -1.7rem;
  padding: 0.3rem 0.5rem;
  background: #50597b;
  border-radius: 0.5rem;
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);
}
[class^="eje-"] {
  position: absolute;
  left: 0;
  bottom: 0rem;
  width: 100%;
  padding: 1rem 1rem 0 2rem;
  height: 80%;
}
.eje-x {
  height: 2.5rem;
}
.eje-y li {
  height: 25%;
  border-top: 1px solid #777;
}
[data-ejeY]:before {
  content: attr(data-ejeY);
  display: inline-block;
  width: 2rem;
  text-align: right;
  line-height: 0;
  position: relative;
  left: -2.5rem;
  top: -0.5rem;
}
.eje-x li {
  width: 33%;
  float: left;
  text-align: center;
}
/******************************************
				END LINE-CHART by @kseso https://codepen.io/Kseso/pen/phiyL
				******************************************/
.time-lenght {
  padding-top: 22px;
  padding-left: 38px;
}
.time-lenght-btn {
  display: block;
  width: 70px;
  line-height: 32px;
  background: #50597b;
  border-radius: 5px;
  font-size: 14px;
  text-align: center;
  margin-right: 5px;
  -webkit-transition: background 0.3s;
  transition: background 0.3s;
}
.time-lenght-btn:hover {
  text-decoration: none;
  background: #e64c65;
}
.month-data {
  padding-top: 28px;
}
.month-data p {
  display: inline-block;
  margin: 0;
  padding: 0 25px 15px;
  font-size: 16px;
}
.month-data p:last-child {
  padding: 0 25px;
  float: right;
  font-size: 15px;
}
.increment {
  color: #e64c65;
}
.media {
  height: 216px;
}
#media-display {
  position: relative;
  height: 180px;
  background: #787878
    url("https://www.fancinema.com.ar/wp-content/uploads/catwoman1.jpg") center
    top;
}
#media-display .play {
  position: absolute;
  top: 75px;
  right: 32px;
  border: 2px solid #fff;
  border-radius: 100%;
  padding: 2px 5px 2px 9px;
}
#media-display .play:hover {
  border: 2px solid #e64c65;
}
.media-control-bar {
  padding: 6px 0 0 15px;
}
.media-btn,
.time-passed {
  display: inline-block;
  margin: 0;
}
.media-btn {
  font-size: 19px;
}
.media-btn:hover,
.media-btn:hover span {
  text-decoration: none;
  color: #e64c65;
}
.play {
  margin-right: 100px;
}
.volume {
  margin-left: 30px;
}
.resize {
  margin-left: 12px;
}
.left-container .social {
  height: 110px;
}
.left-container .social li {
  width: 75px;
  height: 110px;
}
.left-container .social li .icon {
  text-align: center;
  font-size: 20px;
  margin: 0;
  line-height: 75px;
}
.left-container .social li .number {
  text-align: center;
  margin: 0;
  line-height: 34px;
}
.left-container .social .facebook {
  background: #3468af;
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px;
}
.left-container .social .facebook .number {
  background: #1a4e95;
  border-bottom-left-radius: 5px;
}
.left-container .social .twitter {
  background: #4fc4f6;
}
.left-container .social .twitter .icon {
  font-size: 18px;
}
.left-container .social .twitter .number {
  background: #35aadc;
}
.left-container .social .googleplus {
  background: #e64c65;
}
.left-container .social .googleplus .number {
  background: #cc324b;
}
.left-container .social .mailbox {
  background: #50597b;
  border-top-right-radius: 5px;
  border-bottom-right-radius: 5px;
}
.left-container .social .mailbox .number {
  background: #363f61;
  border-bottom-right-radius: 5px;
}
/************************************************** MIDDLE CONTAINER **********************************/



.user-name {
  margin: 25px 0 9px;
  text-align: center;    font-size: 28px;font-weight: bold;    color: #ffffff;
}
	.profile-description.id p{   color: #ffffff;    font-size: 21px;}
.profile-description {

  margin: 0 auto;
  text-align: center;
}
.profile-options {
  padding-top: 23px;
}
.profile-options li {
  border-left: 1px solid #1f253d;
}
.profile-options p {
  margin: 0;
}
.profile-options a {
  display: block;
  width: 99px;
  line-height: 60px;
  text-align: center;
  -webkit-transition: background 0.3s;
  transition: background 0.3s;
}
.profile-options a:hover {
  text-decoration: none;
  background: #50597b;
}
.profile-options a:hover.comments .icon {
  color: #fcb150;
}
.profile-options a:hover.views .icon {
  color: #11a8ab;
}
.profile-options a:hover.likes .icon {
  color: #e64c65;
}
.profile-options .icon {
  padding-right: 10px;
}
.profile-options .comments {
  border-top: 4px solid #fcb150;
}
.profile-options .views {
  border-top: 4px solid #11a8ab;
}
.profile-options .likes {
  border-top: 4px solid #e64c65;
}
.middle-container .social {
  height: 205px;
  background: #1f253d;
}
.middle-container .social li {
  margin-bottom: 12px;
}
.middle-container .social a {
  line-height: 60px;
}
.middle-container .social a:hover {
  text-decoration: none;
}
.middle-container .social .titular {
  border-radius: 5px;
}
.middle-container .social .facebook {
  background: #3468af;
  -webkit-transition: background 0.3s;
  transition: background 0.3s;
}
.middle-container .social a:hover .facebook {
  background: #1a4e95;
}
.middle-container .social a:hover .icon.facebook {
  background: #3468af;
}
.middle-container .social .twitter {
  background: #4fc4f6;
  -webkit-transition: background 0.3s;
  transition: background 0.3s;
}
.middle-container .social a:hover .twitter {
  background: #35aadc;
}
.middle-container .social a:hover .icon.twitter {
  background: #4fc4f6;
}
.middle-container .social .googleplus {
  background: #e64c65;
  -webkit-transition: background 0.3s;
  transition: background 0.3s;
}
.middle-container .social a:hover .googleplus {
  background: #cc324b;
}
.middle-container .social a:hover .icon.googleplus {
  background: #e64c65;
}
.middle-container .social .icon {
  float: left;
  width: 60px;
  height: 60px;
  text-align: center;
  font-size: 20px;
  border-bottom-left-radius: 5px;
  border-top-left-radius: 5px;
}
.middle-container .social .icon.facebook {
  background: #1a4e95;
}
.middle-container .social .icon.twitter {
  background: #35aadc;
}
.middle-container .social .icon.googleplus {
  background: #cc324b;
}
	.modal-body .close{
    opacity: 1;

    position: relative;

}
	.close-button a {    width: 50px;
    height: 50px;
    position: absolute;
    right: 50%;
    top: 50%;
    margin-top: -50px;
    margin-right: -50px;

    border-radius: 50px;
    opacity: 1;

}
.close-button a > span {    background-color: #f5a700;
    display: block;
    height: 4px;
    border-radius: 6px;
    position: relative;
    transition: all 0.4s cubic-bezier(0.215, 0.61, 0.355, 1);
    position: absolute;
    top: 50%;
    margin-top: -3px;
    left: 10px;
    width: 32px;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-justify-content: space-between;
    justify-content: space-between;
    -moz-justify-content: space-between;
    -ms-justify-content: space-between;
}
.close-button a > span span {
    display: block;
    background-color: #ed7f00;
    width: 4px;
    height: 4px;
    border-radius: 6px;
    transition: all 0.4s cubic-bezier(0.215, 0.61, 0.355, 1);
    position: absolute;
    left: 0;
    top: 0;
}
	.close-button{    display: block;
    position: absolute;
    right: 61px;
    top: 54px;}
.close-button a > span.left {
  transform: rotate(45deg);
  transform-origin: center;
}
.close-button a > span.left .circle-left {
  transition: all 0.4s cubic-bezier(0.215, 0.61, 0.355, 1);
  margin-left: 0;
}
.close-button a > span.left .circle-right {
  transition: all 0.4s cubic-bezier(0.215, 0.61, 0.355, 1);
  margin-left: 27px;
}
.close-button a > span.right {
  transform: rotate(-45deg);
  transform-origin: center;
}
.close-button a > span.right .circle-left {
  transition: all 0.4s cubic-bezier(0.215, 0.61, 0.355, 1);
  margin-left: 0;
}
.close-button a > span.right .circle-right {
  transition: all 0.4s cubic-bezier(0.215, 0.61, 0.355, 1);
  margin-left: 27px;
}
.close-button a:hover > span {
  background-color: #2faee0;
  transition: all 0.4s cubic-bezier(0.215, 0.61, 0.355, 1);
}
.close-button a:hover > span span {
  transition: all 0.4s cubic-bezier(0.215, 0.61, 0.355, 1);
  background-color: #008ac9;
}
.close-button a:hover > span.left .circle-left {
  transition: all 0.4s cubic-bezier(0.215, 0.61, 0.355, 1);
  margin-left: 27px;
}
.close-button a:hover > span.left .circle-right {
  transition: all 0.4s cubic-bezier(0.215, 0.61, 0.355, 1);
  margin-left: 0;
}
.close-button a:hover > span.right .circle-left {
  transition: all 0.4s cubic-bezier(0.215, 0.61, 0.355, 1);
  margin-left: 27px;
}
.close-button a:hover > span.right .circle-right {
  transition: all 0.4s cubic-bezier(0.215, 0.61, 0.355, 1);
  margin-left: 0;
}
	.modal-heading .modal-title{      font-weight: bold;
    font-size: 23px;
    margin-bottom: 15px;
    padding: 10px 49px;
    display: inline-block;
    background-image: linear-gradient(#14297b, #3051d3);
    color: #fff;
    border-radius: 0px 0px 5px 5px;    margin-top: -2px;}
	.btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}
	.btn-primary:hover {
    color: #fff;
    background-color: #0069d9;
    border-color: #0062cc;
}
/********************************************* RIGHT CONTAINER ****************************************/
	.profile-description.id{    font-size: 18px;}
	.profile-description.id p span{    font-weight: bold;    color: #ffffff;}
	.panel-body.bio-graph-info{    min-height: auto;    padding-top: 0;}
	.modal-body{padding-top: 0;}
			@media only screen and (max-width: 600px) {
				.filter-button a{    width: 100%;
    margin-top: 5px;}
				.action-tool span{    width: 100%;
    margin-bottom: 5px;    margin-right: 0;}
				.modal-dialog {
    width: 95%;
}
				.profile-userpic img {
    width: 50%;
}
				.bio-row p span{vertical-align: text-top;}
				.bio-row{    width: 100%;}
				.left-container, .middle-container, .right-container{    width: 100%;}
	}


</style>

<?php
//echo "<pre>";
//print_r($data);

//exit;
$tbltd='';
?>

<div class="row">
							<div class="col-lg-12">
							  <div class="panel panel-default">
                                <div class="panel-heading">
                                   Filters
                                    
                                </div>
							<div class="panel-body filter-body">
									<div class="row">
									<form action="{{ url('appliedFilterOnIncentiveBreakup') }}" id="incentiveBreakUpFilter" method="post">
									@csrf
									
										<div class="form-group col-md-3" id="capPanel">
											<label>Select Caption</label>
											<select id="capID" class="selectpicker" name="cap_id">
													<option value="">Any Caption</option>
												@foreach($salaryBreakupDetails as $_salaryMod)
														@if($filterList['capID'] == $_salaryMod->id)
															<option value="{{ $_salaryMod->id }}" selected>{{ $_salaryMod->caption }}</option>
														@else
														<option value="{{ $_salaryMod->id }}">{{ $_salaryMod->caption }}</option>
														@endif
												@endforeach
											</select>
										</div>
										
									</div>
										<div class="row">
										
										
										
								
									<div class="form-group col-md-3">
										<button type="button" class="btn btn-dark" onclick="searchOfferletterFilter();" style="width: 100%;margin-top: 23px;
padding: 9px;"><i class="fa fa-search" aria-hidden="true" style="margin-right: 5px;"></i> Search</button>
									</div>
									
									
									<div class="form-group col-md-3">
										<button type="button" class="btn btn-danger" onclick="resetOfferletterFilter();" style="width: 100%;margin-top: 23px;
padding: 9px;"><i class="fa fa-repeat" aria-hidden="true" style="margin-right: 5px;"></i> Reset</button>
									</div>
								</form>
							 </div>
						   </div>
							</div>
							</div>
					</div>
<div class="panel panel-default">
	<div class="panel-heading custom-pd">
		<div class="col-lg-4">
                                Incentive BreakUp
			 </div>
                                       <div class="col-lg-8 filter-button text-right">
									
										 <a class="btn btn-light" href="{{url('addIncentiveStructure')}}" role="button"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Add Incentive BreakUp</a>
								
										 
									</div>
                                </div>

                                <div class="panel-body">
								
                    <!-- /.row -->
                                    <div class="row">
								 
                                        <!-- /.col-lg-4 (nested) -->
                                        <div class="col-lg-12">
                                             <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>S. No.</th>
				<th>Caption</th>
                <th>Incentive Type</th>             
                <th>Created Date</th>
				<th>Action</th>
            </tr>
        </thead>
        <tbody>
		
        <?php $i=1; ?>
        @foreach($incentiveBreakUpdetails as $_incentive)
             
                <tr>
				<td>{{$i}}</td>
				<td>
				
				  <x-Offer.CapName cId="{{ $_incentive->capId}}">
                  </x-Offer.CapName>
				</td>
				<td>
				
				  @if($_incentive->incentive_type == 'number_count')
					  Number Count
				  @elseif($_incentive->incentive_type == 'Amount')
					  Amount
				  @else
				
			      @endif
				</td>
				
				
				<td>{{date('d M Y',strtotime($_incentive->created_at))}}</td>
				
				<td>
				<a href="{{ url('viewIncentiveBreakup/'.$_incentive->id) }}" target="_blank" class="btn btn-primary" style="width: 100%;margin-bottom: 5px;"><i class="fa fa-eye"></i> View BreakUp</a>
				<a href="javascript:void(0);" onclick="incentiveDeleteProcess({{ $_incentive->id }})" class="btn btn-primary" style="width: 100%;margin-bottom: 5px;"><i class="fa fa-eye"></i> Delete BreakUp</a>
				</td>
				</tr>
               
               
                 
            <?php $i++; ?>
            @endforeach
           
          
        </tbody>
       
    </table>
                                        </div>
                                    </div>
                                </div>
</div>

<script>
function incentiveDeleteProcess(incentiveId)
	{
			
			let text = "Do you want to delete this incentive breakup?";
			  if (confirm(text) == true) {
				window.location.href = "{{ url('deleteIncentiveBreakup') }}/"+incentiveId;
			  } else {
				return false;
			  }
	}
	function searchOfferletterFilter()
	{
		
			document.getElementById('incentiveBreakUpFilter').submit();
		
	}
	function resetOfferletterFilter()
	{
		window.location.href="{{ url('resetIncentiveBreakupFilter') }}";
	}
	var FromEndDate = new Date();
	jQuery("#joining_date").datepicker({
				format: 'dd-mm-yyyy',
				inline: false,
				lang: 'en',
				step: 5,
				multidate: 1,
				closeOnDateSelect: true,
				daysOfWeekDisabled: [0],
				 todayHighlight: true,
				 endDate: FromEndDate,
				 autoclose:true
		
	});
</script>                                
@stop