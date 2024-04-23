function toggleBanner() {
  var banner = document.getElementById('floatingBanner');
  var content = banner.querySelector('.banner-content');

  if (content.style.display === 'none' || content.style.display === '') {
      // Mostrar el contenido del banner si está oculto o no tiene estilo de visualización
      content.style.display = 'block';
  } else {
      // Ocultar el contenido del banner si está visible
      content.style.display = 'none';
  }
}
