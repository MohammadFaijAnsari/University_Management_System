
//// function for  fess_delete_student ///////////////////
function delete_student_fees(fs_id) {
  // alert("hello");
  if (confirm("Are you sure to delete")) {
    console.log(this.document.student_view)

    // alert(fs_id);

    this.document.student_view.fs_id.value = fs_id;
    this.document.student_view.act.value = "delete_student_fees";
    this.document.student_view.submit();

  }
}

function valid_student(e) {
  // e.preventDefault();
  let frm_obj = document.getElementById('student_add');
  // Check if name is empty
  if (frm_obj.st_name.value.trim() === "") {
    alert("Please enter name");
    frm_obj.st_name.focus();
    return false;
  }

  // Check if father's name is empty
  if (frm_obj.st_fathername.value.trim() === "") {
    alert("Please enter father name");
    frm_obj.st_fathername.focus();
    return false;
  }

  // Check if gender is selected
  if (!frm_obj.st_gen[0].checked && !frm_obj.st_gen[1].checked) {
    alert("Please select gender");
    frm_obj.st_gen[0].focus(); // Changed to focus on the first radio button
    return false;
  }

  // Check if phone number is empty
  if (frm_obj.st_phone.value.trim() === "") {
    alert("Please enter phone number");
    frm_obj.st_phone.focus();
    return false;
  }

  // Check if phone number length is valid
  if (frm_obj.st_phone.value.length < 10) {
    alert("Please enter a valid 10-digit phone number");
    frm_obj.st_phone.focus();
    return false;
  }

  // Check if course is selected
  if (frm_obj.st_course.value === "0") {
    alert("Please select course");
    frm_obj.st_course.focus();
    return false;
  }

  // Check if city is selected
  if (frm_obj.st_city.value === "0") {
    alert("Please select city");
    frm_obj.st_city.focus();
    return false;
  }

  // Check if state is selected
  if (frm_obj.st_state.value === "0") {
    alert("Please select state");
    frm_obj.st_state.focus();
    return false;
  }

  // Check if country is selected
  if (frm_obj.st_country.value === "0") {
    alert("Please select country");
    frm_obj.st_country.focus();
    return false;
  }

  // Check if pin number is empty---------------------------
  if (frm_obj.st_pincode.value.trim() === "") {
    alert("Please enter pin number");
    frm_obj.st_pincode.focus();
    return false;
  }

  // Check if pin number length is valid--------------------------
  if (frm_obj.st_pincode.value.length < 6) {
    alert("Please enter a valid 6-digit pin number");
    frm_obj.st_pincode.focus();
    return false;
  }


  // Validation in Email---------------------------
  var email = frm_obj.st_email.value;
  if (email == "") {
    alert("Plz Enter Email");
    frm_obj.st_email.focus();
    return false;
  }

  let mail_providers = ['@gmail.com', '@email.com', '@hotmail.com', '@yahoo.com', '@reddish.com']
  let domain_name = email.substring(email.indexOf('@'))
  if (!mail_providers.includes(domain_name)) {
    alert("Mail must contain any one from these domain " + mail_providers)
    frm_obj.st_email.focus()
    return false;
  }

  // Check if email is empty---------------------
  // var email = frm_obj.st_email.value.trim();
  // if (email === "") {
  //     alert("Please enter email");
  //     frm_obj.st_email.focus();
  //     return false;
  // }

  // Check for valid email format (basic validation)
  // var atCount = 0;
  // for (var i = 0; i < email.length; i++) {
  //     if (email.charAt(i) === "@") {
  //         atCount++;
  //     }
  // }
  // if (atCount !== 1) {
  //     alert("Email is invalid");
  //     frm_obj.st_email.focus();
  //     return false;
  // }

  ////date of birth-------------
  if (frm_obj.st_dob.value.length < 6) {
    alert("Please enter DOB");
    frm_obj.st_dob.focus();
    return false;
  }
  ////date of Join-------------
  if (frm_obj.st_doj.value.length < 6) {
    alert("Please enter DOJ");
    frm_obj.st_doj.focus();
    return false;
  }

  // Check if image is selected
  if (frm_obj.st_image.value === "") {
    // alert("hello")
    alert("Please select an image");
    frm_obj.st_image.focus();
    return false;
  }

  // Check if Address  is empty
  if (frm_obj.st_address.value.trim() === "") {
    alert("Please Enter Address");
    frm_obj.st_address.focus();
    return false;
  }

  var chk = false;
  var frm = this.document.student_add;
  var frm_len = frm.elements.length;
  for (var i = 0; i < frm_len; i++) {
    if (frm.elements[i].name == "st_qualification[]") {
      if (frm.elements[i].checked == true) {
        chk = true;
        break;
      }
    }
  }
  if (chk == false) {
    alert("Select your Qualification");
    return false;
  }

  // Check if Address  is empty
  if (frm_obj.st_address2.value.trim() === "") {
    alert("Please Enter Address");
    frm_obj.st_address2.focus();
    return false;
  }
  return true;
}






// Validate Name Input Field
function validate_name(obj, e) {
  let value = obj.value
  let key = e.data
  if (key != null) {
    let asc_v = key.charCodeAt(0)
    if (!(asc_v >= 97 && asc_v <= 122 || asc_v >= 65 && asc_v <= 90 || asc_v == 32)) {
      obj.value = value.substring(0, value.length - 1)
    }
    if (asc_v == 32) {
      if (value.length == 1 && e.data == " ") {
        obj.value = ""
      }
      if (value.charAt(value.length - 2) == " " && e.data == " ") {
        obj.value = value.substring(0, value.length - 1)
      }
      let arr = obj.value.split(" ")
      arr.length -= 1
      for (i in arr) {
        let firstchar = arr[i].charAt(0)
        let restchar = arr[i].substring(1, arr[i].length)
        let final_str = firstchar.toUpperCase() + restchar.toLowerCase()
        arr[i] = final_str + " "
      }
      obj.value = arr.join("")
    }
  }
}



// validate Student Phone number -------------------------------
function validate_phone(obj, e) {
  if (e.data != null) {
    let asc_v = e.data.charCodeAt(0)
    if (asc_v >= 48 && asc_v <= 57) {
      // alert("don't Input Character input only number!!")
    } else {
      obj.value = obj.value.substring(0, obj.value.length - 1);
    }
  }
  if (obj.value.length >= 10) {
    obj.value = obj.value.substring(0, 10);
  }
}

// validate Student Pincode -------------------------------
function check_pincode(obj, e) {
  if (e.data != null) {
    let asc_v = e.data.charCodeAt(0)
    if (asc_v >= 48 && asc_v <= 57) {
      // alert("don't Input Character input only number!!")
    } else {
      obj.value = obj.value.substring(0, obj.value.length - 1);
    }
  }
  if (obj.value.length >= 6) {
    obj.value = obj.value.substring(0, 6);
  }
}

// console.log(obj.value.length)


// Validate Date of Birth
function valid_date_input(obj, e) {
  let value = obj.value;
  let key = e.data;
  if (key != null) {
    let asc_v = key.charCodeAt(0)
    console.log(asc_v)
    if (asc_v < 48 || asc_v > 58 || value.length == 11) {
      obj.value = value.substring(0, value.length - 1)
    }
    if (value.length == 2 || value.length == 5) {
      obj.value = obj.value + '/';
    }
    if (value.length == 3) {
      obj.value = value.substring(0, 2) + '/' + value.charAt(2)
    } else if (value.length == 6) {
      obj.value = value.substring(0, 5) + '/' + value.charAt(5)
    }
  }

  console.log(obj.value.length)
}



//// function for delete student ///////////////////
function delete_student(stu_id) {
  if (confirm("Are you sure to delete")) {
    this.document.student_view.st_id.value = stu_id;
    this.document.student_view.act.value = "delete_student";
    this.document.student_view.submit();
  }
}




///  function for print document  /////////////////////

function printOut() {
  window.print();
}

// Validate Student Email --------------------
function validate_email(obj, e) {
  let value = obj.value;
  let key = e.data;
  if (key != null) {
    let asc_v = key.charCodeAt(0)
    if (!(asc_v >= 97 && asc_v <= 122 || asc_v >= 65 && asc_v <= 90 || asc_v >= 48 && asc_v <= 58 || key == '@' || key == '.')) {
      obj.value = value.substring(0, value.length - 1);
    }
    if (value.includes('@')) {
      let count = 0;
      for (i of value)
        if (i == "@")
          count++
      if (value.charAt(0) == '@' || count > 1) {
        obj.value = value.substring(0, value.length - 1);
      }
    }
  }
}


/// check student qualification ------------------------------
function st_check(obj) {
  // alert("hello")
  let qual_checkboxes = document.getElementsByClassName('st_qualification[]')
  let max = 0
  for (q of qual_checkboxes) {
    if (q.value == obj.value) {
      break;
    }
    max++
  }
  for (let i = 0; i < qual_checkboxes.length; i++) {
    if (i < max)
      qual_checkboxes[i].checked = true;
    else if (i > max)
      qual_checkboxes[i].checked = false;
  }
  return false;
}

/// function select all ----------------------------------

function checkAll(obj) {
  var frm = this.document.student_view;
  var frm_len = frm.elements.length;
  for (var i = 0; i < frm_len; i++) {
    if (frm.elements[i].type == 'checkbox' && frm.elements[i].name == 'st_multi_id[]') {
      frm.elements[i].checked = obj.checked;
    }
  }
}


//// function for multiple delete ---------------------------------------------

function delete_multiple_student() {
  if (confirm("are you sure to delete selected records")) {
    this.document, student_view.act.value = "delete_multiple_student";
    this.document.student_view.submit();
  }
}


// Amount condition Payment.php--------------------------
function setBalance() {
  // console.log("hello")
  if (parseInt(amount.value) <= (total_fees.value - paid_amount.value) && parseInt(amount.value) > 0) {
    balance.value = (total_fees.value - paid_amount.value) - amount.value
  } else {
    balance.value = (total_fees.value - paid_amount.value) - amount.value
    alert("Please enter value in between 0 to " + (total_fees.value - paid_amount.value))
  }
}



//// function for delete Exam ///////////////////
function delete_exam(exam_id) {
  if (confirm("Are you sure to delete")) {
    console.log(this.document.exam_view)
    this.document.exam_view.exam_id.value = exam_id;
    this.document.exam_view.act.value = "delete_exam";
    this.document.exam_view.submit();
  }
}

//invisible eye-----------------------------------

//active vailidation---------------



