<html lang="en">
    <head>
        <title>inserting data</title>
    </head>
    <body>
        <form action="/get_table" method="post">
            <lable>Select database</lable>
            <select>
                <?php foreach ($databae as $databaes):?>
                    <option onchange="<?php $name =new User_Model();?>"><?php echo $databaes["Database"]?></option>
                <?php endforeach;?>
            </select>
<!--            --><?php
//                $query = new User_Model();
//                $result = $query->database->query("SHOW TABLES");
//                $result =$result->fetchAll(PDO::FETCH_ASSOC);
//                if($result):
//                    ?>
<!--                    <select>-->
<!--                        --><?php
//                            foreach ($result as $results){
//                                echo '<option value="', $results['Tables_in_a2d'], '">', $results['Tables_in_a2d'], '</option>';
//                            }
//                        ?>
<!--                    </select>-->
<!--                --><?php //endif ?>
        </form>
    </body>
</html>