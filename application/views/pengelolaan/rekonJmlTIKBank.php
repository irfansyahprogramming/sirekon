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
	<?= $judul;?>
    </h3>
</div>
<div class="viewer">
	<div class="container">
		<h4> Parameter Data Jumlah Rekon</h4>
		<hr>
		<form id="form-filter" class="form-horizontal">
            <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-3">Bank Partner</label>
                <div class="input-group col-md-9 col-sm-9 col-xs-9">
					<select id="bank" name="bank" class="chosen-select form-control" data-placeholder="Pilih Bank" required>
						<option value="">Pilih Bank</option>
						<option value="bni">Bank BNI</option>
						<option value="mdr">Bank Mandiri</option>
						<option value="btn">Bank BTN</option>
						<option value="bkp">Bank Bukopin</option>
					</select>
					
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Awal Pembayaran</label>
				<div class="input-group col-md-9 col-sm-9 col-xs-9">
	                <input type='text' class="form-control date" id="tglAwalBayar" name="tglAwalBayar" required/>
	            </div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Akhir Pembayaran</label>
				<div class="input-group col-md-9 col-sm-9 col-xs-9">
	                <input type='text' class="form-control date" id="tglAkhirBayar" name="tglAkhirBayar" required/>
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
					<th rowspan="2">No</th>
					<th rowspan="2">Tanggal</th>
					<th colspan="2">Data Bank</th>
					<th colspan="2">Data UPT TIK</th>
					<th rowspan="2">Keterangan</th>
				</tr>
				<tr>
					<th>Jumlah</th>
					<th>Nominal</th>
					<th>Jumlah</th>
					<th>Nominal</th>
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
		var bank = $('#bank').val();
		var tglAwalBayar = $('#tglAwalBayar').val();
		var tglAkhirBayar = $('#tglAkhirBayar').val();
		
		var x = tglAwalBayar.split('/');
		var tgl_awalPembayaran = x[2]+'-'+x[0]+'-'+x[1];
		var y = tglAkhirBayar.split('/');
		var tgl_akhirPembayaran = y[2]+'-'+y[0]+'-'+y[1];
		
		url = serviceAPI+'/api/pengelolaanDB/prosesRekonJumlahTIKBNI/'+bank+'/'+tgl_awalPembayaran+'/'+tgl_akhirPembayaran;
		
		//ajax adding
		$.ajax({
			url:url,
			type:"GET",
			dataType:"JSON",
			success:function(res)
			{
				loaderOff();
				var arrayItems  = res.data;
				
				var dataSet = [];
				for (var x = 0; x < arrayItems.length; x++) {
				    dataSet.push({
				        no: arrayItems[x].no,
				        tanggal: arrayItems[x].tanggal,
				        jmlBank: arrayItems[x].jmlBank,
				        nomBank: arrayItems[x].nomBank,
				        jmlTIK: arrayItems[x].jmlTIK,
				        nomTIK: arrayItems[x].nomTIK,
				        keterangan: arrayItems[x].keterangan
				    });
					    
				}
				
				$('#table').DataTable().destroy();
				
				/*
				var colors = ["red","green","blue","grey","pink","brown"];
				var temp = {};
				for (let i in dataSet)
				{
					if (dataSet[i].nim in temp){
						dataSet.color = temp[dataSet[i].nim]
					}else{
						var index = getRandom(colors.length);
						var color = colors.pop();
						temp[dataSet.nim] = color;
						dataSet[i].color = color;
					}

				}

				function getRandom (num)
				{
					return Math.floor(Math.random() * num);
				}
				*/
				function getData(data){
					//alert (data[0].nim);
					return data.map(function(d){
						for (var i=0,l=data.length;i<l;i++){
							var c = data[i];
							if (d.nim == c.nim){
								d.addClass = 'highlight';
							}
						}
						return d;
					})
					return d;
				}
				
				var editor;
    			var dataTable = $('#table').DataTable( {
    				
    				dom: 'Bfrtip',
			        buttons: [
			            {
			                
			                extend: 'csv',
			                filename: 'Data CSV TIK BNI ',
				            text: 'Ekport CSV TIK BNI ',
				            exportOptions: {
				                modifier: {
				                    search: 'none'
				                }
				            }
				        },
				        {
				            text: 'Eksport JSON TIK BNI ',
			                action: function ( e, dt, button, config ) {
			                    var data = dt.buttons.exportData();
			 
			                    $.fn.dataTable.fileSave(
			                        new Blob( [ JSON.stringify( data ) ] ),
			                        'Export.json'
			                    );
			                }
			                    
			            }
			        ],

			        "data": getData(dataSet),
			        "order": [[ 1, 'asc' ], [ 0, 'asc' ]],
			        "paging": false,
			        "columns": [
			            { data: 'no' },
				        { data: 'tanggal' },
				        { data: 'jmlBank' },
				        { data: 'nomBank' },
				        { data: 'jmlTIK' },
				        { data: 'nomTIK' },
				        { data: 'keterangan' }
			        ]
			        
			    } );
			    
    			dataTable.unique();

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