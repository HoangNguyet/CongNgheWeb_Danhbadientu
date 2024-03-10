<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Add a black background color to the top navigation */
        .topnav {
            background-color: #333;
            overflow: hidden;
        }

        /* Style the links inside the navigation bar */
        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        /* Change the color of links on hover */
        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        /* Add a color to the active/current link */
        .topnav a.active {
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body>

<div class="topnav" id="myTopnav">
    <a href="#home" class="active" onclick="setActive(this)">Home</a>
    <a href="#news" onclick="setActive(this)">News</a>
    <a href="#contact" onclick="setActive(this)">Contact</a>
    <a href="#about" onclick="setActive(this)">About</a>
</div>

<script>
    function setActive(element) {
        // Lấy tất cả các thẻ a trong topnav
        var navItems = document.getElementsByClassName("topnav")[0].getElementsByTagName("a");

        // Loại bỏ lớp active từ tất cả các thẻ a
        for (var i = 0; i < navItems.length; i++) {
            navItems[i].classList.remove("active");
        }

        // Thêm lớp active cho thẻ a được nhấp vào
        element.classList.add("active");
    }
</script>

</body>
</html>
