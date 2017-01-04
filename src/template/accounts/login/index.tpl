{extends file='src/template/accounts/index.tpl'}


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
                <label for="username">Username</label>
                <br/>
                <input type="text" id="username">
                <br/>
                <label for="password">Password</label>
                <br/>
                <input type="password" id="password">
                <br/>
                <button type="submit">Sign In</button>
                <br/>
                <a href="/fwg/registration"><p class="medium">No account? click here<p></a>
                <br/>

                <a href="#"><p class="medium">Forgot your password?</p></a>

            </div>
        </div>
    </body>
{/block}