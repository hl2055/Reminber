// Created By David Zhou on Sep 22

//Init Angularjs
var dash = angular.module("dash",[]);

//Create Controller
dash.controller("dashCtrl",['$Scope','$http',function($scope,$http){
	//load data
	$scope.load_data = function(){
		$http.get("assets/php/fetch_reminders.php").success(function(response){
			$scope.rems = response;

			// initial selected property
			angular.forEach($scope.rems,function(rem){
				rem.selected = false;
				rem.editing = false;
			});
		});
	}

	$scope.load_data();
	//select reminder
	$scope.select_reminder = function(rem){
		angular.forEach($scope.rems,function(rem){
			rem.selected = false;
			rem.didting = false;
		})
		rem.selected = true;
	}

	//create reminder
	$scope.create_reminder = function(){

	}

	//delete reminder
	$scope.delete_reminder = function(){

	}

	//edit reminder
	$scope.edit_reminder = function(rem){
		
		rem.editing = true;		
	}

	//finish editing
	$scope.finish_editing = function(){

	}
}]);