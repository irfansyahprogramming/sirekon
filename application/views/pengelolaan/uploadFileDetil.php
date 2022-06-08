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
        <h3>Pengelolaan <small><i class="fa fa-arrows-right"></i><span class="fa fa-long-arrow-right"></span> File Detil</small></h3>
    </div>
</div>

<div class="">
	<div class="x_panel">
        <div class="x_title">
            <h2>DAFTAR FILE DETIL UPLOAD</h2>
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
		    	<button id="btnTambah" class="btn btn-success"><i class="fa fa-plus"></i> Tambah File</button>
		    </p>
		    <table id="datatable" class="table table-striped table-bordered">
		    	<thead>
		    		<tr>
		            	<th>No</th>
		                <th>Nama File</th>
		                <th>Keterangan File</th>
		                <th>Deskripsi File Global</th>
		                <th>Sinkron File</th>
		                <th>Bank</th>
		                <th>Status</th>
		                <th>Aksi</th>
		            </tr>
		        </thead>
				<tbody>
				</tbody>
				<tfoot>
					<tr>
		            	<th>No</th>
		                <th>Nama File</th>
		                <th>Keterangan File</th>
		                <th>Deskripsi File Global</th>
		                <th>Sinkron File</th>
		                <th>Bank</th>
		                <th>Status</th>
		                <th>Aksi</th>
		            </tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
<div id="modal-file" class="modal file" role="dialog" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<span class="white">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">Tambah File</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<form id="formFile" method="post">
						<div class="col-xs-12 col-sm-12">
							<div class="form-group">
								<label for="fileUpload" class="control-label">File Detil Bank </label>
								<div>
									<input type="hidden" id="id" name="id"/>
									<input 	type="file" class="file-input" name="fileUpload" id="fileUpload"/>
								</div>
							</div>
							
							<div class="form-group">
								<label for="keterangan">Keterangan<font color="red">*</font></label>
								<div>
									<input type="text" placeholder="Keterangan File" name="keterangan" id="keterangan" class="form-control" required/>
								</div>
							</div>
							
							<div class="form-group">
								<label for="bank">Bank<font color="red">*</font></label>
								<div>
									<select id="bank"  onchange="openSelect(this.value)" name="bank" class="form-control select-chosen" placeholder="Pilih BANK" required>
										<option value="">Pilih Bank</option>
										<option value="bni">Bank BNI</option>
										<option value="mdr">Bank Mandiri</option>
										<option value="btn">Bank BTN</option>
										<option value="bkp">Bank Bukopin</option>
									</select>
								</div>
							</div>
							<div id="selectGlobal" style="display: none">
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
<script src="<?php echo base_url();?>tools/js/master_api.js"></script>

<script type="text/javascript">
	
	$(document).ready(function() {
		var dataSet = getFileDetil('all');
		
		$('#datatable').DataTable({
			data:dataSet
		});
	});
	
	function openSelect(id)
	{
		if (id == 'bni' || id == 'bukopin'){
			url = serviceAPI+'/api/pengelolaanDB/recFileGlobal/'+id;
	        $.ajax({
	        	url : url,
	            type: "GET",
	            method: "GET",
	            dataType: "JSON",
	            //data:{'id':id},
	            success: function(res)
	            {
	                
	                var mySpan = document.getElementById('selectGlobal');
	                var rec = document.getElementById('recGlobal');
	                if(typeof rec != "undefined" && rec != null){
					    mySpan.removeChild(rec);
					}
	                
	                mySpan.style.display = "block";
	                //if success reload ajax table
	                var mySelect = document.createElement('select');
					mySelect.setAttribute('name',"recGlobal");
					mySelect.setAttribute('id',"recGlobal");
					mySelect.setAttribute('class',"form-control");
					mySpan.appendChild(mySelect); 
	                
	                var getSelect = res.data;
	                $('#recGlobal').append('<option value="0">Pilih Data Global</option>');
	                for(var i in getSelect) {
	                	if (id == 'bni'){
	                		var desc = getSelect[i].description;
		                	var description = desc.split(' | ');
							$('#recGlobal').append('<option value="'+getSelect[i].id+'">'+description[2]+'</option>')
	                	}else if (id == 'bukopin'){
	                		var desc = getSelect[i].description;
		                	var description = getSelect[i].description;
							$('#recGlobal').append('<option value="'+getSelect[i].id+'">'+description+'</option>');
	                	}else{
	                		$('#recGlobal').append('<option value="0"></option>');
	                	}
	                	
					}
					$('#recGlobal').trigger("chosen:updated");
	                
	            },
	            error: function (jqXHR, textStatus, errorThrown)
	            {
	                $('selectGlobal').html('Error data');
	            }
	        });
		}else{
			var mySpan = document.getElementById('selectGlobal');
			var rec = document.getElementById('recGlobal');
			
			if (mySpan.style.display === "block") {
			    mySpan.style.display = "none";
			} else {
			    mySpan.style.display = "none";
			}
			//alert (rec);
			if(typeof rec != "undefined" && rec != null){
			    mySpan.removeChild(rec);
				var mySelect = document.createElement('input');
				mySelect.setAttribute('type',"hidden");
				mySelect.setAttribute('name',"recGlobal");
				mySelect.setAttribute('id',"recGlobal");
				mySelect.setAttribute('value',"0");
				mySpan.appendChild(mySelect); 
			}else{
				var mySelect = document.createElement('input');
				mySelect.setAttribute('type',"hidden");
				mySelect.setAttribute('name',"recGlobal");
				mySelect.setAttribute('id',"recGlobal");
				mySelect.setAttribute('value',"0");
				mySpan.appendChild(mySelect); 
			}

			/*
			if (typeof rec != "undefined" && typeof rec != "null") {
			   	
				alert("GOT THERE");
			}else{
				
				var mySelect = document.createElement('input');
				mySelect.setAttribute('type',"hidden");
				mySelect.setAttribute('name',"recGlobal");
				mySelect.setAttribute('id',"recGlobal");
				mySelect.setAttribute('value',"0");
				mySpan.appendChild(mySelect); 
			}

	       	*/
			
		}

	}


	document.getElementById ("btnTambah").addEventListener ("click", add_file, false);
	function add_file()
	{
		save_method = 'add';
		$('#formFile')[0].reset();
		$('.form-group').removeClass('has-error');
		$('.help-block').empty();
		$('#modal-file').modal('show');
		$('.modal-title').text('Tambah File');
	}

	document.getElementById ("btnSimpan").addEventListener ("click", save_file, false);
	function save_file()
	{
		//event.preventDefault();
        $('#formFile').blur();
        $('input').blur();
        loaderOn();

		$('#btnSimpan').text('Saving...');
		$('#btnSimpan').attr('disabled',true);
		
		url = serviceAPI+'/api/pengelolaanDB/fileDetil';
		//var asdf = $('#formFile').serialize();
		asdf = new FormData();
    	asdf.append('id', $('#id').val());
    	asdf.append('keterangan', $('#keterangan').val());
    	asdf.append('bank', $('#bank').val());
    	asdf.append('id_book', $('#recGlobal').val());
    	asdf.append('fileUpload', $('#fileUpload')[0].files[0]);

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
		                title: 'Pengelolaan File',
		                html: 'Anda berhasil.',
		                type: 'success',
		                showConfirmButton: false,
		                timer: 2000
		            })
		            .then(
		            	function () {},
		                function (dismiss) {}
		            );
		            $('#modal-file').modal('hide');
		            window.location.reload(); 
				}
				
				$('#btnSimpan').text('Save');
				$('#btnSimpan').attr('disabled',false);
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				loaderOff();
	            swal({
	                title: 'Pengelolaan File',
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
	
	function editFileDetil(id)
	{
	    save_method = 'update';
	    $('#formFile')[0].reset(); // reset form on modals
	    $('.form-group').removeClass('has-error'); // clear error class
	    $('.help-block').empty(); // clear error string
	 	url = serviceAPI+'/api/pengelolaanDB/fileDetil/'+id;
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
	            $('[name="keterangan"]').val(data.keterangan_file);
	            $('[name="bank"]').val(data.bank);
	            

				$('#model_file').modal('show'); // show bootstrap modal when complete loaded
	            $('.modal-title').text('Edit File'); // Set title to Bootstrap modal title
	 
	        },
	        error: function (jqXHR, textStatus, errorThrown)
	        {
	            alert('Error get data from ajax');
	        }
	    });
	}

	function sinkronFile(id)
	{
	    
		url = serviceAPI+'/api/pengelolaanDB/bookFileDetil/'+id;
		$('#btnSinkron_'+id).text('Loading...');
		$('#btnSinkron_'+id).attr('disabled',true);

		event.preventDefault();
        $('#formFile').blur();
        $('input').blur();
        loaderOn();

		//ajax adding
		$.ajax({
			url:url,
			type:"GET",
			method:"GET",
			dataType:"JSON",
			success:function(data)
			{
				if(data.status)
				{
					loaderOff();
		            swal({
		                title: 'Pengelolaan File Detil',
		                html: 'File Detil Berhasil disinkronisasi',
		                type: 'success',
		                showConfirmButton: false,
		                timer: 2000
		            })
		            .then(
		            	function () {},
		                function (dismiss) {}
		            );
		            window.location.reload(); 
				}
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				loaderOff();
	            swal({
	                title: 'Pengelolaan File Detil',
	                text: 'File Detil Gagal dibukukan, Format tidak sesuai',
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
			
		});
	}
	
	function deleteFileDetil(id)
	{
	    if(confirm('Are you sure delete this data?'))
	    {
	        // ajax delete data to database
	        url = serviceAPI+'/api/pengelolaanDB/delFileDetil/'+id;
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
                      