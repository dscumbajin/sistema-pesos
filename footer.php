<div class="navbar navbar-footer navbar-fixed-bottom" style="display:flex;justify-content:center;padding:10px 20px; background:#f2f2f2;border:none!important; margin:auto">
    <div class="container" style="padding:10px;">
      <p class="navbar-footer pull-left" style="background:#f2f2f2; margin:auto; color:#666666">&copy <?php echo date('Y');?> - BATERIAS ECUADOR.
           <a href="http://bateriasecuador.com/" target="_blank" style="color: #666666; font-weigh:bold;">DERECHOS RESERVADOS</a>
           <div class="btn-group pull-right">
                <a href="https://web.facebook.com/bateriasecuador/" target="_blank"><i style="color:#666666 " class="sin fab fa-facebook x-3"></i></a> |
                <a href="https://www.youtube.com/channel/UC_KkHecfX2JmOHLsFNkISTA" target="_blank"><i style="color:#666666" class="sin fab fa-youtube"></i></a> |
                <a  href="https://www.instagram.com/baterias_ecuador/" target="_blank"><i style="color:#666666" class=" sin fab fa-instagram"></i></a>
            </div>
      </p>
   </div>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="js/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="js/moment.min.js"></script>
<script src="js/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="js/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="js/bootstrap-switch.min.js"></script>
<!-- DataTables -->
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap4.min.js"></script>
<script src="js/dataTables.responsive.min.js"></script>
<script src="js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/demo.js"></script>
<!--Dependencias adicionales-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<!--DataTables Custom-->
<script src="js/app.js"></script>
<script src="js/es.js"></script>

    <script>
   $(document).ready(function(){
      //Promise.resolve().then(functiontoRunVerySoonButNotNow);
		
        posicionarMenu();
 
        $(window).scroll(function() {    
            posicionarMenu();
        });
        
        function posicionarMenu() {
            var altura_del_header = $('.header').outerHeight(true);
            var altura_del_menu = $('.menu').outerHeight(true);
        
            if ($(window).scrollTop() >= altura_del_header){
                $('.menu').addClass('fixed');
                $('.wrapper').css('margin-top', (altura_del_menu) + 'px');
            } else {
                $('.menu').removeClass('fixed');
                $('.wrapper').css('margin-top', '0');
            }
        }
 
    })
  </script>

