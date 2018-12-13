jQuery(document).ready(function($) {

  // Open external menu links in new tab
  $('ul#adminmenu li#toplevel_page_lexi a').each(function() {
    var linkTarget = $(this).attr('href');

    if(linkTarget.indexOf('.elexicon.com') > -1) {
      $(this).attr('target', '_blank');
    }
  });
});
