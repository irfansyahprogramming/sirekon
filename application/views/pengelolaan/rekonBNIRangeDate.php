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
		<h4> Parameter Data Rekon</h4>
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
				<label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Pembayaran Awal</label>
				<div class="input-group col-md-9 col-sm-9 col-xs-9">
	                <input type='text' class="form-control date" id="tglBayar0" name="tglBayar0" required/>
	            </div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-3">Tanggal Pembayaran Akhir</label>
				<div class="input-group col-md-9 col-sm-9 col-xs-9">
	                <input type='text' class="form-control date" id="tglBayar1" name="tglBayar1" required/>
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
					<th>Data Asal</th>
					<th>NIM</th>
					<th>Nama</th>
					<th>Nominal Bayar</th>
					<th>Tanggal Bayar</th>
					<th>Keterangan</th>
					<th>Non UKT/SPU</th>
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
		var tglBayar0 = $('#tglBayar0').val();
		var tglBayar1 = $('#tglBayar1').val();
		
		var x0 = tglBayar0.split('/');
		var tgl0_pembayaran = x0[2]+'-'+x0[0]+'-'+x0[1];
		var x1 = tglBayar1.split('/');
		var tgl1_pembayaran = x1[2]+'-'+x1[0]+'-'+x1[1];
		
		url = serviceAPI+'/api/pengelolaanDB/prosesRekonTIKBNIRangeDate/'+bank+'/'+tgl0_pembayaran+'/'+tgl1_pembayaran;
		
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
				var keterangan = '';
				for (var x = 0; x < arrayItems.length; x++) {
					var countNim = countPropValue ( arrayItems, 'nim', arrayItems[x].nim);
					var kode = arrayItems[x].nim+'@'+arrayItems[x].tanggal_bayar;
					
				    if (countNim > 1){
				    	var countTB = countPropValue0 ( arrayItems, 'nim' ,'tanggal_bayar', kode);
						if (arrayItems[x].nim == '1125161184'){
							alert (countTB);
						}
						
						if (countTB > 1){
							keterangan = 'Aman';
						}else{
							keterangan = 'Beda Tanggal';
						}
						
				    }else{
						if (arrayItems[x].data_asal == 'TIK'){
							keterangan = 'Tidak Ada diKeuangan';
						}else{
							keterangan = 'Tidak Ada di TIK';
						}
					}
				    if (arrayItems[x].nim == ''){
				    	keterangan = '';
				    }
					
				    dataSet.push({
				        data_asal: arrayItems[x].data_asal,
				        nim: arrayItems[x].nim,
				        nama: arrayItems[x].nama,
				        nominal: arrayItems[x].nominal,
				        tanggal: arrayItems[x].tanggal_bayar,
				        keterangan : keterangan,
						non_ukt : arrayItems[x].non_ukt
				    });
					keterangan = '';    
				}
				
				function countPropValue ( pa_data, ps_prop, ps_value ) {
				    let n_count = 0;

				    for (var i = 0; i < pa_data.length; i++) {
				        if (pa_data[i].hasOwnProperty(ps_prop)) {
				            if (pa_data[i][ps_prop] === ps_value) {
				                n_count++;
				            }
				        }
				    }
				    
				    return n_count;
				}
				
				function countPropValue0 ( pa_data, ps_prop1,ps_prop2, ps_value ) {
				    let n_count = 0;

				    for (var i = 0; i < pa_data.length; i++) {
				        if (pa_data[i].hasOwnProperty(ps_prop1)) {
				            if (pa_data[i][ps_prop1]+'@'+pa_data[i][ps_prop2] === ps_value) {
				                n_count++;
				            }
				        }
				    }
				    
				    return n_count;
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
			            { data: 'data_asal' },
				        { data: 'nim' },
				        { data: 'nama' },
				        { data: 'nominal' },
				        { data: 'tanggal' },
				        { data: 'keterangan' },
						{ data: 'non_ukt' }
			        ]
			        ,
			        //createdRow : function(row,data,dataIndex){
			        // 	$(row).addClass(data.className);
			        //}

			        "rowCallback" : function (node,data){
			        	if (data.className) $(node).addClass(data.className);
			        }
			        
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

function ubahUKT(id)
{
	if(confirm('Anda yakin mengubah status detil ini menjadi NON UKT?'))
	{
		//event.preventDefault();
		$('input').blur();
		loaderOn();
		//alert ('id = '+id);
		
		url = serviceAPI+'/api/pengelolaanDB/ubahNonUkt/'+id;
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
						title: 'Rekonsiliasi Data',
						html: 'Berhasil Ubah Non UKT.',
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
					title: 'Rekonsiliasi Data',
					text: 'Terjadi Kesalahan',
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
}
</script>