{extends file='src/template/index.tpl'}


{block name=body}
    <body>
        <div class="container">
            <div class="top">
                <h1 id="title" class="hidden"><span id="logo">Your <span>Diary</span></span></h1>
            </div>
            <div class="login-box animated fadeInUp">
                <div class="box-header">
                    <h2>Log In</h2>
                </div>
                <form action="/fwg/login" method="post" id="login">
                    <label for="user">Username</label>
                    <br/>
                    <input id="checkname" type="text" name="user" onkeypress="return isAlfa(event)">
                    <br/>
                    <label for="password">Password</label>
                    <br/>
                    <input type="password" name="password">
                    <br/>
                    <input id="inputsubmit" type="submit" value="Log In">
                    <br/>
                </form>
                <a href="/fwg/registration"><p class="medium">No account? click here</p></a>
                <br/>

            </div>
        </div>
    </body>
{/block}