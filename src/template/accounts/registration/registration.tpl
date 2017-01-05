{extends file='src/template/index.tpl'}

{block name=body}
    <body>
        <div class="container">
            <div class="top">
                <h1 id="title" class="hidden"><span id="logo">Your <span>Diary</span></span></h1>
            </div>
            <div class="login-box animated fadeInUp">
                <div class="box-header">
                    <h2>Registration</h2>
                </div>
                <form action="/fwg/registration/add" method="post" id="registration">
                    <label for="user">Username</label>
                    <br/>
                    <input id="checkname" type="text" name="user" onkeypress="return isAlfa(event)">
                    <br/>
                    <label for="password">Password</label>
                    <br/>
                    <input type="password" name="password">
                    <br/>
                    <label for="confirm_password">Confirm Password</label>
                    <br/>
                    <input type="password" name="confirm_password">
                    <br/>
                    <input id="inputsubmit" type="submit" value="Sign In">
                    <br/>
                </form>
                <div id='already_registered'>
                    <a href="/fwg/"><p class="medium">Already registered?</p></a>
                </div>
            </div>
        </div>
    </body>
{/block}