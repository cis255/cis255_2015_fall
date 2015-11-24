// JavaScript Document
jQuery(document).ready(function(){
  svsu.setTemplate(jQuery('#pretty-course-template').html());
});

jQuery('#lookupForm').on('click', '#fetchJSON', function(event){

  event.preventDefault();

  var $icon = jQuery('#fetchJSON > i'),
      data  = jQuery('#lookupForm').serialize(),
      route = svsu.buildCourseURI();

  $icon.removeClass('fa-code').addClass('fa-spinner').addClass('fa-spin');
  jQuery('#jsonResults .response').text('');
  jQuery('#prettyResults').hide();

  jQuery.ajax({
    data: data,
    dataType: 'jsonp',
    jsonp: 'callback',
    url: route,
  }).done(function(data){
 
    jQuery('#jsonResults .response').text(svsu.formatJSON(data));
    jQuery('#jsonResults').fadeIn();
    $icon.addClass('fa-code').removeClass('fa-spinner').removeClass('fa-spin');

  }).error(function(data){
    jQuery('#jsonResults').append('ERROR');
  });

});


jQuery('#lookupForm').on('click', '#fetchPretty', function(event){

  event.preventDefault();

  var $icon = jQuery('#fetchPretty > i'),
      data  = jQuery('#lookupForm').serialize(),
      route = svsu.buildCourseURI();

  $icon.removeClass('fa-paint-brush').addClass('fa-spinner').addClass('fa-spin');
  jQuery('#prettyResults .response').text('');
  jQuery('#jsonResults').hide();

  jQuery.ajax({
    data: data,
    dataType: 'jsonp',
    jsonp: 'callback',
    url: route,
  }).done(function(data){

    jQuery('#prettyResults .response').html(svsu.formatHTML(data));
    jQuery('#prettyResults').fadeIn();
    $icon.addClass('fa-paint-brush').removeClass('fa-spinner').removeClass('fa-spin');

  }).error(function(data){
    jQuery('#prettyResults').append('ERROR');
  });

});