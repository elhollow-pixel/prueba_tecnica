const iconEyes = document.querySelector(".icon-eye");
const confiPass = document.querySelector(".pass");

iconEyes.addEventListener("click",function(){

    
    const icon = this.querySelector("i");

    if(this.nextElementSibling.type === 'password' || confiPass.nextElementSibling.type === 'password'){
        this.nextElementSibling.type = "text";
        confiPass.nextElementSibling.type = "text";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }else{
        this.nextElementSibling.type = "password";
        confiPass.nextElementSibling.type = "password";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    };

    

});