jQuery(function($) {

	// Pré-carregador
	var preloader = $('.preloader');
	$(window).load(function(){
		preloader.remove();
	});

	//#controle deslizante principal
	var slideHeight = $(window).height();
	$('#home-slider .item').css('height',slideHeight);

	$(window).resize(function(){'use strict',
		$('#home-slider .item').css('height',slideHeight);
	});
	
	// Menu de rolagem
	$(window).on('scroll', function(){
		if( $(window).scrollTop()>slideHeight ){
			$('.main-nav').addClass('navbar-fixed-top');
		} else {
			$('.main-nav').removeClass('navbar-fixed-top');
		}
	});
	
	// Navegação de rolagem
	$(window).scroll(function(event) { //Scrol = rolagem
		Scroll();
	});

	$('.navbar-collapse ul li a').on('click', function() {  
		$('html, body').animate({scrollTop: $(this.hash).offset().top - 5}, 1000);
		return false;
	});

	// Função definida pelo usuário
	function Scroll() {
		var contentTop      =   []; //conteúdo do topo
		var contentBottom   =   []; //conteúdo do inferior
		var winTop      =   $(window).scrollTop(); //janela do topo ou topo da janela
		var rangeTop    =   200; //alcance do topo
		var rangeBottom =   500; //alcance inferior
		$('.navbar-collapse').find('.scroll a').each(function(){ //find = empurrar ou forçar
			contentTop.push( $( $(this).attr('href') ).offset().top); //push = empurrar
			contentBottom.push( $( $(this).attr('href') ).offset().top + $( $(this).attr('href') ).height() ); //height = altura
		})
		$.each( contentTop, function(i){ //each = cada
			if ( winTop > contentTop[i] - rangeTop ){
				$('.navbar-collapse li.scroll') //Deslocamento do barramento da barra de navegação
				.removeClass('active') 
				.eq(i).addClass('active');			
			}
		})
	};

	$('#tohash').on('click', function(){ //tohash = confusão ou erro grave
		$('html, body').animate({scrollTop: $(this.hash).offset().top - 5}, 1000);
		return false;
	});
	
	// Inicie WOW JS
	new WOW().init(); 
	
	// Rolagem suave
	smoothScroll.init();
	
	// Barra de progresso
	$('#about-us').bind('inview', function(event, visible, visiblePartX, visiblePartY) {
		if (visible) {
			$.each($('div.progress-bar'),function(){
				$(this).css('width', $(this).attr('aria-valuetransitiongoal')+'%');
			});
			$(this).unbind('inview');
		}
	});

	// Contagem regressiva
	$('#features').bind('inview', function(event, visible, visiblePartX, visiblePartY) {
		if (visible) {
			$(this).find('.timer').each(function () {
				var $this = $(this);
				$({ Counter: 0 }).animate({ Counter: $this.text() }, {
					duration: 2000,
					easing: 'swing',
					step: function () {
						$this.text(Math.ceil(this.Counter));
					}
				});
			});
			$(this).unbind('inview'); //inview = em vista
		}
	});

	// Visão Única de Carteira (Portifólio)
	$('#portfolio').on('click','.folio-read-more',function(event){
		event.preventDefault();
		var link = $(this).data('single_url');
		var full_url = '#portfolio-single-wrap',
		parts = full_url.split("#"),
		trgt = parts[1],
		target_top = $("#"+trgt).offset().top;

		$('html, body').animate({scrollTop:target_top}, 600);
		$('#portfolio-single').slideUp(500, function(){
			$(this).load(link,function(){
				$(this).slideDown(500);
			});
		});
	});

	// Fechar exibição individual de portfólio
	$('#portfolio-single-wrap').on('click', '.close-folio-item',function(event) {
		event.preventDefault();
		var full_url = '#portfolio',
		parts = full_url.split("#"),
		trgt = parts[1],
		target_offset = $("#"+trgt).offset(),
		target_top = target_offset.top;
		$('html, body').animate({scrollTop:target_top}, 600);
		$("#portfolio-single").slideUp(500);
	});

	// Formulário de contato
	var form = $('#main-contact-form');
	form.submit(function(event){
		event.preventDefault();
		var form_status = $('<div class="form_status"></div>');
		
		$.ajax({
			url: $(this).attr('action'),
			beforeSend: function(){
				form.prepend( form_status.html('<p><i class="fa fa-spinner fa-spin"></i> O e-mail está enviando ...</p>').fadeIn() );
			}
		}).done(function(data){
			form_status.html('<p class="text-success">Obrigado por nos contactar. O mais cedo possível entraremos em contato com você</p>').delay(3000).fadeOut(); //fadeOut = Desaparecer
		});
	});
});