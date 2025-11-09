<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location:../");
    }
    $userdata = $_SESSION['userdata'];
    $groupsdata =$_SESSION['groupsdata'];

    if($_SESSION['userdata']['status']==0){
        $status = '<b style="color:red">Not voted</b>';
    }
    else{
         $status = '<b style="color:green">voted</b>';
    }
?>

<html>
    <head>
        <title>online voting system-dashboard</title>
        <link rel="stylesheet" href="../css/stylesheet.css">
    </head>
    <body>
        <style>
            #profile{
                background-color:rgb(201, 201, 201);
                width: 30%;
                padding: 20px;
                float: left;
            }
            
            #group{
                background-color:rgb(201, 201, 201);
                width: 60%;
                padding: 20px;
                float:right;
            }
            #mainpanel{
                padding:10px;
            }
            #voted{
                padding:5px;
                font-size:15px;
                background-color:black;
                color:white;
                border-radius:5px;
            }
            #votebtn{
                padding:5px;
                font-size:16px;
                background-color:grey;
                color:black;
                border-radius:5px;
            }
        </style>

<div id="mainsection">
    <div id="headersection">
        <a href="../"><button class="btn" style="float: left;">back</button></a>
        <a href="logout.php"><button class="btn" style="float: right;">logout</button></a>
        <h1>online voting system</h1>
    </div>
</div>
    <hr>
    <div id="mainpanel">
    <div id="profile" style="text-align: left;">
        <center>
        <img src="../uploads/<?php echo $userdata['photo'] ?>" height="100" width="100"><br><br>
        </center>
        <b>Name:</b>   <?php echo $userdata['name']?><br><br>
        <b>mobile:</b> <?php echo $userdata['mobile']?><br><br>
        <b>Address:</b><?php echo $userdata['address']?><br><br>
        <b>status:</b> <?php echo  $status?><br><br>
    
    </div>

    <div id="group">
        <?php
    if($_SESSION['groupsdata']){
for($i=0;$i<count($groupsdata);$i++){
    ?>
<div>
    <img style="float: right" src="../uploads/<?php echo $groupsdata[$i]['photo']?>"height="100" width="100">
    <b>group Name:</b><?php echo $groupsdata[$i]['name']?><br><br>
    <b>votes: </b><?php echo $groupsdata[$i]['vote']?><br><br>
    <form action="../api/vote.php" method="POST">
        <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['vote']?>">
        <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id']?>">
       <?php
        if($_SESSION['userdata']['status']==0){
        ?> 
        <input type="submit" name="votebtn" value="ㅤvoteㅤ" id="votebtn"> 
       <?php
}
else{
    ?>
    <button disabled type="button" name="votebtn" value="vote" id="voted">ㅤ votedㅤ</button>
       <?php
    }
        ?>
    </form>
    </div>
<hr>
    <?php
    }
}
    else{

    }
        ?>

</div>
        </div>

 </div>

</body>
</html>