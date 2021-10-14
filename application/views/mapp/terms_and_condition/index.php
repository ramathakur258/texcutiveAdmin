<!DOCTYPE html>
<html lang="en">
<head>
<title>Terms and condition</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<style>
    .cardhead{
        margin-top: 150px;
        border: 1px solid #d8d8d8;
        padding: 50px;
        border-radius: 14px
    }
    .form-control{
        width:3%;
    }
    .fontclass{
        font-size:larger;
    }
</style>
<body>
 
<div class="container cardhead">
    <h1>Client Online Agreement- Chalo Online</h1>
  <!--<h2>Card Header and Footer</h2>-->
  <div class="card">
    <div class="card-header fontclass"><a href="<?=base_url('assets/Terms_and_Condition_ChaloOnline.pdf')?>" target="_blank">View Terms and Condition</a></div>
    <form  method="post">
    <div class="card-body">
        <input type="checkbox" value="checked" class ="form-control" name="terms" >
			<label class="fontclass">Accept Terms and Conditions</label>
    </div> 
    <div class="card-footer"><button type="submit" class="btn btn-primary" >submit</button></div>
    </form>
  </div>
</div>

</body>
</html>
