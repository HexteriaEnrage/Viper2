This login system is yet to be implemented into the site.
For testing the login system will only work using XAMPP and with the correct MySQL database connected.

TEXT INSTRUCTIONS:

Please install XAMPP and move the website files into C:/xampp/htdocs/vipersden
(The vipersden folder will not yet exist so you will have to create it.)
After enabling Appache and MySQL in XAMMP go to localhost/phpmyadmin/index.php in your browser
On the left side of the site press the New button. Set the Database name to viper_login_db and leave the rest to the defaults.
Set the table name to users and set the amount of colums to 5.
Set the 1st row's name to be 'id' it's type to be 'BIGINT' its index to be 'PRIMARY' and mark 'A_I' as true.
Set the 2nd row's name to be 'user_id' and set its type to be 'BIGINT'.
Set the 3rd row's name to be 'user_name' set its type to be 'VARCHAR' and set its length to 100.
Set the 4th row's name to be 'password' set its type to be 'VARCHAR' and set its length to 100.
Set the 5th row's name to be 'date' and set its type to be 'TIMESTAMP'.
Press the save button.
Hover your mouse over the 'More' dropdown in the user_id row and click on 'Index'.
Do the same for the user_name and the date rows.
Now press on the Browse tab at the top and you should see your table.
You can now go to localhost in your browser and test the login system.

VIDEO INSTRUCTIONS:

https://kapwi.ng/c/wZar5TOp


IMPORTANT!!
aswell as the instructions above you need to make another databse called viper_lineups_db (no video, soz)
You will need 8 columns.
Set the 1st table name to poisonorbs.
Set the 1st column's name to be 'id' it's type to be 'BIGINT' its index to be 'PRIMARY' and mark 'A_I' as true.
Set the 2nd column's name to be 'image_id' and set its type to be 'BIGINT'.
Set the 3rd column's name to be 'title' set its type to be 'VARCHAR' and set its length to 50.
Set the 4th column's name to be 'image_url' set its type to be 'VARCHAR' and set its length to 2048.
Set the 5th column's name to be 'difficulty' and set its type to be 'VARCHAR' and set its length to 10.
Set the 6th column's name to be 'map' and set its type to be 'VARCHAR' and set its length to 20.
Set the 7th column's name to be 'verified' and set its type to be 'boolean' and set its default value to 'False'.
Set the 8th column's name to be 'user_name' and set its type to be 'VARCHAR' and set its length to 100.
Press the save button.
Hover your mouse over the 'More' dropdown in the user_id row and click on 'Index'.
Do the same for the all the other columns apart from 'id'.
Now make 2 more tables named 'snakebites' and 'toxinscreens' and do the process above all over again.
Now the system should work. Head over to localhost/silence.php

