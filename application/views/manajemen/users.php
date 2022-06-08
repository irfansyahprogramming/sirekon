<!-- 
<link href="<?php echo base_url();?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css" rel="stylesheet">
 -->

<div class="page-title">
    <div class="title_left">
        <h3>Manajemen <small><i class="fa fa-arrows-right"></i><span class="fa fa-long-arrow-right"></span> User</small></h3>
    </div>
</div>

<div class="">
	<div class="x_panel">
        <div class="x_title">
            <h2>DAFTAR USER</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                <!--<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a></li>
                        <li><a href="#">Settings 2</a></li>
                    </ul>
                </li>-->
               	<li><a class="close-link"><i class="fa fa-close"></i></a></li>
            </ul>
        	<div class="clearfix"></div>
     	</div>

		<div class="x_content">
		    <p class="text-muted font-13 m-b-30">
		    	<button id="btnTambah" class="btn btn-success"><i class="fa fa-plus"></i> Tambah User</button>
		    </p>
		    <table id="datatable" class="table table-striped table-bordered">
		    	<thead>
		    		<tr>
		            	<th>Usernama</th>
		                <th>Nama</th>
		                <th>Email</th>
		                <th>Kelamin</th>
		                <th>Mode</th>
		                <th>Foto</th>
		                <th>Aksi</th>
		            </tr>
		        </thead>
				<tbody>
				</tbody>
				<tfoot>
					<tr>
		            	<th>Usernama</th>
		                <th>Nama</th>
		                <th>Email</th>
		                <th>Kelamin</th>
		                <th>Mode</th>
		                <th>Foto</th>
		                <th>Aksi</th>
		            </tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
<div id="modal-user" class="modal user" role="dialog" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<span class="white">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Tambah User</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<form id="formUser" method="post">
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<label for="username">Username<font color="red">*</font></label>
								<div>
									<input type="text" id="username" placeholder="Username" class="form-control" name="username" required/>
									</div>
								</div>
								<div class="form-group">
									<label for="password">Password<font color="red">*</font></label>
									<div>
										<input type="text" placeholder="Password" name="password" id="password" class="form-control" required/>
									</div>
								</div>
								<div class="form-group">
									<label for="nama">Nama Lengkap<font color="red">*</font></label>
									<div>
										<input type="text" placeholder="Nama User" name="nama" id="nama" class="form-control" required/>
									</div>
								</div>
								<div class="form-group">
									<label for="email">Email<font color="red">*</font></label>
									<div>
										<input type="text" placeholder="Email" name="email" id="email" class="form-control" required/>
									</div>
								</div>
								<div class="form-group">
			            			<label for="foto" class="control-label">File Gambar Berita </label>
			            			<input 	type="file" class="foto" id="foto" onchange="readURL(this,'cvsGambar')"/><img id="cvsGambar" src="" width="100" height="100"/>
								</div>
								<div class="form-group">
									<label for="kelamin">Jenis Kelamin<font color="red">*</font></label>
									<p>
					                        M:
					                        <input type="radio" class="flat" name="gender" id="genderM" value="M" checked="" required /> F:
					                        <input type="radio" class="flat" name="gender" id="genderF" value="F" />
					                </p>
			                        
								</div>
								<div class="form-group">
									<label for="mode">Mode<font color="red">*</font></label>
									<div>
										<select id="mode" name="mode" class="form-control select-chosen" placeholder="Pilih Mode" required>
											<option value="">Pilih Mode</option>
										</select>
			                        </div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-sm" data-dismiss="modal">
						<i class="ace-icon fa fa-times"></i>
						Cancel
					</button>
					<button class="btn btn-sm btn-primary" id="btnSimpan">
						<i class="ace-icon fa fa-check"></i>
						Save
					</button>
				</div>
			</div>
		</div>
	</div>
</div>
<!--
<script src="<?php echo base_url();?>vendors/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url();?>tools/js/master_api.js"></script>
<script src="<?php echo base_url();?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url();?>/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo base_url();?>/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo base_url();?>/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?php echo base_url();?>/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>
-->

<script type="text/javascript">
	$(document).ready(function() {
		var dataSet = getUsers('all');
		var getMode = selMode('all');
		
		$('#datatable').DataTable({
			data:dataSet
		});
		
		for(var i in getMode) {
			$('#mode').append('<option value="'+getMode[i].id+'">'+getMode[i].otoritas+'</option>')
		}
		$('#mode').trigger("chosen:updated");
	});
	
	

	function readURL(input,div) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			var nama = input.files[0].name;
			var format = input.files[0].type;
			if(format == 'image/jpeg' || format == 'image/png'){
				reader.onload = function (e) {
					$('#'+div).attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}else{
				alert ('format tidak sesuai');
			}
		}
	}

	document.getElementById ("btnTambah").addEventListener ("click", add_user, false);
	function add_user()
	{
		save_method = 'add';
		$('#formUser')[0].reset();
		$('.form-group').removeClass('has-error');
		$('.help-block').empty();
		$('#modal-user').modal('show');
		$('.modal-title').text('Tambah User');
	}

	document.getElementById ("btnSimpan").addEventListener ("click", save_user, false);
	function save_user()
	{
		//event.preventDefault();
        $('#formUser').blur();
        $('input').blur();
        loaderOn();

		$('#btnSimpan').text('Saving...');
		$('#btnSimpan').attr('disabled',true);
		
		url = serviceAPI+'/api/pengelolaanDB/users';
		//var asdf = $('#formUser').serialize();
		asdf = new FormData();
    	asdf.append('username', $('#username').val());
    	asdf.append('password', $('#password').val());
    	asdf.append('nama', $('#nama').val());
    	asdf.append('email', $('#email').val());
    	asdf.append('kelamin', $('#kelamin').val());
    	asdf.append('mode', $('#mode').val());
    	asdf.append('fileGambar', $('#foto')[0].files[0]);

		//ajax adding
		$.ajax({
			url:url,
			type:"POST",
			method:"POST",
			dataType:"JSON",
			data:asdf,
			enctype: 'multipart/form-data',
      		processData: false,  // tell jQuery not to process the data
      		contentType: false,
			success:function(data)
			{
				if(data.status)
				{
					loaderOff();
		            swal({
		                title: 'Manajemen Users',
		                html: 'Anda berhasil.',
		                type: 'success',
		                showConfirmButton: false,
		                timer: 2000
		            })
		            .then(
		            	function () {},
		                function (dismiss) {}
		            );
		            $('#modal-menu').modal('hide');
		            window.location.reload(); 
				}
				
				$('#btnSimpan').text('Save');
				$('#btnSimpan').attr('disabled',false);
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				loaderOff();
	            swal({
	                title: 'Manajemen Users',
	                text: 'Terjadi Kesalahan',
	                type: 'error',
	                confirmButtonColor: '#d33',
	                confirmButtonText: 'Reload'
	            })
	            .then(
	                function () {
	                	$('#btnSimpan').text('Save');
						$('#btnSimpan').attr('disabled',false);
	                  	window.location.reload();
	                },
	                function (dismiss) {
	                  	$('#btnSimpan').text('Save');
						$('#btnSimpan').attr('disabled',false);
	                  	window.location.reload();
	                }
	            );
				

			}
			
		});
	}

	function editUser(id)
	{
	    save_method = 'update';
	    $('#formUser')[0].reset(); // reset form on modals
	    $('.form-group').removeClass('has-error'); // clear error class
	    $('.help-block').empty(); // clear error string
	 	url = serviceAPI+'/api/pengelolaanDB/getUser/'+id;
	    //Ajax Load data from ajax
	    $.ajax({
	        url : url,
	        type: "GET",
	        dataType: "JSON",
	        enctype: 'multipart/form-data',
      		processData: false,  // tell jQuery not to process the data
      		contentType: false,
			success: function(res)
	        {
				var data = res.data;
				$('[name="username"]').val(data.userid);
	            $('[name="nama"]').val(data.nama);
	            $('[name="email"]').val(data.email);
	            $('[name="foto"]').val(data.foto);
	            $('[name="mode"]').val(data.mode);
	            $('[name="password"]').val(data.password);
	            if (data.kelamin== 'L'){
	            	$('[name="kelamin"]').attr("class","focus active");
				}else{
					$('[name="kelamin"]').attr("class","");
				}
	            
	            $('#cvsGambar').attr('src', serviceAPI+'/'+data.foto);
				

				$('#modal-user').modal('show'); // show bootstrap modal when complete loaded
	            $('.modal-title').text('Edit User'); // Set title to Bootstrap modal title
	 
	        },
	        error: function (jqXHR, textStatus, errorThrown)
	        {
	            alert('Error get data from ajax');
	        }
	    });
	}
	function deleteUser(id)
	{
	    if(confirm('Are you sure delete this data?'))
	    {
	        // ajax delete data to database
	        url = serviceAPI+'/api/pengelolaanDB/delUsers/'+id;
	        $.ajax({
	        	url : url,
	            type: "GET",
	            method: "GET",
	            dataType: "JSON",
	            //data:{'id':id},
	            success: function(data)
	            {
	                //if success reload ajax table
	                window.location.reload();//refresh_menu();
	            },
	            error: function (jqXHR, textStatus, errorThrown)
	            {
	                alert('Error deleting data');
	            }
	        });
	 
	    }
	}
</script>
                      