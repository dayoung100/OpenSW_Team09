<?php
    require "header.php"
?> 

        <main>
        <section id= "main_section">
            <section id="settings">
            <div class = "account-info" style = "text-align: center;">
                <h1 style="text-align: center;">Account Information</h1>
                <!-- <form style = "text-align: center;" action = "myinfo.php" method="post"> -->
                <!-- <p><button type="submit" name="change-info">Edit My Info</button> -->
                <p><button class="open-button" onclick="openForm()">Edit My Info</button>
                <div class = "form-popup" id= "myInfo">
                    <form action = "includes/myInfo.inc.php" class = "form-container" method="post" required>
                    <h1>Edit My Information</h1>
                    <label for = "uid"><b>Username</b></label>
                    <input type = "text" name = "nuid" placeholder = "Username" required>
                    <p>
                    <label for = "mail"><b>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
                    <input type = "text" name = "nmail" placeholder = "E-mail" required>
                    <p>
                    <label for = "pwd"><b>Password</b></label>
                    <input type = "password" name = "npwd" placeholder = "Password" required>
                    <p>
                    <label for = "pwd-repeat"><b>Password</b></label>
                    <input type = "password" name = "npwd-repeat" placeholder = "Repeat Password" required>
                    <p>
                    <button type= "submit" name="my-info" class= "btn">Edit My Info</button>
                    <button type = "button" class = "btn cancel" onclick = "closeForm()">Close</button>
                    
                    </form>
                </div>
                <script>
                    function openForm() {
                    document.getElementById("myInfo").style.display = "block";
                    }
                    function closeForm() {
                    document.getElementById("myInfo").style.display = "none";
                    }
                </script>

            </div>  
            <div class="pet-info">
                <h1 style="text-align: center;">Pet Information</h1>
                <form style = "text-align: center;" action = "petinfo.php" method="post">

                <p><button type="submit" name="pet-info">Edit Pet Info</button>
                </form>
            </div>
            </section>
        </section>
        </main>
        <!-- <footer id="main_footer">
            Copyright &copy;2020 by Taehee Kim, Seoyeon Ahn, Dayoung Lee, Seoyeong Han
        </footer> -->
