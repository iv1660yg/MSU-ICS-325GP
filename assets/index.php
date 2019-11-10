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
            <h3 align="center">Manage Assets</h3><br />
   <div class="table-responsive" ng-app="liveApp" ng-controller="liveController" ng-init="fetchData()">
                <div class="alert alert-success alert-dismissible" ng-show="success" >
                    <a href="#" class="close" data-dismiss="alert" ng-click="closeMsg()" aria-label="close">&times;</a>
                    {{successMessage}}
                </div>
                <form name="testform" ng-submit="insertData()">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Model ID</th>
                                <th>Asset Status</th>
                                <th>User ID</th>
                                <th>Acquisition Method</th>
                                <th>Unit Price</th>
                                <th>Monthly Rental Price</th>
                                <th>Warranty Start Date</th>
                                <th>Warranty End Date</th>
                                <th>Lease End Date</th>

                            </tr>
                        </thead>
                       
                        <tbody>
                            <tr>
                                <td><input type="text" ng-model="addData.serialnumber" class="form-control" placeholder="Enter First Name" ng-required="true" /></td>
                                <td>
                                        <select ng-model="addData.model_id" ng-required="true">
                                            <option value="none"selected disabled hidden>Select</option>
                                            <?php 

                                                include_once("../db_connect.php");


                                                //delcare var and set its value to sql query
                                                $sqli = "SELECT * FROM model ";

                            
                                                $result = mysqli_query($conn, $sqli);

                                                while ($row = mysqli_fetch_array($result)) {
                                                $model_name = $row['model_name'];
                                                $mid = $row['model_id'];
                                                echo "<option value='$mid'>$model_name</option>";
                                                }
                                            ?>
                                            </select>
                                </td>                                
                                <td><input type="text" ng-model="addData.asset_status" class="form-control" placeholder="Enter Password" ng-required="true" /></td>
                                <td>
                                        <select ng-model="addData.user_id" ng-required="true">
                                            <option>Select</option>
                                            <?php 

                                                include_once("../db_connect.php");


                                                //delcare var and set its value to sql query
                                                $sqli = "SELECT * FROM users";

                            
                                                $result = mysqli_query($conn, $sqli);

                                                while ($row = mysqli_fetch_array($result)) {
                                                $user =  trim($row['firstname']. " " .$row['lastname']);
                                                $uid = $row['user_id'];
                                                echo "<option value='$uid'>$user</option>";
                                                }
                                            ?>
                                            </select>
                                </td>
                                <td><input type="text" ng-model="addData.acquisition_method" class="form-control" placeholder="Enter Job Title" ng-required="true" /></td>


                                <td><input type="text" ng-model="addData.unit_price" class="form-control" placeholder="Enter Phone#" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.monthly_rental_price" class="form-control" placeholder="Enter Email" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.warranty_start_date" class="form-control" placeholder=Enter Account Type" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.warranty_end_date" class="form-control" placeholder=Enter Account Type" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.lease_end_date" class="form-control" placeholder=Enter Account Type" ng-required="true" /></td>


                                <td><button type="submit" class="btn btn-success btn-sm" ng-disabled="testform.$invalid">Add</button></td>
                            </tr>
                            <tr ng-repeat="data in namesData" ng-include="getTemplate(data)">
                            </tr>
                          
                        </tbody>
                       
                    </table>
                </form>
                <script type="text/ng-template" id="display">
                    <td>{{data.serialnumber}}</td>
                    <td>{{data.model_id}}</td>
                    <td>{{data.asset_status}}</td>
                    <td>{{data.user_id}}</td>
                    <td>{{data.acquisition_method}}</td>
                    <td>{{data.unit_price}}</td>
                    <td>{{data.monthly_rental_price}}</td>
                    <td>{{data.warranty_start_date}}</td>
                    <td>{{data.warranty_end_date}}</td>
                    <td>{{data.lease_end_date}}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" ng-click="showEdit(data)">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm" ng-click="deleteData(data.user_id)">Delete</button>
                    </td>
                </script>
                <script type="text/ng-template" id="edit">
                    <td><input type="text" ng-model="formData.serialnumber" class="form-control"  /></td>
                    <td><input type="text" ng-model="formData.model_id" class="form-control"  /></td>
                    <td><input type="text" ng-model="formData.asset_status" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.user_id" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.acquisition_method" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.unit_price" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.monthly_rental_price" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.warranty_start_date" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.warranty_end_date" class="form-control" /></td>
                    <td><input type="text" ng-model="formData.lease_end_date" class="form-control" /></td>
                    <td>
                        <input type="hidden" ng-model="formData.data.asset_id" />
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
        if (data.user_id === $scope.formData.user_id)
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

    $scope.deleteData = function(asset_id){
        if(confirm("Are you sure you want to remove it?"))
        {
            $http({
                method:"POST",
                url:"delete.php",
                data:{'asset_id':asset_id}
            }).success(function(data){
                $scope.success = true;
                $scope.successMessage = data.message;
                $scope.fetchData();
            }); 
        }
    };

});

</script>