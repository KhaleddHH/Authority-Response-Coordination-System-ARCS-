<html>
    <head>
    <link rel="stylesheet" href="styling/admin-dashboard-styling.css" />
        <link rel="stylesheet" href="css/style.css"> 
        <title>
            Login
        </title>
    </head>
    <body>
            <div class="login-wrapper">
                
                <div class="promo_card" style="width:80%;text-align:center;display:inline-block;">
          <h1>Welcome to Authority Response Coordination System (A.R.C.S.)</h1>
          <h2>The police dispatch and reporting system that will revolutionize law enforcement operations</h2>
        </div>
            <br/>
            <br><br>
            <h2>Login</h2>
            <br><br>
            <form action="pages/login.php" method="POST" id="login-form">
                <label for="username">Username</label>
                <br>
                <input type="text" name="username" id="username" class="text-field">
                <br>
                <label for="password">Password</label>
                <br>
                <input type="password" name="password" id="password" class="text-field">
                <br>
                
                <input type="button" value="Login" onclick="login()" id="login-button" class="submit-button">
                <br>
                <br>
            <p class="signup-prompt">Don't have an account? <a href="pages/signup.html">Sign Up</a></p>
        </div>  
        
    
<script>
    function login(){
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        if (username == ""|| password == ""){
            alert("Username or password missing");
        }else{
            document.getElementById("login-form").submit();
        }

    }
</script>
</body>
</html>