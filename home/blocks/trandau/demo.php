<script type="text/javascript">
$(document).ready(function() {
    $("#loginLink").click(function( event ){
        event.preventDefault();
        $(".overlay").fadeToggle("fast");
    });
     
    $(".overlayLink").click(function(event){
        event.preventDefault();
        var action = $(this).attr('data-action');
         
        $.get( "ajax/" + action, function( data ) {
            $( ".login-content" ).html( data );
        }); 
         
        $(".overlay").fadeToggle("fast");
    });
     
    $(".close").click(function(){
        $(".overlay").fadeToggle("fast");
    });
     
    $(document).keyup(function(e) {
        if(e.keyCode == 27 && $(".overlay").css("display") != "none" ) { 
            event.preventDefault();
            $(".overlay").fadeToggle("fast");
        }
    });
});
</script>
<a href="" class="overlayLink" data-action="login-form.html">Log-in</a>
<div class="overlay" style="display: none;">
    <div class="login-wrapper">
        <div class="login-content">
            <a class="close">x</a>
            <h3>Sign in</h3>
            <form method="post" action="login.php">
                <label for="username">
                    Username:
                    <input type="text" name="username" id="username" placeholder="Username must be between 8 and 20 characters" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{8,20}$" required="required" />
                </label>
                <label for="password">
                    Password:
                    <input type="password" name="password" id="password" placeholder="Password must contain 1 uppercase, lowercase and number" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
                </label>
                <button type="submit">Sign in</button>
            </form>
        </div>
    </div>
</div>