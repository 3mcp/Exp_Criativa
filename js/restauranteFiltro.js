$('.dropdown-menu li').on('change', function() {
  var categoria = $(this).find('label').text();

  $.ajax({
      type: 'POST',
      url: '../databaseRestaurante/restauranteFiltro.php', 
      data: { categoria: categoria }, 
      success: function(response) {
          $('.Restaurantes').html(response);
      }
  });
});
