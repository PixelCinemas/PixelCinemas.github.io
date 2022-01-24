// validator.js
//   An example of input validation using the change and submit
//   events, using the DOM 2 event model
//   Note: This document does not work with IE8

// ********************************************************** //
// The event handler function for the name text box

var myName, myMail, myMsg;
//var validName = false;
//var validMail = false;
//var validExp = false;

//chkForm();

function chkName(input) {
  // Get the target node of the event

  myName = input;

  // Test the format of the input name
  //  Allow the spaces after the commas to be optional

  var pos = myName.value.search(/^[a-zA-Z\s]+$/);
  var pos2 = myName.value.search(/^$/);

  if (pos != 0 && pos2 != 0) {
    // alert(
    //   "The name you entered (" +
    //     myName.value +
    //     ") is not in the correct form. \n" +
    //     "The name field contains alphabet characters and character spaces only. \n" +
    //     "Please try again."
    // );
    // myName.focus();
    // myName.select();
    // return false;
    document.getElementById("nameErr").style.display = "block";
  } else {
    document.getElementById("nameErr").style.display = "none";
    //validName = true;
  }
  /*if (pos != 0) {
    validName = false;
  }
  chkForm();*/
}

// ********************************************************** //
// The event handler function for the E-mail text box

function chkMail(input) {
  myMail = input;

  // Test the format of the input email

  var pos = myMail.value.search(
    /^\w+([\.-]?\w+)*@\w+(\.{1}\w+){0,2}(\.{1}\w{2,3}){1}$/
  );
  var pos2 = myMail.value.search(/^$/);

  //[word]
  //([only 1 . or -][word] 0 or more times)
  //@
  //[only 1 word]
  //([only 1 . and word] 0 to 2 times)
  //([only 1 . and word of 2 to 3 char] only 1 time)

  if (pos != 0 && pos2 != 0) {
    // alert(
    //   "The E-mail you entered (" +
    //     myMail.value +
    //     ") is not in the correct form. \n" +
    //     "The username contains word characters including hyphen (“-”) and period (“.”), " +
    //     "followed by 2-4 extensions for the domain name. \n" +
    //     "Please try again."
    // );
    // myMail.focus();
    // myMail.select();
    // return false;
    document.getElementById("mailErr").style.display = "block";
  } else {
    document.getElementById("mailErr").style.display = "none";
    //validMail = true;
  }
  //if (pos != 0) {
    //validMail = false;
  //}
  //chkForm();
}

// ********************************************************** //
// The event handler function for the Date box
/*
function chkMsg(input) {
  myMsg = input;
  if (input == null) {
    validMsg = false;
  } else {
    validMsg = true;
  }
  chkForm();
}

function chkForm() {
  console.log(validName);
  console.log(validMail);
  if (validName && validMail && validMsg) {
    document.getElementById("applyBtn").disabled = false;
  }
  if (!validName || !validMail || !validMsg) {
    document.getElementById("applyBtn").disabled = true;
  }
}
*/