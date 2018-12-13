jQuery(document).ready(function($) {

  // Open external menu links in new tab
  $('ul#adminmenu li#toplevel_page_lexi a').each(function() {
    var linkTarget = $(this).attr('href');

    if(linkTarget.match(/(elexicon|github)/)) {
      $(this).attr('target', '_blank');
    }
  });

  // Lexi Menu Separators
  $('ul#adminmenu a span.lexi-separator').each(function() {
    var parentLink = $(this).parent('a');

    parentLink.css('cursor', 'default');
    parentLink.click(function(e) {
      e.preventDefault();
    });
  });
});
