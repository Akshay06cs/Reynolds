<h1>Hello,</h1>
<?php 
    foreach($onlineUser as $u_key){ ?>
    <?php echo $u_key->f_name; ?> <?php echo $u_key->l_name; ?> <?php echo $u_key->time; ?> <br>
    <?php 
    } ?> 