<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeaderBoards</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">

</head>

<body>
    <h1>LeaderBoards</h1>

    <a href="home.php">back</a>

    <table>
        <thead>
            <th>Name</th>
            <th>Wins</th>
            <th>Losses</th>
            <th>Ties</th>
            <th>W/L Ratio</th>
        </thead>
        <tbody>
            <?php 
                $query = "SELECT * FROM users ORDER BY userWins DESC";
                $query_run = mysqli_query($db, $query);
                // $name = $_SESSION['username'];

                if(mysqli_num_rows($query_run) > 0 ){
                    foreach($query_run as $row){
                        $totalGames = $row['userWins'] + $row['userLoss'] + $row['userTies'];
                        if($totalGames == 0){ $gamesPlayed = 0; } else { $gamesPlayed = bcdiv($row['userWins'],$totalGames, 3 );}
                    
                        ?>
                        <tr>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['userWins']; ?></td>
                            <td><?php echo $row['userLoss']; ?></td>
                            <td><?php echo $row['userTies']; ?></td>
                            <td><?php   if($totalGames == 0){echo 0;} else { echo $gamesPlayed;}?></td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<h5>No Record Found</h5>";
                }
            ?>


        </tbody>
    </table>

</body>

</html>