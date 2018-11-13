(function() {
  $(function() {
    var collapseMyMenu, expandMyMenu, hideMenuTexts, showMenuTexts;
    expandMyMenu = function() {
      return $("nav.sidebar").removeClass("sidebar-menu-collapsed").addClass("sidebar-menu-expanded");
    };
    collapseMyMenu = function() {
      return $("nav.sidebar").removeClass("sidebar-menu-expanded").addClass("sidebar-menu-collapsed");
    };
    showMenuTexts = function() {
      return $("nav.sidebar ul a span.expanded-element").show();
    };
    hideMenuTexts = function() {
      return $("nav.sidebar ul a span.expanded-element").hide();
    };
    expandMainContent=function(){
    return $("div#page-content-wrapper").removeClass("collapsed").addClass("expanded");
    }
    collapseMainContent=function(){
     return $("div#page-content-wrapper").removeClass("expanded").addClass("collapsed");
    }
    return $("#justify-icon").click(function(e) {
      if ($(this).parent("nav.sidebar").hasClass("sidebar-menu-collapsed")) {
        expandMyMenu();
        showMenuTexts();
        expandMainContent();
        $(this).css({
          color: "#000"
        });
      } else if ($(this).parent("nav.sidebar").hasClass("sidebar-menu-expanded")) {
        collapseMyMenu();
        hideMenuTexts();
        collapseMainContent();
        $(this).css({
          color: "#000"
        });
      }
      return false;
    });
  });

}).call(this);
