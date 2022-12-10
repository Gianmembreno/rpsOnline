<?php 
include('config.php');

session_start();
$errors = array();

if (isset($_POST['reg_user'])) {
    // SQL injections
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

	// Ensuring that the user has not left any input field blank
	// error messages will be displayed for every blank input
	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($email)) { array_push($errors, "Email is required"); }
	if (empty($password)) { array_push($errors, "Password is required"); }

    if ($password != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

    if (count($errors) == 0) {
		$query = "INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')";
		mysqli_query($db, $query);

		// Storing username of the logged in user,in the session variable
		$_SESSION['username'] = $username;

        $query = "SELECT * FROM users WHERE username= '$username' AND password='$password'";
        $result2 = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result2);
        $_SESSION['userID'] = $row['userID'];
        $_SESSION['userWins'] = $row['userWins'];
        $_SESSION['userLoss'] = $row['userLoss'];
        $_SESSION['userTies'] = $row['userTies'];

		$_SESSION['success'] = "You have logged in";

		header('location: home.php');
	}
}

if (isset($_POST['login_user'])) {
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	if (count($errors) == 0) {
		
		$query = "SELECT * FROM users WHERE username= '$username' AND password='$password'";
		$results = mysqli_query($db, $query);

		// $results = 1 means that one user with the
		// entered username exists
		if (mysqli_num_rows($results) == 1) {
			$_SESSION['username'] = $username;

            $query = "SELECT * FROM users WHERE username= '$username' AND password='$password'";
            $result2 = mysqli_query($db, $query);
            $row = mysqli_fetch_array($result2);
            $_SESSION['userID'] = $row['userID'];
            $_SESSION['userWins'] = $row['userWins'];
            $_SESSION['userLoss'] = $row['userLoss'];
            $_SESSION['userTies'] = $row['userTies'];

			$_SESSION['success'] = "You have logged in!";
			header('location: home.php');
		}
		else {
			array_push($errors, "Username or password incorrect");
		}
	}
}

if (isset($_POST['loginPage'])){
    header('location: login.php');
}

if (isset($_POST['signupPage'])){
    header('location: signup.php');

}

if (isset($_POST['sel_rock'])){
    $username = $_SESSION['username'];
    $date = date('Y-m-d H:i:s');
    $userSel = 'rock';
    $uID = $_SESSION['userID'];
    $uWin = $_SESSION['userWins'];
    $uLoss = $_SESSION['userLoss'];
    $uTie = $_SESSION['userTies'];

    $usr = 1;
    $cpu = rand(1,3);

    if($cpu == 1){
        $cpuSel = 'rock';
        $winner = 'tie';
        $uTie = $uTie + 1;

    } elseif ($cpu == 2){
        $cpuSel = 'paper';
        $winner = 'cpu';
        $uLoss = $uLoss + 1;

    } elseif ($cpu == 3){
        $cpuSel = 'scissor';
        $winner = $username;
        $uWin = $uWin + 1;
    }

    $_SESSION['userWins'] = $uWin;
    $_SESSION['userLoss'] = $uLoss;
    $_SESSION['userTies'] = $uTie;

    $gameQuery = "INSERT INTO matchData (username, date, matchID, userSelection, cpuSelection, userID, winner) 
    VALUES ('$username', '$date', null, '$userSel', '$cpuSel', '$uID', '$winner')";
    $userQuery = "";
    mysqli_query($db, $gameQuery);

    $userQuery = "UPDATE users set userWins = '$uWin', userLoss = '$uLoss', userTies = '$uTie' WHERE userID = '$uID'";
    mysqli_query($db, $userQuery);
    header("Refresh:0");

}

if (isset($_POST['sel_paper'])){
    $username = $_SESSION['username'];
    $date = date('Y-m-d H:i:s');
    $userSel = 'paper';
    $uID = $_SESSION['userID'];
    $uWin = $_SESSION['userWins'];
    $uLoss = $_SESSION['userLoss'];
    $uTie = $_SESSION['userTies'];

    $usr = 2;
    $cpu = rand(1,3);

    if($cpu == 1){
        $cpuSel = 'rock';
        $winner = $username;
        $uWin = $uWin + 1;

    } elseif ($cpu == 2){
        $cpuSel = 'paper';
        $winner = 'tie';
        $uTie = $uTie + 1;

    } elseif ($cpu == 3){
        $cpuSel = 'scissor';
        $winner = 'cpu';
        $uLoss = $uLoss + 1;
    }

    $_SESSION['userWins'] = $uWin;
    $_SESSION['userLoss'] = $uLoss;
    $_SESSION['userTies'] = $uTie;

    $gameQuery = "INSERT INTO matchData (username, date, matchID, userSelection, cpuSelection, userID, winner) 
    VALUES ('$username', '$date', null, '$userSel', '$cpuSel', '$uID', '$winner')";
    $userQuery = "";
    mysqli_query($db, $gameQuery);

    $userQuery = "UPDATE users set userWins = '$uWin', userLoss = '$uLoss', userTies = '$uTie' WHERE userID = '$uID'";
    mysqli_query($db, $userQuery);
    header("Refresh:0");
}

if (isset($_POST['sel_scissors'])){
    $username = $_SESSION['username'];
    $date = date('Y-m-d H:i:s');
    $userSel = 'scissor';
    $uID = $_SESSION['userID'];
    $uWin = $_SESSION['userWins'];
    $uLoss = $_SESSION['userLoss'];
    $uTie = $_SESSION['userTies'];


    $usr = 3;
    $cpu = rand(1,3);

    if($cpu == 1){
        $cpuSel = 'rock';
        $winner = 'cpu';
        $uLoss = $uLoss + 1;

    } elseif ($cpu == 2){
        $cpuSel = 'paper';
        $winner = $username;
        $uWin = $uWin + 1;

    } elseif ($cpu == 3){
        $cpuSel = 'scissor';
        $winner = 'tie';
        $uTie = $uTie + 1;

    }

    $_SESSION['userWins'] = $uWin;
    $_SESSION['userLoss'] = $uLoss;
    $_SESSION['userTies'] = $uTie;

    $gameQuery = "INSERT INTO matchData (username, date, matchID, userSelection, cpuSelection, userID, winner) 
    VALUES ('$username', '$date', null, '$userSel', '$cpuSel', '$uID', '$winner')";
    $userQuery = "";
    mysqli_query($db, $gameQuery);

    $userQuery = "UPDATE users set userWins = '$uWin', userLoss = '$uLoss', userTies = '$uTie' WHERE userID = '$uID'";
    mysqli_query($db, $userQuery);
    header("Refresh:0");

}


?>