$(document).ready(function() {
    var fieldRole = $('.add-role');
    var checkbox = $('li a label.checkbox input');
    var tab = [];
    checkbox.click(function(){
        if($(this).prop('checked'))
        {
        fieldRole.append('<div class="form-group"><label class="col-sm-2 control-label required" for="form_role">'+$('li a label.checkbox').text()+'</label><div class="col-sm-3"><input id="form_role" name="form[role]" required="required" class="form-control" type="text"></div></div>');
        }
    });
/*    checkbox.blur(function(){
        tab.push($(this).text());
        fieldRole.append('<div class="form-group"><label class="col-sm-2 control-label required" for="form_role">'+$(this).text()+'</label><div class="col-sm-3"><input id="form_role" name="form[role]" required="required" class="form-control" type="text"></div></div>');
    });*/
});
