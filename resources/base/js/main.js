$(".mensajesDialog").delay(5000).slideUp(200, function() {
    $(this).alert('close');
});
function saludo(){
	alert('Hola...');
}
$('[data-toogle="tooltip"]').tooltip();
$('[data-toogle="popover"]').popover();
