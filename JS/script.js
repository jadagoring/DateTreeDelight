

	
	/*  for this Side Bar */
	// this is for the opening of the side bar, it will push the main section to the left by 250px and also give the sidebar a width 250px.
	function openSlideMenu(){
		document.getElementById('side-menu').style.width='250px';
		document.getElementById('main-section').style.marginLeft='250px';
		
	}
	/* this code is to close the sidebar with button with the class 'btn-close' by making the sidebar width 0px and the 
	main section will go back normal width no margin. */
	
	function closeSlideMenu(){
		document.getElementById('side-menu').style.width='0';
		document.getElementById('main-section').style.marginLeft='0';
		
	}
	
	// SlideShow
/* 	
	const slideshowImages = document.querySelectorAll(".slideshow-img");

	const nextImageDelay= 5000;
	using let instead of const because the value will change
	let currentImageCounter= 0;  

	slideshowImages[currentImageCounter].style.display="block";
	setInterval(nextImage, nextImageDelay);

	
	function nextImage(){
	this is so the current image disappears
	slideshowImages[currentImageCounter].style.display = "none";
	currentImageCounter = (currentImageCounter + 1) % slideshowImages.length;
	slideshowImages[currentImageCounter].style.display = "block";

	}

 */
	
//SignUp Verification  JavaScript 
	function Validation(){
	//Variables 
	var FirstName = document.getElementById('FirstName').value;
	var LastName = document.getElementById('LastName').value;
	var Email =   document.getElementById('Email').value;
	var Username = document.getElementById('Username').value;
	var Password = document.getElementById('Password').value;
	var VPassword = document.getElementById('VPassword').value;

		if(FirstName=="" || LastName =="" || Email=="" || Username=="" ||Password=="" || VPassword==""){
			alert("All Fields are REQUIRED");
			document.getElementById("FirstName").style.border="1px solid red";
			document.getElementById("LastName").style.border="1px solid red";
			document.getElementById("Email").style.border="1px solid red";
			document.getElementById("Password").style.border="1px solid red";
			document.getElementById("VPassword").style.border="1px solid red";
			document.getElementById("Username").style.border="1px solid red";
			return false;
		} 
		if(Password != VPassword){
			
			
			document.getElementById("Password_error").innerHTML="Invalid Password";
			document.getElementById("VPassword").style.border="1px solid red";
			document.getElementById("Password").style.border="1px solid red";
			return false;
		}
	}
	//login screen animation 
	const signUpButton =document.getElementById('signUp');
	const signInButton =document.getElementById('signIn');
	const container =document.getElementById('container');
	
	signUpButton.addEventListener('click', () => container.classList.add('right-panel-active'));
	signInButton.addEventListener('click', () => container.classList.remove('right-panel-active'));
	



