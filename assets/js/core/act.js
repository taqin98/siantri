$(document).ready(function(){
      $("#print_button").click(function(){
      var options = {popTitle:"Siantri - Nomor Antrian",popClose: false};
      $("div.PrintArea").printArea( options ); 
      });      
    });