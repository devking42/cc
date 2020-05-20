<html>

<head>
  <meta charset="utf-8">
  <title>Proxy Checker</title>
  <link rel="shortcut icon" href="/logo.jpg">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.1/flatly/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      color: #3c3f42;
      background-repeat: norepeat;
      background-size: cover;
    }

    img {
      padding-left: 20px;
    }

    table,
    td {
      text-align: center;
    }
    .card-body{
      background-color: grey;
    }
    .card-header{
      background-color:#242629;
    }
  </style>
</head>

<body style="background-image: linear-gradient(to bottom, #303236, black);">
  <div class="container-fluid" style="padding-top: 30px">
    <div class="text-center">
      <h1 class="greetings">Proxy Checker</h1>
    </div>
    <div class="row">
      <div style="margin-bottom: 10px;margin-top: 30px;" class="col-sm-12">
        <div class="card border-info mb-12">
          <div class="card-header success"></div>
          <div class="card-body text-center">
            <div class="row">
              <div style="margin-bottom: 10px;" class="col-sm-12">
                <textarea style="background-color:#575859" class="form-control" id="proxies" rows="3" cols="50"></textarea><br>
              </div>
              <br><button style="background-color:#242629;color:#3c3f42" class="btn btn-block" onclick="linkburst()">Start!!!!</button>
            </div>
          </div>
        </div>
      </div>
      <div style="padding-bottom: 30px;" class="col-sm-12">
        <div class="card border-info mb-12">
          <div class="card-header success">Alive</div>
          <div class="card-body">

            <table class="table">
              <tr align="center">
                <th>STATUS</th>
                <th>PROXY</th>
                <th>INFO</th>
              </tr>
              <tbody id="lives">
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div style="padding-bottom: 30px;" class="col-sm-12">
        <div class="card border-info mb-12">
          <div class="card-header">Dead</div>
          <div class="card-body">

            <table class="table">
              <tr align="center">
                <th>STATUS</th>
                <th>PROXY</th>
                <th>INFO</th>
              </tr>
              <tbody id="deds">
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/js/mdb.min.js"></script>

<script title="Some beauty">
  function linkburst() {
    var linha = $("#proxies").val();
    var linhaenviar = linha.split("\n");
    linhaenviar.forEach(function(value, index) {
      setTimeout(
        function() {
          $.ajax({
            url: 'proxy.php?proxy=' + value,
            type: 'GET',
            async: true,
            success: function(resultado) {
              if (resultado.match("200 OK")) {
                removelinha();
                aprovadas(resultado);
              } else {
                removelinha();
                reprovadas(resultado);
              }
            }
          });
        }, 10000 * index);
    });
  }

  function aprovadas(str) {
    $("#lives").append(str);
  }

  function reprovadas(str) {
    $("#deds").append(str);
  }

  function removelinha() {
    var lines = $("#proxies").val().split('\n');
    lines.splice(0, 1);
    $("#proxies").val(lines.join("\n"));
  }

  function alsh() {
    var x = document.getElementById("aprovadas");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }

  function desh() {
    var x = document.getElementById("reprovadas");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
</script>
<!-- Made by THE real penguin -->
</html>