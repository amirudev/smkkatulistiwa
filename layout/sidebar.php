<aside>
    <div class="d-flex m-3">
        <button class="btn btn-primary me-1" id="form-login-admin-button">Admin</button>
        <button class="btn btn-primary me-1" id="form-login-siswa-button">Siswa</button>
        <button class="btn btn-primary me-1" id="form-login-guru-button">Guru</button>
    </div>
    <div>
        <div class="m-3">
            <form id="form-login-admin" method="POST" action="controller/admin_controller.php">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Masukkan Username Anda"
                               autocomplete="off" required="required" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password"
                               placeholder="Masukkan Password Anda" autocomplete="off" required="required"
                               name="password">
                    </div>
                </div>
                <input type="submit" value="Login Admin" name="role" class="btn btn-primary w-100"/>
            </form>
            <form id="form-login-siswa" method="POST" action="controller/siswa_controller.php">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Masukkan Username Anda"
                               autocomplete="off" required="required" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password"
                               placeholder="Masukkan Password Anda" autocomplete="off" required="required"
                               name="password">
                    </div>
                </div>
                <input type="submit" value="Login Siswa" name="role" class="btn btn-primary w-100"/>
            </form>
            <form id="form-login-guru" method="POST" action="controller/guru_controller.php">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Masukkan Username Anda"
                               autocomplete="off" required="required" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password"
                               placeholder="Masukkan Password Anda" autocomplete="off" required="required"
                               name="password">
                    </div>
                </div>
                <input type="submit" value="Login Guru" name="role" class="btn btn-primary w-100"/>
            </form>
        </div>
    </div>
</aside>