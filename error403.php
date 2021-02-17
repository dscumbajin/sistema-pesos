
<!DOCTYPE html>
<html lang=&quot;es&quot;>
<title title="Error 401"></title>
     <head>
		<meta http-equiv=&quot;Content-Type&quot; content=&quot;text/html; charset=utf-8&quot; />
		
        <style>
            ::-moz-selection {background: #b3d4fc; text-shadow: none;}
            ::selection {background: #b3d4fc; text-shadow: none;}
            html {padding: 30px 10px; font-size: 16px; line-height: 1.4; color: #737373; background: #f0f0f0;
                -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;}
            html,
            input {font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;}
            body {max-width:700px; _width: 700px; padding: 30px 20px 50px; border: 1px solid #b3b3b3;
                border-radius: 4px;margin: 0 auto; box-shadow: 0 1px 10px #a7a7a7, inset 0 1px 0 #fff;
                background: #fcfcfc;}
            h1 {margin: 0 10px; font-size: 50px; text-align: center;}
            h1 span {color: #bbb;}
            h2 {color: #495560;margin: 0 10px;font-size: 40px;text-align: center;}
            h2 span {color: #bbb;font-size: 80px;}
            h3 {margin: 1.5em 0 0.5em;}
            p {margin: 1em 0;}
            ul {padding: 0 0 0 40px;margin: 1em 0;}
            .container {max-width: 380px;_width: 480px;margin: 0 auto;}
            input::-moz-focus-inner {padding: 0;border: 0;}
        </style>
        <?php include('head.php'); ?>
        <script>
            function returnlogin(){
                location.href="login.php";
            }
        </script>
    </head>
    <body  style="margin:auto;">
        <div class=&quot;container&quot; style="margin:auto;">
            <h2 style="display:flex;flex-direction:column;margin-top:20px;margin-bottom:20px;"><span style="color:#fd3c3d;font-size:45px;margin-top:20px;margin-bottom:20px;">Error: 401</span>Usuario no autorizado para acceder ha esta area</h2>
            <p>¡Vaya! Algo salió mal.<br /><br />Trata de volver a cargar esta página o no dudes en contactar con nosotros si el problema persiste.</p>
            <button type="button" class="btn btn-lg btn-danger btn-signin" onclick="returnlogin()" style="margin-left:10px;" name="login" id="submit">Regresar</button>
        </div>
    </body>
</html>

