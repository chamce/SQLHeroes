<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>SQL Heroes</title>
  </head>
  <body>
    <h1>Heroes Menu</h1>

    <div class="container">
      <div class="row">
        <div class="col">
          <h1>
            Heroes
          </h1>
          <ul>
<!--             create -->
            <li><a href="/api.php?route=addHero&name=Justin&about_me=Cool&biography=Not as cool as Ian" target="_blank">Add Hero</a></li>
<!--             read  -->
            <li><a href="/api.php?route=loadHeroes" target="_blank">Load Heroes</a></li>
<!--             update -->
            <li><a href="/api.php?route=changeHeroName&id=7&name=Ian" target="_blank">Change Hero Name</a></li>
            <li><a href="/api.php?route=changeHeroAboutMe&id=7&about_me=Coolio" target="_blank">Change Hero About Me</a></li>
            <li><a href="/api.php?route=changeHeroBiography&id=7&biography=Dope" target="_blank">Change Hero Biography</a></li>
<!--             delete -->
            <li><a href="/api.php?route=deleteHero&id=1" target="_blank">Delete Hero</a></li>
          </ul>
          <h1>
            Abilities
          </h1>
          <ul>
<!--             create -->
            <li><a href="/api.php?route=addAbility&ability=Rebirth" target="_blank">Add Ability</a></li>
            <li><a href="/api.php?route=assignAbility&hero_id=10&ability_id=9" target="_blank">Assign Ability</a></li>
<!--             read -->
            <li><a href="/api.php?route=loadAbilities" target="_blank">Load Abilities</a></li>
            <li><a href="/api.php?route=loadHeroAbilities" target="_blank">Load Hero Abilities</a></li>
<!--             update -->
            <li><a href="/api.php?route=changeAbility&id=8&ability=Nothing" target="_blank">Change Ability</a></li>
<!--             delete -->
            <li><a href="/api.php?route=deleteAbility&id=1" target="_blank">Delete Ability</a></li>
          </ul>
        </div>
      </div>
    </div>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>