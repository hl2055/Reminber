<?php
	session_start();
	if(!$_SESSION['fb_access_token']){		
		header("Location: http://www.reminber.com/");
		exit();
	}
		
?>
<!DoctypeHTML>
<html>
<head>
</head>
<body ng-app="dash" ng-controller="dashCtrl">

<?php
echo "Bello~ ".$_SESSION['user_name'] ."</br>";
?>
<div class="list">
<ul>
<li ng-repeat="rem in rems">
<button ng-click="select_reminder(rem)">
{{rem.title}}
</button>
</li>
</ul>

<button ng-click="create_reminder">Create Reminder</button>
</div>
<div class="note-pad">
	<div class="page" ng-repeat = "rem in rems">
		<label ng-hide="rem.editing"><Strong>Title: </Strong>{{rem.title}}</label>		
		<label ng-hide="rem.editing"><Strong>Time: </Strong>{{rem.time_stamp}}</label>
		<pre ng-hide="rem.diting">{rem.message}</pre>

		<div ng-show="rem.editing">
			<input ng-model="rem.title"/>			
			<input ng-model="rem.message"/>			
		</div>

	</div>


</div>



<script src="src/angular/angular.js" type="text/javascript"></script>
<script src="assets/js/dControl.js" type="text/javascript"></script>
</body>
</html>