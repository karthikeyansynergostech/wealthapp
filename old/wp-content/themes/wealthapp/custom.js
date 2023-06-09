var commonoption = {
		    loop:true,
		    dots: false,
		    responsive:{
		        0:{
		            items:1,
		            margin:10,
		        },
		        600:{
		            items:1,
		            margin:10,
		        },
		        1000:{
		            items:2,
		            margin:50,
		        }
		    }
		};
var serviceoption = {
    loop:false,
    dots: false,
    responsive:{
        0:{
            items:1,
            margin:10,
        },
        600:{
            items:1,
            margin:10,
        },
        800:{
        		items:2,
            margin:20,
        },
        1000:{
            items:4,
            margin:50,
        }
    }
};

var $testimonial = $('.testimonial').owlCarousel(commonoption);
var $blog = $('.slides').owlCarousel(commonoption);
var $servicelist = $('.service-list').owlCarousel(serviceoption);


function owlResize_servicelist($owl,option) {
    $owl.trigger('destroy.owl.carousel');
    $owl.html($owl.find('.owl-stage-outer').html()).removeClass('owl-loaded');


     if ($(window).width() > 781 ) {
 			$owl.addClass('off');
		}else{
    		$owl.owlCarousel(option);
		}
}
      


function owlResize($owl,option) {
    $owl.trigger('destroy.owl.carousel');
    $owl.html($owl.find('.owl-stage-outer').html()).removeClass('owl-loaded');
    $owl.owlCarousel(option);
}

function add_animateclass(){
	if($.scrollify.current().hasClass('.section-1, .section-3, .section-contact')){
      	$.scrollify.current().addClass('aligncenter');
    }else{
      	$('.section-block').removeClass('aligncenter')
    }
      	
  	if($.scrollify.current().hasClass('.section-2, .section-4')){
  		$.scrollify.current().addClass('scatter')
  	}else{
  		$('.section-block').removeClass('scatter');
  	}
  	$('.section-block').removeClass('animate');
  	$.scrollify.current().addClass('animate');
}

function device_resolution(){
    var txt= "width:"+screen.width+" height:"+screen.height;
    alert(txt);
}

$(document).ready(function(){
    
if ( $(window).width() > 781 ) {
    $.scrollify({
        section : ".section-block",
        updateHash: false,
        interstitialSection :".non-section-block",
        easing: "easeOutExpo",
        scrollSpeed: 1000,
        touchScroll:true
   });
   add_animateclass()
}else{
    if(!!window.IntersectionObserver){
        console.log('initialize...');
        const sections = document.querySelectorAll('.section-block');
        var sections_options  = {threshold: .75}
        var aligncenter = ['section-1','section-3','section-contact']
        var scatter = ['section-2','section-4']

        const sections_observer = new IntersectionObserver((entries, sectionsobserver) => { 
            entries.forEach(entry => {
                let elem = entry.target;
                if(!entry.isIntersecting){
                    elem.classList.remove('animate');
                    elem.classList.remove('aligncenter'); 
                    elem.classList.remove('scatter'); 
                }else if(entry.isIntersecting){
                    elem.classList.add('animate'); 
                    aligncenter.forEach(classname=>{
                        if(elem.classList.contains(classname)){
                            elem.classList.add('aligncenter'); 
                        }
                    });

                    scatter.forEach(classname=>{
                        if(elem.classList.contains(classname)){
                            elem.classList.add('scatter'); 
                        }
                    });
                }
            });
        }, sections_options);
        sections.forEach(elements=>{
            sections_observer.observe(elements);
        });
    }else{
        console.log('waring');
    }
    // device_resolution();
}
  
});


  
  
  
 
	
if ( $(window).width() > 781 ) {
    $servicelist.addClass('off');
}



$(window).scroll(function(){
    if ( $(window).width() > 781 ) {
        add_animateclass()
    }
});



$(window).bind('resize', function() { 
    owlResize($blog,commonoption);
    owlResize($testimonial,commonoption);
    console.log($(window).width())
	owlResize_servicelist($servicelist ,serviceoption);
});
        
        

$('.service-item').hover(function(){
	$('.service-item').removeClass('active');
	$('.service-item').children('.service-block').children('.service-text').removeClass('animate__fadeInLeft');
	$(this).addClass('active');
	$(this).children('.service-block').children('.service-text').addClass('animate__fadeInLeft');
});

$('.service-list').on('mouseleave',function(){
	$('.service-item').removeClass('active');
	$('.service-item:first').addClass('active');
	
});


$(document).on('submit','form.ajax-form',function(e){
    e.preventDefault();
    $.ajax({
        url: $(this).attr('data-action'),
        type: $(this).attr('data-method'),
        data: new FormData(this),
        processData: false,
        contentType: false,
        beforeSend: function(){
            $(this).find(":submit").attr('disabled',true);
        },
        success:function(data){
            var result = jQuery.parseJSON(data);
             if(result.status=='success'){
                 if(result.appendclass!=undefined){
                     $(result.appendclass).remove();
                 }
                if(result.html!=undefined){
                    $('body').append(result.html)
                    if(result.call_jsfunction !=undefined){
                        window[result.call_jsfunction]();
                    }
                }
            }else{
                custom_notification(result.message,'Error','red')
            }
            
            return false;
        }
    }).done(function(){
        $(this).trigger("reset");
        $(this).find(":submit").attr('disabled',false);
    });        
});




function onlyalphabets(val){
         if(!/^[a-zA-Z .]*$/g.test(val)){
             return false;
         }
        return true;
    }
    
function phonenumber(val){
    if(!/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{2,6}$/i.test(val)){
        return false;
    }
    return true;
}
    
function email(val){
    console.log("email")
    console.log(val)

    if(!/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(val)){
        return false;
    }
    return true;
}

function minchars(val, count){
    return val.length >= count;
}

function maxchars(val, count){
    return val.length <= count;
}

function chars(val, count){
    return val.length <= count;
}


function parse(str) {
    var args = [].slice.call(arguments, 1),
        i = 0;

    return str.replace(/%s/g, () => args[i++]);
}

$(document).on('blur','.form-field-validate',function(){
    var required = $(this).attr('data-required');
    var validatetype = $(this).attr('data-validate');
    
    if(validatetype!=undefined){
        var validatetypeoption = validatetype.split('|');
    }
    var length =validatetypeoption.length;

    
    var value = $(this).val();
    
    var error_msg = {
        'required_error' : "this field is required",
        'onlyalphabets' : 'Please enter a valid input',
        'phonenumber' : 'Please enter a valid phone number',
        'email' : 'Please enter a valid email',
        'minchars':'minimum length should be  %s',
        'maxchars':'maximum length should be  %s',
        'chars':'character length should be  %s',

    }

    var err_msg ="";

    
    if(required=="true"){
        if(value==""){
            err_msg = error_msg['required_error'];
        }
    }
    
    
    if(validatetype!=undefined && err_msg=="" ){
        if(length==1){
            if(window[validatetype](value)==false ){
                err_msg = error_msg[validatetype];
            }  
        }else{
            validatetypeoption.forEach(function(element){

                if(element.split('_').length == 1){
                    if(window[element](value)==false && err_msg=="" ){
                        err_msg = error_msg[element];
                    }  
                }else{
                    var values = element.split('_');
                    var functionname = values[0];
                    var functionaruguments = values[1];
                    if(window[functionname](value,functionaruguments)==false && err_msg=="" ){
                        err_msg = parse(error_msg[functionname], functionaruguments) ;
                    } 
                }
            });
        }

         
        
        
    }  
    if(err_msg!=""){
        $(this).closest('.form-group').find('.error_txt').html(err_msg);
    }else{
        $(this).closest('.form-group').find('.error_txt').html("");
    }
});
