<?php
    require "header.php"
?> 

        <main>
        <section id= "main_section">
            <section id="settings">
            <div class = "account-info">
                <h1 style="text-align: center;">Account Information</h1>
                <form style = "text-align: center;" action = "myinfo.php" method="post">
                <p><button type="submit" name="change-info">Edit My Info</button>
                </form>
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
