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
                <p><button class="open-button" onclick="openMyInfo()">Edit My Info</button>
                <div class = "form-popup" id= "myInfo">
                    <form action = "includes/myInfo.inc.php" class = "form-container" method="post" required>
                    <h1>Edit My Information</h1>
                    <label for = "uid"><b>Username</b></label>
                    <input type = "text" name = "nuid" placeholder = "Username" required>
                    <p>
                    <label for = "mail"><b>New Email</b></label>
                    <input type = "text" name = "nmail" placeholder = "E-mail" required>
                    <p>
                    <label for = "pwd"><b>New Password</b></label>
                    <input type = "password" name = "npwd" placeholder = "New Password" required>
                    <p>
                    <label for = "pwd-repeat"><b>New Password</b></label>
                    <input type = "password" name = "npwd-repeat" placeholder = "Confirm New Password" required>
                    <p>
                    <button type= "submit" name="my-info" class= "btn">Edit My Info</button>
                    <button type = "button" class = "btn cancel" onclick = "closeMyInfo()">Close</button>
                    
                    </form>
                </div>
                <script>
                    function openMyInfo() {
                    document.getElementById("myInfo").style.display = "block";
                    }
                    function closeMyInfo() {
                    document.getElementById("myInfo").style.display = "none";
                    }
                </script>

            </div>  
            <div class="pet-info" style = "text-align: center;">
                <h1 style="text-align: center;">Pet Information</h1>
                <!-- <form style = "text-align: center;" action = "petinfo.php" method="post">

                <p><button type="submit" name="pet-info">Edit Pet Info</button>
                </form> -->
                <p><button class="open-button" onclick="openPetInfo()">Edit Pet Info</button>
                <div class = "form-popup" id= "petInfo">
                    <form action = "includes/petInfo.inc.php" class = "form-container" method="post" required>
                    <h1>Edit Pet Information</h1>
                    <label for = "pname"><b>Pet Name</b></label>
                    <input type = "text" name = "pname" placeholder = "Pet Name" required>
                    <p>
                    <label for = "type"><b>Pet Type&nbsp;&nbsp;</b></label>
                    <select name = "type" placeholder = "Pet Type" required>
                        <option value = "cat">Cat</option>
                        <option value = "dog">Dog</option>
                        <option value = "hamster">Hamster</option>
                        <option value = "hedgehog">Hedgehog</option>
                    </select>
                    <button type= "submit" name="pet-info" class= "btn">Add Pet Info</button>
                    <button type = "button" class = "btn cancel" onclick = "closePetInfo()">Close</button>
                    </form>
                </div>
                <script>
                    function openPetInfo() {
                    document.getElementById("petInfo").style.display = "block";
                    }
                    function closePetInfo() {
                    document.getElementById("petInfo").style.display = "none";
                    }
                </script>
            </div>
            </section>
        </section>
        </main>
        <!-- <footer id="main_footer">
            Copyright &copy;2020 by Taehee Kim, Seoyeon Ahn, Dayoung Lee, Seoyeong Han
        </footer> -->
