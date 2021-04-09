<?php
  $servername = "localhost";
  $username = "root";
  $password = "changeme";
  $dbname = "sqlheroes";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $route = $_GET['route'];
  switch ($route) {
//     heroes
    case "addHero":
      $name = $_GET["name"];
      $about_me = $_GET["about_me"];
      $biography = $_GET["biography"];
      $myData = addHero($conn, $name, $about_me, $biography);
      break;
    case "loadHeroes":
      $myData = loadHeroes($conn);
      break;
    case "changeHeroName":
      $id = $_GET["id"];
      $name = $_GET["name"];
      $myData = changeHeroName($conn, $id, $name);
      break;
    case "changeHeroAboutMe":
      $id = $_GET["id"];
      $about_me = $_GET["about_me"];
      $myData = changeHeroAboutMe($conn, $id, $about_me);
      break;
    case "changeHeroBiography":
      $id = $_GET["id"];
      $biography = $_GET["biography"];
      $myData = changeHeroBiography($conn, $id, $biography);
      break;
    case "deleteHero":
      $id = $_GET["id"];
      $myData = deleteHero($conn, $id);
      break;
//     abilities
    case "addAbility":
      $ability = $_GET["ability"];
      $myData = addAbility($conn, $ability);
      break;
    case "assignAbility":
      $hero_id = $_GET["hero_id"];
      $ability_id = $_GET["ability_id"];
      $myData = assignAbility($conn, $hero_id, $ability_id);
      break;
    case "loadAbilities":
      $myData = loadAbilities($conn);
      break;
    case "loadHeroAbilities":
      $myData = loadHeroAbilities($conn);
      break;
    case "changeAbility":
      $id = $_GET["id"];
      $ability = $_GET["ability"];
      $myData = changeAbility($conn, $id, $ability);
      break;
    case "deleteAbility":
      $id = $_GET["id"];
      $myData = deleteAbility($conn, $id);
      break;
    default:
      $myData = json_encode([]);
  }

  echo $myData;
  $conn->close();

//   heroes
  function addHero($conn, $name, $about_me, $biography) {
    $sql = "INSERT INTO heroes (name, about_me, biography)
    VALUES ('". $name ."', '". $about_me ."', '". $biography ."')";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
  function loadHeroes($conn) {
    $data = array();
    $sql = "SELECT * FROM heroes";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        array_push($data, $row);
      }
    }
    return json_encode($data);
  }
  function changeHeroName($conn, $id, $name) {
    $sql = "UPDATE heroes SET name='". $name ."' WHERE id=" . $id;

    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    }
  }
  function changeHeroAboutMe($conn, $id, $about_me) {
    $sql = "UPDATE heroes SET about_me='". $about_me ."' WHERE id=" . $id;

    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    }
  }
  function changeHeroBiography($conn, $id, $biography) {
    $sql = "UPDATE heroes SET biography='". $biography ."' WHERE id=" . $id;

    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    }
  }
  function deleteHero($conn, $id) {
    // sql to delete a record
    $sql = "DELETE FROM heroes WHERE id=" . $id;

    if ($conn->query($sql) === TRUE) {
      echo "Record deleted successfully";
    } else {
      echo "Error deleting record: " . $conn->error;
    }
  }
//   abilities
  function addAbility($conn, $ability) {
    $sql = "INSERT INTO abilities (ability)
    VALUES ('". $ability ."')";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
  function assignAbility($conn, $hero_id, $ability_id) {
    $sql = "INSERT INTO ability_hero (hero_id, ability_id)
    VALUES ('". $hero_id ."', '". $ability_id ."')";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
  function loadAbilities($conn) {
    $data = array();
    $sql = "SELECT * FROM abilities";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        array_push($data, $row);
      }
    }
    return json_encode($data);
  }
  function loadHeroAbilities($conn) {
    $data = array();
    $sql = "SELECT A.ah_id, A.hero_name, abilities.ability 
            FROM (
            SELECT ability_hero.id ah_id, heroes.name hero_name, ability_hero.ability_id a_id
            FROM ability_hero
            INNER JOIN heroes
            ON ability_hero.hero_id = heroes.id
            ) A
            INNER JOIN abilities
            ON A.a_id = abilities.id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        array_push($data, $row);
      }
    }
    return json_encode($data);
  }
  function changeAbility($conn, $id, $ability) {
    $sql = "UPDATE abilities SET ability='". $ability ."' WHERE id=" . $id;

    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    }
  }
  function deleteAbility($conn, $id) {
    // sql to delete a record
    $sql = "DELETE FROM abilities WHERE id=" . $id;

    if ($conn->query($sql) === TRUE) {
      echo "Record deleted successfully";
    } else {
      echo "Error deleting record: " . $conn->error;
    }
  }
?>