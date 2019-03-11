document.querySelector('.img__btn').addEventListener('click', function() {
  document.querySelector('.cont').classList.toggle('s--signup');
});
  function validate() {
      
          var x = document.forms["myForm"]["name"].value;
          if (x == "") {
            alert( "Please provide your name!" );
            document.myForm.field31.focus() ;
            return false;
         }

  }