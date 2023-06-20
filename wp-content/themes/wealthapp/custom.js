var commonoption = {
		    loop:true,
		    dots: true,
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
    dots: true,
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

var option = {
    loop:false,
    dots: true,
    responsive:{
        1000:{
            items:1,
            margin:50,
        }
    }
};


var linedotsoption = {
    loop:false,
    dots: true,
    responsive:{
        1000:{
            items:1,
            margin:50,
        }
    },
    onInitialized: function(){
        var elements = $('.awards.owl-carousel').children('.owl-dots').children();
        $.each(elements,function(i, val){
            elements[i].innerHTML = i+1;
        })
    },
};

var galleryoption = {
    loop:true,
    dots: true,
    center: true,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:1,
        },
        800:{
                items:2,
        },
        1000:{
            items:3,
        }
    },
    onInitialized: function(){
        var elements = $('.gallery.owl-carousel').children('.owl-dots').children();
        $.each(elements,function(i, val){
            elements[i].innerHTML = i+1;
        })
    },
};

var team_thumbnailoption = {
        loop:true,
        dots: true,
        margin:20,
        slideBy:1,
        dotsEach:true,
        center:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:1,
            },
            800:{
                    items:2,
            },
            1000:{
                items:3,
            }
        },
        onInitialize: function(){
            var id = $(this)[0]['$element'][0]['id'];
            var elements = $('#'+id).children('.item').children('a.goto');
            $.each(elements,function(i, val){
                var index = i+1;
                elements[i].setAttribute("data-index",index);
            });
            $('#'+id).children('.owl-dots').css('display','none !important');
            $('#'+id).children('.owl-dots').css('opacity','0 !important');
        },
        onInitialized: function(){
            
        },
        onDragged: function(e){
        if (e.item) {
                var index = e.item.index - 1;
                var count = e.item.count;
                if (index > count) {
                    index -= count;
                }
                if (index <= 0) {
                    index += count;
                }
            }
            var child = String($(this)[0]['$element'][0]['attributes']['data-child']['value']);
            $(child).trigger('to.owl.carousel', index-1) 
    },
}



var team_option = {
    loop:true,
    nav:true,
    dots:false,
    responsive:{
        1000:{
            items:1,
            margin:50,
        }
    },
    onInitialized: function(){
        var totalslides = $(this)[0]['_items'].length;
            var id = $(this)[0]['$element'][0]['id'];
           $('#'+id).children('.owl-nav').children('.owl-next').before("<span class='slide_pagination'><strong>1</strong>/"+totalslides+"</span>");

           var child = String($(this)[0]['$element'][0]['attributes']['data-child']['value']);
            $(child).trigger('to.owl.carousel', 1)  


        },
    onChanged: function(e){
        if (e.item) {
                var index = e.item.index - 1;
                var count = e.item.count;
                if (index > count) {
                    index -= count;
                }
                if (index <= 0) {
                    index += count;
                }
            }
            var id = $(this)[0]['$element'][0]['id'];
            $('#'+id).children('.owl-nav').children('.slide_pagination').children('strong').html(index);

            var child = String($(this)[0]['$element'][0]['attributes']['data-child']['value']);
            $(child).trigger('to.owl.carousel', index)

    }
    
};



var header_bg = false;
var $testimonial = $('.testimonial').owlCarousel(commonoption);
var $blog = $('.slides').owlCarousel(commonoption);
var $servicelist = $('.service-list').owlCarousel(serviceoption);
var $officeculture = $('.office-culture').owlCarousel(option);
var $awards = $('.awards').owlCarousel(linedotsoption);

var $gallery = $('.gallery').owlCarousel(galleryoption);

var $keymanagement_thumbnail = $('.key-management-thumbnail').owlCarousel(team_thumbnailoption);
var $keymanagement = $('.key-management').owlCarousel(team_option);

function owlResize_servicelist($owl,option) {
    $owl.trigger('destroy.owl.carousel');
    $owl.html($owl.find('.owl-stage-outer').html()).removeClass('owl-loaded');
     if ($(window).width() > 781 ) {
 			$owl.addClass('off');
		}else{
    		$owl.owlCarousel(option);
		}
}




   $(document).on('click','a.goto',function(e){
        var index = $(this).attr('data-index') -1;
        console.log(index);
        $('.key-management').trigger('to.owl.carousel', index);
    });   


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
      	
  	if($.scrollify.current().hasClass('.section-2, .section-4, .about-wealthapp')){
        console.log('find');
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
if ($(window).width() > 781 ) {
    console.log();
    if($('#disable_scrollify').length==0){
        $.scrollify({
            section : ".section-block",
            updateHash: false,
            interstitialSection :".non-section-block",
            easing: "easeOutExpo",
            scrollSpeed: 1000,
            touchScroll:true
       });
        add_animateclass()
       $servicelist.addClass('off');
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
    }
    
    
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

$('p.counts code').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 3000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    })
});


$(".tab-btn a").each(function(){
    $(this).attr('data_id',$(this).attr("href"));
    $(this).attr('onclick',"switchtab(this)");
    $(this).addClass("tab-button");
    $(this).attr('href',"javascript:void(0)");
});

  
});

$(document).on("click","#get-in-touch-form a",function(){
    console.log("get-in-touch-form");
    $('#get-in-touch-popup').addClass('show');
});

$(document).on("click",".pop-up-close-btn a",function(){
    $('#get-in-touch-popup').removeClass('show');
});



$(document).on('click',".file-trigger",function(){
    $('#resume').trigger('click'); 
});

$(document).on('change','#resume',function(){
   var filename = $(this).val() 
   var id = $(this).attr('id');
   if(this.files['length']>0){
       const fsize = this.files[0].size;
       const file = Math.round((fsize / 1024));
       if(file>5120){
           $(this).closest('.form-group').find('.error_txt').html('please select less than 5 mb');
       }else{
           $(this).closest('.form-group').find('.error_txt').html("");
       }
       $(this).closest('.form-group').find('.name').html(filename.replace(/^.*(\\|\/|\:)/, ''));
   }else{
        $(this).closest('.form-group').find('.name').html('Resume');
   }
});

function switchtab(element){
    $(".tab-button").removeClass("active");
    element.classList.add('active');
    $(".tab-content").removeClass('show');
    $(element.getAttribute('data_id')).addClass('show');
}

$(document).on('click','.tab-button',function(){
    alert("click");
    var tab_section = $(this).attr('data_id');
    $(".tab-button").removeClass("active");
    $(this).addClass('active');
    $(".tab-content").removeClass('show');
    $(tab_section).addClass('show');
    console.log(tab_section)
})



$(window).scroll(function(){
    var scroll_position = $(window).scrollTop();
    if(scroll_position>0){
        if($('#top-menu').hasClass('bg')==false){
            $('#top-menu').addClass('bg');
        }
    }else{
        $('#top-menu').removeClass('bg');

    }
    if ($(window).width() > 781 ) {
        if($('#disable_scrollify').length==0){
            add_animateclass()
        }
    }
});


$(window).bind('resize', function() { 
    owlResize($blog,commonoption);
    owlResize($testimonial,commonoption);
    owlResize($officeculture,option);
    owlResize($awards,linedotsoption);
    owlResize($gallery,galleryoption);
    owlResize_servicelist($servicelist ,serviceoption);

    console.log($(window).width())
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

$('#service-list .service-item').on('mouseleave',function(){
    $('.service-item').removeClass('active');
})

$(document).on('click','.scroll-to-section a',function(e){
    e.preventDefault();
    var index = parseInt($(this).attr('rel'));
    $.scrollify.move(index);
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
    if(!/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(val)){
        return false;
    }
    return true;
}

function onlynumeric(val){
    if(!/^[0-9 .]*$/g.test(val)){
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


function check_datetime(str){
  return new Date().getTime() < Date.parse(str);
}

$(document).on('blur','.form-field-validate',function(){
    var form_id = $(this).closest('form').attr('id');
    var required = $(this).attr('data-required');
    var validatetype = $(this).attr('data-validate');
    var length =1;
    if(validatetype!=undefined){
        var validatetypeoption = validatetype.split('|');
        length =validatetypeoption.length;
    }
    var value = $(this).val();
    
    var error_msg = {
        'required_error' : "this field is required",
        'onlyalphabets' : 'Please enter a valid input',
        'phonenumber' : 'Please enter a valid phone number',
        'onlynumeric' :'this field only accepts only numbers',
        'email' : 'Please enter a valid email',
        'minchars':'minimum length should be  %s',
        'maxchars':'maximum length should be  %s',
        'chars':'character length should be  %s',
        'check_datetime':'Please select a valid appointment Date & Time'
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
        $('#'+form_id+' input[type="submit"]').prop('disabled', true);
    }else{
        $(this).closest('.form-group').find('.error_txt').html("");
        $('#'+form_id+' input[type="submit"]').prop('disabled', false);
    }
});

$(document).on('change','.tax-scheme',function(){
    $(".tab-content").removeClass('active');
    $("#"+$(this).val()).addClass('active');
})
$(document).on('click','#search-btn a',function(){
    $('#search-block').css('top',$('#top-menu').outerHeight());
    $('#search-block').addClass('show');

    $('#top-menu').addClass('bg');
    $('header').addClass('search-open');

});

$(document).on('click','#search-close.close-btn a',function(){
    $('#search-block').css('top','');
    $('#search-block').removeClass('show');
    
    $('header').removeClass('search-open');

    var scroll_position = $(window).scrollTop();
    if(scroll_position==0){
        $('#top-menu').removeClass('bg');
    }
});
