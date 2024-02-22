login = document.querySelector("sign.login")

main = document.querySelector("nav .main")


function changeUrlMain () {

  window.location.href = "index.html"
  
   }

   function changeUrlShow () {

    window.location.href = "Opportunities.html"
    
     }


sign ="yes";

 function changeUrl () {

window.location.href = "signup.html"

 }
 function changeUrl2 () {
    window.location.href = "log.html"

     }


     company = document.querySelector(".wich p:first-of-type")
     invd =  document.querySelector(".wich p:last-of-type")
     console.log(invd)


 function active1 (){

   invd.classList.remove("active")
   this.classList.add("active")

 }

 function active2 (){
   company.classList.remove("active")
   this.classList.add("active")

 }


form1 = document.querySelector(".form1")
form2 = document.querySelector(".form2")





     company.onclick = function(){
form1.style.display = "none"
form2.style.display = "block"

      company.classList.add("activew")
      invd.classList.remove("activew")
     }
     invd.onclick = function(){
       form1.style.display= "block"
      form2.style.display = "none"

      invd.classList.add("activew")
      company.classList.remove("activew")
     }