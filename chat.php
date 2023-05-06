<?php
require 'db.php';



$sql = $conn -> prepare("SELECT * FROM chat_info");
$sql -> execute();
$mssg = $sql -> fetchAll();

$sqql = $conn -> prepare("SELECT * FROM users");
$sqql -> execute();
$sms = $sqql -> fetchAll();

foreach($sms as $row){
    if(isset($_REQUEST)){
        if($_GET['id'] == $row['id']){
        ?>
            <?php foreach($mssg as $query_row):?>

                    <?php if($query_row['user_id'] == $row['id']):?>
                    <div id ="chat_data">
                    </div>
                    <div class="msg right-msg">
                        <div
                        class="msg-img"
                        style="background-image: url('./images/<?php echo $query_row['avatar']; ?>')"
                        ></div>

                        <div class="msg-bubble">
                        <div class="msg-info">
                            <div class="msg-info-name"><?php echo $query_row['name']; ?></div>
                            <div class="msg-info-time"><?php echo $query_row['date']; ?></div>
                        </div>

                        <div class="msg-text">
                            <?php echo $query_row['msg']; ?>
                        </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if($query_row['user_id'] != $_GET['id']):?>
                    <div id ="chat_data">
                    </div>
                    <div class="msg left-msg">
                        <div
                        class="msg-img"
                        style="background-image: url('./images/<?php echo $query_row['avatar']; ?>')"
                        ></div>

                        <div class="msg-bubble">
                        <div class="msg-info">
                            <div class="msg-info-name"><?php echo $query_row['name']; ?></div>
                            <div class="msg-info-time"><?php echo $query_row['date']; ?></div>
                        </div>

                        <div class="msg-text">
                            <?php echo $query_row['msg']; ?>
                        </div>
                        </div>
                    </div>
                <?php endif; ?>

            <?php endforeach; ?>

            <?php
        }
    }
}
