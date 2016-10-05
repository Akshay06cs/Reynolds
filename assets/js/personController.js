		var app = angular.module('myApp',[]);
	    app.controller('personCtrl',
	    function($scope)
	    		{
					
						$scope.amt = function(){
							return $scope.qty + $scope.prz;
						}
				}		);
