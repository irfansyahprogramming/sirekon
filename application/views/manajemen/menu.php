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
        <h3>Manajemen <small><i class="fa fa-arrows-right"></i><span class="fa fa-long-arrow-right"></span> Menu</small></h3>
    </div>
</div>

<div class="">
	<div class="x_panel">
        <div class="x_title">
            <h2>DAFTAR MENU</h2>
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
		    	<button id="btnTambah" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Menu</button>
		    </p>
		    <table id="datatable" class="table table-striped table-bordered">
		    	<thead>
		    		<tr>
		            	<th>No</th>
		                <th>Mode</th>
		                <th>Menu</th>
		                <th>Keterangan</th>
		                <th>Aksi</th>
		            </tr>
		        </thead>
				<tbody>
				</tbody>
				<tfoot>
					<tr>
		            	<th>No</th>
		                <th>Mode</th>
		                <th>Menu</th>
		                <th>Keterangan</th>
		                <th>Aksi</th>
		            </tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
<div id="modal-menu" class="modal menu" role="dialog" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<span class="white">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Tambah Menu</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<form id="formmenu" method="post">
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<label for="mode">Mode<font color="red">*</font></label>
								<input type="hidden" id="id" name="id" value="" />
								<div>
									<select id="mode" name="mode" class="form-control select-chosen" placeholder="Pilih Mode" required>
										<option value="">Pilih Mode</option>
									</select>
			                    </div>
							</div>
							<div class="form-group">
								<label for="menu">Menu<font color="red">*</font></label>
								<div>
									<input type="text" placeholder="Menu File" name="menu" id="menu" class="form-control" required/>
								</div>
							</div>
							<div class="form-group">
								<label for="keterangan">Keterangan</label>
								<div>
									<input type="text" placeholder="Keterangan menu" name="keterangan" id="keterangan" class="form-control"/>
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
		var dataSet = getMenu('all');
		var getMode = selMode('all');
		
		$('#datatable').DataTable({
			data:dataSet
		});
		
		for(var i in getMode) {
			$('#mode').append('<option value="'+getMode[i].id+'">'+getMode[i].otoritas+'</option>')
		}
		$('#mode').trigger("chosen:updated");
	});

	document.getElementById ("btnTambah").addEventListener ("click", add_menu, false);
	function add_menu()
	{
		save_method = 'add';
		$('#formmenu')[0].reset();
		$('.form-group').removeClass('has-error');
		$('.help-block').empty();
		$('#modal-menu').modal('show');
		$('.modal-title').text('Tambah menu');
	}

	document.getElementById ("btnSimpan").addEventListener ("click", save_menu, false);
	function save_menu()
	{
		//event.preventDefault();
        $('#formmenu').blur();
        $('input').blur();
        loaderOn();

		$('#btnSimpan').text('Saving...');
		$('#btnSimpan').attr('disabled',true);
		
		url = serviceAPI+'/api/pengelolaanDB/menu';
		//var asdf = $('#formmenu').serialize();
		asdf = new FormData();
    	asdf.append('id', $('#id').val());
    	asdf.append('mode', $('#mode').val());
    	asdf.append('menu', $('#menu').val());
    	asdf.append('keterangan', $('#keterangan').val());
    	
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
		                title: 'Manajemen Menu',
		                html: 'Anda berhasil Tambah Menu.',
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
	                title: 'Manajemen Menu',
	                text: 'Terjadi kesalahan',
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

	function editMenu(id)
	{
	    save_method = 'update';
	    $('#formmenu')[0].reset(); // reset form on modals
	    $('.form-group').removeClass('has-error'); // clear error class
	    $('.help-block').empty(); // clear error string
	 	url = serviceAPI+'/api/pengelolaanDB/getMenu/'+id;
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
				$('[name="id"]').val(data.id);
	            $('[name="mode"]').val(data.mode);
	            $('[name="menu"]').val(data.menu);
	            $('[name="keterangan"]').val(data.keterangan);
	            

				$('#modal-menu').modal('show'); // show bootstrap modal when complete loaded
	            $('.modal-title').text('Edit Menu'); // Set title to Bootstrap modal title
	 
	        },
	        error: function (jqXHR, textStatus, errorThrown)
	        {
	            alert('Error get data from ajax');
	        }
	    });
	}
	function deleteMenu(id)
	{
	    if(confirm('Are you sure delete this data?'))
	    {
	        // ajax delete data to database
	        url = serviceAPI+'/api/pengelolaanDB/delMenu/'+id;
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
                      