// Eliminar la implementación del Sitenotice de Cosmos
$('#siteNotice').prependTo($('#cosmos-pageContent-subtitle')).then(function() {
    // Mover el elemento fuera de la implementación de Cosmos
    $('#cosmos-content-siteNotice').remove(); // Eliminar el elemento y sus hijos en cuestión
  });
  