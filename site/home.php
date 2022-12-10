<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">

    <title>Home</title>
</head>

<body>
    <h1>ROCK PAPER SCISSORS</h1>
    <h3>Welcome <?php echo $_SESSION['username']; ?></h3>

    <a href="leaderboards.php">Check out the LeaderBoards</a>
    <br>
    <br>
    <form method="post" action="home.php">
        <label for="selection">Please select one</label>
        <br>
        <button name="sel_rock">rock</button>
        <button name="sel_paper">paper</button>
        <button name="sel_scissors">scissors</button>
    </form>

    <!-- <div>
        <p>-------------------------</p>
        1 = rock
        2 = paper
        3 = scissor
        <p>You Selected XXX</p>
        <p>Computer Selected XXX</p>
        <p><strong>XXX Wins</strong></p>
        <p>-------------------------</p>
    </div> -->

    <br>
    <br>
    <br>
    <br>

    <h3>Previous Match Data</h3>
    <table>
        <thead>
            <th>Match ID</th>
            <th>Date</th>
            <th>User Selection</th>
            <th>Computer Selection</th>
            <th>Winner</th>
        </thead>
        <tbody>
            <?php
                $uID = $_SESSION['userID'];
                $query = "SELECT * FROM matchData WHERE userid = '$uID' ORDER BY date ASC";
                $queryRun = mysqli_query($db, $query);
            
                if(mysqli_num_rows($queryRun) > 0){
                    foreach($queryRun as $row){
                        ?>
                        <tr>
                            <td><?php echo $row['matchID']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['userSelection']; ?></td>
                            <td><?php echo $row['cpuSelection']; ?></td>
                            <td><?php echo $row['winner']; ?></td>
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