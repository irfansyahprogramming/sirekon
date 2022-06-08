<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo base_url();?>tools/images/logo_unj.png" type="image/ico" />
    <title> SI-REKON </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url();?>vendors/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>tools/css/sweetalert2.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
	  
		
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
			
            <form id="form_login">
			  <h1><img src="<?php echo base_url();?>tools/images/logo_unj.png" width="50px" height="auto"> Universitas Negeri Jakarta</h1>
              <h1>Masuk Akun SI-REKON</h1>
              <?php
                $info = $this->session->flashdata('info');
                if(!empty($info))
                {
                  echo $info;
                }
              ?>
              <div>
                <input type="text" id="username" name="username" class="form-control" placeholder="User Login Anda" required />
              </div>
              <div>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password Anda" required />
              </div>
              <div>
                <label for="security" class="control-label">Pertanyaan keamanan <b class="text-danger">*</b></label>
                <div  class = "security-field" style="background-color:#888844;color:#fff;padding:20px;">
                  Berapakah 1+2?
                </div>
                <input type="hidden" name="captcha_id"  id="captcha_id"/>
                <span class="block input-icon input-icon-right">
                  <input type="text" class="form-control" id="security" name="captcha" placeholder="Jawaban" required/>
                </span>
              </div>
              <div>
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-users"></i>&nbsp;Masuk</button>
                <!--<a class="btn btn-default btnLogin" href="#">Masuk</a>-->
                <!--<a class="reset_pass" href="#">Lupa Password?</a>-->
              </div>
              
              <div class="clearfix"></div>

              <div class="separator">
                <!--
                <p class="change_link">Anggota baru ?
                  <a href="#signup" class="to_register"> Buat Akun </a>
                </p>
                -->
                <div class="clearfix"></div>
                <br />
                
                <div>
                  <p>©2019 Modified By UNJ. Power by Gentelella Alela!</p>
                </div>
              </div>
            </form>
          </section>
        </div>
        <!--
        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Akun Baru</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Sudah punya akun ?
                  <a href="#signin" class="to_register"> Masuk Akun </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Universitas Negeri Jakarta</h1>
                  <p>©2019 Modified By UNJ. Power by Gentelella Alela!</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      -->
      </div>
    </div>
    <!--<script src="<?php echo base_url();?>assets/js/jquery.2.1.1.min.js"></script>-->
    <script src="<?php echo base_url();?>vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>tools/js/sweetalert2.js"></script>
    <script src="<?php echo base_url();?>tools/js/master_api.js"></script>
    <script type="text/javascript">
      
      //var serviceAPI = 'http://localhost/rest_server/';
      getCapctha();

      $(document).ready(function() {
        /*Login Form*/
        $('#form_login').submit(function(event) {

          event.preventDefault();
          $(this).blur();
          $('input').blur();
          loaderOn();
          
          var $u = document.getElementById('username').value;
          var $p = document.getElementById('password').value;
          var $s = document.getElementById('security').value;
          var $k = document.getElementById('captcha_id').value;
          
          if ($u == ''){
            loaderOff();
            alert ('Username masih kosong');
            document.getElementById('username').focus();
            return false;
          }
          if ($p == ''){
            loaderOff();
            alert ('Password masih kosong');
            document.getElementById('password').focus();
            return false;
          }
          if ($s == ''){
            loaderOff();
            alert ('Pertanyaan Keamanan masih kosong');
            document.getElementById('security').focus();
            return false;
          }
          
          var asdf = $(this).serialize();

          $.ajax({
            url: serviceAPI+'/api/pengelolaanDB/login',
            type: 'post',
            data: asdf,
            success: function(res){
              loaderOff();
              swal({
                title: 'Login',
                html: 'Anda berhasil Login.',
                type: 'success',
                showConfirmButton: false,
                timer: 2000
              })
              .then(
                function () {
                  if (res.status == true){
                    window.location.href = '<?php echo base_url(); ?>home'; 
                  }else{
                    window.location.href = '<?php echo base_url(); ?>home'; 
                  }
                  
                },
                function (dismiss) {
                  if (res.status == true){
                    window.location.href = '<?php echo base_url(); ?>home'; 
                  }else{
                    window.location.href = '<?php echo base_url(); ?>home'; 
                  }
                }
              );
            },
            error: function(res){
              loaderOff();
              swal({
                title: 'Gagal Login',
                text: 'Userid atau Password anda tidak benar',
                type: 'error',
                confirmButtonColor: '#d33',
                confirmButtonText: 'Reload'
              })
              .then(
                function () {
                  window.location.reload();
                },
                function (dismiss) {
                  window.location.reload();
                }
              );
            }
          })
        });

        //Reset
        $('.reset_pass').click(function() {
          reset_pass();
          alert('Silahkan Cek Email anda');
        });

      });

      

    </script>
  </body>
</html>
