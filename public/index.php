

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">   
</head>
<body>
    <?php require_once 'process.php'; ?>

    <?php 
        $mysqli = new mysqli('localhost', 'root', '', 'todolist') or die (mysqli_error($mysqli));
        
         $result = $mysqli->query("SELECT * FROM todolist");   ?>
    
    

        <div>
            <table>
                <thead>
                    <tr class ="subheadline">
                        <th>Task</th>
                        <th>Description</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
            <?php
               while ($row = $result->fetch_assoc()): ?>
               <tr> 
                    <td><?php echo $row['tasks']; ?></td>
                    <td><?php echo $row['describer']; ?></td>
                     

                    <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                         <a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
                         <a href="index.php?delete=<?php echo $row['id']; ?> " class="del_btn" >Delete</a>
                         <a href="index.php?complete_id=<?php echo $row['id']; ?> " class="done_btn" >Completed</a>
                        </td>
                </tr>
            <?php endwhile; ?>
            </table>
        </div>
            
    <form action="process.php" method="POST">
        
                <section class= ></section>
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <label for="task">Task</label>
        <input type="text" name="task" 
            value="<?php echo $tasks; ?>" placeholder="Enter task">
        <label for="description">Description</label>
        <input type="text" name="describe" 
            value="<?php echo $describe ?>" placeholder="Describe your task">
        
        <?php 
        if ($update == true) :
        ?>

            <button type="submit" name="update" class="btn">Update</button>
        <?php else: ?>
            <button type="submit" name="save" class="btn">Save</button>
        <?php endif; ?>
    
    </form>
    
</body>
</html>