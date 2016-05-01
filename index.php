<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ken Je Verenigingen</title>
<style>
* {
      font-family: Arial, Helvetica, sans-serif;
      font-size:27px;
      }
@media only screen and (max-device-width: 480px) {
     * {
        font-size: 48px !important;
     }
}
	 table, table tr td { font-size: 18px; }
</style>
</head>
<?php
$goed_gedaan = '';
if(isset($_POST['goed_gedaan'])) { $goed_gedaan = $_POST['goed_gedaan']; }

$lijst = "Aeneas
Aengwirden
Alkmaarsche
Alphen
Amenophis
Amstelgeuzen
Amycus
Aquarius
Aross
Asser Roeiclub
Barendrecht
Beatrix
Binnenmaas
Breda
Cornelis Tromp
Daventria
DDS
De Amstel
De Ank
De Compagnie
De Doorslag
De Dragt
De Drie Provincien
De Drietand
De Eem
De Geeuw
De Grift
De Helling
De Hertog
De Hoop
De Hunze
De IJssel
De Kogge
De Kop
De Krom
De Laak
De Maas
De Meije
De Stern
De Where
De Zaan
Die Leythe
Dordtsche
Epsilon
Gorcumse
Gouda
Hemus
Het Galjoen
Het Spaarne
Hollandia Roeiclub
Honte
Iris
Isala
Jason
KNZRV
Leerdam
Maastrichtsche
Michiel de Ruyter
Naarden
Nautilus
Neptunus
Ondine
Oostvoorne
Ossa
Pampus
Pantha Rei
Pontos
Poseidon
RIC
Rijnland
Rijnmond
Roosendaalse
RowDow
Salland
Scaldis
SilVia
Skylla
Stichting Roeivalidatie
Thyro
TOR
Tubantia
Vada
Viking
Voorne-Putten
Weesp
Wetterwille
Willem III
ZZV
Zaankanaries
Zwolsche
Aegir
Amphitrite lustrum
Amphitrite
Argo
Asopos de Vliet
Boreas
Dudok van Heel
Euros
Gyas
Laga
Minerva
Nereus
Njord
Okeanos
Orca lustrum
Orca
Pelargos
Phocas
Proteus-Eretes
Saurus
Skadi
Skoll lustrum
Skoll
Theta
Triton lustrum
Triton
Vidar lustrum
Vidar";

$goed = 0;
if(isset($_POST['goed'])) { $goed = $_POST['goed']; }
$pogingen = 0;
if(isset($_POST['pogingen'])) { $pogingen = $_POST['pogingen']; }

if($_POST['vraag']==$_POST['antwoord'])
{
	// goed antwoord
	$goed = $goed+1;
	$goed_gedaan .= ";".$_POST['antwoord'];
	$pogingen++;
}
elseif(isset($_POST['antwoord']))
{
	// fout antwoord
	$pogingen++;
}

$goed_array = explode(";",$goed_gedaan);

$lijst = explode("\n",$lijst);
foreach($goed_array as $key => $regel)
{
	if($key2 = array_search($regel, $lijst))
	{
		unset($lijst[$key2]);
	}
	elseif(array_search($regel, $lijst) !== FALSE)
	{
		unset($lijst[0]);
	}
}

$lijst = array_values($lijst);
$aantal = count($lijst)-1;
$random = rand(0,$aantal);

$vraag = $lijst[$random];
?>
<body>
	<div id="topbar">Roeibladen</div>
  	<div class="spacer"></div>
	<div id="navContent">
    <div id="game1">
	<?php
	if(count($lijst)==0)
	{
		?>
        <div style="width: 100%; height: 300px; background-color: green"><h1 style="color: white; padding: 10px;">Klaar!</h1></div>
        <?php
		exit();
	}	
	?>
    <?php if(isset($_POST['antwoord']))
	{
		?>
            <div id="vorige">
                <table>
                    <tr>
                        <td colspan="3">Het antwoord op de vorige</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black"><img src="images/<?php echo $_POST['vraag']; ?>.jpg" width="70" /></td>
                        <td style="border: 1px solid black">Je antwoord: <?php echo $_POST['antwoord']; ?></td>
                        <td style="border: 1px solid black">
							<?php 
							if($_POST['vraag'] == $_POST['antwoord'])
							{
								?>Correct<?php
							}
							else
							{
								?>Fout, het was: <?php echo $_POST['vraag']; 
							}
							?>
                        </td>
                    </tr>
                </table>
            </div>
     	<?php
	}
	?>
	<div id="stand">
    	<table>
        <tr>
        	<td>Aantal goed: </td>
            <td><?php echo $goed-1; ?></td>
        </tr>
        <tr>
        	<td>Aantal pogingen</td>
            <td><?php echo $pogingen-1; ?></td>
       	</tr>
        <tr>
        	<td>Te gaan</td>
            <td><?php echo $aantal+1; ?></td>
       	</tr>
        </table>
    </div>
    <form method="post">
    	<input type="hidden" name="vraag" value="<?php echo $vraag; ?>" />
        <input type="hidden" name="goed" value="<?php echo $goed; ?>" />
        <input type="hidden" name="pogingen" value="<?php echo $pogingen; ?>" />
        <input type="hidden" name="goed_gedaan" value="<?php echo $goed_gedaan; ?>" />
        
        <img src="images/<?php echo $vraag; ?>.jpg" /><br />
        
		<select name="antwoord" class="select">
            <option value="Aegir">Aegir</option>
<option value="Aeneas">Aeneas</option>
<option value="Aengwirden">Aengwirden</option>
<option value="Alkmaarsche">Alkmaarsche</option>
<option value="Alphen">Alphen</option>
<option value="Amenophis">Amenophis</option>
<option value="Amphitrite">Amphitrite</option>
<option value="Amphitrite lustrum">Amphitrite lustrum</option>
<option value="Amstelgeuzen">Amstelgeuzen</option>
<option value="Amycus">Amycus</option>
<option value="Aquarius">Aquarius</option>
<option value="Argo">Argo</option>
<option value="Aross">Aross</option>
<option value="Asopos de Vliet">Asopos de Vliet</option>
<option value="Asser Roeiclub">Asser Roeiclub</option>
<option value="Barendrecht">Barendrecht</option>
<option value="Beatrix">Beatrix</option>
<option value="Binnenmaas">Binnenmaas</option>
<option value="Boreas">Boreas</option>
<option value="Breda">Breda</option>
<option value="Cornelis Tromp">Cornelis Tromp</option>
<option value="Daventria">Daventria</option>
<option value="DDS">DDS</option>
<option value="De Amstel">De Amstel</option>
<option value="De Ank">De Ank</option>
<option value="De Compagnie">De Compagnie</option>
<option value="De Doorslag">De Doorslag</option>
<option value="De Dragt">De Dragt</option>
<option value="De Drie Provincien">De Drie Provincien</option>
<option value="De Drietand">De Drietand</option>
<option value="De Eem">De Eem</option>
<option value="De Geeuw">De Geeuw</option>
<option value="De Grift">De Grift</option>
<option value="De Helling">De Helling</option>
<option value="De Hertog">De Hertog</option>
<option value="De Hoop">De Hoop</option>
<option value="De Hunze">De Hunze</option>
<option value="De IJssel">De IJssel</option>
<option value="De Kogge">De Kogge</option>
<option value="De Kop">De Kop</option>
<option value="De Krom">De Krom</option>
<option value="De Laak">De Laak</option>
<option value="De Maas">De Maas</option>
<option value="De Meije">De Meije</option>
<option value="De Stern">De Stern</option>
<option value="De Where">De Where</option>
<option value="De Zaan">De Zaan</option>
<option value="Die Leythe">Die Leythe</option>
<option value="Dordtsche">Dordtsche</option>
<option value="Dudok van Heel">Dudok van Heel</option>
<option value="Epsilon">Epsilon</option>
<option value="Euros">Euros</option>
<option value="Gorcumse">Gorcumse</option>
<option value="Gouda">Gouda</option>
<option value="Gyas">Gyas</option>
<option value="Hemus">Hemus</option>
<option value="Het Galjoen">Het Galjoen</option>
<option value="Het Spaarne">Het Spaarne</option>
<option value="Hollandia Roeiclub">Hollandia Roeiclub</option>
<option value="Honte">Honte</option>
<option value="Iris">Iris</option>
<option value="Isala">Isala</option>
<option value="Jason">Jason</option>
<option value="KNZRV">KNZRV</option>
<option value="Laga">Laga</option>
<option value="Leerdam">Leerdam</option>
<option value="Maastrichtsche">Maastrichtsche</option>
<option value="Michiel de Ruyter">Michiel de Ruyter</option>
<option value="Minerva">Minerva</option>
<option value="Naarden">Naarden</option>
<option value="Nautilus">Nautilus</option>
<option value="Neptunus">Neptunus</option>
<option value="Nereus">Nereus</option>
<option value="Njord">Njord</option>
<option value="Okeanos">Okeanos</option>
<option value="Ondine">Ondine</option>
<option value="Oostvoorne">Oostvoorne</option>
<option value="Orca">Orca</option>
<option value="Orca lustrum">Orca lustrum</option>
<option value="Ossa">Ossa</option>
<option value="Pampus">Pampus</option>
<option value="Pantha Rei">Pantha Rei</option>
<option value="Pelargos">Pelargos</option>
<option value="Phocas">Phocas</option>
<option value="Pontos">Pontos</option>
<option value="Poseidon">Poseidon</option>
<option value="Proteus-Eretes">Proteus-Eretes</option>
<option value="RIC">RIC</option>
<option value="Rijnland">Rijnland</option>
<option value="Rijnmond">Rijnmond</option>
<option value="Roosendaalse">Roosendaalse</option>
<option value="RowDow">RowDow</option>
<option value="Salland">Salland</option>
<option value="Saurus">Saurus</option>
<option value="Scaldis">Scaldis</option>
<option value="SilVia">SilVia</option>
<option value="Skadi">Skadi</option>
<option value="Skoll">Skoll</option>
<option value="Skoll lustrum">Skoll lustrum</option>
<option value="Skylla">Skylla</option>
<option value="Stichting Roeivalidatie">Stichting Roeivalidatie</option>
<option value="t Diep">t Diep</option>
<option value="Theta">Theta</option>
<option value="Thyro">Thyro</option>
<option value="TOR">TOR</option>
<option value="Triton">Triton</option>
<option value="Triton lustrum">Triton lustrum</option>
<option value="Tubantia">Tubantia</option>
<option value="Vada">Vada</option>
<option value="Vidar">Vidar</option>
<option value="Vidar lustrum">Vidar lustrum</option>
<option value="Viking">Viking</option>
<option value="Voorne-Putten">Voorne-Putten</option>
<option value="Weesp">Weesp</option>
<option value="Wetterwille">Wetterwille</option>
<option value="Willem III">Willem III</option>
<option value="Zaankanaries">Zaankanaries</option>
<option value="Zwolsche">Zwolsche</option>
<option value="ZZV">ZZV</option>
            </select>
            <input type="submit" value="Insturen" rel="external" />
    </form>
    </div>
    <br /><br />
    <a href="http://greefhorst.nl/bladen/images/Bladen.pdf" target="_blank">Spiekbriefje</a>
    </div>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-76926202-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>