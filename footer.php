<?php
    /*
        This is the template for footer
        @pckage mops
    */

?>

<footer id="footer" class="footer">
    <div class="container pt--50">
        <div class="footer__block">
            <div class="footer__items">
                <h4 class="footer__heading">Popularne wpisy</h4>
                <svg class="footer__svg" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="17 6 23 6 23 12"></polyline>
                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                </svg>
            </div>
            <div class="footer_arrow" data-page="1">
                <span class="arrow arrow__left"> <?php next_posts_link() ?></span>
                <span class="arrow arrow__right"><?php previous_posts_link() ?></span>
            </div>
        </div>


        <div class="row--4 footer__posts">

            <?php get_template_part('template-parts/content','popularpost');?>

        </div>


        <div class="footer__copyright">
            <div class="footer__copyrigt__text">
                <span>Copyright © 2022 MyOwnPhotoStory.pl |</span>
                <a href="">Polityka prywatności </a>|
                <span>Wdrożenie</span> <a href="">WiolipCreates</a>
            </div>

            <div class="socials socials--footer column__order">

                <a href="https://www.instagram.com/myownphotostory" target="_blank"><i
                        class="fab fa-instagram "></i></a>
                <a href="https://wiolipcreates.pl" target="_blank"><i class="fab fa-wordpress "></i></a>
                <a href="" target="_blank" class="social__item"><i class="fab fa-facebook"></i></a>
            </div>

        </div>
    </div>

</footer>


<div class="scroll__to-top" onclick="topFunction()" id="myBtn" title="Go to top">
    <button class="scroll--btn">
        <svg class="scroll--icon" width="15" height="15" viewBox="0 0 20 20">
            <path d="M10,0L9.4,0.6L0.8,9.1l1.2,1.2l7.1-7.1V20h1.7V3.3l7.1,7.1l1.2-1.2l-8.5-8.5L10,0z"></path>
        </svg>
    </button>
</div>




 <!-- /// mobile menu  -->

 <script>
        const body = document.querySelector("body");
        const navbar = document.querySelector(".navbar");
        const menuBtn = document.querySelector(".menu-btn");
        const cancelBtn = document.querySelector(".cancel-btn");
        menuBtn.onclick = () => {
            navbar.classList.add("show");
            menuBtn.classList.add("hide");
            body.classList.add("disabled");
        }
        cancelBtn.onclick = () => {
            body.classList.remove("disabled");
            navbar.classList.remove("show");
            menuBtn.classList.remove("hide");
        }
        window.onscroll = () => {
            this.scrollY > 20 ? navbar.classList.add("sticky") : navbar.classList.remove("sticky");
        }
    </script>


    <!-- ---------- scroll to top ------------- -->

    <script>
        mybutton = document.getElementById("myBtn");


        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }


        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>


<?php wp_footer(); ?>

</body>

</html>