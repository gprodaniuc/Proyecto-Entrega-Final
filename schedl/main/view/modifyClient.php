<section id="seccion">
    <div id="contenedor">
        <h2 id="titlo_FormReg" class="colorLetras fuenteBorel">Modificar usuario</h2>
        <form action="updateClient.php" id="updateUser-Form" method="POST">
            <div>
                <input type="hidden" id="id"  name="id"  value="<?php echo $user['id']; ?>" required>
                <label class="fuenteAfacad" for='nombre'>Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="fuenteAfacad" placeholder="Nombre" value="<?php echo $user['nombre']; ?>" required>
            </div>
            <div>
                <label class="fuenteAfacad" for='edad'>Edad: </label>
                <input type="number" id="edad" name="edad" class="fuenteAfacad" placeholder="Edad" value="<?php echo $user['edad']; ?>" required>
            </div>
            <div>
                <label class="fuenteAfacad" for='nick'>Nick: </label>
                <input type="text" maxlength="8" id="nick" name="nick" class="fuenteAfacad" placeholder="Nick" value="<?php echo $user['nick']; ?>" required>
            </div>
            <div>
                <label class="fuenteAfacad" for='passw'>Contraseña: </label>
                <input type="text" minlength="5" id="passw" name="passw" class="fuenteAfacad" placeholder="Contraseña" required>
            </div>
            <button id="boton-updateUser" class="fuenteAfacad" type="submit">Confirmar</button>
        </form>
    </div>
</section>
