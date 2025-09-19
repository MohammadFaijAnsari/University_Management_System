<html>
<head>
    <title>Ajax Example</title>
    <script>
        var xmlhttp = null;

        function find_student(txt) {
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest(); 
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("res").innerHTML = xmlhttp.responseText;
                }
            };

            xmlhttp.open("GET", "server.php?st_name=" + encodeURIComponent(txt), true);
            xmlhttp.send();
        }
    </script>
</head>
<body>
    <div id="res"></div>
    Enter Student:
    <input type="text" id="st_name" name="st_name" /><br />
    <input type="button" value="Check Availability" onclick="find_student(document.getElementById('st_name').value);" />
</body>
</html>
