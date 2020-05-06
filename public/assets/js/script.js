$(document).ready(function() {
   
    $('.product-slider').owlCarousel({
        slidesToShow: 4,
        slidesToScroll: 1,
        loop: true,
        autoplay:true,
        speed: 2000,
        smartSpeed:2000,
        dots: true,
        margin: 20,
        nav  : true,
        navText : ['<i class="fas fa-arrow-alt-circle-left"></i>','<i class="fas fa-arrow-alt-circle-right"></i>'],
        autoplayHoverPause: true,
        responsiveClass:true,
        responsive: {
            0: {
            items: 1
            },
            768 : {
            items: 3
            },
            992  : {
            items: 4
            },
            1200: {
            items: 4
            }
        }
    });

    $('.selectpicker').select2();



    $("#add_compare").submit(function(){
		var xajaxFile = ajaxURL+"compare";
		$('.msg-alert').html('');
		$('.contact-progress').show();
		
		$.ajax({
			type: 'POST',
            url: xajaxFile,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
			data: $("#add_compare").serialize(),
			dataType: 'json',
			success: function(data){
				if(!data.error){
					window.location = baseURL+'compare/'+data.url;
				}
				else{
					$(".msg-alert").html('<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><span class="glyphicon glyphicon-exclamation-sign iconleft" aria-hidden="true"></span> '+data.alert+"</div>");
				}
			}
		});
		return false;
	});









  
});


var room = 1; 
function add() {
    room++;
    var objTo = document.getElementById('add')
    var divtest = document.createElement("div");
    divtest.setAttribute("class", "row pt-3 autopicker removeclass"+room);
    var rdiv = 'removeclass'+room;
    var html ='<div class="col-8 col-sm-10">';
        html+='<select id="pilih'+room+'" name="compare[]" class="selectpicker form-control " style="width:100%">'+selectAuto+' </select>';
        html+='</div>';
        html+='<div class="col-4 col-sm-2"><button title="remove items" class="btn btn-danger btn-sm" type="button" onclick="remove('+ room +');"> <i class="fas fa-trash-alt"></i></button></div>';
        
       
        var nodesSameClass =document.getElementsByClassName('autopicker').length;
        if(nodesSameClass < 3){
            var dataHTML=html;
        }else{
            var dataHTML='<div class="alert alert-warning" role="alert">Maximal Compare 4</div>';
        }


    divtest.innerHTML = dataHTML;
    objTo.appendChild(divtest);
    $(document).ready(function() {
     $('#pilih'+room).select2(); 
    });
}
   function remove(rid) {
	   $('.removeclass'+rid).remove();
   }