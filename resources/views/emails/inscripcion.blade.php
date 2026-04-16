<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inscripción confirmada</title>
</head>
<body style="margin:0; padding:0; background-color:#f4f6f9; font-family:Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center">

                <!-- CONTENEDOR -->
                <table width="600" style="background:white; margin-top:40px; border-radius:10px; overflow:hidden; box-shadow:0 5px 15px rgba(0,0,0,0.1);">

                    <!-- HEADER -->
                    <tr>
                        <td style="background:#0d6efd; color:white; padding:20px; text-align:center;">
                            <h2 style="margin:0;"> SIIFIV</h2>
                            <p style="margin:5px 0 0;">Inscripción confirmada</p>
                        </td>
                    </tr>

                    <!-- CONTENIDO -->
                    <tr>
                        <td style="padding:30px; color:#333;">

                            <h3>Hola {{ $usuario->name }} </h3>

                            <p>
                                Te has inscrito exitosamente al siguiente taller:
                            </p>

                            <!-- CARD DEL TALLER -->
                            <div style="background:#f8f9fa; padding:15px; border-radius:8px; margin:20px 0;">
                                <strong>{{ $taller->nombre }}</strong><br>
                                <small>{{ $taller->descripcion }}</small>
                            </div>

                            <p>
                                <strong>Fecha:</strong> {{ $taller->fecha_inicio }} - {{ $taller->fecha_fin }}
                            </p>

                            <p>
                                ¡Nos alegra tenerte con nosotros! 
                            </p>

                            <!-- BOTÓN -->
                            <div style="text-align:center; margin-top:30px;">
                                <a href="http://127.0.0.1:8000/mis-talleres"
                                   style="background:#198754; color:white; padding:12px 25px; text-decoration:none; border-radius:6px; display:inline-block;">
                                    Ver mis talleres
                                </a>
                            </div>

                        </td>
                    </tr>

                    <!-- FOOTER -->
                    <tr>
                        <td style="background:#f1f1f1; text-align:center; padding:15px; font-size:12px; color:#777;">
                            © {{ date('Y') }} SIIFIV - Todos los derechos reservados
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>