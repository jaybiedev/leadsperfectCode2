<div class="card card-outline-secondary">
    <div class="card-header">
        <h3 class="mb-0">Form Title</h3>
    </div>
    <div class="card-body">
        <form class="form" role="form" autocomplete="off" id="formID" novalidate="" method="POST">
            <div class="form-group">
                <label for="uname1">Username</label>
                <input type="text" class="form-control" name="uname1" id="uname1" required="">
                <div class="invalid-feedback">Please enter your username or email</div>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" id="pwd1" required="" autocomplete="new-password">
                <div class="invalid-feedback">Please enter a password</div>
            </div>
            <div class="form-check small">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input"> <span>Remember me on this computer</span>
                </label>
            </div>
            <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Login</button>
        </form>
    </div>
    <!--/card-body-->
</div>