
<header>
    <div class="container">
        <nav class="navbar navbar-default" role="navigation">
            <div class="pull-right">
                <ul class="nav navbar-nav nav-tabs">
                    <li id="nav-login"><a data-toggle="modal" data-target="#modal_login" href="#"><span class="glyphicon glyphicon-user"></span>login</a></li>
                    <li id="nav-register"><a data-toggle="modal" data-target="#modal_register" href="#"><span class="glyphicon glyphicon-check"></span>register</a></li>
                    <li><a href="#">About Us</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h1 class="brand brand-text">Art Store</h1>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="navbar-collapse">
            <ul class="nav navbar-nav nav-tabs">
                <li><a href="homePage.php">Home</a></li>
                <li><a href="view.php">Art Works</a></li>
                <li><a href="search.php">search</a></li>
            </ul>
        </div>
        </nav>
    </div>
</header>

<div class="modal fade" id="modal_login" tabindex="-1" role="dialog"style="position: absolute;right: 600px">
    <div class="modal-dialog">
        <div class="modal-content card" style="position: relative;right: 250px">
            <br>
            <h1 class="modal-title">login</h1>
            <br><br>
            <div class="modal-body">
                <form role="form">
                    <div class="form-group">
                        <label>username</label>
                        <input type="text" name="username" id="login-user" onchange="loginnameIsnull()" required>
                    </div>
                    <div>
                        <label>password</label>
                        <input type="password" name="password" id="login-pass"onchange="loginpassIsnull()" required>
                    </div>
                    <br><br>
                    <div>
                        &nbsp;&nbsp;&nbsp;
                        <button class="btn btn-primary"  onclick="loginsubmit()">login</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-warning" data-dismiss="modal">cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_register" tabindex="-1" role="dialog"style="position: absolute;right: 600px">
    <div class="modal-dialog">
        <div class="modal-content card" style="position: relative;right: 250px">
            <br>
            <h1 class="modal-title">register</h1>
            <br><br>
            <div class="modal-body">
                <form role="form" id="reg_form" action="regcheck.php" method="post" >
                    <div class="form-group">
                        <label>username</label>
                        <input type="text" name="username" placeholder="4-10letters" id="reg-name" onchange="check_user()" required>
                    </div>
                    <div class="form-group">
                        <label>password</label>
                        <input type="password" name="password" placeholder="6-16num or letter and @." id="reg-pass" onchange="check_pass()" required>
                    </div>
                    <div class="form-group">
                        <label>confirm&nbsp;&nbsp;&nbsp;</label>
                        <input type="password" name="confirm" id="reg-confirm" onchange="check_same()" required>
                    </div>
                    <div class="form-group ">
                        <label>email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <input type="email" name="email" id="reg-email" onchange="check_email()" required>
                    </div>
                    <div class="form-group">
                        <label >phone&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <input type="text" name="phone"id="reg-phone" onchange="check_phone()" required>
                    </div>
                    <div class="form-group">
                        <label >address&nbsp;&nbsp;</label>
                        <select name="address">
                            <option value="shanghai">shanghai</option>
                            <option value="beijing">beijing</option>
                            <option value="guangzhou">guangzhou</option>
                        </select>
                    </div>
                    <div>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input class="btn btn-primary" type="Submit" name="Submit" value="register" onclick="check()">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-warning" data-dismiss="modal">cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
