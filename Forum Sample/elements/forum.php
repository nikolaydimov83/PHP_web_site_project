        <?php

    $getter;
    $getter = new DatabaseGetter("test");
    $result = $getter->GetTable("forum_question");
    ?>

    <!-- // Start looping posts with polymer -->
    <?php while($rows=mysqli_fetch_assoc($result)){ ?>
        
        <forum-post <?php echo' id="', $rows['id'], '" topic="', $rows['topic'],'" views="', $rows['view'],'" replies="', $rows['reply'], '" date="', $rows['datetime'], '" onclick="openPost(this)"'; ?>></forum-post>
<?php } ?>
