$(function () {
  var i=1;

  var carop = ""
  $(".option").click(function () {
    carop = $(this).prop('value')
  });

  $("#play").click(function () {
    var argu = JSON.stringify({test:1 })

    $.ajax({
      url: "mcq.php",
      dataType: "json",
      data: { Retreiving: argu },
      method: "post",
      success: function (data) {
        var x = data.Number;
        document.getElementById('head').innerHTML = "<h1>Play</h1>";
        document.getElementById('ques').innerHTML = data[i]['ques'];
        document.getElementById('oop1').innerHTML = data[i]['op1'];
        document.getElementById('oop2').innerHTML = data[i]['op2'];
        document.getElementById('oop3').innerHTML = data[i]['op3'];
        document.getElementById('oop4').innerHTML = data[i]['op4'];
        var cp = "";
        var z = data[i]['op'];
        $(".option").click(function () {
          cp = $(this).prop('value')
          if (cp == z) {
            document.getElementById('su').innerHTML = "Correct Answer";
          }
          else {
            document.getElementById('su').innerHTML = "Wrong Answer";
          }
        });

          i+=1;
      },
      error: function (data) {
        console.log(data);
      }
    });
  });

  $("#sub").click(function () {
    var qun = $("#qun").val()
    var op1 = $("#op1").val()
    var op2 = $("#op2").val()
    var op3 = $("#op3").val()
    var op4 = $("#op4").val()

    var argu = JSON.stringify({ qun: qun, op1: op1, op2: op2, op3: op3, op4: op4, cops: carop })

    $.ajax({
      url: "mcq.php",
      dataType: "json",
      data: { Sending: argu },
      method: "post",
      success: function (data) {
        alert(data.outmsg);
      },
      error: function (data) {
        console.log(data);
      }
    });
  });
});