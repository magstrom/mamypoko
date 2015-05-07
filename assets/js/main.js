// use jQuery correctly with strict
(function($) {
   "use strict";
   jQuery("#main-menu").dcAccordion();
   jQuery(".modal-body img, .action-tb a, .tooltip-mp").hover(function () {
      jQuery(this).tooltip("toggle");
   });
   jQuery('#startFilter').datepicker();
   jQuery('#endFilter').datepicker();

})(jQuery);
