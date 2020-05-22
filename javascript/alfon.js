$('.list-reset li').on('click', function(){
	$('.list-reset li').removeClass('active')
	$(this).addClass('active')
})


/*Paneles con los panas*/
const panels = document.querySelectorAll('.panel');

panels.forEach(panel => panel.addEventListener('click', toggleOpen));

function toggleOpen() {
	this.classList.toggle('open');
}

