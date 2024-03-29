<?php 
session_start();
include('../header.php');
include_once("../db_connect.php");

if(isset($_SESSION['user_id']) =="") {
	header("Location: ../index.php");
}

?>

<head>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>  
</head>
<br />
<br />
<br />

    <div class="manage-page">  
        <div>
   <br />
            <h3 align="center">Manage Suppliers</h3><br />
   <div class="table-responsive" ng-app="liveApp" ng-controller="liveController" ng-init="fetchData()">
                <div class="alert alert-success alert-dismissible" ng-show="success" >
                    <a href="#" class="close" data-dismiss="alert" ng-click="closeMsg()" aria-label="close">&times;</a>
                    {{successMessage}}
                </div>
                <form name="testform" ng-submit="insertData()">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Supplier Name</th>
                                <th>Phone Number</th>
                                <th>Street Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Zip Code</th>
                            </tr>
                        </thead>
                       
                        <tbody>
                            <tr>
                                <td><input type="text" ng-model="addData.supplier_name" class="form-control" placeholder="Enter Supplier Name" ng-required="true" /></td>
                                <td><input type="tel" ng-model="addData.phone_number" class="form-control" placeholder="Enter Phone Number" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.street" class="form-control" placeholder="Enter Address" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.city" class="form-control" placeholder="Enter City" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.state" class="form-control" placeholder="Enter State" ng-required="true" /></td>
                                <td><input type="number" ng-model="addData.zip" class="form-control" placeholder="Enter Zip Code" ng-required="true" /></td>
            


                                <td><button type="submit" class="btn btn-success btn-sm" ng-disabled="testform.$invalid">Add</button></td>
                            </tr>
                            <tr ng-repeat="data in namesData" ng-include="getTemplate(data)">
                            </tr>
                          
                        </tbody>
                       
                    </table>
                </form>
                <script type="text/ng-template" id="display">
                    <td>{{data.supplier_name}}</td>
                    <td>{{data.phone_number}}</td>
                    <td>{{data.street}}</td>
                    <td>{{data.city}}</td>
                    <td>{{data.state}}</td>
                    <td>{{data.zip}}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" ng-click="showEdit(data)">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm" ng-click="deleteData(data.supplier_id)">Delete</button>
                    </td>
                </script>
                <script type="text/ng-template" id="edit">
                    <td><input type="text" ng-model="formData.supplier_name" class="form-control"  /></td>
                    <td><input type="tel" ng-model="formData.phone_number" class="form-control"  /></td>
                    <td><input type="text" ng-model="formData.street" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.city" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.state" class="form-control" /></td>
                    <td><input type="number" ng-model="formData.zip" class="form-control" /></td>
                    <td>
                        <input type="hidden" ng-model="formData.data.supplier_id" />
                        <button type="button" class="btn btn-info btn-sm" ng-click="editData()">Save</button>
                        <button type="button" class="btn btn-default btn-sm" ng-click="reset()">Cancel</button>
                    </td>
                </script>         
   </div>  
  </div>


<script>
var app = angular.module('liveApp', []);

app.controller('liveController', function($scope, $http){

    $scope.formData = {};
    $scope.addData = {};
    $scope.success = false;

    $scope.getTemplate = function(data){
        if (data.supplier_id === $scope.formData.supplier_id)
        {
            return 'edit';
        }
        else
        {
            return 'display';
        }
    };

    $scope.fetchData = function(){
        $http.get('select.php').success(function(data){
            $scope.namesData = data;
        });
    };

    $scope.insertData = function(){
        $http({
            method:"POST",
            url:"insert.php",
            data:$scope.addData,
        }).success(function(data){
            $scope.success = true;
            $scope.successMessage = data.message;
            $scope.fetchData();
            $scope.addData = {};
        });
    };

    $scope.showEdit = function(data) {
        $scope.formData = angular.copy(data);
    };

    $scope.editData = function(){
        $http({
            method:"POST",
            url:"edit.php",
            data:$scope.formData,
        }).success(function(data){
            $scope.success = true;
            $scope.successMessage = data.message;
            $scope.fetchData();
            $scope.formData = {};
        });
    };

    $scope.reset = function(){
        $scope.formData = {};
    };

    $scope.closeMsg = function(){
        $scope.success = false;
    };

    $scope.deleteData = function(model_id){
        if(confirm("Are you sure you want to remove it?"))
        {
            $http({
                method:"POST",
                url:"delete.php",
                data:{'model_id':model_id}
            }).success(function(data){
                $scope.success = true;
                $scope.successMessage = data.message;
                $scope.fetchData();
            }); 
        }
    };

});

</script>
