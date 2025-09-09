<div class="bg-container">
    <div class="card-container glass text-center">
        <h1>- Iniciar sesión -</h1>

        <form role="form" action="models/control.php" method="POST">
            <div class="row">
                <div class="col-12 form-group">
                    <label for="user" class="form-label">Usuario</label>
                    <input type="email" name="user" id="user" class="form-control" required>
                </div>
                <div class="col-12 form-group">
                    <label for="pass" class="form-label">Contraseña</label>
                    <input type="password" name="pass" id="pass" class="form-control" required>
                </div>
                <div class="col-12 form-group">
                    <br>
                    <input type="submit" id="send" class="col-5 btn btn-principal">
                </div>
            </div>
        </form>
    </div>
</div>