<!--
<link href="<?php echo base_url();?>jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.18/css/dataTables.jqueryui.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

<link href="<?php echo base_url();?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
-->
<div class="page-header">
    <h3>
	<?=$judul;?>
    </h3>
</div>
<div class="viewer">
	<div class="container">
		<h4> Filtering Data</h4>
		<hr>
		<form id="form-filter" class="form-horizontal">
            <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-3">Bank Partner</label>
                <div class="input-group col-md-9 col-sm-9 col-xs-9">
					<select id="bank" name="bank" class="chosen-select form-control" data-placeholder="Pilih Bank" required>
						<option value="">Pilih Bank</option>
						<option value="bni">Bank BNI</option>
						<option value="mdr">Bank Mandiri</option>
						<option value="bkp">Bank Bukopin</option>
						<option value="btn">Bank BTN</option>
					</select>
					
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Awal Pembayaran</label>
				<div class="input-group col-md-9 col-sm-9 col-xs-9">
	                <input type='text' class="form-control date" id="tglAwal" name="tglAwal" required/>
	            </div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Akhir Pembayaran</label>
                <div class="input-group col-md-9 col-sm-9 col-xs-9">
	                <input type='text' class="form-control date" id="tglAkhir" name="tglAkhir" required/>
	            </div>
			</div>
			
			<div class="form-group">
				<div class="col-md-12 col-sm-12 col-xs-12 text-right">
					<button type="submit" class="btn btn-app btn-success" id="btnProses">
					<i class="menu-icon fa fa-search"></i> Filter
					</button>
				</div>
			</div>
		</form>
		<hr>
	</div><div class="col-sm-8"></div>
	<!--tampilkan-->

	<div class="table table-responsive" id="showData">
		<table id="table" class="table table-striped table-bordered table-hover" width="100%">
			<thead>
				<tr>
					<th>No</th>
					<th>NIM</th>
					<th>Nama</th>
					<th>Kode Prodi</th>
					<th>Kode Fakultas</th>
					<th>Tagihan</th>
					<th>Periode</th>
					<th>Bank</th>
					<th>Waktu Transaksi</th>
					<th>Nominal Bayar</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
</div>
<!--
<script src="<?php echo base_url();?>jquery-ui-1.12.1/external/jquery/jquery.js"></script>
<script src="<?php echo base_url();?>jquery-ui-1.12.1/jquery-ui.js"></script>
<script type="text/javascript">

	
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
-->
<script type="text/javascript">

$(document).ready(function(){
	
	$('#form-filter').submit(function(event) {

        event.preventDefault();
		$('#form-filter').blur();
	    $('input').blur();
	    loaderOn();

		$('#btnProses').text('Loading...');
		$('#btnProses').attr('disabled',true);
			
		url = serviceAPI+'/api/pengelolaanDB/tarikTIK';
		asdf = new FormData();
	    asdf.append('bank', $('#bank').val());
	    asdf.append('tglAwal', $('#tglAwal').val());
	    asdf.append('tglAkhir', $('#tglAkhir').val());

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
			success:function(res)
			{
				loaderOff();
				var arrayItems  = res.data;
				
				var dataSet = [];
				for (var i = 0; i < arrayItems.length; i++) {
				    dataSet.push({
				        no: arrayItems[i].no,
				        nim: arrayItems[i].nim,
				        nama: arrayItems[i].nama,
				        kodeProdi: arrayItems[i].kodeProdi,
				        kodeFak: arrayItems[i].kodeFak,
				        tagihan: arrayItems[i].tagihan,
				        periode: arrayItems[i].periode,
				        bank: arrayItems[i].bank,
				        waktuTransaksi: arrayItems[i].waktuTransaksi,
				        nominalBayar: arrayItems[i].nominalBayar,
				        status: arrayItems[i].status
				    });
				    var bank = arrayItems[i].bank;
				    //alert (dataSet);
				}
				
				$('#table').DataTable().destroy();
    			$('#table').DataTable( {
    				
    				dom: 'Bfrtip',
			        buttons: [
			            {
			                extend: 'csv',
			                filename: 'Data Eksport '+bank,
				            text: 'Copy all data Eksport '+bank,
				            exportOptions: {
				                modifier: {
				                    search: 'none'
				                }
				            }
				            /*
			                text: 'Eksport Data',
			                action: function ( e, dt, button, config ) {
			                    var data = dt.buttons.exportData();
			 
			                    $.fn.dataTable.fileSave(
			                        new Blob( [ JSON.stringify( data ) ] ),
			                        'Export.json'
			                    );
			                }
			                */
			                
			            }
			        ],
			        
			        "data": dataSet,
			        "columns": [
			            { data: 'no' },
				        { data: 'nim' },
				        { data: 'nama' },
				        { data: 'kodeProdi' },
				        { data: 'kodeFak' },
				        { data: 'tagihan' },
				        { data: 'periode' },
				        { data: 'bank' },
				        { data: 'waktuTransaksi' },
				        { data: 'nominalBayar' },
				        { data: 'status' }
			        ]
			    } );
    			//$('#table').DataTable().reload();

				if(res.status)
				{
					swal({
			            title: 'Pengelolaan File',
			            html: res.pesan,
			            type: 'success',
			            showConfirmButton: false,
			            timer: 2000
			        })
			        .then(
			           	function (res) {
			           		$('#btnProses').html('<i class="menu-icon fa fa-search"></i> Filter');
							$('#btnProses').attr('disabled',false);
			           	},
			            function (dismiss) {
			            	$('#btnProses').html('<i class="menu-icon fa fa-search"></i> Filter');
							$('#btnProses').attr('disabled',false);
						}
			        );
			        
				}else{

				    swal({
			            title: 'Pengelolaan File',
			            html: res.pesan,
			            type: 'Gagal',
			            showConfirmButton: false,
			            timer: 2000
			        })
			        .then(
			           	function (res) {
			           		$('#datatable').DataTable({
								data:res.data
							});

			           	},
			            function (dismiss) {
			            	$('#datatable').DataTable({
								data:res.data
							});
			            }
			        );
			        
				}
				$('#btnProses').html('<i class="menu-icon fa fa-search"></i> Filter');
				$('#btnProses').attr('disabled',false);
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				
				loaderOff();

				var errorMessage = jqXHR.status + ': ' + jqXHR.statusText
         		//alert('Error - ' + errorMessage);
		        swal({
		            title: 'Pengelolaan File',
		            text: errorMessage,
		            type: 'error',
		            confirmButtonColor: '#d33',
		            confirmButtonText: 'Reload'
		        })
		        .then(
		            function () {
		              	$('#btnProses').html('<i class="menu-icon fa fa-search"></i> Filter');
						$('#btnProses').attr('disabled',false);
		               	window.location.reload();
		            },
		            function (dismiss) {
		               	$('#btnProses').html('<i class="menu-icon fa fa-search"></i> Filter');
						$('#btnProses').attr('disabled',false);
		               	window.location.reload();
		            }
		        );
			}
		});
	});
})
</script>