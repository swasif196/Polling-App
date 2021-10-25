$(document).ready(function() {
  
  $( "#authentication" ).submit(function( event ) {
    event.preventDefault();
    console.log("Yes")
    var dataS = "pwd=" + document.getElementById("pass").value;
    console.log(dataS);
    $.ajax({
      url:'/authenticate.php',
      type:'POST',
      data: dataS,
      success:function(data){
        // See what data was returned
        console.log(data);
        if(data === "Success"){
          event.currentTarget.className += " disable";
          var x = document.getElementsByClassName("tabs");
          x[0].className = x[0].className.replace(" disable", "");
          $('#disp').html("");
        }
        else {
          $('#disp').html(data);
        }
      }
    });
  });
  
});

function stats(e) {
  e.preventDefault();
  //$('#disp').html("");
  var dataS = "id="+document.getElementById("sId").value;
  $.ajax({
    url:'/db7.php',
    type:'POST',
    data: dataS,
    success:function(data){
      // See what data was returned
      console.log(data);
      $('#disp').html(data);
    }
  });
}

function Chng(e, a) {
  e.preventDefault();
  var dataS = "active="+a+"&id="+document.getElementById("qId").value;
  $.ajax({
    url:'/db4.php',
    type:'POST',
    data: dataS,
    success:function(data){
      // See what data was returned
      console.log(data);
      var x = $("#disp").html();
      $('#disp').html(x+data);
    }
  });
}

function dispQ(type) {
  var dataS = "type="+type;
  $.ajax({
    url:'/db3.php',
    type:'POST',
    data: dataS,
    success:function(data){
      // See what data was returned
      console.log(data);
      var x = $("#disp").html();
      $('#disp').html(x+data);
    }
  });
}

function insertQ2(idF, idL, type) {
  
  event.preventDefault(); // prevent reload

  var form_data = $(idF).serialize() + "&Qtype=" + type;
  console.log(form_data);
  $.ajax({
    url:'/db2.php',
    type:'POST',
    data: form_data,
    success:function(data){
      // See what data was returned
      console.log(data);
      var x = $("#disp").html();
      $('#disp').html(x+data);
    }
  });
  
}

function insertQ(idF, idL, type) {
  
  event.preventDefault(); // prevent reload
  var x = document.getElementById(idL);
  var txt = "";
  var i;
  for (i = 0; i < x.length; i++) {
    txt = txt + x.options[i].value + ", ";
  }
  txt = txt.substring(0, txt.length - 2);
  var form_data = $(idF).serialize() + "&Qtype=" + type + "&list=" + txt;
  console.log(form_data);
  $.ajax({
    url:'/db.php',
    type:'POST',
    data: form_data,
    success:function(data){
      // See what data was returned
      console.log(data); 
      $('#disp').html(data);
    }
  });
  
}

function rem(e, i1, i2){
  
  e.preventDefault(); // prevent reload
  f = 0;
  var opt = document.getElementById(i1).value;
  if(opt === ""){
    alert("The Option Field is Empty!");
  }
  else{
    var x = document.getElementById(i2).options;
    for (var i = 0; i < x.length; i++) {
      if (x[i].value=== opt) {
        x[i].selected= true;
        f = 1;
        break;
      }
    }

    var x = document.getElementById(i2);
    if(f === 1){
      x.remove(x.selectedIndex);
    }
    alert("Remove, Yes!!!");
  }
  
}

function add(e, i1, i2) {
  
  e.preventDefault(); // prevent reload
  var opt = document.getElementById(i1).value;
    if(opt === ""){
      alert("The Option Field is Empty!");
    }
    else{
      var x = document.getElementById(i2).innerHTML;
      x += "<option value=\""+ opt + "\">" + opt + "</input>";
      document.getElementById(i2).innerHTML = x;
      alert("Add, Yes!!!");
    }
  
}

function switchTab(e, t) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tab");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("btn");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(t).style.display = "block";
  e.currentTarget.className += " active";
  $('#disp').html("");
  
  dispQ(t);
}