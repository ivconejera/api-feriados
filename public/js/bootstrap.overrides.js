(function($){

	/* TYPEAHEAD OVERRIDES
  * ====================== */

	//Add after select to typeahead plugin
	$.fn.typeahead.defaults.afterSelect = function(val){
	};
	//Replce the select method of typeahead plugin
	$.fn.typeahead.Constructor.prototype.select = function () {
    var val = this.$menu.find('.active').attr('data-value');
    this.$element
      .val(this.updater(val))
      .change();
    this.options.afterSelect(val);
    return this.hide();
  }
  /* ====================== */

})(jQuery);