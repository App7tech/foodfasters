<!DOCTYPE html>
<html>
<head>
<style>
.button {
    width:500px;
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 25px;
    margin: 150px 400px;
    cursor: pointer;
}
</style>
</head>
<body onload="getLocation()">
    <script type="text/javascript">
    
    function getLocation(){
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(showPosition);

        }
    }

    function showPosition(position){
        document.getElementById("lat").value =+position.coords.latitude;
        document.getElementById("lon").value =+position.coords.longitude;

    }
</script>
<form action="index.php" method="post">
    <input type="text" name="lat" id="lat">
    <input type="text" name="lon" id="lon">

    <button class="button" type="submit" name="subm" id="subm">Find Nearest Restaurants</button>
</form>
<!-- <input type="button" class="button" value="Input Button"> -->

<?php
if(isset($_POST['subm'])){
    $l1 = $_POST['lat'];
    $l2 = $_POST['lon'];

    header("Location:nearest.php?lat=$l1&lon=$l2");
}
?>

</body>
</html>
