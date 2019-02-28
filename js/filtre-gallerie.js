// script js externe : isotope.pkgd.js

// initialisation d'Isotope
var $grid = $('.grid').isotope({
    itemSelector: '.color-shape'
  });
  
  // filtre pour chaque groupe 
  var filters = {};
  
  $('.filters').on( 'click', '.button', function( event ) {
    var $button = $( event.currentTarget );
    //  clefs du groupe
    var $buttonGroup = $button.parents('.button-group');
    var filterGroup = $buttonGroup.attr('data-filter-group');
    // on definit les filtres
    filters[ filterGroup ] = $button.attr('data-filter');
    // on les combines
    var filterValue = concatValues( filters );
    // puis on definit ceux pour isotope
    $grid.isotope({ filter: filterValue });
  });
  
  // pour changer la class selon le bouton cliqué
  $('.button-group').each( function( i, buttonGroup ) {
    var $buttonGroup = $( buttonGroup );
    $buttonGroup.on( 'click', 'button', function( event ) {
      $buttonGroup.find('.is-checked').removeClass('is-checked');
      var $button = $( event.currentTarget );
      $button.addClass('is-checked');
    });
  });
    
  // puis concatenation des valeurs 
  function concatValues( obj ) {
    var value = '';
    for ( var prop in obj ) {
      value += obj[ prop ];
    }
    return value;
  }
  