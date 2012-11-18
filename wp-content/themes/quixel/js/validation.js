// LiveValidation 1.3 (standalone version)
// Copyright (c) 2007-2008 Alec Hill (www.livevalidation.com)
// LiveValidation is licensed under the terms of the MIT License
var LiveValidation=function(B,A){this.initialize(B,A);};LiveValidation.VERSION="1.3 standalone";LiveValidation.TEXTAREA=1;LiveValidation.TEXT=2;LiveValidation.PASSWORD=3;LiveValidation.CHECKBOX=4;LiveValidation.SELECT=5;LiveValidation.FILE=6;LiveValidation.massValidate=function(C){var D=true;for(var B=0,A=C.length;B<A;++B){var E=C[B].validate();if(D){D=E;}}return D;};LiveValidation.prototype={validClass:"LV_valid",invalidClass:"LV_invalid",messageClass:"LV_validation_message",validFieldClass:"LV_valid_field",invalidFieldClass:"LV_invalid_field",initialize:function(D,C){var A=this;if(!D){throw new Error("LiveValidation::initialize - No element reference or element id has been provided!");}this.element=D.nodeName?D:document.getElementById(D);if(!this.element){throw new Error("LiveValidation::initialize - No element with reference or id of '"+D+"' exists!");}this.validations=[];this.elementType=this.getElementType();this.form=this.element.form;var B=C||{};this.validMessage=B.validMessage||"";var E=B.insertAfterWhatNode||this.element;this.insertAfterWhatNode=E.nodeType?E:document.getElementById(E);this.onValid=B.onValid||function(){this.insertMessage(this.createMessageSpan());this.addFieldClass();};this.onInvalid=B.onInvalid||function(){this.insertMessage(this.createMessageSpan());this.addFieldClass();};this.onlyOnBlur=B.onlyOnBlur||false;this.wait=B.wait||0;this.onlyOnSubmit=B.onlyOnSubmit||false;if(this.form){this.formObj=LiveValidationForm.getInstance(this.form);this.formObj.addField(this);}this.oldOnFocus=this.element.onfocus||function(){};this.oldOnBlur=this.element.onblur||function(){};this.oldOnClick=this.element.onclick||function(){};this.oldOnChange=this.element.onchange||function(){};this.oldOnKeyup=this.element.onkeyup||function(){};this.element.onfocus=function(F){A.doOnFocus(F);return A.oldOnFocus.call(this,F);};if(!this.onlyOnSubmit){switch(this.elementType){case LiveValidation.CHECKBOX:this.element.onclick=function(F){A.validate();return A.oldOnClick.call(this,F);};case LiveValidation.SELECT:case LiveValidation.FILE:this.element.onchange=function(F){A.validate();return A.oldOnChange.call(this,F);};break;default:if(!this.onlyOnBlur){this.element.onkeyup=function(F){A.deferValidation();return A.oldOnKeyup.call(this,F);};}this.element.onblur=function(F){A.doOnBlur(F);return A.oldOnBlur.call(this,F);};}}},destroy:function(){if(this.formObj){this.formObj.removeField(this);this.formObj.destroy();}this.element.onfocus=this.oldOnFocus;if(!this.onlyOnSubmit){switch(this.elementType){case LiveValidation.CHECKBOX:this.element.onclick=this.oldOnClick;case LiveValidation.SELECT:case LiveValidation.FILE:this.element.onchange=this.oldOnChange;break;default:if(!this.onlyOnBlur){this.element.onkeyup=this.oldOnKeyup;}this.element.onblur=this.oldOnBlur;}}this.validations=[];this.removeMessageAndFieldClass();},add:function(A,B){this.validations.push({type:A,params:B||{}});return this;},remove:function(B,D){var E=false;for(var C=0,A=this.validations.length;C<A;C++){if(this.validations[C].type==B){if(this.validations[C].params==D){E=true;break;}}}if(E){this.validations.splice(C,1);}return this;},deferValidation:function(B){if(this.wait>=300){this.removeMessageAndFieldClass();}var A=this;if(this.timeout){clearTimeout(A.timeout);}this.timeout=setTimeout(function(){A.validate();},A.wait);},doOnBlur:function(A){this.focused=false;this.validate(A);},doOnFocus:function(A){this.focused=true;this.removeMessageAndFieldClass();},getElementType:function(){switch(true){case (this.element.nodeName.toUpperCase()=="TEXTAREA"):return LiveValidation.TEXTAREA;case (this.element.nodeName.toUpperCase()=="INPUT"&&this.element.type.toUpperCase()=="TEXT"):return LiveValidation.TEXT;case (this.element.nodeName.toUpperCase()=="INPUT"&&this.element.type.toUpperCase()=="PASSWORD"):return LiveValidation.PASSWORD;case (this.element.nodeName.toUpperCase()=="INPUT"&&this.element.type.toUpperCase()=="CHECKBOX"):return LiveValidation.CHECKBOX;case (this.element.nodeName.toUpperCase()=="INPUT"&&this.element.type.toUpperCase()=="FILE"):return LiveValidation.FILE;case (this.element.nodeName.toUpperCase()=="SELECT"):return LiveValidation.SELECT;case (this.element.nodeName.toUpperCase()=="INPUT"):throw new Error("LiveValidation::getElementType - Cannot use LiveValidation on an "+this.element.type+" input!");default:throw new Error("LiveValidation::getElementType - Element must be an input, select, or textarea!");}},doValidations:function(){this.validationFailed=false;for(var C=0,A=this.validations.length;C<A;++C){var B=this.validations[C];switch(B.type){case Validate.Presence:case Validate.Confirmation:case Validate.Acceptance:this.displayMessageWhenEmpty=true;this.validationFailed=!this.validateElement(B.type,B.params);break;default:this.validationFailed=!this.validateElement(B.type,B.params);break;}if(this.validationFailed){return false;}}this.message=this.validMessage;return true;},validateElement:function(A,C){var D=(this.elementType==LiveValidation.SELECT)?this.element.options[this.element.selectedIndex].value:this.element.value;if(A==Validate.Acceptance){if(this.elementType!=LiveValidation.CHECKBOX){throw new Error("LiveValidation::validateElement - Element to validate acceptance must be a checkbox!");}D=this.element.checked;}var E=true;try{A(D,C);}catch(B){if(B instanceof Validate.Error){if(D!==""||(D===""&&this.displayMessageWhenEmpty)){this.validationFailed=true;this.message=B.message;E=false;}}else{throw B;}}finally{return E;}},validate:function(){if(!this.element.disabled){var A=this.doValidations();if(A){this.onValid();return true;}else{this.onInvalid();return false;}}else{return true;}},enable:function(){this.element.disabled=false;return this;},disable:function(){this.element.disabled=true;this.removeMessageAndFieldClass();return this;},createMessageSpan:function(){var A=document.createElement("span");var B=document.createTextNode(this.message);A.appendChild(B);return A;},insertMessage:function(B){this.removeMessage();if((this.displayMessageWhenEmpty&&(this.elementType==LiveValidation.CHECKBOX||this.element.value==""))||this.element.value!=""){var A=this.validationFailed?this.invalidClass:this.validClass;B.className+=" "+this.messageClass+" "+A;if(this.insertAfterWhatNode.nextSibling){this.insertAfterWhatNode.parentNode.insertBefore(B,this.insertAfterWhatNode.nextSibling);}else{this.insertAfterWhatNode.parentNode.appendChild(B);}}},addFieldClass:function(){this.removeFieldClass();if(!this.validationFailed){if(this.displayMessageWhenEmpty||this.element.value!=""){if(this.element.className.indexOf(this.validFieldClass)==-1){this.element.className+=" "+this.validFieldClass;}}}else{if(this.element.className.indexOf(this.invalidFieldClass)==-1){this.element.className+=" "+this.invalidFieldClass;}}},removeMessage:function(){var A;var B=this.insertAfterWhatNode;while(B.nextSibling){if(B.nextSibling.nodeType===1){A=B.nextSibling;break;}B=B.nextSibling;}if(A&&A.className.indexOf(this.messageClass)!=-1){this.insertAfterWhatNode.parentNode.removeChild(A);}},removeFieldClass:function(){if(this.element.className.indexOf(this.invalidFieldClass)!=-1){this.element.className=this.element.className.split(this.invalidFieldClass).join("");}if(this.element.className.indexOf(this.validFieldClass)!=-1){this.element.className=this.element.className.split(this.validFieldClass).join(" ");}},removeMessageAndFieldClass:function(){this.removeMessage();this.removeFieldClass();}};var LiveValidationForm=function(A){this.initialize(A);};LiveValidationForm.instances={};LiveValidationForm.getInstance=function(A){var B=Math.random()*Math.random();if(!A.id){A.id="formId_"+B.toString().replace(/\./,"")+new Date().valueOf();}if(!LiveValidationForm.instances[A.id]){LiveValidationForm.instances[A.id]=new LiveValidationForm(A);}return LiveValidationForm.instances[A.id];};LiveValidationForm.prototype={initialize:function(B){this.name=B.id;this.element=B;this.fields=[];this.oldOnSubmit=this.element.onsubmit||function(){};var A=this;this.element.onsubmit=function(C){return(LiveValidation.massValidate(A.fields))?A.oldOnSubmit.call(this,C||window.event)!==false:false;};},addField:function(A){this.fields.push(A);},removeField:function(C){var D=[];for(var B=0,A=this.fields.length;B<A;B++){if(this.fields[B]!==C){D.push(this.fields[B]);}}this.fields=D;},destroy:function(A){if(this.fields.length!=0&&!A){return false;}this.element.onsubmit=this.oldOnSubmit;LiveValidationForm.instances[this.name]=null;return true;}};var Validate={Presence:function(B,C){var C=C||{};var A=C.failureMessage||"Can't be empty!";if(B===""||B===null||B===undefined){Validate.fail(A);}return true;},Numericality:function(J,E){var A=J;var J=Number(J);var E=E||{};var F=((E.minimum)||(E.minimum==0))?E.minimum:null;var C=((E.maximum)||(E.maximum==0))?E.maximum:null;var D=((E.is)||(E.is==0))?E.is:null;var G=E.notANumberMessage||"Must be a number!";var H=E.notAnIntegerMessage||"Must be an integer!";var I=E.wrongNumberMessage||"Must be "+D+"!";var B=E.tooLowMessage||"Must not be less than "+F+"!";var K=E.tooHighMessage||"Must not be more than "+C+"!";if(!isFinite(J)){Validate.fail(G);}if(E.onlyInteger&&(/\.0+$|\.$/.test(String(A))||J!=parseInt(J))){Validate.fail(H);}switch(true){case (D!==null):if(J!=Number(D)){Validate.fail(I);}break;case (F!==null&&C!==null):Validate.Numericality(J,{tooLowMessage:B,minimum:F});Validate.Numericality(J,{tooHighMessage:K,maximum:C});break;case (F!==null):if(J<Number(F)){Validate.fail(B);}break;case (C!==null):if(J>Number(C)){Validate.fail(K);}break;}return true;},Format:function(C,E){var C=String(C);var E=E||{};var A=E.failureMessage||"Not valid!";var B=E.pattern||/./;var D=E.negate||false;if(!D&&!B.test(C)){Validate.fail(A);}if(D&&B.test(C)){Validate.fail(A);}return true;},

Discount1:function(N,M){
	var dollar = "$";
	var save = 0;
	if (N < 6){
		document.getElementById('notice').value = "none :(";
	}	
	if (N > 5 && N < 11){
		save = (299*N)-(279*N);
		document.getElementById('notice').value = dollar + save;
	}
	if (N > 10 && N < 26){
		save = (299*N)-(259*N);
		document.getElementById('notice').value = dollar + save;
	}
	if (N > 25 && N < 51){
		save = (299*N)-(239*N);
		document.getElementById('notice').value = dollar + save;
	}
	if (N > 50 && N < 101){
		save = (299*N)-(219*N);
		document.getElementById('notice').value = dollar + save;
	}
	if (N > 100){
		save = (299*N)-(199*N);
		document.getElementById('notice').value = dollar + save;
	}				
	
	},
	
Discount2:function(N,M){
	var dollar = "$";
	var save = 0;
	if (N < 2){
		document.getElementById('notice_academic').value = "none :(";
	}	
	if (N > 1 && N < 11){
		save = (59*N)-(49*N);
		document.getElementById('notice_academic').value = dollar + save;
	}
	if (N > 10 && N < 31){
		save = (59*N)-(39*N);
		document.getElementById('notice_academic').value = dollar + save;
	}
	if (N > 30 && N < 71){
		save = (59*N)-(29*N);
		document.getElementById('notice_academic').value = dollar + save;
	}
	if (N > 70){
		save = (59*N)-(19*N);
		document.getElementById('notice_academic').value = dollar + save;
	}			
	
	},	
};