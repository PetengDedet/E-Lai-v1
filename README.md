A simple E-Learning management system for discuss, sending/reciving message and online exam.


**Features**
<ul>
<li>Forum for dicuss with comment and attachment and directly save to Google Drive account.</li>
<li>Online exam and it's result</li>
<li>Print the exam result as a paper report</li>
<li>Message between lecturers and student with attachment and directly save to Google Drive.</li>
</ul>

**Installation**

Clone this rrepostitory to your web host directory
```bash
$ git clone https://github.com/PetengDedet/E-Lai-v1.git
```
Import <kbd>Database.sql</kbd> file to your database

Change the connection in <kbd>/sys/sambung.php</kbd>
```php
	ob_start();
	## Change these four variable value with yours
	$server = "your database host";
	$database="your database name";
	$username="your database username";
	$password="your database password";
```

***Thanks for these pojects developers, contributors and donators**
<ul>
<li>PHP 5.4</li>
<li>MariaDB 10</li>
<li>Bootstrap 3.0</li>
<li>Sublime Text 2</li>
<li>Evolus Pencil</li>
<li>Fedora 20</li>
<li>PHPMyAdmin</li>
</ul>
