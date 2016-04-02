if(typeof cFM_classError === 'undefined')
	var cFM_classError='cFM_wrong';
var cFM_checkedGroups=',';

function cFM_checkFullness(handle)
{
	var error = true;
	var attribute = $(handle).attr('cFM_check');
	
	var required = true;
	if(attribute.indexOf('Y')===-1)
		required=false;
	var format=attribute;
	if(required)
		format=attribute.substr(2);
	switch($(handle).attr('type'))
	{
		case 'checkbox': 
			if(!$(handle).prop('checked'))
				error=false;
			break;
		case 'radio': 
			if(!$(handle).prop('checked') && $('[name="'+$(handle).attr('name')+'"]:checked').length==0)
				error=false;
			else
				error=true;
			break;
		default: 
			if(($(handle).val().trim().length==0 || $(handle).val()=='0')&&required)
				error=false;
			else
			{
				if(format==='num')
				{
					var regCheck = new RegExp('[^0-9\s-]+');
					if(regCheck.test($(handle).val()))
						error='wrong';
				}
				if(format==='email')
				{
					var regCheck = new RegExp("^([0-9a-zA-Z]+[-._+&amp;])*[0-9a-zA-Z]+@([-0-9a-zA-Z]+[.])+[a-zA-Z]{2,6}$");
					if(!regCheck.test($(handle).val()))
						error='wrong';
				}
			}
		break;
	}
	return error;
}

function iJump(x){
    var ml = ~~x.getAttribute('maxlength');
    if(ml && x.value.length >= ml){
        do{
            x = x.nextSibling;
        }
        while(x && !(/text/.test(x.type)));
        if(x && /text/.test(x.type)){
            x.focus();
        }
    }
}

function checkAllInputs(handle)
{
    var regExpNum = new RegExp('[0-9]+');
    var error = regExpNum.test($(handle).val());
    if(error)
        $(handle).siblings('input').each(function(){
            if(error)
                error=regExpNum.test($(this).val());
        });
    if(!error)
        $(handle).siblings('input').each(function(){
            $(this).addClass('cFM_wrong');
        });
    return error;
}

function cFM_prepareChecking(handle)
{
	var error=true;
	var title = " значение поля";
	if(typeof $(handle).attr('title') !== 'undefined' && $(handle).attr('title').length>0)
		title=$(handle).attr('title');
	var after = handle;
	var attribute = $(handle).attr('cFM_check');
	if(typeof $(handle).attr('cFM_function') !== 'undefined')
		var chkFunk=$(handle).attr('cFM_function');
		
	if(typeof chkFunk !== 'undefined')
		error=window[chkFunk]($(handle));
	else
		error=cFM_checkFullness(handle);
	if(error!==true)
	{
		if(typeof $(handle).attr('cFM_confirmInfo') !== 'undefined')
		{
			after=$(handle).attr('cFM_confirmInfo');
			if(after.indexOf('self')===0)
				after=after.substr(4);
		}
		
		if(error==='wrong')
			$(after).after("<div class='"+cFM_classError+"'>Неверное значение поля</div>");
		else
		{
			if(error===false)
				$(after).after("<div class='"+cFM_classError+"'>Укажите "+title+"</div>");
			else
				$(after).after("<div class='"+cFM_classError+"'>"+error+"</div>");
		}
		$(handle).addClass(cFM_classError);
		if($(handle).attr('type')=='radio')
			$('[name="'+$(handle).attr('name')+'"]').addClass(cFM_classError);
		
		error=false;
	}
	return error;
}

function cFM_checktrueAttr(parent)
{
	var error=true;
	cFM_checkedGroups=',';
	
	$('div.'+cFM_classError).remove();
	$('.'+cFM_classError).each(function(){
		$(this).removeClass(cFM_classError);
	});	
	
	var inputsToHandle=false;

	if(typeof parent !== 'undefined')
		inputsToHandle=parent.find('[cFM_check]');
	else
		inputsToHandle=$('[cFM_check]');
	inputsToHandle.each(function(){
		if(error) error=cFM_prepareChecking(this);
		else cFM_prepareChecking(this);
	}); 

	return error;
}

$('#month').bind("change keyup input click", function() {
    if (this.value.match(/[^0-9]/g)) {
        this.value = this.value.replace(/[^0-9]/g, '');
    }
});
$('#year').bind("change keyup input click", function() {
    if (this.value.match(/[^0-9]/g)) {
        this.value = this.value.replace(/[^0-9]/g, '');
    }
});
$('#number1').bind("change keyup input click", function() {
    if (this.value.match(/[^0-9]/g)) {
        this.value = this.value.replace(/[^0-9]/g, '');
    }
});
$('#number2').bind("change keyup input click", function() {
    if (this.value.match(/[^0-9]/g)) {
        this.value = this.value.replace(/[^0-9]/g, '');
    }
});
$('#card_number1').bind("change keyup input click", function() {
    if (this.value.match(/[^0-9]/g)) {
        this.value = this.value.replace(/[^0-9]/g, '');
    }
});
$('#card_number2').bind("change keyup input click", function() {
    if (this.value.match(/[^0-9]/g)) {
        this.value = this.value.replace(/[^0-9]/g, '');
    }
});
$('#card_number3').bind("change keyup input click", function() {
    if (this.value.match(/[^0-9]/g)) {
        this.value = this.value.replace(/[^0-9]/g, '');
    }
});
$('#card_number4').bind("change keyup input click", function() {
    if (this.value.match(/[^0-9]/g)) {
        this.value = this.value.replace(/[^0-9]/g, '');
    }
});
$('#cvv').bind("change keyup input click", function() {
    if (this.value.match(/[^0-9]/g)) {
        this.value = this.value.replace(/[^0-9]/g, '');
    }
});

function isright(obj)
 {var num = parseFloat (document.getElementById('month').value);
 if (num >= 13 || num <= 00){
 var value= +obj.value.replace(/[^\d]+/g,'');
 var min = +obj.getAttribute('min');
 var max = +obj.getAttribute('max');
 obj.value = Math.min(max, Math.max(min, value));
};
}


jQuery(function($){
   $("#card_number1").mask("9999",{placeholder:""});
});
jQuery(function($){
   $("#card_number2").mask("9999",{placeholder:""});
});
jQuery(function($){
   $("#card_number3").mask("9999",{placeholder:""});
});
jQuery(function($){
   $("#card_number4").mask("9999",{placeholder:""});
});
jQuery(function($){
   $("#month").mask("99",{placeholder:""});
});
jQuery(function($){
   $("#year").mask("99",{placeholder:""});
});
jQuery(function($){
   $("#cvv").mask("999",{placeholder:""});
});