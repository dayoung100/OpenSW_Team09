<?php
    require "header.php"
?> 
            
        <main>  
            <section id = "index">
                <div class = "login-index">
                    <?php
                        if(isset($_SESSION['userId'])){
                            echo '<p class="login-status">You are currently logged in!</p>';
                        }
                        else {
                            echo '<p class="logout-status">You are currently logged out!</p>';
                        }
                    ?>
                </div>
            </section>
            <section id = "main_section">
                <iframe  style = "border: none;" src ="main.html" height ="800" width = "100%"></iframe>
            </section>
        </main>
        <!-- <footer id="main_footer">
        Copyright &copy;2020 by Taehee Kim, Seoyeon Ahn, Dayoung Lee, Seoyeong Han
        </footer> -->