/*
Create By : Irfansyah
Date	  : 10 September 2019
Function For Keuangan
*/
var serviceAPI = 'http://192.168.9.45/rest_rekon';

function getCapctha(){
	url = serviceAPI+'/api/pengelolaanDB/captcha';
          
    $.ajax({
        url: url,
        type: 'get',
        success: function(res){
    		$('.security-field').text('Berapakah '+res.data.quest+'?');
            $('[name="captcha_id"]').val(res.data.id);
        },
        error: function(res){
            $('.security-field').html('<font class="text-danger">Koneksi internet bermasalah</font> <a onclick="window.location.reload()" class="btn btn-danger"><i class="fa fa-refresh"></i> Refreh</a>')
        }
    })
}

function getUsers(id){

	url = serviceAPI+'/api/pengelolaanDB/users/'+id;
	var asdf=null;
	$.ajax({
        url: url,
        type: 'get',
      	method: 'get',
      	async: false,
      	success: function(res){
        	asdf = res.data;
        },
        error: function(res){
            asdf = '502';     
        }
    })
    return asdf;
    
}

function getMenu(id){
	
	url = serviceAPI+'/api/pengelolaanDB/menu/'+id;
	var asdf=null;
	$.ajax({
        url: url,
        type: 'get',
      	method: 'get',
      	async: false,
      	success: function(res){
        	asdf = res.data;
        },
        error: function(res){
            asdf = '502';     
        }
    })
    return asdf;
    
}

function getMode(id){
	
	url = serviceAPI+'/api/pengelolaanDB/getMode/'+id;
	var asdf=null;
	$.ajax({
        url: url,
        type: 'get',
      	method: 'get',
      	async: false,
      	success: function(res){
        	asdf = res.data;
        },
        error: function(res){
            asdf = '502';     
        }
    })
    return asdf;
    
}

function getFileGlobal(id){
	
	url = serviceAPI+'/api/pengelolaanDB/listFileGlobal/'+id;
	var asdf=null;
	$.ajax({
        url: url,
        type: 'get',
      	method: 'get',
      	async: false,
      	success: function(res){
        	asdf = res.data;
        },
        error: function(res){
            asdf = '502';     
        }
    })
    return asdf;
    
}

function getFileDetil(id){
	
	url = serviceAPI+'/api/pengelolaanDB/listFileDetil/'+id;
	var asdf=null;
	$.ajax({
        url: url,
        type: 'get',
      	method: 'get',
      	async: false,
      	success: function(res){
        	asdf = res.data;
        },
        error: function(res){
            asdf = '502';     
        }
    })
    return asdf;
    
}

function getFileTIK(id){
	
	url = serviceAPI+'/api/pengelolaanDB/listFileTIK/'+id;
	var asdf=null;
	$.ajax({
        url: url,
        type: 'get',
      	method: 'get',
      	async: false,
      	success: function(res){
        	asdf = res.data;
        },
        error: function(res){
            asdf = '502';     
        }
    })
    return asdf;
    
}

function selMode(id){
	
	url = serviceAPI+'/api/pengelolaanDB/mode/'+id;
	var asdf=null;
	$.ajax({
		url: url,
	    type: 'get',
	    async: false,
	    success: function(res){
	        asdf = res.data;
	    },
	    error: function(res){
	    	asdf ='';
			console.log(res);
	    }
	});
	return asdf;
};
//LOADER
function loaderOn(){
	$('body').css('overflow','hidden');
    $('body').prepend('<div class="loading-overlay">'+
      '<div class="loading-box">'+
        '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>'+
        '<br/><br/>'+
        '<p>Sedang loading, tunggu yah...</p>'+
      '</div>'+
    '</div>')
}


function loaderOff(){
    $('.loading-overlay').remove();
    $('body').css('overflow','visible');
}

function coverOff(){
    $('.white-cover').remove();
}