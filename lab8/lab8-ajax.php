<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>Lab 8</title>
    <style>
        html {
            background: beige;
        }

        body {
            width: 70vw;
            margin: 0 auto;
            padding: 0;
            font-size: 30px;
        }

        h1 {
            color: #111;
            font-family: 'Helvetica Neue', sans-serif;
            font-size: 50px;
            font-weight: bold;
            letter-spacing: -1px;
            line-height: 1;
            text-align: center;
            text-shadow: #FC0 1px 0 10px;
        }

        p {
            color: #685206;
            font-family: 'Helvetica Neue', sans-serif;
            font-size: 14px;
            line-height: 24px;
            margin: 0 0 24px;
            text-align: justify;
            text-justify: inter-word;
        }

        header, footer {
            background: antiquewhite;
            text-align: center;
            padding-top: 5px;
            display: flex;
            flex-direction: column;
            border-radius: 20px;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        .links li:hover {
            background-color: red;
        }

        nav {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        a {
            text-decoration: none;
        }

        .content-text {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        section {
            padding: 10px;
        }

        .content-img {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        }

        .content-img .img {
            border-radius: 20px;
        }

        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
    </style>
</head>
<body>
<header><span><h1>Eugene Kukhol Web 2</h1></span></header>
<section>
    <div class="content-text">
        <h2> Lab 8</h2>
        <div>
            <p><strong>IP Lookup</strong></p>
            <input type="text" name="ip" id="ip-input" placeholder="IP" title="Enter IP Address here"/>
            <input type="submit" value="IP Lookup" id="submit"/>
            <span id="validation-msg">[Invalid IP Address]</span>
            <br/>
            <div id="result">
                <br><span>Details for </span>
                <span id="ip"></span><br><br>
                <p><strong>Geolocation Info</strong></p>
                <span>Country code: </span>
                <span id="county-code"></span><br>
                <span>Flag:
                <img id="flag" src=""/>
            </span><br>
                <span>Region: </span>
                <span id="region"></span><br>
                <span>Region Name: </span>
                <span id="region-name"></span><br>
                <span>City: </span>
                <span id="city"></span><br>
                <span>Postal Code: </span>
                <span id="zip"></span><br>
                <span>Latitude: </span>
                <span id="latitude"></span><br>
                <span>Longitude: </span>
                <span id="longitude"></span><br>
            </div>
        </div>
        </br>
        <div>
            <li><a href="https://github.com/Eragoo/web-labs-4">Source code</a></li>
        </div>
        </br>
        </br>


        <h2> Lab links:</h2>
        <div>
            <ul>
                <li><a href="../index.php">Lab 1</a></li>
                <li><a href="../lab2/lab2.php">Lab 2</a></li>
                <li><a href="../lab3/lab3.php">Lab 3</a></li>
                <li><a href="../lab4/lab4.php">Lab 4</a></li>
                <li><a href="../lab5/lab5.php">Lab 5</a></li>
                <li><a href="../lab6/lab6.php">Lab 6</a></li>
                <li><a href="../lab7/lab7.php">Lab 7</a></li>
                <li><a href="../lab8/lab8-ajax.php">Lab 8 XML + JSON</a></li>
                <li><a href="../lab8/lab8-xml.php">Lab 8 AJAX</a></li>
            </ul>
        </div>
    </div>
</section>
<footer>
    <span><h1>My links</h1></span>
    <nav class="links">
        <ul>
            <li><a href="https://github.com/Eragoo">GITHUB</a></li>
            <li><a href="https://t.me/YevheniiKu">TELEGRAM</a></li>
            <li><a href="https://www.linkedin.com/in/eugene-kukhol-3b20a8179/?originalSubdomain=ua">LINKEDIN</a></li>
        </ul>
    </nav>
</footer>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    const ipInput = document.getElementById('ip-input');

    function onError(err) {
        console.error(err);
        $('#validation-msg').text(`[${err.reason || 'Ajax error'}]`);
        $('#validation-msg').css('color', (err.reason === 'Reserved IP Address') ? 'green' : 'red');
        $('#validation-msg').show();
        $('#result').css('display', 'block');
        $('#flag').attr('src', `./src/flags_ISO_3166-1/_unitednations.png`);
        $('#county-code').text('N/A');
        $('#region').text('N/A');
        $('#region-name').text('N/A');
        $('#city').text('N/A');
        $('#zip').text('N/A');
        $('#latitude').text('N/A');
        $('#longitude').text('N/A');
    }

    ipInput.addEventListener('keypress', function (e) {
        ipInput.value = ipInput.value.replace(/\s/g, '');
        if (ipInput.value.indexOf('.') !== -1 && /[^0-9.]/g.test(ipInput.value)) {
            ipInput.value = ipInput.value.replace(/[^0-9.]/g, '');
        }
        ipInput.value = ipInput.value.replace(/^\.{1}/, '');
        ipInput.value = ipInput.value.replace(/\.{2,}/g, '.');
        if (ipInput.value.split('.').length > 4 && ipInput.value.lastIndexOf('.') === ipInput.value.length - 1) {
            ipInput.value = ipInput.value.substr(0, ipInput.value.length - 1);
        }
        if (ipInput.value.length === 0 || /^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/.test(ipInput.value)) {
            $('#validation-msg').hide();
        } else {
            $('#validation-msg').show();
        }
    });

    $('#submit').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: `https://ipapi.co/${ipInput.value}/json/`,
            type: 'GET',
            dataType: 'json',
            crossDomain: true,
            success: function (res) {
                if (res.error) {
                    onError(res);
                    return;
                }
                $('#validation-msg').css('display', 'none');
                $('#result').css('display', 'block');
                $('#ip').text(res.ip);
                $('#flag').attr('src', `../src/flags_ISO_3166-1/${res.country_code.toLowerCase()}.png`);
                $('#county-code').text(res.country_code);
                $('#region').text(res.region_code);
                $('#region-name').text(res.region);
                $('#city').text(res.city);
                $('#zip').text(res.postal);
                $('#latitude').text(res.latitude);
                $('#longitude').text(res.longitude);
            },
            error: onError
        });
    });
</script>
</html>
