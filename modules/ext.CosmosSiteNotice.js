// Eliminar la implementación del Sitenotice de Cosmos
$('#siteNotice').prependTo($('#cosmos-pageContent-subtitle')).promise().done(function() {
  // Esta función se ejecuta después de que la operación prependTo() haya terminado
  // Mover el elemento fuera de la implementación de Cosmos
  $('#cosmos-content-siteNotice').remove(); // Eliminar el elemento y sus hijos en cuestión
});
