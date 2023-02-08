<!-- tikrinti ar yra prisijungimas ir atvaiztuoti puslapį: incognito.php arba user.php -->
if(NEprisijungęs){
      include("incognito.php")
}else{
      include("user.php")
}

<!-- čia galima sudėti bendrą dalį tiek prisijungusiam tiek ir neprisijungusiam -->