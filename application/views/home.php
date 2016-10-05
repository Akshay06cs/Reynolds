<html>
<head>
    <title>Administration</title>
    <style>
    body
    {
        font-family:Calibri;
    }
    </style>
</head>
<body>
<?php
if($level == "1")
{
?>
<h2>Hi <?php echo $user->name;?>, Welcome to Login you as a Administrator <?php echo anchor('login/logout', 'Logout');?></h2>
<?php
}else if($level == "2")
{
?>
<h2>Hi <?php echo $user->name;?>, Welcome to Login you as a User 1 <?php echo anchor('login/logout', 'Logout');?></h2>
<?php
}else
{
?>
<h2>Hi <?php echo $user->name;?>, Welcome to Login you as a Operator <?php echo anchor('login/logout', 'Logout');?></h2>
<?php
}
?>

</body>
</html>
