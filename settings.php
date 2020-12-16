<?php
    require "header.php"
?> 

        <main>
        <section id= "main_section">
            <section id="settings">
            <div class = "account-info">
                <h1 style="text-align: center;">Account Information</h1>
                <form action = "includes/editinfo.inc.php" method="post">

                <p>Username
                <input type="text" placeholder="Enter Username" name="uid" id="uid" required>

                <p>Email
                <input type="text" placeholder="Enter Email" name="mail" id="mail" required>

                <p>Password
                <input type="password" placeholder="Enter Password" name="pwd" id="pwd" required>

                <p>Confirm Changed Password
                <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>

                <p><button type="submit" name="change-info">Change My Info</button>
                </form>
            </div>  
            <p>
            <div class="pet-info">
                <h1 style="text-align: center;">Pet Information</h1>
                <form action = "includes/petinfo.inc.php" method="post">

                <p>Name
                <input type="text" placeholder="Enter Username" name="uid" id="uid" required>

                <p>Type
                <input type="text" placeholder="Enter Email" name="mail" id="mail" required>

                <p>Breed
                <input type="password" placeholder="Enter Password" name="pwd" id="pwd" required>

                <p>Birthday
                <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>

                <p><button type="submit" name="pet-info">Add Pet</button>
                </form>
            </div>
        </section>
        </section>
        </main>
        <footer id="main_footer">
            Copyright &copy;2020 by Taehee Kim, Seoyeon Ahn, Dayoung Lee, Seoyeong Han
        </footer>
