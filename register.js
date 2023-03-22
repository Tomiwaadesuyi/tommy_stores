const name = document.getElementById('name')
const password = document.getElementById('password')   
const form  = document.getElementById('form')
const errorElement = document.getElementById('error')

form.addEventListener("submit",(e)=>{ 
	let messages = []
	if(name.value === "" || name.value == null ){
		message.push("please input your name")
	}

	 if(password.value.length <=6){
		 messages.push('password must be more than 6 characters')
	 }

	 if(password.value.length >=20){
		messages.push('password must be less than 20 characters')
	}

	if (messages.length > 0){
	e.preventDefault()
	errorElement.innerText = messages.join(', ')
}
})