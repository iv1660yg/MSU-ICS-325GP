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
            <h3 align="center">Manage Models</h3><br />
   <div class="table-responsive" ng-app="liveApp" ng-controller="liveController" ng-init="fetchData()">
                <div class="alert alert-success alert-dismissible" ng-show="success" >
                    <a href="#" class="close" data-dismiss="alert" ng-click="closeMsg()" aria-label="close">&times;</a>
                    {{successMessage}}
                </div>
                <form name="testform" ng-submit="insertData()">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Model Number</th>
                                <th>Model Name</th>
                                <th>Category Type</th>
                                <th>Model Status</th>
                                <th>Supplier ID</th>
                            </tr>
                        </thead>
                       
                        <tbody>
                            <tr>
                                <td><input type="text" ng-model="addData.model_number" class="form-control" placeholder="Enter Model Number" ng-required="true" /></td>
                                <td><input type="text" ng-model="addData.model_name" class="form-control" placeholder="Enter Model Name" ng-required="true" /></td>
                                <td>
                                    <select ng-model="addData.category_type" ng-required="true">
                                        <option value="">Select</option>
                                        <option value="End User Mobility">End User Mobility</option>
                                        <option value="Enterprise">Enterprise</option>
                                        <option value="End User Workstation">End User Workstation</option>
                                    </select>    
                                </td>
                                <td>
                                    <select ng-model="addData.model_status" ng-required="true">
                                        <option value="">Select</option>
                                        <option value="Active">Active</option>
                                        <option value="Retired">Retired</option>
                                    </select>                                  
                                </td>

                                <td>
                                        <select ng-model="addData.supplier_id" ng-required="true">
                                            <option value="">Select</option>
                                            <?php 

                                                include_once("../db_connect.php");


                                                //delcare var and set its value to sql query
                                                $sqli = "SELECT * FROM supplier";

                            
                                                $result = mysqli_query($conn, $sqli);

                                                while ($row = mysqli_fetch_array($result)) {
                                                $supplier = $row['supplier_name'];
                                                $sid = $row['supplier_id'];
                                                echo "<option value='$sid'>$supplier</option>";
                                                }
                                            ?>
                                            </select>
                                </td>

            


                                <td><button type="submit" class="btn btn-success btn-sm" ng-disabled="testform.$invalid">Add</button></td>
                            </tr>
                            <tr ng-repeat="data in namesData" ng-include="getTemplate(data)">
                            </tr>
                          
                        </tbody>
                       
                    </table>
                </form>
                <script type="text/ng-template" id="display">
                    <td>{{data.model_number}}</td>
                    <td>{{data.model_name}}</td>
                    <td>{{data.category_type}}</td>
                    <td>{{data.model_status}}</td>
                    <td>{{data.supplier_id}}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" ng-click="showEdit(data)">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm" ng-click="deleteData(data.model_id)">Delete</button>
                    </td>
                </script>
                <script type="text/ng-template" id="edit">
                    <td><input type="text" ng-model="formData.model_number" class="form-control"  /></td>
                    <td><input type="text" ng-model="formData.model_name" class="form-control"  /></td>
                    <td>
                            <select ng-model="formData.category_type" class="form-control">
                                        <option value="">Select</option>
                                        <option value="End User Mobility">End User Mobility</option>
                                        <option value="Enterprise">Enterprise</option>
                                        <option value="End User Workstation">End User Workstation</option>
                            </select>
                    </td>
                    <td>
                                    <select ng-model="formData.model_status" class="form-control">
                                        <option value="">Select</option>
                                        <option value="Active">Active</option>
                                        <option value="Retired">Retired</option>
                                    </select>                                  
                    </td>
                    <td><input type="text" ng-model="formData.supplier_id" class="form-control" /></td>
                    <td>
                        <input type="hidden" ng-model="formData.data.model_id" />
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
        if (data.model_id === $scope.formData.model_id)
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
