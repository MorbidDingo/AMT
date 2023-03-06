<?php
    include('../home/head.php');
    include('../home/header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Python compiler</title>
</head>
<body>
    <div class="header">
    <a href="../Editor/enterAutomation.php" class="btn btn-primary">< Back</a>
        <h1>Python Compiler</h1>
        <button class="run" id="run">Run</button>
        <textarea id="name" placeholder="Enter filename"></textarea>
        <button class="run" id="save">Save</button>
    </div>
    <div class="editor" id="editor"></div>
    <h3 class="input-header">Input</h3>
    <textarea name="input" id="input"></textarea>
    <h3 class="output-header">Output</h3>
    <div class="code_output" id="code_output"></div>

    <script src="script/library/ace.js"></script>
    <script src="script/library/theme-cobalt.js"></script>
    <script src="script/jquery-3.6.0.min.js"></script>
    <script src="script/script.js"></script>
    

</body>
</html>