(function ($) {
	$.fn.countTo = function (options) {
		options = options || {};

		return $(this).each(function () {
			
			//Definir opções para o elemento atual
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from:            $(this).data('from'),
				to:              $(this).data('to'),
				speed:           $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals:        $(this).data('decimals')
			}, options);

			// Quantas vezes atualizar o valor e quanto aumentar o valor em cada atualização
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;

			// referências e variáveis que mudarão com cada atualização
			var self = this,
				$self = $(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data('countTo') || {};

			$self.data('countTo', data);

			// Se um intervalo existente puder ser encontrado, limpe-o primeiro
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);

			// Inicialize o elemento com o valor inicial
			render(value);

			//atualização Temporizador
			function updateTimer() {
				value += increment;
				loopCount++;

				render(value);

				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}

				if (loopCount >= loops) {
					// remove the interval
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;

					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}

			//renderizar
			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.text(formattedValue);
			}
		});
	};

	$.fn.countTo.defaults = {
		from: 0,               // O número que o elemento deve começar em
		to: 0,                 // O número que o elemento deve terminar em
		speed: 1000,           // Quanto tempo deve demorar para contar entre os números alvo
		refreshInterval: 100,  // Com que frequência o elemento deve ser atualizado
		decimals: 0,           // O número de casas decimais para mostrar
		formatter: formatter,  // Manipulador para formatar o valor antes da renderização
		onUpdate: null,        // Método de retorno de chamada para cada vez que o elemento é atualizado
		onComplete: null       // Método de retorno de chamada para cada vez que o elemento é atualizado
	};

	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
}(jQuery));