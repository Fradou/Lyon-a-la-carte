$(document).ready(function(){function e(e){e.find("input:text, input:password, input:file, select, textarea").val(""),e.find("input:radio, input:checkbox").removeAttr("checked").removeAttr("selected"),console.log("reset done")}$("#parameterReset").click(function(){e($("form[name=generator]"))})});