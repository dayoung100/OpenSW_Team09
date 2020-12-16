<?php
    require "header.php"
?> 
            
        <main>  
            <section id = "main_section">
                <div class = "login-index">
                    <?php
                        if(isset($_SESSION['userId'])){
                            echo '<p class="login-status">You are logged in!</p>';
                        }
                        else {
                            echo '<p class="logout-status">You are logged out!</p>';
                        }
                    ?>
                </div>
            </section>
        </main>
        <footer id="main_footer">
        Copyright &copy;2020 by Taehee Kim, Seoyeon Ahn, Dayoung Lee, Seoyeong Han
        </footer>