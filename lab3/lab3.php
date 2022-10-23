<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>Lab 2</title>
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
        <h2> Lab 3</h2>
        <div>
            <form action="submit.php" , method="post">
                <?php
                $f = fopen("napr.txt", 'r');
                $text = fread($f, filesize("napr.txt"));
                fclose($f);

                $lines = preg_split('/\n|\r\n?/', $text);


                for ($i = 0; $i < count($lines); $i++) {
                    $value = $lines[$i];
                    echo "<input type = \"checkbox\" name = 'napr' value=" . $value . ">" . $value . "</input></br>";
                }
                ?>
                <input type="submit">
            </form>
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
</html>

