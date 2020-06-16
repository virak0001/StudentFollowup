function hideEditPositionForm(){
	$('#edit-position-form').hide();
}


function showEditPostionFrom(){
	$('#edit-position-form').show();
}

function hidePosition(){
	$('#position').hide();
}

function showPosition(){
	$('#position').show();
}

hideEditPositionForm();
$('#edit-position').click(function () {
	showEditPostionFrom();
	hidePosition();
});

$('#cancel-edit').click(function (){
	hideEditPositionForm();
	showPosition()
})



// address

function hideEditAddressForm(){
	$('#edit-address-form').hide();
}


function showEditAddressFrom(){
	$('#edit-address-form').show();
}

function hideAddress(){
	$('#address').hide();
}

function showAddress(){
	$('#address').show();
}

hideEditAddressForm();
$('#edit-address').click(function () {
	showEditAddressFrom();
	hideAddress();
});

$('#cancel-edit-address').click(function (){
	hideEditAddressForm();
	showAddress()
})
