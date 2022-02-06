<?php 
get_header(); 
?>


<main>
    <section class="signin">
        <div class="content-left"></div>
        <div class="content-right">
            <form action="#" class="form__signup" data-aos="zoom-in">
                <h1 class="signup__title"><span class="highlight-colored">SignIn</span> to Hoomz</h1>
                <div class="form__signup__group">
                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="username" id="username" class="signup_form_input">
                </div>
                <div class="form__signup__group">
                    <label for="password">password</label>
                    <input type="password" name="password" placeholder="password" id="password"
                        class="signup_form_input">
                </div>


                <div class="form__inline">
                    <span>
                        <input type="checkbox" name="rememberMe" id="remember_me">
                        <label for="remember_me">Remember Me</label>
                    </span>
                    <a href="#" class="reset_password">Forgot Password ?</a>
                </div>

                <div class="form__signup__group">
                    <button class="btn--signin">Sign In</button>
                </div>
                <div class="form__signup__group">
                    <p>Don't have an account? </p> <a href="/">Sign Up</a>
                </div>
            </form>
        </div>
    </section>
</main>


<?php
get_footer();
?>