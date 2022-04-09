<?php

global $user_ID;
global $wpdb;


if(!$user_ID) {    
        if($_POST){
            $username = $wpdb->escape($_POST["username"]);
            $password = $wpdb->escape($_POST["password"]);
            $login_array = array();
            $login_array["user_login"] = $username;
            $login_array["user_password"] = $password;
          
            if(isset($_POST['remember'])){
                $login_array['remember'] =$_POST['remember'];
            }
          

           $verify_user =  wp_signon($login_array,false);
        
           if(!is_wp_error($verify_user)) {
            wp_set_current_user($user_ID, $username);
            do_action('set_current_user');
            echo "<script> window.location = '".site_url()."'</script>";
            exit();
           }

        } else {
            get_header(); 
            ?>
<main>
    <section class="signin">
        <div class="overlay">
            <div class="container flex-container">
                <div class="content-left">
                    <h1 class="signin__title" data-aos="zoom-in-left" data-aos-delay="1000"><span
                            class="highlight-blue">#1</span> Realtors In Barbados</h1>
                </div>
                <div class="content-right">
                    <form action="?" class="form__signup" data-aos="zoom-in" method="POST">
                        <h1 class="signup__title"><span class="highlight-colored">SignIn</span> Hoomz</h1>
                        <div class="form__signup__group">
                            <label for="username">Username</label>
                            <input type="text" name="username" placeholder="username" id="username"
                                class="signup_form_input">
                        </div>
                        <div class="form__signup__group">
                            <label for="password">password</label>
                            <input type="password" name="password" placeholder="password" id="password"
                                class="signup_form_input">
                        </div>


                        <div class="form__inline">
                            <span>
                                <input type="checkbox" name="remember" id="remember_me">
                                <label for="remember_me">Remember Me</label>
                            </span>
                            <a href="#" class="reset_password">Forgot Password ?</a>
                        </div>

                        <div class="form__signup__group">
                            <button class="btn--signin">Sign In</button>
                        </div>
                        <div class="form__signup__group-inline">
                            <a href="/"><img src="<?php echo get_theme_file_uri('/images/facebook.svg'); ?>" alt=""></a>
                            <a href="/"><img src="<?php echo get_theme_file_uri('/images/google.svg'); ?>" alt=""></a>
                        </div>
                        <div class="form__signup__group">
                            <p class="no-account-text">Don't have an account? <a href="/">Sign Up</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<?php 
    get_footer();
    } 
}  


?>