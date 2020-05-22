<footer>

    <label>
    <div class="fab"> 
        <img class="iconoBoton"  src='imagenes\Iconos\bulb.png'> 
    <?php
        if (!isset($_COOKIE["estiloWeb"]) || $_COOKIE["estiloWeb"] == "claro") {
                    echo '<input id="styleModeBulb" type="checkbox">';
                } else if (isset($_COOKIE["estiloWeb"]) && $_COOKIE["estiloWeb"] == "oscuro") {
                    echo '<input id="styleModeBulb" checked type="checkbox">';
                }
    ?>
    </div>
    </label>
    <h2 class="footerTitle"> Llevate BooxChange a todas partes </h2>

    <div class="footerTotal">

        <div class="footerImagen">
            <img src='imagenes/IconoInterNormal.png' alt=''>
        </div>

        <div class="footerSvg">
            <div class="footerSvgSvg">
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
                    <svg class="footersvgRojo" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 24c6.627 0 12-5.373 12-12S18.627 0 12 0 0 5.373 0 12s5.373 12 12 12zm5.47-16.231c.602.148 1.077.583 1.237 1.136C19 9.908 19 12 19 12s0 2.092-.293 3.095c-.16.553-.635.988-1.238 1.136C16.38 16.5 12 16.5 12 16.5s-4.378 0-5.47-.268c-.602-.149-1.077-.584-1.237-1.137C5 14.092 5 12 5 12s0-2.092.293-3.095c.16-.553.635-.988 1.237-1.136C7.622 7.5 12 7.5 12 7.5s4.378 0 5.47.269zM14.226 12l-3.659-1.9v3.8l3.66-1.9z" fill="#FFF"></path></svg>
                </a>
            </div>

            <div class="footerSvgSvg">
                <a href="https://twitter.com/BNE_biblioteca?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor">
                    <svg class="footersvgAzulClaro" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 24c6.627 0 12-5.373 12-12S18.627 0 12 0 0 5.373 0 12s5.373 12 12 12zm5.575-13.903c0 3.67-2.89 7.903-8.172 7.903v-.002A8.336 8.336 0 0 1 5 16.752a5.89 5.89 0 0 0 4.251-1.151c-.6-.01-1.18-.203-1.662-.548a2.785 2.785 0 0 1-1.022-1.38c.43.08.875.063 1.297-.048a2.891 2.891 0 0 1-1.654-.964 2.722 2.722 0 0 1-.65-1.759v-.035c.4.215.847.334 1.304.347A2.78 2.78 0 0 1 5.66 9.531a2.7 2.7 0 0 1 .314-2.024 8.11 8.11 0 0 0 2.641 2.06c1.02.5 2.137.786 3.28.842a2.695 2.695 0 0 1 .181-1.777 2.82 2.82 0 0 1 1.262-1.303 2.96 2.96 0 0 1 1.821-.292 2.907 2.907 0 0 1 1.63.838 5.876 5.876 0 0 0 1.824-.674 2.805 2.805 0 0 1-1.263 1.537A5.886 5.886 0 0 0 19 8.3a5.74 5.74 0 0 1-1.433 1.437c.008.12.008.239.008.36z" fill="#FFF"></path></svg>
                </a>
            </div>

            <div class="footerSvgSvg">
                <a href="https://media.metrolatam.com/2019/08/30/facebookelmememe-88461e19f33c79372e055a8d989ae099-1200x800.jpg">
                    <svg class="footersvgAzul" viewBox="0 0 24 24"><path d="M24 12c0-6.627-5.373-12-12-12S0 5.373 0 12c0 5.99 4.388 10.954 10.125 11.854V15.47H7.078V12h3.047V9.356c0-3.007 1.792-4.668 4.533-4.668 1.313 0 2.686.234 2.686.234v2.953H15.83c-1.491 0-1.956.925-1.956 1.874V12h3.328l-.532 3.469h-2.796v8.385C19.612 22.954 24 17.99 24 12z" fill="#FFF"></path></svg>
                </a>
            </div>

        </div>

        <p class="footerCopyright">Copyright © 2020 Booxchange. Todos los derechos reservados</p>

        <div class="footerA">

            <div class="footerBox">
                <a href="politicaDePrivacidad.php"> Política de privacidad </a>
            </div>

            <div class="footerBox">
                <a href="politicaDeCookies.php"> Política de cookies </a>
            </div>

            <div class="footerBox">
                <a href="quienesSomos.php"> Quiénes Somos </a>
            </div>

        </div>
    </div>

</footer>
