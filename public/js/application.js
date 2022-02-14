window.addEventListener('DOMContentLoaded', ()=>{
	const confirmation = document.getElementById("confirm-add-user");
	const errors = document.querySelectorAll(".errors");
	const success = document.querySelectorAll(".success");

	setTimeout(()=>{
			if (confirmation) {
				confirmation.style.display="none";
			}
			if(errors.length > 0){
			for (var i = 0; i < errors.length; i++) {
				errors[i].style.display="none"
			}
		}
		if(success.length > 0){
			for (var i = 0; i < success.length; i++) {
				success[i].style.display="none"
			}
		}

	}, 3000);

	const customerCount = document.querySelector('.customer-total');

	const getForm = document.querySelector("#delete-form");
	getForm.addEventListener("click", ()=>{
		getForm.submit();
	})
});