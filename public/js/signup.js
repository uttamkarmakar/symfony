$(document).ready(function () {
    $('#fname_check').hide();
    $('#lname_check').hide();
  
    var user_err = true;
    var userlastname_err = true;
    var pass_err = true;
    var email_err = true;
    $('#fname').keyup(function () {
      username_check();
    });
    $('#lname').keyup(function () {
      userlastname_check();
    });
  
    function username_check() {
      var user_val = $('#fname').val();
      // alert(user_val); 
      if (user_val.length == '') {
        $('#fname_check').show();
        $('#fname_check').html("**please fill this field");
        $('#fname_check').focus();
        $('#fname_check').css("color", "red");
        user_err = false;
        return false;
      }
      else {
        $('#fname_check').hide();
      }
  
      if (user_val.length < 2) {
        $('#fname_check').show();
        $('#fname_check').html("**Name must contains atleast two letters");
        $('#fname_check').focus();
        $('#fname_check').css("color", "red");
        user_err = false;
        return false;
      }
      var regex = new RegExp("[0-9]");
      var match = regex.exec($('#fname').val());
      if (match) {
        $('#fname_check').show();
        $('#fname_check').html("**Name should'nt contain any numeric value");
        $('#fname_check').focus();
        $('#fname_check').css("color", "red");
        user_err = false;
        return false;
      }
    }
  
    function userlastname_check() {
      var userlname_val = $('#lname').val();
      // alert(user_val); 
      if (userlname_val.length == '') {
        $('#lname_check').show();
        $('#lname_check').html("**please fill this field");
        $('#lname_check').focus();
        $('#lname_check').css("color", "red");
        userlastname_err = false;
        return false;
      }
      else {
        $('#lname_check').hide();
      }
  
      if (userlname_val.length < 2) {
        $('#lname_check').show();
        $('#lname_check').html("**last name must contains atleast two letters");
        $('#lname_check').focus();
        $('#lname_check').css("color", "red");
        userlastname_err = false;
        return false;
      }
      var regex = new RegExp("[0-9]");
      var match = regex.exec($('#lname').val());
      if (match) {
        $('#lname_check').show();
        $('#lname_check').html("**Name should'nt contain any numeric value");
        $('#lname_check').focus();
        $('#lname_check').css("color", "red");
        userlastname_err = false;
        return false;
      }
    }
    $("#pass").keyup(function () {
      password_check();
    });
  
    function password_check() {
      var password_str = $('#pass').val();
      if (password_str.length == '') {
        $('#pass_check').show();
        $('#pass_check').html("**This field can't be empty");
        $('#pass_check').focus();
        $('#pass_check').css("color", "red");
        pass_err = false;
        return false;
      }
      else {
        $('#pass_check').hide();
      }
  
      if (password_str.length < 8) {
        $('#pass_check').show();
        $('#pass_check').html("**Password should contain atleast 8 characters");
        $('#pass_check').focus();
        $('#pass_check').css("color", "red");
        pass_err = false;
        return false;
      }
    }
    $('#email').keyup(function () {
      email_check();
    });
  
    function email_check() {
      var email_filter = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      var email = $('#email').val();
      // alert(email.length);
      if (email.length == 0) {
        $('#email_check').show();
        $('#email_check').html("**Please input your email address");
        $('#email_check').focus();
        $('#email_check').css("color", "red");
        email_err = false;
        return false;
      }
      else if (!(email_filter.test(email))) {
        $('#email_check').show();
        $('#email_check').html("**Please enter an valid email address");
        $('#email_check').focus();
        $('#email_check').css("color","red");
        email_err = false;
        return false;
      }
      else {
        $('#email_check').hide();
      }
  
    }
    //   var regex = new RegExp("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/");
    //   var match = regex.exec($('#pass').val());
    //   if (match) {
    //     $('#pass_check').show();
    //     $('#pass_check').html("**Hello");
    //     $('#pass_check').focus();
    //     $('#pass_check').css("color", "red");
    //     pass_err = false;
    //     return false;
    //   }
  
  
    $('#submit-btn').click(function () {
      user_err = true;
      userlastname_err = true;
      pass_err = true;
  
      username_check();
      userlastname_check();
      password_check();
  
      if ((user_err == true) && userlastname_err == true && pass_err == true) {
        return true;
      }
      else {
        return false;
      }
    });
  });