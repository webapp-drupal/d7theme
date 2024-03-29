/*
BttrLazyLoading, Responsive Lazy Loading plugin for JQuery
by Julien Renaux http://bttrlazyloading.julienrenaux.fr

Version: 1.0.5
Full source at https://github.com/shprink/BttrLazyLoading

MIT License, https://github.com/shprink/BttrLazyLoading/blob/master/LICENSE
*/
(function(){"use strict";var t,i,n;t=jQuery,i=function(){function i(i,n){var r;null==n&&(n={}),this.$img=t(i),this.loaded=!1,this.loading=!1,r=t.extend(!0,{},t.bttrlazyloading.constructor.options),this.options=t.extend(!0,r,n),this.ranges=t.bttrlazyloading.constructor.ranges,this.$container=t(this.options.container),"number"==typeof window.devicePixelRatio&&(this.constructor.dpr=window.devicePixelRatio),this.whiteList=["lg","md","sm","xs"],this.blackList=[],h.call(this),this.$wrapper=t('<span class="bttrlazyloading-wrapper"></span>'),this.options.wrapperClasses&&"string"==typeof this.options.wrapperClasses&&this.$wrapper.addClass(this.options.wrapperClasses),this.$img.before(this.$wrapper),this.$clone=t('<canvas class="bttrlazyloading-clone"></canvas>'),d.call(this),this.$wrapper.append(this.$clone),this.$img.hide(),this.$wrapper.append(this.$img),this.options.backgroundcolor&&this.$wrapper.css("background-color",this.options.backgroundcolor),A.call(this,"on"),setTimeout(function(t){return function(){return c.call(t)}}(this),100)}var n,r,o,e,s,a,l,h,A,c,d;return i.dpr=1,d=function(){var t;return t=r.call(this),this.$clone.attr("width",t.width),this.$clone.attr("height",t.height)},h=function(){return t.each(this.$img.data(),function(i){return function(n,r){if(r){if(0!==n.indexOf("bttrlazyloading"))return!1;if(n=n.replace("bttrlazyloading","").replace(/([a-z])([A-Z])/g,"$1-$2").toLowerCase().split("-"),n.length>1){if("undefined"!=typeof i.options[n[0]][n[1]])return i.options[n[0]][n[1]]=r}else{if("object"==typeof r)return t.extend(i.options[n[0]],r);if("undefined"!=typeof i.options[n[0]])return i.options[n[0]]=r}}}}(this))},A=function(i){var o,e,s,a;return s=function(t){return function(){return t.$clone.hide(),t.$img.show(),t.$wrapper.addClass("bttrlazyloading-loaded"),t.options.animation&&t.$img.addClass("animated "+t.options.animation),t.loaded=t.$img.attr("src"),t.$img.trigger("bttrlazyloading.afterLoad")}}(this),this.$img[i]("load",s),o=function(t){return function(){var i;return t.loading?void 0:(t.loading=!0,i=r.call(t),t.loaded?(t.$wrapper.removeClass("bttrlazyloading-loaded"),t.options.animation&&t.$img.removeClass("animated "+t.options.animation),t.$img.removeAttr("src"),t.$img.hide(),t.$clone.attr("width",i.width),t.$clone.attr("height",i.height),t.$clone.show()):t.$wrapper.css("background-image","url('"+t.options.placeholder+"')"),setTimeout(function(){return t.$img.trigger("bttrlazyloading.beforeLoad"),t.$img.data("bttrlazyloading.range",i.range),t.$img.attr("src",n.call(t,i.src,i.range)),t.loading=!1},t.options.delay))}}(this),this.$img[i]("bttrlazyloading.load",o),e=function(t){return function(){var i,n;if(n=t.$img.attr("src"),i=t.$img.data("bttrlazyloading.range"),t.constructor.dpr>=2&&t.options.retina&&n.match(/@2x/gi))t.blackList.push(i+"@2x");else if(t.blackList.push(i),t.whiteList.splice(t.whiteList.indexOf(i),1),0===t.whiteList.length)return t.$img.trigger("bttrlazyloading.error"),!1;return t.$img.trigger("bttrlazyloading.load")}}(this),this.$img[i]("error",e),a=function(t){return function(){return c.call(t)}}(this),this.$container[i](this.options.event,a),this.options.container!==window&&t(window)[i](this.options.event,a),t(window)[i]("resize",a)},s=function(){var t;return t=window.innerWidth,t<=this.ranges.xs?"xs":this.ranges.sm<=t&&t<this.ranges.md?"sm":this.ranges.md<=t&&t<this.ranges.lg?"md":this.ranges.lg<=t?"lg":void 0},r=function(){return this.range=s.call(this),e.call(this)},n=function(t,i){return this.constructor.dpr>=2&&this.options.retina&&-1===this.blackList.indexOf(i+"@2x")?t.replace(/\.\w+$/,function(t){return"@2x"+t}):t},o=function(t){return"undefined"!=typeof this.options[t].src&&null!==this.options[t].src?this.options[t]:null},e=function(){var t,i,n,r,e,s;if(t=this.whiteList.indexOf(this.range),t>-1&&(n=o.call(this,this.range)))return n.range=this.range,n;for(s=this.whiteList,t=r=0,e=s.length;e>r;t=++r)if(i=s[t],n=o.call(this,i))return n.range=i,n;return""},a=function(){var i,o,e;return!this.loaded&&this.options.triggermanually?!1:this.loaded&&this.options.updatemanually?!1:(i=r.call(this),i.src&&this.loaded!==n.call(this,i.src,i.range)?(e=0,this.loaded||(e=this.options.threshold),o=l.call(this,t(window),{top:t(window).scrollTop()+e,left:t(window).scrollLeft()}),this.options.container!==window?o&&l.call(this,this.$container,{top:this.$container.offset().top+e,left:this.$container.offset().left}):o):!1)},l=function(t,i){var n;return null==i&&(i={}),i.right=i.left+t.width(),i.bottom=i.top+t.height(),n=this.$wrapper.offset(),n.right=n.left+this.$wrapper.outerWidth(),n.bottom=n.top+this.$wrapper.outerHeight(),!(i.right<n.left||i.left>n.right||i.bottom<n.top||i.top>n.bottom)},c=function(){return this.range!==s.call(this)&&d.call(this),a.call(this)?this.$img.trigger("bttrlazyloading.load"):void 0},i.prototype.get$Img=function(){return this.$img},i.prototype.get$Clone=function(){return this.$clone},i.prototype.get$Wrapper=function(){return this.$wrapper},i.prototype.destroy=function(){return this.$wrapper.before(this.$img),this.$wrapper.remove(),A.call(this,"off"),this.$img.off("bttrlazyloading"),this.$wrapper.removeClass("bttrlazyloading-loaded"),this.options.animation&&this.$img.removeClass("animated "+this.options.animation),this.$img.removeData("bttrlazyloading"),this.$img},i}(),t.fn.extend({bttrlazyloading:function(n){return this.each(function(){var r,o;return r=t(this),o=r.data("bttrlazyloading"),"undefined"==typeof o&&(o=new i(this,n),r.data("bttrlazyloading",o)),"string"==typeof n&&"undefined"!=typeof o[n]?o[n].call(o):void 0})}}),t.fn.bttrlazyloading.Constructor=i,n=function(){function i(){}return i.prototype.version="1.0.3",i.ranges={xs:767,sm:768,md:992,lg:1200},i.options={xs:{src:null,width:100,height:100},sm:{src:null,width:100,height:100},md:{src:null,width:100,height:100},lg:{src:null,width:100,height:100},retina:!1,animation:"bounceIn",delay:0,event:"scroll",container:window,threshold:0,triggermanually:!1,updatemanually:!1,wrapperClasses:null,backgroundcolor:"#EEE",placeholder:"data:image/gif;base64,R0lGODlhEAALAPQAAP/391tbW+bf3+Da2vHq6l5dXVtbW3h2dq6qqpiVldLMzHBvb4qHh7Ovr5uYmNTOznNxcV1cXI2Kiu7n5+Xf3/fw8H58fOjh4fbv78/JycG8vNzW1vPs7AAAAAAAAAAAACH/C05FVFNDQVBFMi4wAwEAAAAh/hpDcmVhdGVkIHdpdGggYWpheGxvYWQuaW5mbwAh+QQJCwAAACwAAAAAEAALAAAFLSAgjmRpnqSgCuLKAq5AEIM4zDVw03ve27ifDgfkEYe04kDIDC5zrtYKRa2WQgAh+QQJCwAAACwAAAAAEAALAAAFJGBhGAVgnqhpHIeRvsDawqns0qeN5+y967tYLyicBYE7EYkYAgAh+QQJCwAAACwAAAAAEAALAAAFNiAgjothLOOIJAkiGgxjpGKiKMkbz7SN6zIawJcDwIK9W/HISxGBzdHTuBNOmcJVCyoUlk7CEAAh+QQJCwAAACwAAAAAEAALAAAFNSAgjqQIRRFUAo3jNGIkSdHqPI8Tz3V55zuaDacDyIQ+YrBH+hWPzJFzOQQaeavWi7oqnVIhACH5BAkLAAAALAAAAAAQAAsAAAUyICCOZGme1rJY5kRRk7hI0mJSVUXJtF3iOl7tltsBZsNfUegjAY3I5sgFY55KqdX1GgIAIfkECQsAAAAsAAAAABAACwAABTcgII5kaZ4kcV2EqLJipmnZhWGXaOOitm2aXQ4g7P2Ct2ER4AMul00kj5g0Al8tADY2y6C+4FIIACH5BAkLAAAALAAAAAAQAAsAAAUvICCOZGme5ERRk6iy7qpyHCVStA3gNa/7txxwlwv2isSacYUc+l4tADQGQ1mvpBAAIfkECQsAAAAsAAAAABAACwAABS8gII5kaZ7kRFGTqLLuqnIcJVK0DeA1r/u3HHCXC/aKxJpxhRz6Xi0ANAZDWa+kEAA7AAAAAAAAAAAA"},i.prototype.setOptions=function(i){return null==i&&(i={}),t.extend(!0,this.constructor.options,i),this},i.prototype.setRanges=function(i){return null==i&&(i={}),t.extend(!0,this.constructor.ranges,i),this},i}(),t.bttrlazyloading=new n}).call(this);

$('#featured-image').bttrlazyloading();
$('#home-featured-image').bttrlazyloading();
$('#most-read-image').bttrlazyloading();
$('#home-most-read-image-1').bttrlazyloading();
$('#home-most-read-image-2').bttrlazyloading();
$('#home-most-read-image-3').bttrlazyloading();
$('#partner-image').bttrlazyloading();
$('#sponsor-image').bttrlazyloading();
$('#trending-1-image').bttrlazyloading();
$('#trending-2-image').bttrlazyloading();
$('#trending-3-image').bttrlazyloading();
$('#trending-4-image').bttrlazyloading();
$('#trending-5-image').bttrlazyloading();
$('#related-1-image').bttrlazyloading();
$('#related-2-image').bttrlazyloading();
$('#related-3-image').bttrlazyloading();
$('#related-4-image').bttrlazyloading();
$('#related-5-image').bttrlazyloading();
$('#related-6-image').bttrlazyloading();
$('#related-7-image').bttrlazyloading();
$('#related-8-image').bttrlazyloading();
$('#list-image-1').bttrlazyloading();
$('#list-image-2').bttrlazyloading();
$('#list-image-3').bttrlazyloading();
$('#list-image-4').bttrlazyloading();
$('#list-image-5').bttrlazyloading();
$('#list-image-6').bttrlazyloading();
$('#list-image-7').bttrlazyloading();
$('#list-image-8').bttrlazyloading();
$('#list-image-9').bttrlazyloading();
$('#list-image-10').bttrlazyloading();
$('#list-image-11').bttrlazyloading();
$('#list-image-12').bttrlazyloading();
$('#list-image-13').bttrlazyloading();
$('#list-image-14').bttrlazyloading();
$('#list-image-15').bttrlazyloading();
$('#list-image-16').bttrlazyloading();
$('#list-image-17').bttrlazyloading();
$('#list-image-18').bttrlazyloading();
$('#list-image-19').bttrlazyloading();


$.bttrlazyloading.setRanges({
  xs: 768,
  sm: 768,
  md: 1280,
  lg: 1600
});