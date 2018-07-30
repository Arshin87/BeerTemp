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

	<div id="menu" class="clearfix">
	    <button =type"button class="button" id="buttonAll"
	        onclick="toggle('listTemps')">All
	    </button>

	    <button =type"button class="button" id="button24H"
	    	onclick="toggle('list24h')">24h
	    </button>

	    <button =type"button class="button" id="buttonLastH"
	        onclick="toggle('ListLastHour')">Last Hour
	    </button>
 	</div>

 	<div id="main">

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
    </div>
        <script>
        	function toggle(a){
                
        		var x = document.getElementById(a);
	        	if (x.style.display === "none"){
	        			x.style.display = "block";
	        		} else {
	        			x.style.display = "none";
	        		}

        	}
            function cleanDiv(element){
                var x = document.getElementById(element);
                x.innerHTML = "";
            }
        </script>

</body>
</html>
