<fieldset>
    <legend>Tarjeta Principal</legend>
    <label for="destino">Destino</label>
        <input type="text" name="viaje[destino]" id="destino" placeholder="Pais o ciudad" value="<?php echo sanitizar($viaje->destino);?>">

    <label for="precio">Precio</label>
        <input type="number" name="viaje[precio]" id="precio" placeholder="Precio del paquete" value="<?php echo sanitizar( $viaje->precio);?>">

    <legend>Iconos</legend>
    <label for="icono 1">Icono 1</label>
        <input type="file" name="viaje[icono1]" id="icono1" accept="image/png, image/jpg" value="<?php echo $viaje->icono1;?>" >
    <label for="icono 2">Icono 2</label>
        <input type="file" name="viaje[icono2]" id="icono2" accept="image/png, image/jpg" value="<?php echo $viaje->icono2;?>" > 
    <label for="icono 3">Icono 3</label>
        <input type="file" name="viaje[icono3]" id="icono3" accept="image/png, image/jpg" value="<?php echo $viaje->icono3;?>" >

        <div class="imagenes-actualizacion">
            <?php if ($viaje->icono1):?>
                <img src="../../imagenes/<?php echo $viaje->icono1 ?>" class="imagen-small__icono">
            <?php endif; ?>
            <?php if ($viaje->icono2):?>
                <img src="../../imagenes/<?php echo $viaje->icono2 ?>" class="imagen-small__icono">
            <?php endif; ?>
            <?php if ($viaje->icono3):?>
                <img src="../../imagenes/<?php echo $viaje->icono3 ?>" class="imagen-small__icono">
            <?php endif; ?>
        </div>
    

</fieldset>

<fieldset>
    <legend>Tarjeta Informativa</legend>
    <label for="descripcion">Descripcion</label>
        <textarea name="viaje[descripcion]" id="descripcion"><?php echo sanitizar($viaje->descripcion); ?></textarea>

    <legend>Seccion Incluye</legend>
        <input type="text" name="viaje[aereos]" id="aereos" placeholder="Aereos" value="<?php echo sanitizar($viaje->aereos);?>">
        <input type="text" name="viaje[traslado]" id="traslado" placeholder="Traslado" value="<?php echo sanitizar($viaje->traslado);?>">
        <input type="text" name="viaje[hotel]" id="hotel" placeholder="Hotel" value="<?php echo sanitizar($viaje->hotel);?>">
        <input type="text" name="viaje[excursiones]" id="excursiones" placeholder="Excursiones" value="<?php echo sanitizar($viaje->excursiones);?>">
                        

    <label for="categoria">Categoria</label>
        <input type="text" name="viaje[categoria]" id="categoria" placeholder="Destacado o normal" value="<?php echo sanitizar($viaje->categoria);?>">

    <label for="continente">Continente</label>
        <input type="text" name="viaje[continente]" id="continente" placeholder="Continente" value="<?php echo sanitizar($viaje->continente);?>">

    <legend for="imagenes">Imagenes</legend>
    <label for="imagen 1">Imagen 1</label>
        <input type="file" name="viaje[imagen1]" id="imagen 1" accept="image/png, image/jpg, image/webp" value="<?php echo $viaje->imagen1;?>">
    <label for="imagen 2">Imagen 2</label>
        <input type="file" name="viaje[imagen2]" id="imagen 2" accept="image/png, image/jpg, image/webp" value="<?php echo $viaje->imagen2;?>">
    <label for="imagen 3">Imagen 3</label>
        <input type="file" name="viaje[imagen3]" id="imagen 3" accept="image/png, image/jpg, image/webp" value="<?php echo $viaje->imagen3;?>">

        <div class="imagenes-actualizacion">
            <?php if ($viaje->imagen1):?>
                <img src="../../imagenes/<?php echo $viaje->imagen1 ?>" class="imagen-small">
            <?php endif; ?>
            <?php if ($viaje->imagen2):?>
                <img src="../../imagenes/<?php echo $viaje->imagen2 ?>" class="imagen-small">
            <?php endif; ?>
            <?php if ($viaje->imagen3):?>
                <img src="../../imagenes/<?php echo $viaje->imagen3 ?>" class="imagen-small">
            <?php endif; ?>
        </div>
</fieldset>