
<div class="header">
    <div id="logo">
        <img src="assests/img/logo.jpg" alt="Cit Logo">
    </div>


</div>
<div id="map-canvas">
    
    
    </div>
<div id="wrapper">

    <div id="left">

        <form name="login" class="forms" id="logIn" action="<?php $this->student->login();  ?>" method="post">
            <h2>Log In</h2>
            <input type="text" class="input"  name="email" placeholder="Email"><br>
            <input type="password"  name="password" class="input" placeholder="Password"><br>
            <input type="submit" value="Login">
            <p class="orRegister">Or register</p>
        </form>


        <form name="register" class="forms" id="register" action="<?php $this->student->registration();  ?>" method="post">
            <h2>Enter details</h2>
            <input type="text" name="fName" placeholder="First Name"><br>
            <input type="text" name="lName" placeholder="Last Name"><br>
            <input type="text"  name="studentId" placeholder="Student ID"><br>
            <input type="email" name="email" placeholder="Email"><br>
            <input type="text" name="address" placeholder="Address"><br>
            <input type="text" name="phone" placeholder="phone"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="password" name="rpassword" placeholder="Re-enter Password"><br>
            <input type="submit" value="Sign Up">
            <p class="orSign">log in</p>
        </form>


    </div>

    <div id="right">

        <a class="twitter-timeline" width="399" height="399" data-link-color="#FAFAFA" data-border-color="#FAFAFA"  data-theme="light"
           href="https://twitter.com/CIT_Gym" data-widget-id="520628858203025408"></a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';
                if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";
                    fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>


    </div>
</div>