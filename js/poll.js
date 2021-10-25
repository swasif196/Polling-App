var ip = "";

$(document).ready(function() {
  
  $.getJSON('https://api.ipify.org?format=jsonp&callback=?', function(data) {
    console.log(data.ip);
    console.log("https://whatismyipaddress.com/ip/" + data.ip);
    ip = data.ip;
  });
  dispQs();
  
});

function subAns(e, id, type) {
  
  e.preventDefault();
  var a = "#"+id;
  var form_data = $(a).serialize();
  var email = document.getElementById("getEm").value;
  
  if(type === 'T0') {
    console.log(ip);
    
    form_data = form_data + "&ip=" + ip + "&id=" + id + "&type=" + type;
    console.log(form_data);
    
    $.ajax({
      url:'/db6.php',
      type:'POST',
      data: form_data,
      success:function(data){
        // See what data was returned
        $('#debug').html(data);
      }
    });
    
  }
  else if(type === 'T1'){
    var x = id + "";
    var y = x.length;
    console.log(typeof x);
    console.log(x);
    console.log(y);
    form_data = form_data + "&email=" + email + "&id=" + id + "&type=" + type;
    form_data = form_data.substring(y);
    console.log(form_data);
    if(form_data.substr(1,4) === "opts") {
      var sid = id+'S';
      form_data = 'r' + form_data + "&ans=" + document.getElementById(sid).value;
    }
    else if(form_data.substr(1,5) === "other") {
      var sid = id+'U';
      form_data = 'r' + form_data + "&ans=" + document.getElementById(sid).value;
    }
    else {
      form_data = "ans" + form_data
    }
    console.log(form_data);
    
    $.ajax({
      url:'/db6.php',
      type:'POST',
      data: form_data,
      success:function(data){
        // See what data was returned
        $('#debug').html(data);
      }
    });
  }
  else if(type === 'T2'){
    var x = id + "";
    var y = x.length;
    console.log(typeof x);
    console.log(x);
    console.log(y);
    form_data = form_data + "&email=" + email + "&id=" + id + "&type=" + type;
    form_data = form_data.substring(y);
    console.log(form_data);
    form_data = "ans" + form_data
    console.log(form_data);
    
    $.ajax({
      url:'/db6.php',
      type:'POST',
      data: form_data,
      success:function(data){
        // See what data was returned
        $('#debug').html(data);
      }
    });
  }
  else if(type === 'T3'){
    var x = id + "";
    var y = x.length;
    console.log(typeof x);
    console.log(x);
    console.log(y);
    form_data = form_data + "&email=" + email + "&id=" + id + "&type=" + type;
    form_data = form_data.substring(y);
    console.log(form_data);
    if(form_data.substr(1,4) === "opts") {
      var sid = id+'S';
      form_data = 'r' + form_data + "&ans=" + document.getElementById(sid).value;
    }
    else {
      form_data = "ans" + form_data
    }
    console.log(form_data);
    
    $.ajax({
      url:'/db6.php',
      type:'POST',
      data: form_data,
      success:function(data){
        // See what data was returned
        $('#debug').html(data);
      }
    });
  }
  else if(type === 'T4' || type === 'T5'){
    var x = id + "";
    var y = x.length;
    console.log(typeof x);
    console.log(x);
    console.log(y);
    form_data = form_data + "&email=" + email + "&id=" + id + "&type=" + type;
    form_data = form_data.substring(y);
    console.log(form_data);
    if(form_data.substr(1,3) === "Yes") {
      var sid = id+'U';
      form_data = 'r' + form_data + "&ans=" + "Yes, " + document.getElementById(sid).value;
    }
    else if(form_data.substr(1,2) === "No") {
      var sid = id+'U';
      form_data = 'r' + form_data + "&ans=" + "No, " + document.getElementById(sid).value;
    }
    if(form_data.slice(-2) === ", ") {
      form_data = form_data.slice(0,-2);
    }
    console.log(form_data);
    
    $.ajax({
      url:'/db6.php',
      type:'POST',
      data: form_data,
      success:function(data){
        // See what data was returned
        $('#debug').html(data);
      }
    });
  }
  else if(type === 'T6'){
    
    form_data = "email=" + email + "&id=" + id + "&type=" + type;
    console.log(form_data);
    
    var sid = id+'U';
    form_data = form_data + "&ans=" + document.getElementById(sid).value;
    
    console.log(form_data);
    
    $.ajax({
      url:'/db6.php',
      type:'POST',
      data: form_data,
      success:function(data){
        // See what data was returned
        $('#debug').html(data);
      }
    });
  }
  
  else if(type === 'T7'){
    
    form_data = "email=" + email + "&id=" + id + "&type=" + type;
    console.log(form_data);
    
    var sid = id+'S';
    form_data = form_data + "&ans=" + document.getElementById(sid).value;
    
    console.log(form_data);
    
    $.ajax({
      url:'/db6.php',
      type:'POST',
      data: form_data,
      success:function(data){
        // See what data was returned
        $('#debug').html(data);
      }
    });
  }
  
}

function subForms() {
  var forms = document.getElementsByTagName("form");
  for(var i = 0; i < forms.length; i++) {
    var a = forms[i].checkValidity();
    
    if(!a) {
      var button = forms[i].ownerDocument.createElement('input');
      button.style.display = 'none';
      button.type = 'submit';
      forms[i].appendChild(button).click();
      forms[i].removeChild(button);
      return;
    }

  }
  
  for(var i = 0; i < forms.length; i++) {
    var button = forms[i].ownerDocument.createElement('input');
    //alert("in")
    button.style.display = 'none';
    button.type = 'submit';
    forms[i].appendChild(button).click();
    forms[i].removeChild(button);
  }
  window.location.reload();
  window.alert("Your Opinion Has Been Submitted! Thanks For Sharing!");

  //document.getElementById('userf').submit();
}

function optYNE(id) {
  var x = id;
  
  x = x.slice(0,-1) + 'U';
  if(document.getElementById(x) != null) {
    document.getElementById(x).disabled = false;
  }
}

function optYN(id) {
  var x = id;
  
  x = x.slice(0,-1) + 'S';
  if(document.getElementById(x) != null) {
    document.getElementById(x).disabled = true;
  }
  
  x = x.slice(0,-1) + 'U';
  if(document.getElementById(x) != null) {
    document.getElementById(x).disabled = true;
  }
}

function optS(id) {
  var x = id;
  
  x = x.slice(0,-1) + 'S';
  document.getElementById(x).disabled = false;
  
  x = x.slice(0,-1) + 'U';
  if(document.getElementById(x) != null) {
    document.getElementById(x).disabled = true;
  }
}

function optU(id) {
  var x = id;
  
  x = x.slice(0,-1) + 'U';
  document.getElementById(x).disabled = false;
  
  x = x.slice(0,-1) + 'S';
  if(document.getElementById(x) != null) {
    document.getElementById(x).disabled = true;
  }
}

function dispQs() {
  $.ajax({
    url:'/db5.php',
    type:'POST',
    success:function(data){
      // See what data was returned
      $('#questions').html(data);
    }
  });
}