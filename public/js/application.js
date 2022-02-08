window.addEventListener('DOMContentLoaded', ()=>{
	const confirmation = document.getElementById("confirm-add-user");
	const errors = document.querySelectorAll(".errors");

	setTimeout(()=>{
			if (confirmation) {
				confirmation.style.display="none";
			}
			if(errors.length > 0){
			for (var i = 0; i < errors.length; i++) {
				errors[i].style.display="none"
			}
		}

	}, 3000);

	
});