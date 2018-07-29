<!DOCTYPE html>
<html>
<head>
        <title>Beer Temp</title>
        <link href="styles.css" rel="stylesheet">
</head>
<body>
	<div>
		<h1>Beer Temp</h1>
	</div>

	<div id="menu">
	    <button =type"button"
	        onclick="document.getElementById('listTemps').style.display = 'block'">All
	    </button>

	    <button =type"button"
	    	onclick="document.getElementById('list24h').style.display = 'block'">24h
	    </button>

	    <button =type"button"
	        onclick="document.getElementById('ListLastHour').style.display = 'block'">Last Hour
	    </button>
 	</div>

        <p id="listTemps" style="display:none">
        <?php
        $servername = "localhost";
        $username = "WebService";
        $password = "password";
        $dbname = "temp_database";


        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT datetime, temperature FROM tempLog";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<b> Time: </b>" . $row["datetime"]. " -<b>  Temp: </b>" . $row["temperature"]. "<br>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
        </p>

        <p id="ListLastHour" style="display:none">
        <?php
        $servername = "localhost";
        $username = "WebService";
        $password = "password";
        $dbname = "temp_database";


        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT datetime, temperature FROM tempLog ORDER BY datetime DESC LIMIT 12";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<b> Time: </b>" . $row["datetime"]. " -<b>  Temp: </b>" . $row["temperature"]. "<br>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
        </p>


        <p id="list24h" style="display:none">
        <?php
        $servername = "localhost";
        $username = "WebService";
        $password = "password";
        $dbname = "temp_database";


        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT datetime, temperature FROM tempLog ORDER BY datetime DESC LIMIT 144";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<b> Time: </b>" . $row["datetime"]. " -<b>  Temp: </b>" . $row["temperature"]. "<br>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
        </p>

</body>
</html>
