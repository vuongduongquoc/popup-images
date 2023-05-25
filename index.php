<!DOCTYPE html>
<html>
<head>
<title>Displaying Popups data on mouse hover using Jquery Ajax and PHP Mysql database</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<body>  
<div class="container">
   <br />
   <h3 align="center">Displaying Popups data on mouse hover using Jquery Ajax and PHP Mysql database</a></h3><br />
   <br />
   <div class="row">
    <div class="col-md-12">
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="60">Photo</th>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Salary</th>
                        </tr>
                        </thead>
                        <?php
                        include('dbcon.php');
                        $result = $conn->query("SELECT * FROM employee ORDER BY id ASC");
                        foreach($result as $row)
                        {
                            echo '
                            <tr>
                                <td><a href="#" id="'.$row["id"].'" title=" "><img src="images/'.$row["photo"].'" height="50" width="50"/></a></td>
                                <td>'.$row["name"].'</td>
                                <td>'.$row["position"].'</td>
                                <td>'.$row["office"].'</td>
                                <td>'.$row["age"].'</td>
                                <td>'.$row["salary"].'</td>
                            </tr>
                            ';
                        }
                        ?>
                </table>
            </div>
      </div>
     </div>
    </div>
  </div>
<script>  
$(document).ready(function(){ 
    $('a').tooltip({
      classes:{
       "ui-tooltip":"highlight"
      },
      position:{ my:'left center', at:'right+50 center'},
      content:function(result){
       $.post('fetch_data.php', {
        id:$(this).attr('id')
       }, function(data){
        result(data);
       });
      }
    });
});  
</script>
</body>  
</html> 