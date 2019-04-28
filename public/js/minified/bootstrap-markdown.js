!function(t){"function"==typeof define&&define.amd?define(["jquery"],t):"object"==typeof exports?t(require("jquery")):t(jQuery)}(function(t){"use strict";var e=function(e,n){t.each(["autofocus","savable","hideable","width","height","resize","iconlibrary","language","footer","fullscreen","hiddenButtons","disabledButtons"],function(i,o){void 0!==t(e).data(o)&&((n="object"==typeof n?n:{})[o]=t(e).data(o))}),this.$ns="bootstrap-markdown",this.$element=t(e),this.$editable={el:null,type:null,attrKeys:[],attrValues:[],content:null},this.$options=t.extend(!0,{},t.fn.markdown.defaults,n,this.$element.data("options")),this.$oldContent=null,this.$isPreview=!1,this.$isFullscreen=!1,this.$editor=null,this.$textarea=null,this.$handler=[],this.$callback=[],this.$nextTab=[],this.showEditor()};e.prototype={constructor:e,__alterButtons:function(e,n){var i=this.$handler,o="all"==e,s=this;t.each(i,function(t,i){!1===(!o&&i.indexOf(e)<0)&&n(s.$editor.find('button[data-handler="'+i+'"]'))})},__buildButtons:function(e,n){var i,o=this.$ns,s=this.$handler,a=this.$callback;for(i=0;i<e.length;i++){var r,l=e[i];for(r=0;r<l.length;r++){var c,h=l[r].data,d=t("<div/>",{class:"btn-group"});for(c=0;c<h.length;c++){var u,f,p=h[c],g=o+"-"+p.name,v=this.__getIcon(p),m=p.btnText?p.btnText:"",b=p.btnClass?p.btnClass:"btn",y=p.tabIndex?p.tabIndex:"-1",$=void 0!==p.hotkey?p.hotkey:"",w=void 0!==jQuery.hotkeys&&""!==$?" ("+$+")":"";(u=t("<button></button>")).text(" "+this.__localize(m)).addClass("btn-default btn-sm").addClass(b),b.match(/btn\-(primary|success|info|warning|danger|link)/)&&u.removeClass("btn-default"),u.attr({type:"button",title:this.__localize(p.title)+w,tabindex:y,"data-provider":o,"data-handler":g,"data-hotkey":$}),!0===p.toggle&&u.attr("data-toggle","button"),(f=t("<span/>")).addClass(v),f.prependTo(u),d.append(u),s.push(g),a.push(p.callback)}n.append(d)}}return n},__setListener:function(){var t=void 0!==this.$textarea.attr("rows"),e=this.$textarea.val().split("\n").length>5?this.$textarea.val().split("\n").length:"5",n=t?this.$textarea.attr("rows"):e;this.$textarea.attr("rows",n),this.$options.resize&&this.$textarea.css("resize",this.$options.resize),this.$textarea.data("markdown",this)},__setEventListeners:function(){this.$textarea.on({focus:t.proxy(this.focus,this),keyup:t.proxy(this.keyup,this),change:t.proxy(this.change,this),select:t.proxy(this.select,this)}),this.eventSupported("keydown")&&this.$textarea.on("keydown",t.proxy(this.keydown,this)),this.eventSupported("keypress")&&this.$textarea.on("keypress",t.proxy(this.keypress,this))},__handle:function(e){var n=t(e.currentTarget),i=this.$handler,o=this.$callback,s=n.attr("data-handler"),a=o[i.indexOf(s)];t(e.currentTarget).focus(),a(this),this.change(this),s.indexOf("cmdSave")<0&&this.$textarea.focus(),e.preventDefault()},__localize:function(e){var n=t.fn.markdown.messages,i=this.$options.language;return void 0!==n&&void 0!==n[i]&&void 0!==n[i][e]?n[i][e]:e},__getIcon:function(t){if("object"==typeof t){var e=this.$options.customIcons[t.name];return void 0===e?t.icon[this.$options.iconlibrary]:e}return t},setFullscreen:function(e){var n=this.$editor,i=this.$textarea;!0===e?(n.addClass("md-fullscreen-mode"),t("body").addClass("md-nooverflow"),this.$options.onFullscreen(this)):(n.removeClass("md-fullscreen-mode"),t("body").removeClass("md-nooverflow"),this.$options.onFullscreenExit(this),!0===this.$isPreview&&this.hidePreview().showPreview()),this.$isFullscreen=e,i.focus()},showEditor:function(){var e,n=this,i=this.$ns,o=this.$element,s=(o.css("height"),o.css("width"),this.$editable),a=this.$handler,r=this.$callback,l=this.$options,c=t("<div/>",{class:"md-editor",click:function(){n.focus()}});if(null===this.$editor){var h=t("<div/>",{class:"md-header btn-toolbar"}),d=[];if(l.buttons.length>0&&(d=d.concat(l.buttons[0])),l.additionalButtons.length>0&&t.each(l.additionalButtons[0],function(e,n){var i=t.grep(d,function(t,e){return t.name===n.name});i.length>0?i[0].data=i[0].data.concat(n.data):d.push(l.additionalButtons[0][e])}),l.reorderButtonGroups.length>0&&(d=d.filter(function(t){return l.reorderButtonGroups.indexOf(t.name)>-1}).sort(function(t,e){return l.reorderButtonGroups.indexOf(t.name)<l.reorderButtonGroups.indexOf(e.name)?-1:l.reorderButtonGroups.indexOf(t.name)>l.reorderButtonGroups.indexOf(e.name)?1:0})),d.length>0&&(h=this.__buildButtons([d],h)),l.fullscreen.enable&&h.append('<div class="md-controls"><a class="md-control md-control-fullscreen" href="#"><span class="'+this.__getIcon(l.fullscreen.icons.fullscreenOn)+'"></span></a></div>').on("click",".md-control-fullscreen",function(t){t.preventDefault(),n.setFullscreen(!0)}),c.append(h),o.is("textarea"))o.before(c),(e=o).addClass("md-input"),c.append(e);else{var u="function"==typeof toMarkdown?toMarkdown(o.html()):o.html(),f=t.trim(u);e=t("<textarea/>",{class:"md-input",val:f}),c.append(e),s.el=o,s.type=o.prop("tagName").toLowerCase(),s.content=o.html(),t(o[0].attributes).each(function(){s.attrKeys.push(this.nodeName),s.attrValues.push(this.nodeValue)}),o.replaceWith(c)}var p,g=t("<div/>",{class:"md-footer"}),v=!1;if(l.savable){v=!0;var m="cmdSave";a.push(m),r.push(l.onSave),g.append('<button class="btn btn-success" data-provider="'+i+'" data-handler="'+m+'"><i class="icon icon-white icon-ok"></i> '+this.__localize("Save")+"</button>")}if(p="function"==typeof l.footer?l.footer(this):l.footer,""!==t.trim(p)&&(v=!0,g.append(p)),v&&c.append(g),l.width&&"inherit"!==l.width&&(jQuery.isNumeric(l.width)?(c.css("display","table"),e.css("width",l.width+"px")):c.addClass(l.width)),l.height&&"inherit"!==l.height)if(jQuery.isNumeric(l.height)){var b=l.height;h&&(b=Math.max(0,b-h.outerHeight())),g&&(b=Math.max(0,b-g.outerHeight())),e.css("height",b+"px")}else c.addClass(l.height);this.$editor=c,this.$textarea=e,this.$editable=s,this.$oldContent=this.getContent(),this.__setListener(),this.__setEventListeners(),this.$editor.attr("id",(new Date).getTime()),this.$editor.on("click",'[data-provider="bootstrap-markdown"]',t.proxy(this.__handle,this)),(this.$element.is(":disabled")||this.$element.is("[readonly]"))&&(this.$editor.addClass("md-editor-disabled"),this.disableButtons("all")),this.eventSupported("keydown")&&"object"==typeof jQuery.hotkeys&&h.find('[data-provider="bootstrap-markdown"]').each(function(){var n=t(this),i=n.attr("data-hotkey");""!==i.toLowerCase()&&e.bind("keydown",i,function(){return n.trigger("click"),!1})}),"preview"===l.initialstate?this.showPreview():"fullscreen"===l.initialstate&&l.fullscreen.enable&&this.setFullscreen(!0)}else this.$editor.show();return l.autofocus&&(this.$textarea.focus(),this.$editor.addClass("active")),l.fullscreen.enable&&!1!==l.fullscreen&&(this.$editor.append('<div class="md-fullscreen-controls"><a href="#" class="exit-fullscreen" title="Exit fullscreen"><span class="'+this.__getIcon(l.fullscreen.icons.fullscreenOff)+'"></span></a></div>'),this.$editor.on("click",".exit-fullscreen",function(t){t.preventDefault(),n.setFullscreen(!1)})),this.hideButtons(l.hiddenButtons),this.disableButtons(l.disabledButtons),l.dropZoneOptions&&(this.$editor.dropzone?(l.dropZoneOptions.init||(l.dropZoneOptions.init=function(){var t=0;this.on("drop",function(n){t=e.prop("selectionStart")}),this.on("success",function(n,i){var o=e.val();e.val(o.substring(0,t)+"\n![description]("+i+")\n"+o.substring(t))}),this.on("error",function(t,e,n){console.log("Error:",e)})}),this.$editor.addClass("dropzone"),this.$editor.dropzone(l.dropZoneOptions)):console.log("dropZoneOptions was configured, but DropZone was not detected.")),!0===l.enableDropDataUri&&this.$editor.on("drop",function(n){var i=e.prop("selectionStart");n.stopPropagation(),n.preventDefault(),t.each(n.originalEvent.dataTransfer.files,function(t,n){var o,s,a=new FileReader;a.onload=(s=(o=n).type.split("/")[0],function(t){var n=e.val();"image"===s?e.val(n.substring(0,i)+'\n<img src="'+t.target.result+'" />\n'+n.substring(i)):e.val(n.substring(0,i)+'\n<a href="'+t.target.result+'">Download '+o.name+"</a>\n"+n.substring(i))}),a.readAsDataURL(n)})}),l.onShow(this),this},parseContent:function(t){return t=t||this.$textarea.val(),this.$options.parser?this.$options.parser(t):"object"==typeof markdown?markdown.toHTML(t):"function"==typeof marked?marked(t):t},showPreview:function(){var e,n,i=this.$options,o=this.$textarea,s=o.next(),a=t("<div/>",{class:"md-preview","data-provider":"markdown-preview"});return!0===this.$isPreview?this:(this.$isPreview=!0,this.disableButtons("all").enableButtons("cmdPreview"),e="string"==typeof(n=i.onPreview(this,a))?n:this.parseContent(),a.html(e),s&&"md-footer"==s.attr("class")?a.insertBefore(s):o.parent().append(a),a.css({width:o.outerWidth()+"px","min-height":o.outerHeight()+"px",height:"auto"}),this.$options.resize&&a.css("resize",this.$options.resize),o.hide(),a.data("markdown",this),(this.$element.is(":disabled")||this.$element.is("[readonly]"))&&(this.$editor.addClass("md-editor-disabled"),this.disableButtons("all")),this)},hidePreview:function(){return this.$isPreview=!1,this.$editor.find('div[data-provider="markdown-preview"]').remove(),this.enableButtons("all"),this.disableButtons(this.$options.disabledButtons),this.$options.onPreviewEnd(this),this.$textarea.show(),this.__setListener(),this},isDirty:function(){return this.$oldContent!=this.getContent()},getContent:function(){return this.$textarea.val()},setContent:function(t){return this.$textarea.val(t),this},findSelection:function(t){var e;if((e=this.getContent().indexOf(t))>=0&&t.length>0){var n,i=this.getSelection();return this.setSelection(e,e+t.length),n=this.getSelection(),this.setSelection(i.start,i.end),n}return null},getSelection:function(){var t=this.$textarea[0];return("selectionStart"in t&&function(){var e=t.selectionEnd-t.selectionStart;return{start:t.selectionStart,end:t.selectionEnd,length:e,text:t.value.substr(t.selectionStart,e)}}||function(){return null})()},setSelection:function(t,e){var n=this.$textarea[0];return("selectionStart"in n&&function(){n.selectionStart=t,n.selectionEnd=e}||function(){return null})()},replaceSelection:function(t){var e=this.$textarea[0];return("selectionStart"in e&&function(){return e.value=e.value.substr(0,e.selectionStart)+t+e.value.substr(e.selectionEnd,e.value.length),e.selectionStart=e.value.length,this}||function(){return e.value+=t,jQuery(e)})()},getNextTab:function(){if(0===this.$nextTab.length)return null;var t,e=this.$nextTab.shift();return"function"==typeof e?t=e():"object"==typeof e&&e.length>0&&(t=e),t},setNextTab:function(t,e){if("string"==typeof t){var n=this;this.$nextTab.push(function(){return n.findSelection(t)})}else if("number"==typeof t&&"number"==typeof e){var i=this.getSelection();this.setSelection(t,e),this.$nextTab.push(this.getSelection()),this.setSelection(i.start,i.end)}},__parseButtonNameParam:function(t){return"string"==typeof t?t.split(" "):t},enableButtons:function(e){var n=this.__parseButtonNameParam(e),i=this;return t.each(n,function(t,e){i.__alterButtons(n[t],function(t){t.removeAttr("disabled")})}),this},disableButtons:function(e){var n=this.__parseButtonNameParam(e),i=this;return t.each(n,function(t,e){i.__alterButtons(n[t],function(t){t.attr("disabled","disabled")})}),this},hideButtons:function(e){var n=this.__parseButtonNameParam(e),i=this;return t.each(n,function(t,e){i.__alterButtons(n[t],function(t){t.addClass("hidden")})}),this},showButtons:function(e){var n=this.__parseButtonNameParam(e),i=this;return t.each(n,function(t,e){i.__alterButtons(n[t],function(t){t.removeClass("hidden")})}),this},eventSupported:function(t){var e=t in this.$element;return e||(this.$element.setAttribute(t,"return;"),e="function"==typeof this.$element[t]),e},keyup:function(e){var n=!1;switch(e.keyCode){case 40:case 38:case 16:case 17:case 18:break;case 9:var i;if(null!==(i=this.getNextTab())){var o=this;setTimeout(function(){o.setSelection(i.start,i.end)},500),n=!0}else{var s=this.getSelection();s.start==s.end&&s.end==this.getContent().length?n=!1:(this.setSelection(this.getContent().length,this.getContent().length),n=!0)}break;case 13:n=!1;for(var a=this.getContent().split(""),r=this.getSelection().start,l=-1,c=r-2;c>=0;c--)if("\n"===a[c]){l=c;break}var h=a[l+1];if("-"===h)this.addBullet(r);else if(t.isNumeric(h)){var d=this.getBulletNumber(l+1);d&&this.addNumberedBullet(r,d)}break;case 27:this.$isFullscreen&&this.setFullscreen(!1),n=!1;break;default:n=!1}n&&(e.stopPropagation(),e.preventDefault()),this.$options.onChange(this)},insertContent:function(t,e){var n=this.getContent().slice(0,t),i=this.getContent().slice(t+1);this.setContent(n.concat(e).concat(i))},addBullet:function(t){this.insertContent(t,"- \n"),this.setSelection(t+2,t+2)},addNumberedBullet:function(t,e){var n=e+1+". \n";this.insertContent(t,n);var i=e.toString().length+2;this.setSelection(t+i,t+i)},getBulletNumber:function(e){var n=this.getContent().slice(e).split(".")[0];return t.isNumeric(n)?parseInt(n):null},change:function(t){return this.$options.onChange(this),this},select:function(t){return this.$options.onSelect(this),this},focus:function(e){var n=this.$options,i=(n.hideable,this.$editor);return i.addClass("active"),t(document).find(".md-editor").each(function(){var e;t(this).attr("id")!==i.attr("id")&&(null===(e=t(this).find("textarea").data("markdown"))&&(e=t(this).find('div[data-provider="markdown-preview"]').data("markdown")),e&&e.blur())}),n.onFocus(this),this},blur:function(e){var n=this.$options,i=n.hideable,o=this.$editor,s=this.$editable;if(o.hasClass("active")||0===this.$element.parent().length){if(o.removeClass("active"),i)if(null!==s.el){var a=t("<"+s.type+"/>"),r=this.getContent(),l=this.parseContent(r);t(s.attrKeys).each(function(t,e){a.attr(s.attrKeys[t],s.attrValues[t])}),a.html(l),o.replaceWith(a)}else o.hide();n.onBlur(this)}return this}};var n=t.fn.markdown;t.fn.markdown=function(n){return this.each(function(){var i=t(this),o=i.data("markdown"),s="object"==typeof n&&n;o||i.data("markdown",o=new e(this,s))})},t.fn.markdown.messages={},t.fn.markdown.defaults={autofocus:!1,hideable:!1,savable:!1,width:"inherit",height:"inherit",resize:"none",iconlibrary:"glyph",language:"en",initialstate:"editor",parser:null,dropZoneOptions:null,enableDropDataUri:!1,buttons:[[{name:"groupFont",data:[{name:"cmdBold",hotkey:"Ctrl+B",title:"Bold",icon:{glyph:"glyphicon glyphicon-bold",fa:"fa fa-bold","fa-3":"icon-bold",octicons:"octicon octicon-bold"},callback:function(t){var e,n,i=t.getSelection(),o=t.getContent();e=0===i.length?t.__localize("strong text"):i.text,"**"===o.substr(i.start-2,2)&&"**"===o.substr(i.end,2)?(t.setSelection(i.start-2,i.end+2),t.replaceSelection(e),n=i.start-2):(t.replaceSelection("**"+e+"**"),n=i.start+2),t.setSelection(n,n+e.length)}},{name:"cmdItalic",title:"Italic",hotkey:"Ctrl+I",icon:{glyph:"glyphicon glyphicon-italic",fa:"fa fa-italic","fa-3":"icon-italic",octicons:"octicon octicon-italic"},callback:function(t){var e,n,i=t.getSelection(),o=t.getContent();e=0===i.length?t.__localize("emphasized text"):i.text,"_"===o.substr(i.start-1,1)&&"_"===o.substr(i.end,1)?(t.setSelection(i.start-1,i.end+1),t.replaceSelection(e),n=i.start-1):(t.replaceSelection("_"+e+"_"),n=i.start+1),t.setSelection(n,n+e.length)}},{name:"cmdHeading",title:"Heading",hotkey:"Ctrl+H",icon:{glyph:"glyphicon glyphicon-header",fa:"fa fa-header","fa-3":"icon-font",octicons:"octicon octicon-text-size"},callback:function(t){var e,n,i,o,s=t.getSelection(),a=t.getContent();e=0===s.length?t.__localize("heading text"):s.text+"\n",i=4,"### "===a.substr(s.start-i,i)||(i=3,"###"===a.substr(s.start-i,i))?(t.setSelection(s.start-i,s.end),t.replaceSelection(e),n=s.start-i):s.start>0&&((o=a.substr(s.start-1,1))&&"\n"!=o)?(t.replaceSelection("\n\n### "+e),n=s.start+6):(t.replaceSelection("### "+e),n=s.start+4),t.setSelection(n,n+e.length)}}]},{name:"groupLink",data:[{name:"cmdUrl",title:"URL/Link",hotkey:"Ctrl+L",icon:{glyph:"glyphicon glyphicon-link",fa:"fa fa-link","fa-3":"icon-link",octicons:"octicon octicon-link"},callback:function(e){var n,i,o,s=e.getSelection();e.getContent();n=0===s.length?e.__localize("enter link description here"):s.text,o=prompt(e.__localize("Insert Hyperlink"),"http://");var a=new RegExp("^((http|https)://|(mailto:)|(//))[a-z0-9]","i");if(null!==o&&""!==o&&"http://"!==o&&a.test(o)){var r=t("<div>"+o+"</div>").text();e.replaceSelection("["+n+"]("+r+")"),i=s.start+1,e.setSelection(i,i+n.length)}}},{name:"cmdImage",title:"Image",hotkey:"Ctrl+G",icon:{glyph:"glyphicon glyphicon-picture",fa:"fa fa-picture-o","fa-3":"icon-picture",octicons:"octicon octicon-file-media"},callback:function(e){var n,i,o,s=e.getSelection();e.getContent();n=0===s.length?e.__localize("enter image description here"):s.text,o=prompt(e.__localize("Insert Image Hyperlink"),"http://");var a=new RegExp("^((http|https)://|(//))[a-z0-9]","i");if(null!==o&&""!==o&&"http://"!==o&&a.test(o)){var r=t("<div>"+o+"</div>").text();e.replaceSelection("!["+n+"]("+r+' "'+e.__localize("enter image title here")+'")'),i=s.start+2,e.setNextTab(e.__localize("enter image title here")),e.setSelection(i,i+n.length)}}}]},{name:"groupMisc",data:[{name:"cmdList",hotkey:"Ctrl+U",title:"Unordered List",icon:{glyph:"glyphicon glyphicon-list",fa:"fa fa-list","fa-3":"icon-list-ul",octicons:"octicon octicon-list-unordered"},callback:function(e){var n,i,o=e.getSelection();e.getContent();if(0===o.length)n=e.__localize("list text here"),e.replaceSelection("- "+n),i=o.start+2;else if(o.text.indexOf("\n")<0)n=o.text,e.replaceSelection("- "+n),i=o.start+2;else{var s=[];n=(s=o.text.split("\n"))[0],t.each(s,function(t,e){s[t]="- "+e}),e.replaceSelection("\n\n"+s.join("\n")),i=o.start+4}e.setSelection(i,i+n.length)}},{name:"cmdListO",hotkey:"Ctrl+O",title:"Ordered List",icon:{glyph:"glyphicon glyphicon-th-list",fa:"fa fa-list-ol","fa-3":"icon-list-ol",octicons:"octicon octicon-list-ordered"},callback:function(e){var n,i,o=e.getSelection();e.getContent();if(0===o.length)n=e.__localize("list text here"),e.replaceSelection("1. "+n),i=o.start+3;else if(o.text.indexOf("\n")<0)n=o.text,e.replaceSelection("1. "+n),i=o.start+3;else{var s=1,a=[];n=(a=o.text.split("\n"))[0],t.each(a,function(t,e){a[t]=s+". "+e,s++}),e.replaceSelection("\n\n"+a.join("\n")),i=o.start+5}e.setSelection(i,i+n.length)}},{name:"cmdCode",hotkey:"Ctrl+K",title:"Code",icon:{glyph:"glyphicon glyphicon-console",fa:"fa fa-code","fa-3":"icon-code",octicons:"octicon octicon-code"},callback:function(t){var e,n,i=t.getSelection(),o=t.getContent();e=0===i.length?t.__localize("code text here"):i.text,"```\n"===o.substr(i.start-4,4)&&"\n```"===o.substr(i.end,4)?(t.setSelection(i.start-4,i.end+4),t.replaceSelection(e),n=i.start-4):"`"===o.substr(i.start-1,1)&&"`"===o.substr(i.end,1)?(t.setSelection(i.start-1,i.end+1),t.replaceSelection(e),n=i.start-1):o.indexOf("\n")>-1?(t.replaceSelection("```\n"+e+"\n```"),n=i.start+4):(t.replaceSelection("`"+e+"`"),n=i.start+1),t.setSelection(n,n+e.length)}},{name:"cmdQuote",hotkey:"Ctrl+Q",title:"Quote",icon:{glyph:"glyphicon glyphicon-comment",fa:"fa fa-quote-left","fa-3":"icon-quote-left",octicons:"octicon octicon-quote"},callback:function(e){var n,i,o=e.getSelection();e.getContent();if(0===o.length)n=e.__localize("quote here"),e.replaceSelection("> "+n),i=o.start+2;else if(o.text.indexOf("\n")<0)n=o.text,e.replaceSelection("> "+n),i=o.start+2;else{var s=[];n=(s=o.text.split("\n"))[0],t.each(s,function(t,e){s[t]="> "+e}),e.replaceSelection("\n\n"+s.join("\n")),i=o.start+4}e.setSelection(i,i+n.length)}}]},{name:"groupUtil",data:[{name:"cmdPreview",toggle:!0,hotkey:"Ctrl+P",title:"Preview",btnText:"Preview",btnClass:"btn btn-primary btn-sm",icon:{glyph:"glyphicon glyphicon-search",fa:"fa fa-search","fa-3":"icon-search",octicons:"octicon octicon-search"},callback:function(t){!1===t.$isPreview?t.showPreview():t.hidePreview()}}]}]],customIcons:{},additionalButtons:[],reorderButtonGroups:[],hiddenButtons:[],disabledButtons:[],footer:"",fullscreen:{enable:!0,icons:{fullscreenOn:{name:"fullscreenOn",icon:{fa:"fa fa-expand",glyph:"glyphicon glyphicon-fullscreen","fa-3":"icon-resize-full",octicons:"octicon octicon-link-external"}},fullscreenOff:{name:"fullscreenOff",icon:{fa:"fa fa-compress",glyph:"glyphicon glyphicon-fullscreen","fa-3":"icon-resize-small",octicons:"octicon octicon-browser"}}}},onShow:function(t){},onPreview:function(t){},onPreviewEnd:function(t){},onSave:function(t){},onBlur:function(t){},onFocus:function(t){},onChange:function(t){},onFullscreen:function(t){},onFullscreenExit:function(t){},onSelect:function(t){}},t.fn.markdown.Constructor=e,t.fn.markdown.noConflict=function(){return t.fn.markdown=n,this};var i=function(t){var e=t;e.data("markdown")?e.data("markdown").showEditor():e.markdown()};t(document).on("click.markdown.data-api",'[data-provide="markdown-editable"]',function(e){i(t(this)),e.preventDefault()}).on("click focusin",function(e){var n;n=t(document.activeElement),t(document).find(".md-editor").each(function(){var e=t(this),i=n.closest(".md-editor")[0]===this,o=e.find("textarea").data("markdown")||e.find('div[data-provider="markdown-preview"]').data("markdown");o&&!i&&o.blur()})}).ready(function(){t('textarea[data-provide="markdown"]').each(function(){i(t(this))})})});