<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Form</title>
</head>
<body>
    <?php
    class Persoon{
        public $naam = "persoon";
        public $email = "";
        public $geslacht = "";
        
        public function ChangeData($newName, $newEmail){
            $this->naam = $newName;
            $this->email = $newEmail;
        }

        public function CheckGender($Gender){
            switch($Gender){
                case "L":
                    $this->geslacht = 'Lesbisch';
                    echo "<script>document.body.style.backgroundColor = 'purple';</script>";
                    break;
                case "H":
                    $this->geslacht = 'Homo';
                    echo "<script>document.body.style.backgroundColor = 'lightblue';</script>";
                    break;
                case "B":
                    $this->geslacht = 'Bi';
                    echo "<script>document.body.style.backgroundColor = 'lightgreen';</script>";
                    break;
                case "T":
                    $this->geslacht = 'Trans';
                    echo "<script>document.body.style.backgroundColor = 'yellow';</script>";
                    break;
                case "M":
                    $this->geslacht = 'Man';
                    echo "<script>document.body.style.backgroundColor = '#48B1D8';</script>";
                    break;
                case "V":
                    $this->geslacht = 'V';
                    echo "<script>document.body.style.backgroundColor = 'pink';</script>";
                    break;
                default:
                    echo "<script>document.getElementById('GenderLabel').innerHTML = '*Geslacht is required';</script>";
                    break;
            }
        }
    }
    $person = new Persoon();
    
    if(isset($_POST['Submit'])){
        if(empty($_POST['NameField'])){
            echo "<script>document.getElementById('NaamField').innerHTML = '';</script>";
            echo "<script>document.getElementById('NaamRequired').innerHTML = '*Name is required';</script>";
        } else {
            if(empty($_POST['EmailField'])){
                echo "<script>document.getElementById('EmailLabel').innerHTML = '';</script>";
                echo "<script>document.getElementById('EmailRequired').innerHTML = '*Email is required';</script>";
            } else {
                $person->ChangeData($_POST['NameField'], $_POST['EmailField']);
                if(!empty($_POST['Gender'])){
                    $person->CheckGender($_POST['Gender']);
                }
            }
        }
    }

    $personNaam = $person->naam;
    echo "<h1>Hallo $personNaam!</h1>";
    ?>
    <form method="post">
        <label id="NaamField">Naam</label>
        <label id="NaamRequired" style='color: red;'></label>
        <input type="text" name="NameField" placeholder="Enter your name">
        <br><br>
        <label id="EmailLabel">Email</label>
        <label id="EmailRequired" style='color: red;'></label>
        <input type="email" name="EmailField" placeholder="Enter your email">
        <br><br>
        <label id="GenderLabel">Geslacht</label>
        L<input type="radio" name="Gender" value="L">
        H<input type="radio" name="Gender" value="H">
        B<input type="radio" name="Gender" value="B">
        T<input type="radio" name="Gender" value="T">
        M<input type="radio" name="Gender" value="M">
        V<input type="radio" name="Gender" value="V">
        <br>
        <label>Wilt u beoordelen?</label>
        <input type="checkbox" id="checkbox" name="Beoordelen" value="Beoordelen">
        <input type="submit" name="Submit" style="margin-left: 40px;">
    </form>
    <div id="Beoordeeld">
        <h1>Beoordeling</h1>
        <input type="checkbox" name="Oordeelbutton" value="Happy" id="Oordeel">
        <input type="checkbox" name="Oordeelbutton" value="MHappy" id="Oordeel">
        <input type="checkbox" name="Oordeelbutton" value="MSad" id="Oordeel">
        <input type="checkbox" name="Oordeelbutton" value="Sad" id="Oordeel">
        <br>
        <img src="images/Happy.png" width="45px" style="margin-left: 15px; margin-top: 10px;">
        <img src="images/Smile.png" width="45px">
        <img src="images/Pensive.png" width="45px">
        <img src="images/Cry.png" width="45px">
    </div>
    <script src="script.js"></script>
</body>
</html>