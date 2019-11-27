(function($){
    $.fn.curlies = function( itemQuery ) {
        function smarten(text) {
            return text
                /* opening singles */
                .replace(/(^|[-\u2014\s(\["])'/g, "$1\u2018")

                /* closing singles & apostrophes */
                .replace(/'/g, "\u2019")

                /* opening doubles */
                .replace(/(^|[-\u2014/\[(\u2018\s])"/g, "$1\u201c")

                /* closing doubles */
                .replace(/"/g, "\u201d")

                /* em-dashes */
                .replace(/--/g, "\u2014");
        };

        return this.each(function(){
            var $this = $(this);
			//console.log($this.attr('class'));
			if($this.attr('class')!="tns-modal-wrapper" && $this.attr('class')!="content node-paywall"){
				var $children = $this.children();
				if ($children.length) {
					$children.each(function(){
					//console.log($this.attr('class'));
						if($this.attr('class')!="tns-modal-wrapper" && $this.attr('class')!="content node-paywall"){
							$(this).curlies();
						}
					});
				} else {
					if($this.attr('class')!="tns-modal-wrapper" && $this.attr('class')!="content node-paywall"){
						$this.text( smarten( $this.text() ) );
					}
				}
			}
        });
    };
})(jQuery);