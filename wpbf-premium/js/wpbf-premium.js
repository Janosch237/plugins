!function(e){e(".wpbf-screenshot-upload").click(function(t){t.preventDefault();var n=wp.media({title:"Login Logo",button:{text:"Upload Image"},multiple:!1}).on("select",function(){var t=n.state().get("selection").first().toJSON();e(".udb-branding-login-logo").attr("src",t.url),e(".wpbf-screenshot-url").val(t.url)}).open()}),e(".wpbf-screenshot-remove").click(function(t){t.preventDefault(),e(".wpbf-screenshot-url").val("")})}(jQuery);