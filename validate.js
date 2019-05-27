function validate(form)
{
	fail=validateIdnumber(form.id_number)
	fail+=validateAdmnumber(form.adm_no)
	fail+=validateDateofbirth(form.date_of_birth)
	fail+=validateTelephonenumber(form.tel_no)
	fail+=validateEmail(form.email)
	fail+=validateCounty(form.county)
	fail+=validateBio(form.bio)
	fail=validateUsername(form.username.value)
	fail+=validatePassword(form.password.value)

	if(fail=="") return true
		else{alert(fail):return false}
}

   function validateIdnumber(field)
   {
   	if(field="") return "No Id was entered.\n"
   	  else if(field.length<4) return "The ID must be at least 4 characters.\n"
    else if(!/[0-9]/.test(field)) return "The ID must contain characters between 0-9.\n"
     return ""
}

   function validateAdmnumber(field)
   {
   	if(field="") return "No Admission number was entered.\n"
      else if(field.length<4) return "The adm number must be at least 4 characters.\n"
       else if(!/[0-9]/.test(field)) return"The admission number must contain characters between 0-9.\n"
        return ""     	
   }

   function validateDateofbirth(field)
   {
   	return (field="") ? "No Date of birth was entered.\n" : ""

   }

   function validateTelephonenumber(field){
   	if(field="") return "No Telephone number was entered.\n"
   	  else if(field.length<10) return "The telephone number must be at least 10 characters.\n"
      else if(!/[0-9]/.test(field)) return "The telephone number should have characters between 0-9.\n"
      	return ""
   }

   function validateemail(field){
   	if(field="") return "No email was entered.\n"
   	  else if(!((field.indexOf(".")>0) && (field.indexOf("@")>0)) || /[^a-zA-z0-9.@_-]/.test(field))
   	  	  return "The emaail adress is Invalid.\n"
   	  	  return ""
   }
    
   function validatecounty(field)
   {
   	return (field="")? "No county was enteered" : ""
   } 
   function validateBio(field)
    {
      return(field="")? "No Bio was entered" : ""
    }

   function validateUsername(field){
    if(field="") return "No username was entered.\n"
     else if(field.length<5)
     	return "Usernames must be at least 5 characters.\n"
     else if(/[^a-zA-Z0-9_-]/.test(field))
     	return "Only a-z,A-Z.0-9,- and _ allowed in usernames.\n"
         return ""
     }

     function validatePassword(field){
     	if(field="") return "No password was entered.\n"
     		else if(field.length<6)
     			return "Passswords must be at least 6 characters.\n"
     		else if(!/[a-z]/.test(field) || !/[A-Z]/.test(field) ||
     			     !/[0-9]/.test(field))
     			return "Passwords require each on a-z,A-Z and 0-9.\n"
     		    return ""
     }