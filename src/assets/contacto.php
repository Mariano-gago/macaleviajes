<?php include '../../includes/templates/header.php';?>

    <main>
        <div class="imagen-contacto">
        </div>
        <div class="titulo">
            <h2 class="titulo-lineas">Contacto</h2>
        </div>
        <section class="content">
            <form class="formulario">
                <fieldset>
                    <legend>Informacion Personal</legend>
    
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" placeholder="Tu Nombre">
    
                    <label for="apellido">Apellido</label>
                    <input type="text" id="apellido" placeholder="Tu Apellido">
    
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="Tu Email">
                    
                    <label for="telefono">Telefono</label>
                    <input type="tel" id="telefono" placeholder="Tu Telefono">
                    
                    <label for="mensaje">Consulta</label>
                    <textarea id="mensaje"></textarea>
                </fieldset>
            </form>
        </section>
        
    </main>

    <?php include '../../includes/templates/footer.php';?>


